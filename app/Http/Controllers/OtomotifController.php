<?php

namespace App\Http\Controllers;

use App\Models\Otomotif;
use App\Models\laporan_transaksi_otomotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OtomotifController extends Controller
{
    //READ DATA OTO

    public function index(){
        $data = Otomotif::where('status_etalase', 'not yet approved')->get();
        return view('Template UI.admin.admin-category-page.oto.input-oto', compact('data'));
    }

    //READ DATA OTO ETALASE ADMIN

    public function etalaseOto(){
        $data = Otomotif::where('status_step', 'etalase')->get();

        return view('Template UI.admin.admin-category-page.oto.crd-oto')->with('data', $data);
    }

    //READ DATA OTO ETALASE CUSTOMER

    public function etalaseOtoCustomer(){
        $dataOto = Otomotif::where('status_step', 'etalase')->get();
        return view('Template UI.customer.landing')->with('dataOto', $dataOto);
    }




    //CREATE DATA OTO

    public function tambahOto(){
        return view('Template UI.admin.admin-category-page.oto.tambah-oto');
    }
//    Method dummy

    public function insertdataoto(Request $request)
    {
        // Mengambil id pengguna yang saat ini login
        $user = Auth::user();

        // Memasukkan id pengguna ke dalam data request
        $request->merge(['upload_by_user_id' => $user->id]);
        $request->merge(['upload_by_user_name' => $user->name]);
        $request->merge(['no_hp_uploader' => $user->phone]);



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
        $data->foto1 = $request->hasFile('foto1') ? $request->file('foto1')->getClientOriginalName() : null;
        $data->foto2 = $request->hasFile('foto2') ? $request->file('foto2')->getClientOriginalName() : null;
        $data->foto3 = $request->hasFile('foto3') ? $request->file('foto3')->getClientOriginalName() : null;
        $data->foto_stnk = $request->hasFile('foto_stnk') ? $request->file('foto_stnk')->getClientOriginalName() : null;
        $data->foto_bpkb = $request->hasFile('foto_bpkb') ? $request->file('foto_bpkb')->getClientOriginalName() : null;
        $data->foto_ktp = $request->hasFile('foto_ktp') ? $request->file('foto_ktp')->getClientOriginalName() : null;

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
        if ($data->status_etalase == 'approved') {
            return redirect()->route('etalase-oto');
        } else {
            return redirect()->route('otomotif');
        }


    }

    //DELETE DATA OTO

    public function deletedataoto($id){
        $data = Otomotif::find($id);
        $data->delete();
        if ($data->status_etalase == 'approved') {
            return redirect()->route('etalase-oto');
        } else {
            return redirect()->route('otomotif');
        }

    }
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
        $otomotif->purchased_by_user_phone_number = $user->phone;
        $otomotif->status_pembelian = 'purchased';
        if ($user->no_ktp_purchaser != null) {
            $otomotif->no_ktp_purchaser = $user->nik;
            $otomotif->foto_ktp_purchaser = $user->fotoktp;
        } else {
            $otomotif->no_ktp_purchaser = $request->no_ktp_purchaser;
            if ($request->hasFile('foto_ktp_purchaser')) {
                $foto_ktp_purchaser = $request->file('foto_ktp_purchaser');
                $foto_ktp_purchaser->move('fotoOto/', $foto_ktp_purchaser->getClientOriginalName());
                $otomotif->foto_ktp_purchaser = $foto_ktp_purchaser->getClientOriginalName();
            }
        }


        $otomotif->save();


        // Redirect to the show view or any other relevant page
        return redirect()->route('landing');
    }

    // show approve the productpublic function showPurchasedPropertys()
    public function showPurchasedOtomotifs()
{
    $purchasedOtomotifs = Otomotif::where('status_pembelian', 'purchased')->get();
    return view('Template UI.admin.admin-category-page.oto.trx-oto', compact('purchasedOtomotifs'));
}
// method approve payment
public function approved_payment(Request $request, $id)
{
    $otomotif = Otomotif::findOrFail($id);

    // Ensure the product is available for purchase (for example, check if it's not already purchased)
    // Add your business logic here
     // Get the ID of the currently logged-in user
     $user = Auth::user();

    // Mark the product as purchased and associate it with the logged-in user
    $otomotif->approved_payment_by_user_id = $user->id;
    $otomotif->approved_payment_by_user_name = $user->name;
    $otomotif->save();

    $laporan_transaksi_otomotf = laporan_transaksi_otomotif::create([
        'upload_by_user_id' => $otomotif->upload_by_user_id,
        'upload_by_user_name' => $otomotif->upload_by_user_name,
        'no_hp_uploader' => $otomotif->no_hp_uploader,
        'nama_kendaraan' => $otomotif->nama_kendaraan,
        'deskripsi' => $otomotif->deskripsi,
        'merk' => $otomotif->merk,
        'kapasitas_mesin' => $otomotif->kapasitas_mesin,
        'warna' => $otomotif->warna,
        'transmisi' => $otomotif->transmisi,
        'kilometer' => $otomotif->kilometer,
        'tahun' => $otomotif->tahun,
        'status' => $otomotif->status,
        'alamat' => $otomotif->alamat,
        'kecamatan' => $otomotif->kecamatan,
        'kota' => $otomotif->kota,
        'harga' => $otomotif->harga,
        'foto1' => $otomotif->foto1,
        'foto2' => $otomotif->foto2,
        'foto3' => $otomotif->foto3,
        'foto_bpkb' => $otomotif->foto_bpkb,
        'foto_stnk' => $otomotif->foto_stnk,
        'foto_ktp' => $otomotif->foto_ktp,
        'approved_by_user_id' => $otomotif->approved_by_user_id,
        'approved_by_user_name' => $otomotif->approved_by_user_name, // tambahkan koma di sini
        'purchased_by_user_id' => $otomotif->purchased_by_user_id, // tambahkan koma di sini
        'purchased_by_user_name' => $otomotif->purchased_by_user_name, // tambahkan koma di sini
        'purchased_by_user_phone_number' => $otomotif->purchased_by_user_phone_number, // tambahkan koma di sini
        'status_etalase' => $otomotif->status_etalase, // tambahkan koma di sini
        'status_pembelian' => $otomotif->status_pembelian, // tambahkan koma di sini
        'approved_payment_by_user_id' => $otomotif->approved_payment_by_user_id, // tambahkan koma di sini
        'approved_payment_by_user_name' => $otomotif->approved_payment_by_user_name
    ]);
    $laporan_transaksi_otomotf->save();

    DB::statement('SET FOREIGN_KEY_CHECKS=0');

    // Hapus data extended_umrah (baris induk)
    $otomotif->delete();

    // Mengaktifkan kembali kunci asing
    DB::statement('SET FOREIGN_KEY_CHECKS=1');

    // Redirect to the show view or any other relevant page
    return back()->with('success', 'Product has been purchased.');
    }

    public function tampilkandetailoto($id){
        $data = Otomotif::find($id);
        return view('Template UI.customer.oto-detail', compact('data'));
    }

    public function tampilkankonfirmasioto($id){
        $data = Otomotif::find($id);
        return view('Template UI.customer.konfirmasi-oto', compact('data'));
    }


}
