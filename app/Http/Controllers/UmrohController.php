<?php

namespace App\Http\Controllers;

use App\Models\EtalaseUmrah;
use App\Models\ExtendedUmrah;
use App\Models\Jemaah;
use App\Models\laporan_transaksi_umroh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Otomotif;
use App\Models\Properti;

class UmrohController extends Controller
{
    //RETRIEVE DATA UMROH

    public function index()
    {
        $data = EtalaseUmrah::where('status_etalase', 'not yet approved')->get();
        return view('Template UI.admin.admin-category-page.umroh.input-umroh', compact('data'));
    }

    //CREATE DATA UMROH

    public function tambahUmroh()
    {
        return view('Template UI.admin.admin-category-page.umroh.tambah-umroh');
    }

    public function insertdataumroh(Request $request)
    {
        // dd($request->all());
        // Mengambil id pengguna yang saat ini login
        $user_id = Auth::id();
        $admin_name = Auth::user()->name;

        // Memasukkan id pengguna ke dalam data request
        $request->merge(['upload_by_user_id' => $user_id]);
        $request->merge(['upload_by_user_name' => $admin_name]);

        $data = EtalaseUmrah::create($request->all());
        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('fotoUmroh/', $request->file('thumbnail')->getClientOriginalName());
            $data->thumbnail = $request->file('thumbnail')->getClientOriginalName();

            $data->save();
        }

