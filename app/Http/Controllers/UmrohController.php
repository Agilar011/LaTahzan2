<?php

namespace App\Http\Controllers;

use App\Models\EtalaseUmrah;
use App\Models\ExtendedUmrah;
use App\Models\Jemaah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Mengambil id pengguna yang saat ini login
        $user_id = Auth::id();
        $user_name = Auth::user()->name;

        // Memasukkan id pengguna ke dalam data request
        // $request->merge(['user_id' => $user_id]);



        // Memasukkan id pengguna ke dalam data request
        $request->merge(['upload_by_user_id' => $user_id]);
        $request->merge(['upload_by_user_name' => $user_name]);

        $data = EtalaseUmrah::create($request->all());

        // $data = EtalaseUmrah::create($request->all());
        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('fotoUmroh/', $request->file('thumbnail')->getClientOriginalName());
            $data->thumbnail = $request->file('thumbnail')->getClientOriginalName();


        }
        $data->save();
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
        $data->update($request->all());

        return redirect()->route('umroh');
    }

    //DELETE DATA OTO

    public function deletedataumroh($id)
    {
        $data = EtalaseUmrah::find($id);
        $data->delete();

        return redirect()->route('umroh');
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

        // Redirect to the previous page or any other relevant page

        // Get data from the selected package

        // // Calculate total harga based on estimasi harga and jumlah jemaah
        // $harga_total = $etalaseUmrah->harga * $validatedData['jumlah_jemaah'];

        // // Add attributes from etalase_umrah to validatedData
        // $validatedData['thumbnail'] = $etalaseUmrah->thumbnail; // Change this as needed
        // $validatedData['nama_paket'] = $etalaseUmrah->nama_paket;
        // $validatedData['jenis'] = $etalaseUmrah->jenis;
        // $validatedData['deskripsi'] = $etalaseUmrah->deskripsi;
        // $validatedData['tanggal_berangkat'] = $etalaseUmrah->tanggal_berangkat;
        // $validatedData['jumlah_jemaah'] = $etalaseUmrah->tanggal_pulang;
        // $validatedData['durasi'] = $etalaseUmrah->durasi;
        // $validatedData['jasa_travel'] = $etalaseUmrah->jasa_travel;
        // $validatedData['id_Admin'] = $etalaseUmrah->user_id; // Change this as needed
        // $validatedData['nama_Admin'] = $etalaseUmrah->admin_name; // Change this as needed
        // $validatedData['approved_by_user_id'] = $user->id; // Change this as needed
        // $validatedData['approved_by_user_name'] = $user->name; // Change this as needed
        // $validatedData['CP_Admin'] = $etalaseUmrah->CP_Admin;
        // $validatedData['Hotel'] = $etalaseUmrah->Hotel;
        // $validatedData['Maskapai'] = $etalaseUmrah->Maskapai;
        // $validatedData['status_etalase'] = 'approved';

        // // Create the extended_umroh record
        // ExtendedUmrah::create($validatedData);

        // Redirect back to the previous page or any other page you prefer
        return back()->with('success', 'Product has been approved.');
    }

    // Method untuk menampilkan data umroh yang sudah di approve dan belum di beli
    public function showApprovedNotPurchasedUmrohs()
    {
        $showApprovedNotPurchasedUmrohs = EtalaseUmrah::where('status_etalase', 'approved')->get();

        return view('Template UI.admin.admin-category-page.umroh.crd-umroh', compact('showApprovedNotPurchasedUmrohs'));
    }

    public function purchase(Request $request, $id)
    {
        $umroh = EtalaseUmrah::findOrFail($id);

        // Ensure the product is available for purchase (for example, check if it's not already purchased)
        if ($umroh->status_pembelian === 'purchased') {
            return back()->with('error', 'Product has already been purchased.');
        }

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
        ExtendedUmrah::create($validatedData);

        // Update the status of the original umrah to 'purchased'
        $umroh->status_pembelian = 'purchased';
        $umroh->purchased_by_user_id = $user->id;
        $umroh->purchased_by_user_name = $user->name;
        $umroh->save();

        return back()->with('success', 'Product has been purchased.');
    }

    public function showPurchaseConfirmation($id)
    {
        $extendedUmrah = ExtendedUmrah::findOrFail($id);

        return view('Template UI.admin.admin-category-page.umroh.konfirmasi-umroh', compact('extendedUmrah'));
    }

    public function tampilkandatabeliumroh($id)
    {
        $data = EtalaseUmrah::find($id);

        return view('Template UI.admin.admin-category-page.umroh.konfirmasi-umroh', compact('data'));
    }
    public function updatedatabeliumroh(Request $request, $id)
    {
        // Get the ID of the currently logged-in user
        $user = Auth::user();

        $data = EtalaseUmrah::find($id);

        // Mark the product as approved and associate it with the logged-in user
        $data->id_user = $user->id;
        $data->nama_user = $user->name;
        $data->No_hp = $user->phone;

        // Update other attributes based on your needs
        $data->update($request->all());

        // Update the jumlah_jemaah attribute
        $data->jumlah_jemaah = $request->input('jumlah_jemaah');
        $data->save();

        return redirect()->route('identitasjemaah', ['id' => $data->id]);
    }

    public function createjemaah(Request $request, $id)
{
    $jumlahJemaah = $request->input('jumlah_jemaah');
    $data = EtalaseUmrah::find($id);
    $user = Auth::user();

    return view('Template UI.admin.admin-category-page.umroh.input-identitas', compact('data','user'));
}

    public function storejemaah(Request $request, $id)
    {
        $data = EtalaseUmrah::find($id);
        $etalase = EtalaseUmrah::findOrFail($id);

        $jumlahJemaah = $data->jumlah_jemaah;


        for ($i = 0; $i < $jumlahJemaah; $i++) {
            // dd($etalase);
                Jemaah::create([
                'id_etalase_umroh' => $etalase->id,
                'nama_jemaah' => $request->input('nama_jemaah')[$i],
                'NIK' => $request->input('NIK')[$i],
                'No_hp' => $request->input('No_hp')[$i],
                'no_paspor' => $request->input('no_paspor')[$i],
                'foto_paspor' => $request->file('foto_paspor')[$i],
                'foto_KTP' => $request->file('foto_KTP')[$i],
                'status_vaksin' => $request->input('status_vaksin')[$i],
                'foto_vaksin'   => $request->file('foto_vaksin')[$i],
                // Add other jemaah-related data
            ]);
        }

        return redirect()->route('umroh')->with('success', 'Data jemaah berhasil disimpan.');
    }

    // method show approved and not purchased otomotif
    //  Purchased Method
}
