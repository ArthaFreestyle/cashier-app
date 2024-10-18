<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;
use App\Models\Permissions;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(){
        $mainmenus = DB::table('navigation')->where('main_menu',null)->get();
        $menus = Navigation::with('mainMenus')->whereNotNull('main_menu')->get();;
        return view('menu.index',compact('menus','mainmenus'));
    }

    public function register(Request $request){
        $request->validate([
            'menu_name' => 'required|string',
            'url' => 'required|string',
            'icon' => 'required|string',
            'main_menu' => 'required'
        ]);
        Navigation::create([
            'name' => $request->menu_name,
            'url' => $request->url,
            'icon' => $request->icon,
            'main_menu' => $request->main_menu
        ]);
        Permissions::create([
            'name' => 'read '.$request->url
        ]);
        return redirect('menuconfig');
    }

    public function delete($id){
        $menu = Navigation::findOrFail($id);
        $permission = Permissions::where('name','read '.$menu->url)->delete();
        $menu->delete();
        return redirect('menuconfig');
    }

    public function update(Request $request){
        $menu = Navigation::findOrFail($request->menu_id);

        DB::table('permissions')->where('name','read '.$menu->url)->update(['name' => 'read '.$request->menu_url]);
        
        $menu->update([
            'name' => $request->menu_names,
            'url' => $request->menu_url,
            'icon' => $request->menu_icon,
            'main_menu' => $request->main_menu
        ]);


        return redirect('menuconfig');
    }
}
