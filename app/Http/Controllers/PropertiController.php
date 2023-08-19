<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properti;
use Illuminate\Support\Facades\Auth;

class PropertiController extends Controller
{
    // Menampilkan data properti yang belum di-approve pada halaman admin
    public function index()
    {
        $data = Properti::where('status_etalase', 'not yet approved')->get();
        return view('Template UI.admin.admin-category-page.prop.input-prop', compact('data'));
    }

    // Menampilkan data properti yang belum di-approve pada halaman etalase admin
    public function etalaseProp()
    {
        $data = Properti::where('status_etalase', 'not yet approved')->get();
        return view('Template UI.admin.admin-category-page.prop.crd-prop', compact('data'));
    }

    // Menampilkan halaman tambah properti
    public function tambahProp()
    {
        return view('Template UI.admin.admin-category-page.prop.tambah-prop');
    }

    // Menyimpan data properti yang diinputkan
    public function insertdataprop(Request $request)
    {
        // Mengambil id pengguna yang saat ini login
        $user = Auth::user();

        // Memasukkan id pengguna ke dalam data request
        $request->merge(['upload_by_user_id' => $user->id]);
        $request->merge(['upload_by_user_name' => $user->name]);
        $request->merge(['no_hp_uploader' => $user->phone]);

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto1')) {
            $request->file('foto1')->move('fotoProp1/', $request->file('foto1')->getClientOriginalName());
        }
        if ($request->hasFile('foto2')) {
            $request->file('foto2')->move('fotoProp2/', $request->file('foto2')->getClientOriginalName());
        }
        if ($request->hasFile('foto3')) {
            $request->file('foto3')->move('fotoProp3/', $request->file('foto3')->getClientOriginalName());
        }
        if ($request->hasFile('foto4')) {
            $request->file('foto4')->move('fotoProp4/', $request->file('foto4')->getClientOriginalName());
        }
        if ($request->hasFile('foto_sertifikat')) {
            $request->file('foto_sertifikat')->move('fotoSertifikat/', $request->file('foto_sertifikat')->getClientOriginalName());
        }
        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('fotoKtp/', $request->file('foto_ktp')->getClientOriginalName());
        }

        // Simpan data ke dalam database
        $data = Properti::create($request->all());

        // Jika ada foto yang diunggah, simpan nama file foto di kolom yang sesuai
        $data->foto1 = $request->hasFile('foto1') ? $request->file('foto1')->getClientOriginalName() : null;
        $data->foto2 = $request->hasFile('foto2') ? $request->file('foto2')->getClientOriginalName() : null;
        $data->foto3 = $request->hasFile('foto3') ? $request->file('foto3')->getClientOriginalName() : null;
        $data->foto4 = $request->hasFile('foto4') ? $request->file('foto4')->getClientOriginalName() : null;
        $data->foto_sertifikat = $request->hasFile('foto_sertifikat') ? $request->file('foto_sertifikat')->getClientOriginalName() : null;
        $data->foto_ktp = $request->hasFile('foto_ktp') ? $request->file('foto_ktp')->getClientOriginalName() : null;

        $data->save();

        return redirect()->route('property');
    }

    // Menampilkan data properti untuk diubah pada halaman admin
    public function tampilkandataprop($id)
    {
        $data = Properti::find($id);
        return view('Template UI.admin.admin-category-page.prop.update-prop', compact('data'));
    }

    // Mengupdate data properti yang diubah
    public function updatedataprop(Request $request, $id)
    {
        $data = Properti::find($id);
        $data->update($request->all());

        return redirect()->route('property');
    }

    // Menghapus data properti
    public function deletedataprop($id)
    {
        $data = Properti::find($id);
        $data->delete();

        return redirect()->route('property');
    }

    // Menyetujui properti yang akan di-approve
    public function approve(Request $request, $id)
    {
        $property = Properti::findOrFail($id);

        // Gunakan $id untuk mencari otomotif yang akan di-approve
        $property = Properti::findOrFail($id);

        // Get the ID of the currently logged-in user
        $user = Auth::user();
        // Update the approved_by_user_id column with the ID of the currently logged-in user
        $property->approved_by_user_id = $user->id;
        $property->approved_by_user_name = $user->name;
        $property->status_etalase = 'approved';

        $property->save();

        // Redirect back to the previous page or any other page you prefer
        return back()->with('success', 'Product has been approved.');
    }

    // Menampilkan properti yang sudah di-approve tetapi belum dibeli
    public function showApprovedAndNotPurchasedPropertys()
    {
        $approvedNotPurchasedPropertys = Properti::where('status_etalase', 'approved')
            ->where('status_pembelian', 'not yet purchased')
            ->get();

        return view('Template UI.admin.admin-category-page.prop.crd-prop', compact('approvedNotPurchasedPropertys'));
    }

    // Menampilkan detail properti pada halaman customer
    public function tampilkandetailprop($id)
    {
        $data = Properti::find($id);
        return view('Template UI.customer.prop-detail', compact('data'));
    }

    // Menampilkan halaman konfirmasi pembelian properti pada halaman customer
    public function tampilkankonfirmasiprop(Request $request, $id)
    {
        $data = Properti::find($id);
        $user = Auth::user();
        return view('Template UI.customer.konfirmasi-prop', compact('data', 'user'));
    }

    // Melakukan pembelian properti
    public function purchase(Request $request, $id)
    {
        $property = Properti::findOrFail($id);

        $property = Properti::findOrFail($id);

        // Get the ID of the currently logged-in user
        $user = Auth::user();

       // Mark the product as purchased and associate it with the logged-in user
       $property->purchased_by_user_id = $user->id;
       $property->purchased_by_user_name = $user->name;
       $property->purchased_by_user_phone_number = $user->phone;
       $property->no_ktp_purchaser = $user->nik;
       $property->status_pembelian = 'purchased';

       if ($request->hasFile('foto_ktp_purchaser')) {
           $request->file('foto_ktp_purchaser')->move('fotoKtp/', $request->file('foto_ktp_purchaser')->getClientOriginalName());
           $property->foto_ktp_purchaser = $request->file('foto_ktp_purchaser')->getClientOriginalName();

           $property->save();
       }

       $property->foto_ktp_purchaser = $request->hasFile('foto_ktp_purchaser') ? $request->file('foto_ktp_purchaser')->getClientOriginalName() : null;

       if ($user->nik != null) {
           $property->no_ktp_purchaser = $user->nik;

       } else {
           $property->no_ktp_purchaser = $request->no_ktp_purchaser;
           $user->nik = $request->no_ktp_purchaser;
           $user->save();
       }

       // dd($property);
       $property->save();

       // Redirect to the show view or any other relevant page
        return redirect()->route('landing');
    }

    // Menampilkan properti yang sudah dibeli
    public function showPurchasedPropertys()
    {
        $purchasedPropertys = Properti::where('status_pembelian', 'purchased')->get();
        return view('Template UI.admin.admin-category-page.prop.trx-prop', compact('purchasedPropertys'));
    }
}
