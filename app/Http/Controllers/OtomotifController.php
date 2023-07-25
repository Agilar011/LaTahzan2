<?php

namespace App\Http\Controllers;

use App\Models\Otomotif;
use Illuminate\Http\Request;

class OtomotifController extends Controller
{
    //READ DATA OTO

    public function index(){
        $data = Otomotif::all();

        return view('admin.admin-category-page.oto.input-oto', compact('data'));
    }


    //CREATE DATA OTO

    public function tambahOto(){
        return view('admin.admin-category-page.oto.tambah-oto');
    }

    public function insertdataoto(Request $request){
        $data = Otomotif::create($request->all());
        if($request->hasFile('foto1') && $request->hasFile('foto2') && $request->hasFile('foto3')){
            $request->file('foto1')->move('fotoOto/', $request->file('foto1')->getClientOriginalName());
            $request->file('foto2')->move('fotoOto2/', $request->file('foto2')->getClientOriginalName());
            $request->file('foto3')->move('fotoOto3/', $request->file('foto3')->getClientOriginalName());

            $data->foto1 = $request->file('foto1')->getClientOriginalName();
            $data->foto2 = $request->file('foto2')->getClientOriginalName();
            $data->foto3 = $request->file('foto3')->getClientOriginalName();

            $data->save();
        }

        return redirect()->route('otomotif');
    }

    //UPDATE DATA OTO

    public function tampildataoto($id){
        // $data = Otomotif::find($id);
        $data = Otomotif::find($id);

        return view('admin.admin-category-page.oto.update-oto', compact('data'));
    }

    public function updatedataoto(Request $request, $id){
        $data = Otomotif::find($id);
        $data->update($request->all());

        return redirect()->route('otomotif');
    }

    //DELETE DATA OTO

    public function deletedataoto($id){
        $data = Otomotif::find($id);
        $data->delete();

        return redirect()->route('otomotif');
    }



}
