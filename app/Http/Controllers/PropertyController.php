<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertiController extends Controller
{

    //RETRIEVE DATA PROP

    public function index(){
        $data = Property::all();

        return view('admin.admin-category-page.prop.input-prop', compact('data'));
    }

    //CREATE DATA PROP

    public function tambahProp(){
        return view('admin.admin-category-page.prop.tambah-prop');
    }

    public function insertdataprop(Request $request){
        // dd($request->all());
        $data = Property::create($request->all());
        if($request->hasFile('foto1') && $request->hasFile('foto2') && $request->hasFile('foto3') && $request->hasFile('foto_sertifikat')){
            $request->file('foto1')->move('fotoProp1/', $request->file('foto1')->getClientOriginalName());
            $request->file('foto2')->move('fotoProp2/', $request->file('foto2')->getClientOriginalName());
            $request->file('foto3')->move('fotoProp3/', $request->file('foto3')->getClientOriginalName());
            $request->file('foto_sertifikat')->move('fotoSertifikat/', $request->file('foto_sertifikat')->getClientOriginalName());

            $data->foto1 = $request->file('foto1')->getClientOriginalName();
            $data->foto2 = $request->file('foto2')->getClientOriginalName();
            $data->foto3 = $request->file('foto3')->getClientOriginalName();
            $data->foto_sertifikat = $request->file('foto_sertifikat')->getClientOriginalName();

            $data->save();
        }
        return redirect()->route('properti');
    }

    //UPDATE DATA PROP

    public function tampilkandataprop($id){
        // $data = Otomotif::find($id);
        $data = Property::find($id);

        return view('admin.admin-category-page.prop.update-prop', compact('data'));
    }

    public function updatedataprop(Request $request, $id){
        $data = Property::find($id);
        $data->update($request->all());

        return redirect()->route('properti');
    }

    //DELETE DATA OTO

    public function deletedataprop($id){
        $data = Property::find($id);
        $data->delete();

        return redirect()->route('properti');
    }


}
