<?php

namespace App\Http\Controllers;

use App\Models\Otomotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtomotifController extends Controller
{
    //READ DATA OTO

    public function index(){
        $data = Otomotif::where('status_etalase', 'not yet approved')->get();
        return view('Template UI.admin.admin-category-page.oto.input-oto', compact('data'));
    }

    //READ DATA OTO ETALASE

    public function etalaseOto(){
        $data = Otomotif::where('status_step', 'etalase')->get();

        return view('Template UI.admin.admin-category-page.oto.crd-oto')->with('data', $data);
    }


    //CREATE DATA OTO

    public function tambahOto(){
        return view('Template UI.admin.admin-category-page.oto.tambah-oto');
    }
    // amethod awal
//     public function insertdataoto(Request $request){

//         // Mengambil id pengguna yang saat ini login
//    $user_id = Auth::id();

//    // Memasukkan id pengguna ke dalam data request
//    $request->merge(['user_id' => $user_id]);
//        $data = Otomotif::create($request->all());
//        if($request->hasFile('foto1') && $request->hasFile('foto2') && $request->hasFile('foto3') && $request->hasFile('foto_stnk') && $request->hasFile('foto_bpkb') && $request->hasFile('foto_ktp')){
//            $request->file('foto1')->move('fotoOto/', $request->file('foto1')->getClientOriginalName());
//            $request->file('foto2')->move('fotoOto2/', $request->file('foto2')->getClientOriginalName());
//            $request->file('foto3')->move('fotoOto3/', $request->file('foto3')->getClientOriginalName());
//            $request->file('foto_stnk')->move('fotoStnk/', $request->file('foto_stnk')->getClientOriginalName());
//            $request->file('foto_bpkb')->move('fotoBpkb/', $request->file('foto_bpkb')->getClientOriginalName());
//            $request->file('foto_ktp')->move('fotoKtp/', $request->file('foto_ktp')->getClientOriginalName());
//            $data->foto1 = $request->file('foto1')->getClientOriginalName();
//            $data->foto2 = $request->file('foto2')->getClientOriginalName();
//            $data->foto3 = $request->file('foto3')->getClientOriginalName();
//            $data->foto_stnk = $request->file('foto_stnk')->getClientOriginalName();
//            $data->foto_bpkb = $request->file('foto_bpkb')->getClientOriginalName();
//            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();


//            $data->save();
//        }

//        return redirect()->route('otomotif');
//    }
//    Method dummy

    public function insertdataoto(Request $request)
    {
        // Mengambil id pengguna yang saat ini login
        $user_id = Auth::id();

        // Memasukkan id pengguna ke dalam data request
        $request->merge(['user_id' => $user_id]);

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto1')) {
            $request->file('foto1')->move('fotoOto/', $request->file('foto1')->getClientOriginalName());
        }
        if ($request->hasFile('foto2')) {
            $request->file('foto2')->move('fotoOto2/', $request->file('foto2')->getClientOriginalName());
        }
        if ($request->hasFile('foto3')) {
            $request->file('foto3')->move('fotoOto3/', $request->file('foto3')->getClientOriginalName());
        }
        if ($request->hasFile('foto_stnk')) {
            $request->file('foto_stnk')->move('fotoStnk/', $request->file('foto_stnk')->getClientOriginalName());
        }
        if ($request->hasFile('foto_bpkb')) {
            $request->file('foto_bpkb')->move('fotoBpkb/', $request->file('foto_bpkb')->getClientOriginalName());
        }
        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('fotoKtp/', $request->file('foto_ktp')->getClientOriginalName());
        }

        // Simpan data ke dalam database
        $data = Otomotif::create($request->all());

        // Jika ada foto yang diunggah, simpan nama file foto di kolom yang sesuai
        $data->foto1 = $request->hasFile('foto1') ? $request->file('foto1')->getClientOriginalName() : $fotoDefault1;
        $data->foto2 = $request->hasFile('foto2') ? $request->file('foto2')->getClientOriginalName() : $fotoDefault2;
        $data->foto3 = $request->hasFile('foto3') ? $request->file('foto3')->getClientOriginalName() : $fotoDefault3;
        $data->foto_stnk = $request->hasFile('foto_stnk') ? $request->file('foto_stnk')->getClientOriginalName() : $fotoDefault1;
        $data->foto_bpkb = $request->hasFile('foto_bpkb') ? $request->file('foto_bpkb')->getClientOriginalName() : $fotoDefault1;
        $data->foto_ktp = $request->hasFile('foto_ktp') ? $request->file('foto_ktp')->getClientOriginalName() : $fotoDefault1;

        $data->save();

        return redirect()->route('otomotif');
    }



    //UPDATE DATA OTO

    public function tampildataoto($id){
        // $data = Otomotif::find($id);
        $data = Otomotif::find($id);

        return view('Template UI.admin.admin-category-page.oto.update-oto', compact('data'));
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

    // public function updatestatusoto(Request $request, $id){
    //     $data = Otomotif::find($id);
    //     $changer = "etalase";
    //     $data->update(['status_step' => $changer]);

    //     return redirect()->route('otomotif');
    // }

    // approve method

    public function approve(Request $request, $id)
    {
        // Gunakan $id untuk mencari otomotif yang akan di-approve
        $otomotif = Otomotif::findOrFail($id);

        // Get the ID of the currently logged-in user
        $user = Auth::user();
        // Update the approved_by_user_id column with the ID of the currently logged-in user
        $otomotif->approved_by_user_id = $user->id;
        $otomotif->approved_by_user_name = $user->name;
        $otomotif->status_etalase = 'approved';

        $otomotif->save();

        // Redirect back to the previous page or any other page you prefer
        return back()->with('success', 'Product has been approved.');
    }
     // method show approved and not purchased otomotif
     public function showApprovedNotPurchasedOtomotifs()
     {
         $approvedNotPurchasedOtomotifs = Otomotif::where('status_etalase', 'approved')
             ->where('status_pembelian', 'not yet purchased')
             ->get();

         return view('Template UI.admin.admin-category-page.oto.crd-oto', compact('approvedNotPurchasedOtomotifs'));
     }

    //  Purchased Method
    public function purchase(Request $request, $id)
    {
        $otomotif = Otomotif::findOrFail($id);

        // Ensure the product is available for purchase (for example, check if it's not already purchased)
        // Add your business logic here
         // Get the ID of the currently logged-in user
         $user = Auth::user();

        // Mark the product as purchased and associate it with the logged-in user
        $otomotif->purchased_by_user_id = $user->id;
        $otomotif->purchased_by_user_name = $user->name;
        $otomotif->status_pembelian = 'purchased';

        $otomotif->save();

        // Redirect to the show view or any other relevant page
        return back()->with('success', 'Product has been purchased.');
    }

    // show approve the productpublic function showPurchasedPropertys()
    public function showPurchasedOtomotifs()
{
    $purchasedOtomotifs = Otomotif::where('status_pembelian', 'purchased')->get();
    return view('Template UI.admin.admin-category-page.oto.trx-oto', compact('purchasedOtomotifs'));
}

}