        return redirect()->route('umroh');
    }

    //UPDATE DATA UMROH

    public function tampilkandataumroh($id)
    {
        $data = EtalaseUmrah::find($id);
        return view('Template UI.admin.admin-category-page.umroh.update-umroh', compact('data'));
    }

    public function updatedataumroh(Request $request, $id)
    {
        $data = EtalaseUmrah::find($id);
        $data->nama_paket = $request->nama_paket;
        $data->jenis = $request->jenis;
        $data->deskripsi = $request->deskripsi;
        $data->fasilitas1 = $request->fasilitas1;
        $data->fasilitas2 = $request->fasilitas2;
        $data->fasilitas3 = $request->fasilitas3;
        $data->fasilitas4 = $request->fasilitas4;
        $data->fasilitas5 = $request->fasilitas5;
        $data->fasilitas6 = $request->fasilitas6;
        $data->fasilitas7 = $request->fasilitas7;
        $data->fasilitas8 = $request->fasilitas8;
        $data->fasilitas9 = $request->fasilitas9;
        $data->fasilitas10 = $request->fasilitas10;
        $data->tanggal_berangkat = $request->tanggal_berangkat;
        $data->durasi = $request->durasi;
        $data->No_hp_uploader = $request->No_hp_uploader;
        $data->jasa_travel = $request->jasa_travel;
        $data->Hotel = $request->Hotel;
        $data->Maskapai = $request->Maskapai;
        $data->harga_awal = $request->harga_awal;
        $data->save();

        // dd($request);
        // dd($data);
        if ($data->status_etalase == 'not yet approved') {
            return redirect()->route('umroh');
            # co...
        } else {
            return redirect()->route('etalase-umroh');
            # code...
        }


        // return back()->with('success', 'Product has been updated.');
    }

    //DELETE DATA OTO

    public function deletedataumroh($id)
    {
        $data = EtalaseUmrah::find($id);
        $datasementara = $data->status_etalase;
        $data->delete();

        if ($datasementara == 'not yet approved') {
            return redirect()->route('umroh');

        } else {
            return redirect()->route('etalase-umroh');

        }

    }

    public function deletetransaksiumroh($id)
    {
        // Begin transaction
        DB::beginTransaction();

        try {
            // Hapus semua baris terkait di tabel jemaah yang merujuk pada extended_umrah ini
            Jemaah::where('id_extended_umroh', $id)->delete();

            // Hapus data dari tabel extended_umrah
            $data = ExtendedUmrah::findOrFail($id);
            $data->delete();

            // Commit transaction
            DB::commit();

            return redirect()->route('tampilkandatatransaksi')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            // Rollback transaction in case of failure
            DB::rollback();

            return redirect()->route('tampilkandatatransaksi')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }




    // Method untuk menampilkan data umroh yang sudah di approve dan belum di beli
    public function approve(Request $request, $id)
    {
        // Find the extended_umrah record by ID
        $etalaseUmrah = EtalaseUmrah::findOrFail($id);

        // Ensure the product is available for approval (for example, check if it's not already approved)
        // Add your business logic here

        // Get the ID of the currently logged-in user
        $user = Auth::user();

        // Mark the product as approved and associate it with the logged-in user
        $etalaseUmrah->approved_by_user_id = $user->id;
        $etalaseUmrah->approved_by_user_name = $user->name;
        $etalaseUmrah->status_etalase = 'approved';

        $etalaseUmrah->save();

        // Redirect back to the previous page or any other page you prefer
        return back()->with('success', 'Product has been approved.');
    }

    // Method untuk menampilkan data umroh yang sudah di approve dan belum di beli
    public function showApprovedNotPurchasedUmrohs()
    {

        $showApprovedNotPurchasedUmrohs = EtalaseUmrah::where('status_etalase', 'approved')->get();
        // dd($showApprovedNotPurchasedUmrohs);

        return view('Template UI.admin.admin-category-page.umroh.crd-umroh', compact('showApprovedNotPurchasedUmrohs'));
    }

    public function purchase(Request $request, $id)
    {
        $umroh = EtalaseUmrah::findOrFail($id);

        // Get the ID of the currently logged-in user
        $user = Auth::user();

        $validatedData = $request->validate([
            'jumlah_jemaah' => 'required|numeric|min:1',
            'no_kk' => 'required|numeric|min:1',
            'foto_kk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Add more validation rules for other attributes
        ]);

        // Get data from the selected package
        $etalaseUmrah = EtalaseUmrah::findOrFail($id);

        // Add attributes from etalase_umrah to validatedData
        $validatedData['id_user'] = $user->id; // Change this as needed
        $validatedData['nama_user'] = $user->name; // Change this as needed
        $validatedData['No_hp'] = $user->phone; // Change this as needed
        $validatedData['nama_paket'] = $etalaseUmrah->nama_paket;
        $validatedData['thumbnail'] = $etalaseUmrah->thumbnail; // Change this as needed
        $validatedData['jenis'] = $etalaseUmrah->jenis;
        $validatedData['tanggal_berangkat'] = $etalaseUmrah->tanggal_berangkat;
        $validatedData['jumlah_jemaah'] = $validatedData['jumlah_jemaah'];
        $validatedData['durasi'] = $etalaseUmrah->durasi;
        $validatedData['jasa_travel'] = $etalaseUmrah->jasa_travel;
        $validatedData['id_Admin'] = $etalaseUmrah->user_id; // Change this as needed
        $validatedData['Nama_Admin'] = $etalaseUmrah->admin_name; // Change this as needed
        $validatedData['CP_Admin'] = $etalaseUmrah->CP_Admin;
        $validatedData['Hotel'] = $etalaseUmrah->Hotel;
        $validatedData['Maskapai'] = $etalaseUmrah->Maskapai;
        $validatedData['harga_estimasi'] = $etalaseUmrah->harga;
        $validatedData['no_kk'] = $validatedData['no_kk'];

        // Handle image upload for foto_kk
        if ($request->hasFile('foto_kk')) {
            $imagePath = $request->file('foto_kk')->store('foto_kk', 'public');
            $validatedData['foto_kk'] = $imagePath;
        }

        // Calculate total harga based on estimasi harga and jumlah jemaah
        $harga_total = $etalaseUmrah->harga * $validatedData['jumlah_jemaah'];
        $validatedData['harga_total'] = $harga_total;

        // Create the extended_umrah record
        $extendedUmrah = ExtendedUmrah::create($validatedData);

        // Update the status of the original umrah to 'purchased'
        $umroh->status_pembelian = 'purchased';
        $umroh->purchased_by_user_id = $user->id;
        $umroh->purchased_by_user_name = $user->name;
        $umroh->save();

        return redirect()->route('umroh.confirmation', ['id' => $extendedUmrah->id]);
    }
    public function showPurchaseConfirmation($id)
    {
        $extendedUmrah = ExtendedUmrah::findOrFail($id);

        return view('Template UI.admin.admin-category-page.umroh.konfirmasi-umroh', compact('extendedUmrah'));
    }

    public function tampilkandatabeliumroh($id)
    {
        $data = EtalaseUmrah::find($id);

        return view('Template UI.customer.konfirmasi-umroh', compact('data'));
    }
    public function updatedatabeliumroh(Request $request, $id)
    {
        // Get the ID of the currently logged-in user
        $user = Auth::user();

        $etalase = EtalaseUmrah::find($id);
        // dd($etalase);


        // Mark the product as approved and associate it with the logged-in user
        // $data->id_user = $user->id;
        // $data->nama_user = $user->name;
        // $data->No_hp = $user->phone;

        // Update other attributes based on your needs
        // dd($request);


        $ExtendedUmrah = ExtendedUmrah::create([
            'id_etalase_umroh' => $etalase->id,
            'upload_by_user_id' => $etalase->upload_by_user_id,
            'upload_by_user_name' => $etalase->upload_by_user_name,
            'No_hp_uploader' => $etalase->No_hp_uploader,
            'thumbnail' => $etalase->thumbnail,
            'nama_paket' => $etalase->nama_paket,
            'jenis' => $etalase->jenis,
            'deskripsi' => $etalase->deskripsi,
            'fasilitas1' => $etalase->fasilitas1,
            'fasilitas2' => $etalase->fasilitas2,
            'fasilitas3' => $etalase->fasilitas3,
            'fasilitas4' => $etalase->fasilitas4,
            'fasilitas5' => $etalase->fasilitas5,
            'fasilitas6' => $etalase->fasilitas6,
            'fasilitas7' => $etalase->fasilitas7,
            'fasilitas8' => $etalase->fasilitas8,
            'fasilitas9' => $etalase->fasilitas9,
            'fasilitas10' => $etalase->fasilitas10,
            'tanggal_berangkat' => $etalase->tanggal_berangkat,
            'durasi' => $etalase->durasi,
            'jasa_travel' => $etalase->jasa_travel,
            'Hotel' => $etalase->Hotel,
            'Maskapai' => $etalase->Maskapai,
            'harga_awal' => $etalase->harga_awal,
            'approved_display_by_user_id' => $etalase->approved_by_user_id,
            'approved_display_by_user_name' => $etalase->approved_by_user_name,
            'purchased_by_user_id' => $user->id,
            'purchased_by_user_name' => $user->name,
            'jumlah_jemaah' => $request->input('jumlah_jemaah'),
        ]);

        $id = $etalase->id; // Mendapatkan ID yang baru saja dibuat
        // dd($ExtendedUmrah);


        return redirect()->route('identitasjemaah', ['id' => $ExtendedUmrah->id]);
    }

    public function createjemaah(Request $request, $id)
    {
        // $jumlahJemaah = $request->input('jumlah_jemaah');
        $data = ExtendedUmrah::find($id);
        $user = Auth::user();

        return view('Template UI.customer.input-identitas', compact('data', 'user'));
    }

    public function storejemaah(Request $request, $id)
    {
        // $data = EtalaseUmrah::find($id);
        $etalase = ExtendedUmrah::findOrFail($id);
        // dd($etalase->all());


        $jumlahJemaah = $etalase->jumlah_jemaah;
        $etalase->no_kk = $request->input('no_kk')[0];
        if ($request->hasFile('foto_kk')) {
            $request->file('foto_kk')[0]->move('fotoUmroh/', $request->file('foto_kk')[0]->getClientOriginalName());
            $etalase->foto_kk = $request->file('foto_kk')[0]->getClientOriginalName();

            $etalase->save();
        }

        for ($i = 0; $i < $jumlahJemaah; $i++) {
            $jemaah = new Jemaah();
            $jemaah->id_extended_umroh = $etalase->id;
            $jemaah->nama_jemaah = $request->input('nama_jemaah')[$i];
            $jemaah->NIK = $request->input('NIK')[$i];
            $jemaah->No_hp = $request->input('No_hp')[$i];
            $jemaah->no_paspor = $request->input('no_paspor')[$i];
            $jemaah->status_vaksin = $request->input('status_vaksin')[$i];
            $jemaah->status_paspor = $request->input('status_paspor')[$i];


            if ($request->hasFile('foto_identitas') && isset($request->file('foto_identitas')[$i])) {
                $fotoIdentitas = $request->file('foto_identitas')[$i];
                $fotoIdentitas->move('fotoUmroh/', $fotoIdentitas->getClientOriginalName());
                $jemaah->foto_identitas = $fotoIdentitas->getClientOriginalName();
            }

            // if ($request->hasFile('foto_vaksin') && isset($request->file('foto_vaksin')[$i])) {
            //     $fotoVaksin = $request->file('foto_vaksin')[$i];
            //     $fotoVaksin->move('fotoUmroh/', $fotoVaksin->getClientOriginalName());
            //     $jemaah->foto_vaksin = $fotoVaksin->getClientOriginalName();
            // }

            // if ($request->hasFile('foto_identitas') && isset($request->file('foto_identitas')[$i])) {
            //     $foto_paspor = $request->file('foto_paspor')[$i];
            //     $foto_paspor->move('foto_paspor/', $foto_paspor->getClientOriginalName());
            //     $jemaah->foto_paspor = $foto_paspor->getClientOriginalName();
            // }

            // Add other jemaah-related data

            if ($request->status_vaksin[$i] == 'Belum') {
                $jemaah->biaya_jasa_vaksin = 300000;
            }
            if ($request->status_paspor[$i] == 'Belum') {
                $jemaah->biaya_jasa_paspor = 500000;
            }
            $jemaah->biaya_akhir = $etalase->harga_awal + $jemaah->biaya_jasa_vaksin + $jemaah->biaya_jasa_paspor;

            $etalase->harga_total = $etalase->harga_total + $jemaah->biaya_akhir;

            $etalase->save();

            $jemaah->save();
        }
        $jumlahJemaah = Jemaah::findorfail($id);

        $etalase->status_pembelian = 'pending';
        $etalase->save();
        if (Auth::user()->role == 'admin') {
            return redirect()
                ->route('umroh')
                ->with('success', 'Data jemaah berhasil disimpan.');

        } else {
            return redirect()
                ->route('landing')
                ->with('success', 'Data jemaah berhasil disimpan.');
            # code...
        }
    }
    // public function tampilkandatatransaksi()
    // {
    //     $data = ExtendedUmrah::where('status_pembelian' , 'pending')->get();
    //     // dd($data);
    //     $firstData = $data->first(); // Mengambil objek pertama dari koleksi
    //     // dd($data);
    //     $id_extended_umroh = $firstData->id; // Mengambil properti 'id' dari objek pertama

    //     $id_extended_umroh = $firstData->id; // Mengambil properti 'id' dari objek pertama
    //     // dd($id_extended_umroh);
    //     $jemaah = Jemaah::where('id_extended_umroh', $id_extended_umroh)->get();

    //     return view('Template UI.admin.admin-category-page.umroh.trx-umroh', compact('data', 'jemaah'));
    // }

    public function tampilkandatatransaksi()
    {
        $data = ExtendedUmrah::where('status_pembelian', 'pending')->get();

        $jemaahData = [];

        foreach ($data as $umrah) {
            $jemaah = Jemaah::where('id_extended_umroh', $umrah->id)->get();
            $jemaahData[$umrah->id] = $jemaah;
        }

        return view('Template UI.admin.admin-category-page.umroh.trx-umroh', compact('data', 'jemaahData'));
    }
    // $data = ExtendedUmrah::where('status_pembelian', 'pending')->get();

    // if ($data->isEmpty()) {
    //     // Koleksi kosong, Anda dapat mengambil tindakan yang sesuai
    //     return view('Template UI.admin.admin-category-page.umroh.trx-umroh', compact('data'));

    //     // Contoh: return view('tidak-ada-data');
    // }

    // $firstData = $data->first();

    // if ($firstData) {
    //     $id_extended_umroh = $firstData->id;
    //     $jemaah = Jemaah::where('id_extended_umroh', $id_extended_umroh)->get();

    //     return view('Template UI.admin.admin-category-page.umroh.trx-umroh', compact('data', 'jemaah'));
    // } else {
    //     // Objek pertama tidak ditemukan, Anda dapat mengambil tindakan yang sesuai
    //     // Contoh: return view('tidak-ada-data');
    // }




    // method show approved and not purchased otomotif
    //  Aprroved payment Method
    public function approvepayment(Request $request, $id)
    {
        // Find the extended_umrah record by ID
        $etalaseUmrah = ExtendedUmrah::findOrFail($id);

        // Ensure the product is available for approval (for example, check if it's not already approved)
        // Add your business logic here

        // Get the ID of the currently logged-in user
        $user = Auth::user();

        // Mark the product as approved and associate it with the logged-in user
        $etalaseUmrah->approved_payment_by_user_id = $user->id;
        $etalaseUmrah->status_pembelian = 'purchased';

        $etalaseUmrah->save();

        // Redirect to the product approval page
        $laporan_transaksi_umroh = laporan_transaksi_umroh::create([
            'id_user_uploader' => $etalaseUmrah->upload_by_user_id,
            'nama_user_uploader' => $etalaseUmrah->upload_by_user_name,
            'No_hp_uploader' => $etalaseUmrah->No_hp_uploader,
            'nama_paket' => $etalaseUmrah->nama_paket,
            'jenis' => $etalaseUmrah->jenis,
            'deskripsi' => $etalaseUmrah->deskripsi,
            'fasilitas1' => $etalaseUmrah->fasilitas1,
            'fasilitas2' => $etalaseUmrah->fasilitas2,
            'fasilitas3' => $etalaseUmrah->fasilitas3,
            'fasilitas4' => $etalaseUmrah->fasilitas4,
            'fasilitas5' => $etalaseUmrah->fasilitas5,
            'fasilitas6' => $etalaseUmrah->fasilitas6,
            'fasilitas7' => $etalaseUmrah->fasilitas7,
            'fasilitas8' => $etalaseUmrah->fasilitas8,
            'fasilitas9' => $etalaseUmrah->fasilitas9,
            'fasilitas10' => $etalaseUmrah->fasilitas10,
            'tanggal_berangkat' => $etalaseUmrah->tanggal_berangkat,
            'durasi' => $etalaseUmrah->durasi,
            'jasa_travel' => $etalaseUmrah->jasa_travel,
            'Hotel' => $etalaseUmrah->Hotel,
            'Maskapai' => $etalaseUmrah->Maskapai,
            'harga_awal' => $etalaseUmrah->harga_awal,
            'purchased_by_user_id' => $etalaseUmrah->purchased_by_user_id,
            'purchased_by_user_name' => $etalaseUmrah->purchased_by_user_name,
            'jumlah_jemaah' => $etalaseUmrah->jumlah_jemaah,
            'no_kk' => $etalaseUmrah->no_kk,
            'foto_kk' => $etalaseUmrah->foto_ktp,
            'harga_total' => $etalaseUmrah->harga_total,
            'total_biaya_tambahan' => $etalaseUmrah->harga_total,
        ]);

        $laporan_transaksi_umroh->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Hapus data extended_umrah (baris induk)
        $etalaseUmrah->delete();

        // Mengaktifkan kembali kunci asing
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Redirect back to the previous page or any other page you prefer
        return back()
            ->with('success', 'Data jemaah berhasil disimpan.');
    }

    public function landingRead()
    {
        $data = EtalaseUmrah::where('status_etalase', 'approved')->get();
        $dataOto = Otomotif::where('status_etalase', 'approved')
            ->where('status_pembelian', 'not yet purchased')
            ->get();
        $dataprop = Properti::where('status_etalase', 'approved')
            ->where('status_pembelian', 'not yet purchased')
            ->get();
        // dd($dataproperti);
        return view('Template UI.customer.landing', compact('data', 'dataOto', 'dataprop'));
    }

    public function landingGuest()
    {
        $data = EtalaseUmrah::where('status_etalase', 'approved')->get();
        $dataOto = Otomotif::where('status_etalase', 'approved')
            ->where('status_pembelian', 'not yet purchased')
            ->get();
        $dataprop = Properti::where('status_etalase', 'approved')
            ->where('status_pembelian', 'not yet purchased')
            ->get();
        // dd($dataproperti);
        return view('welcome', compact('data', 'dataOto', 'dataprop'));
    }

    //DETAIL RETRIEVE UMROH


    public function tampilkandetailumroh($id)
    {
        $data = EtalaseUmrah::find($id);

        return view('Template UI.customer.umroh-detail', compact('data'));
    }


}
