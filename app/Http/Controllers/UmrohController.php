<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umroh;

class UmrohController extends Controller
{
    //RETRIEVE DATA UMROH

    public function index(){
        $data = Umroh::all();
        return view('admin.admin-category-page.umroh.input-umroh', compact('data'));
    }

    //CREATE DATA UMROH

    public function tambahUmroh(){
        return view('admin.admin-category-page.umroh.tambah-umroh');
    }

    public function insertdataumroh(Request $request){
        // dd($request->all());
        $data = Umroh::create($request->all());
        if($request->hasFile('foto') ){
            $request->file('foto')->move('fotoUmroh/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();

            $data->save();
        }
        return redirect()->route('umroh');
    }

    //UPDATE DATA UMROH

    public function tampilkandataumroh($id){
        $data = Umroh::find($id);

        return view('admin.admin-category-page.umroh.update-umroh', compact('data'));
    }

    public function updatedataumroh(Request $request, $id){

        $data = Umroh::find($id);
        $data->update($request->all());

        return redirect()->route('umroh');
    }

        //DELETE DATA OTO

        public function deletedataumroh($id){
            $data = Umroh::find($id);
            $data->delete();

            return redirect()->route('umroh');
        }





}
