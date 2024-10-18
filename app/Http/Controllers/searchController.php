<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class searchController extends Controller
{
    public function search(Request $request){
        if($request->get('query')){
            $query = $request->get('query');
            $data = DB::table('barang')->where('id_barang','LIKE',"{$query}%")->orWhere('nama_barang','LIKE',"{$query}%")->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data as $row)
        {
        $output .= '
        <li><a href="#">'.$row->nama_barang.'</a></li>
        ';
        }
        $output .= '</ul>';
        echo $output;
        }
    }
}
