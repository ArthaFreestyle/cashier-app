<?php

namespace App\Http\Controllers;

use App\Models\DetilPenjualan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\Items;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;

class barang extends Controller
{
    public function items(){
        return view('items');
    }

    public function index(){
        return view('cashier');
    }

    public function registeritem(Request $request){
        $request->validate([
            'id_barang' => ['required', 'string', 'max:255'],
            'nama_barang' => ['required','string','max:255'],
            'harga_barang' => ['required', 'integer'],
            'stok' => ['required']
        ]);

        Items::updateOrCreate([
            'id_barang' => $request->id_barang],
            ['nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'jumlah_barang' => $request->stok
        ]);

        return redirect('registeritem');
    }

    public function changevalue(Request $request){
        $id = $request->post('id_barang');
        $kuantitas = $request->post('kuantitas');
        $data = DB::table('barang')->where('id_barang','=',$id)->first();
        $carts = session()->get('cart',[]);
        if($kuantitas > 0){
            if($data->jumlah_barang < $kuantitas ){
                session()->flash('error', 'Stock tidak cukup silahkan Restock dulu');
                return redirect('cashier');
            }
            $carts[$id]['kuantitas'] = $kuantitas;
        }else{
            unset($carts[$id]);
        }
        

        $hargatotal = 0;
        foreach($carts as $cart){
            if(isset($cart['id_barang'])){
                $harga = $cart['harga_barang']*$cart['kuantitas'];
                $hargatotal += $harga;
            }  
        }

        $carts['harga_total'] = $hargatotal ;

        session()->put('cart', $carts);
        return redirect('cashier');
    }

    public function checkout(Request $req){
        $data = session()->get('cart',[]);
        Penjualan::create([
            'Total_Harga' => $data['harga_total'],
            'id_karyawan' => Auth::user()->id
        ]);

        $kembalian = $req['uang'] - $data['harga_total'];
        foreach($data as $cart){
            if(isset($cart['id_barang'])){
                DetilPenjualan::create([
                    'id_penjualans' => Penjualan::latest()->first()->id_penjualan,
                    'id_barang' => $cart['id_barang'],
                    'jumlah_barang' => $cart['kuantitas']
                ]);

                $barang = Items::find($cart['id_barang']);
                $barang->jumlah_barang -= $cart['kuantitas'];
                $barang->save();
            }
        }

                // Set params
                $mid = '123123456';
                $store_name = 'GRAND FC';
                $store_address = 'Jl. Moh Saleh Bantilan';
                $store_phone = '085222224333';
                $store_email = 'Sulaimanaksa@yahoo.com';
                $store_website = 'grandfc.com';
                $tax_percentage = 0;
                $transaction_id = 'TX123ABC456';
        
                // Set items
                $items = [];

                

                foreach($data as $cart){
                    if(isset($cart['id_barang'])){
                    $barang = Items::find($cart['id_barang']);
                    $items[] = [
                        'name' => $barang->nama_barang,
                        'qty' => $cart['kuantitas'],
                        'price' => $barang->harga_barang
                    ];
                    }
                }
                // Init printer
                $printer = new ReceiptPrinter;
                $printer->init(
                    config('receiptprinter.connector_type'),
                    config('receiptprinter.connector_descriptor')
                );
        
                // Set store info
                $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);
        
                // Add items
                foreach ($items as $item) {
                    $printer->addItem(
                        $item['name'],
                        $item['qty'],
                        $item['price']
                    );
                }
                // Set tax
                $printer->setTax($tax_percentage);
        
                // Calculate total
                $printer->calculateSubTotal();
                $printer->calculateGrandTotal();
        
                // Set transaction ID
                $printer->setTransactionID($transaction_id);
        
                // Set qr code
                $printer->setQRcode([
                    'tid' => $transaction_id,
                ]);
                // Print receipt
                $printer->printReceipt();

                session()->forget('cart');
                session()->flash('success', 'Kembalian '.number_format($kembalian,0,',','.'));

        return redirect('cashier');
        
    }

    public function cart(Request $request){

        $query = $request->post('id_barang');
        $data = DB::table('barang')->where('id_barang','=',$query)->orWhere('nama_barang','=',$query)->first();
        $carts = session()->get('cart',[]);

        if($data == null){
            session()->flash('error', 'Barang tidak ditemukan silahkan masukkan id yang benar');
            return redirect('cashier');
        }

        if(isset($carts[$data->id_barang])){
            if($data->jumlah_barang > $carts[$data->id_barang]['kuantitas'] ){
                session()->flash('error', 'Stock tidak cukup silahkan Restock dulu');
                return redirect('cashier');
            }
            $carts[$data->id_barang]['kuantitas']++;
        }else{
            if($data->jumlah_barang <= 0){
                session()->flash('error', 'Stock tidak cukup silahkan Restock dulu');
                return redirect('cashier');
            }
            $carts[$data->id_barang] = array(
                'id_barang' => $data->id_barang,
                'nama_barang' => $data->nama_barang,
                'harga_barang' => $data->harga_barang,
                'kuantitas' => 1
            );
        
        }

        $hargatotal = 0;
        foreach($carts as $cart){
            if(isset($cart['id_barang'])){
                $harga = $cart['harga_barang']*$cart['kuantitas'];
                $hargatotal += $harga;
            }
        }

        $carts['harga_total'] = $hargatotal;
        

        session()->put('cart', $carts);

        return redirect('cashier');
    }

    public function addstock(){
        $barangs = Items::all();
        return view('Stock',compact('barangs'));
    }

    public function updatestock($id){
        $barang = DB::table('barang')->where('id_barang',$id)->first();
        
        return view('updatestock',[
            'barangs' => $barang
        ]);
    }

    public function payment(){
        return view('payment');
    }
}
