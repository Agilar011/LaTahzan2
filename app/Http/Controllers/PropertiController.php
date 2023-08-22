<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properti;
use App\Models\laporan_transaksi_properti;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PropertiController extends Controller
{
    public function index()
    {
        $data = Properti::where('status_etalase', 'not yet approved')->get();
        return view('Template UI.admin.admin-category-page.prop.input-prop', compact('data'));
    }

    public function dashboardProp()
    {
        $user = Auth::user();
        $data = Properti::where('upload_by_user_id', $user->id)->get();
        return view('Template UI.customer.prop-customer.dasboard-prop-customer', compact('data'));
    }

    public function etalaseProp()
    {
        $data = Properti::where('status_step', 'etalase')->get();
        return view('Template UI.admin.admin-category-page.prop.crd-prop', compact('data'));
    }

    public function tambahProp()
    {
        $user = Auth::user();
        if ($user->role === 'user') {
            return view('Template UI.customer.prop-customer.input-prop-customer');
        } else {
            // Handle other cases or provide an error response
        }
    }

    public function insertdataprop(Request $request)
    {
        $user = Auth::user();

        $requestData = $request->all();
        $requestData['upload_by_user_id'] = $user->id;
        $requestData['upload_by_user_name'] = $user->name;
        $requestData['no_hp_uploader'] = $user->phone;

        // Handle file uploads

        $data = Properti::create($requestData);

        // Handle photo file names and other logic

        if ($user->role === 'user') {
            $data = Properti::where('status_etalase', 'not yet approved')
                ->where('upload_by_user_id', $user->id)
                ->get();
            return view('Template UI.customer.prop-customer.dasboard-prop-customer', compact('data'));
        } else {
            return redirect()->route('property');
        }
    }

    public function tampilkandataprop($id)
    {
        $data = Properti::find($id);
        $user = Auth::user();
        if ($user->role === 'user') {
            return view('Template UI.customer.prop-customer.update-prop', compact('data'));
        } else {
            return view('Template UI.admin.admin-category-page.prop.update-prop', compact('data'));
        }

    }

    // Mengupdate data properti yang diubah
    public function updatedataprop(Request $request, $id)
    {
        $data = Properti::find($id);
        $data->update($request->all());

        $user = Auth::user();

        if ($user->role === 'user') {
            return redirect()->route('dashboardProp');
        } else {
            return redirect()->route('property');
        }
    }

    // Menghapus data properti
    public function deletedataprop($id)
    {

        $data = Properti::find($id);

        if ($data->status_pembelian === 'purchased') {
            $data->purchased_by_user_name = null;
            $data->purchased_by_user_phone_number = null;
            $data->purchased_by_user_id = null;
            $data->no_ktp_purchaser = null;
            $data->foto_ktp_purchaser = null;


            $data->save();
        } else {
            $data->delete();
        }

        $user = Auth::user();
        return back()->with('success', 'Produk berhasil di hapus');

    }

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
        $property->status_pembelian = 'pending';

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

    public function showPurchasedPropertys()
    {
        $purchasedPropertys = Properti::where('status_pembelian', 'pending')->get();
        return view('Template UI.admin.admin-category-page.prop.trx-prop', compact('purchasedPropertys'));
    }
    public function approved_payment(Request $request, $id)
    {
        $properti = Properti::findOrFail($id);

        // Pastikan properti tersedia untuk pembelian (misalnya, periksa apakah belum dibeli)
        // Tambahkan logika bisnis Anda di sini
        // Dapatkan ID pengguna yang saat ini masuk
        $user = Auth::user();

        // Tandai properti sebagai sudah dibeli dan hubungkan dengan pengguna yang masuk
        $properti->approved_payment_by_user_id = $user->id;
        $properti->approved_payment_by_user_name = $user->name;
        $properti->status_pembelian = 'purchased';
        $properti->save();

        $laporan_transaksi_properti = laporan_transaksi_properti::create([
            'upload_by_user_id' => $properti->upload_by_user_id,
            'upload_by_user_name' => $properti->upload_by_user_name,
            'no_hp_uploader' => $properti->no_hp_uploader,
            'nama_properti' => $properti->nama_properti,
            'jenis' => $properti->jenis,
            'foto1' => $properti->foto1,
            'foto2' => $properti->foto2,
            'foto3' => $properti->foto3,
            'foto4' => $properti->foto4,
            'foto_sertifikat' => $properti->foto_sertifikat,
            'foto_ktp' => $properti->foto_ktp,
            'deskripsi' => $properti->deskripsi,
            'alamat' => $properti->alamat,
            'kecamatan' => $properti->kecamatan,
            'kota' => $properti->kota,
            'luas' => $properti->luas,
            'harga' => $properti->harga,
            'approved_by_user_id' => $properti->approved_by_user_id,
            'approved_by_user_name' => $properti->approved_by_user_name,
            'purchased_by_user_id' => $properti->purchased_by_user_id,
            'purchased_by_user_name' => $properti->purchased_by_user_name,
            'foto_ktp_purchaser' => $properti->foto_ktp_purchaser,
            'no_ktp_purchaser' => $properti->no_ktp_purchaser,
            'purchased_by_user_phone_number' => $properti->purchased_by_user_phone_number,
            'status_etalase' => $properti->status_etalase,
            'status_pembelian' => $properti->status_pembelian,
            'approved_payment_by_user_id' => $properti->approved_payment_by_user_id,
            'approved_payment_by_user_name' => $properti->approved_payment_by_user_name,
        ]);
        $laporan_transaksi_properti->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Hapus data properti (baris induk)
        $properti->delete();

        // Mengaktifkan kembali kunci asing
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Redirect ke tampilan show atau halaman relevan lainnya
        return back()->with('success', 'Produk telah dibeli.');
    }
    public function showlaporantransaksiprop()
    {
        $laporan_transaksi_properti = laporan_transaksi_properti::all();
        return view('Template UI.admin.admin-category-page.laporan-transaksi.laporan-transaksi-properti', compact('laporan_transaksi_properti'));
    }

    // Other methods...
}
