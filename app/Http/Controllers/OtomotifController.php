<?php

namespace App\Http\Controllers;

use App\Models\Otomotif;
use Illuminate\Http\Request;

class OtomotifController extends Controller
{
    //READ DATA OTO

    public function index(){
        $data = Otomotif::where('status_step', 'input')->get();

        return view('admin.admin-category-page.oto.input-oto', compact('data'));
    }

    //READ DATA OTO ETALASE

    public function etalaseOto(){
        $data = Otomotif::where('status_step', 'etalase')->get();

        return view('admin.admin-category-page.oto.crd-oto')->with('data', $data);
    }


    //CREATE DATA OTO

    public function tambahOto(){
        return view('admin.admin-category-page.oto.tambah-oto');
    }

    public function insertdataoto(Request $request){
        $data = Otomotif::create($request->all());
        if($request->hasFile('foto1') && $request->hasFile('foto2') && $request->hasFile('foto3') && $request->hasFile('foto_stnk') && $request->hasFile('foto_bpkb') && $request->hasFile('foto_ktp')){
            $request->file('foto1')->move('fotoOto/', $request->file('foto1')->getClientOriginalName());
            $request->file('foto2')->move('fotoOto2/', $request->file('foto2')->getClientOriginalName());
            $request->file('foto3')->move('fotoOto3/', $request->file('foto3')->getClientOriginalName());
            $request->file('foto_stnk')->move('fotoStnk/', $request->file('foto_stnk')->getClientOriginalName());
            $request->file('foto_bpkb')->move('fotoBpkb/', $request->file('foto_bpkb')->getClientOriginalName());
            $request->file('foto_ktp')->move('fotoKtp/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto1 = $request->file('foto1')->getClientOriginalName();
            $data->foto2 = $request->file('foto2')->getClientOriginalName();
            $data->foto3 = $request->file('foto3')->getClientOriginalName();
            $data->foto_stnk = $request->file('foto_stnk')->getClientOriginalName();
            $data->foto_bpkb = $request->file('foto_bpkb')->getClientOriginalName();
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();


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

    //UPDATE STATUS

    public function updatestatusoto(Request $request, $id){
        $data = Otomotif::find($id);
        $changer = "etalase";
        $data->update(['status_step' => $changer]);

        return redirect()->route('otomotif');
    }



}
