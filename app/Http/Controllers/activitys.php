<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Models\ErrorModel;
use App\Models\User;
use App\Models\Items;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class activitys extends Controller
{
    function index(){
        $activity = Activity::all();
        $user = User::all();
        activity()->causedBy(Auth::user())->performedOn(Auth::user())->event('open activity menu')->log('The user has open activity menu.');

        return view('activity',['activities' => $activity,'user' => $user]);
    }

    function errorlog(){
        $errorlog = ErrorModel::all();
        activity()->causedBy(Auth::user())->performedOn(Auth::user())->event('open errorlog menu')->log('The user has open errorlog menu.');
        return view('errorlog',['errorlogs' => $errorlog]);
    }

    public function invoice(){
        activity()->causedBy(Auth::user())->performedOn(Auth::user())->event('open invoice menu')->log('The user has open invoice menu.');
        return view('invoice',['invoices' => Penjualan::all(),'user' => User::all()]);
    }

    public function viewinvoice($id){
        activity()->causedBy(Auth::user())->performedOn(Auth::user())->event('view invoice')->log('The user has view a invoice.');
        $order = Penjualan::findOrFail($id);
        $user = User::findOrFail($order->id_karyawan);
        $data = $order->DetilPenjualans;
        $barang = Items::all();
        $date = Carbon::now()->format('d-m-Y');
        return view('invoice.generate-invoice',compact('data','order','user','barang','date'));
    }

    public function generate($id){
        activity()->causedBy(Auth::user())->performedOn(Auth::user())->event('generate invoice')->log('The user has generate invoice.');
        $order = Penjualan::findOrFail($id);
        $user = User::findOrFail($order->id_karyawan);
        $data = $order->DetilPenjualans;
        $barang = Items::all();

        $todayDate = Carbon::now()->format('d-m-Y');
        $pdf = Pdf::loadView('invoice.generate-invoice', [
            'order' => $order,
            'user' => $user,
            'data' => $data,
            'barang' => $barang,
            'date' => $todayDate
        ]);
        return $pdf->download('invoice-'.$order->id_penjualan.'-'.$todayDate.'.pdf');
    }




}
