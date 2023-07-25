<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properti;

class PropertiController extends Controller
{
    public function index(){
        $data = Properti::all();

        return view('admin.admin-category-page.prop.input-prop', compact('data'));
    }

    public function tambahProp(){
        return view('admin.admin-category-page.prop.tambah-prop');
    }

    public function insertdataprop(Request $request){
        // dd($request->all());
        $data = Properti::create($request->all());
        return redirect()->route('properti');
    }
}
