<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umrah;
use Illuminate\Support\Facades\Auth;

class UmrahController extends Controller
{


         // method approved
    public function approve(Request $request, $id)
    {
        // Gunakan $id untuk mencari otomotif yang akan di-approve
        $umrah = Umrah::findOrFail($id);

        // Get the ID of the currently logged-in user
        $user = Auth::user();
        // Update the approved_by_user_id column with the ID of the currently logged-in user
        $umrah->approved_by_user_id = $user->id;
        $umrah->approved_by_user_name = $user->name;
        $umrah->status_etalase = 'approved';

        $umrah->save();

        // Redirect back to the previous page or any other page you prefer
        return back()->with('success', 'Product has been approved.');
    }
     // show approve the product
     public function showApprovedUmrahs()
     {
         $approvedUmrahs = Umrah::where('status_etalase', 'approved')->get();
         return view('approved_propertys', compact('approvedUmrahs'));
     }
    //  Purchased Method
    public function purchase(Request $request, $id)
    {
        $umrah = Umrah::findOrFail($id);

        // Ensure the product is available for purchase (for example, check if it's not already purchased)
        // Add your business logic here

        // Mark the product as purchased and associate it with the logged-in user
        $umrah->purchased_by_user_id = Auth::id();
        $umrah->save();

        // Redirect to the show view or any other relevant page
        return redirect()->route('umrahs.show', $umrah->id);
    }


    // method show approved and not purchased otomotif
    public function showApprovedAndNotPurchasedUmrahs()
    {
        $approvedNotPurchasedUmrahs = Umrah::where('status_etalase', 'approved')
            ->where('status_pembelian', 'not yet purchased')
            ->get();

        return view('Template UI.admin.admin-category-page.umroh.crd-umroh', compact('approvedNotPurchasedUmrahs'));
    }




    public function index()
    {
        // Ambil semua data umrah dari tabel "umrah" dan lemparkan ke view
        $data = Umrah::all();
        return view('Template UI.admin.admin-category-page.umroh.input-umroh', ['data' => $data]);
    }

    public function create()
    {
        // Tampilkan form untuk menambah data umrah
        return view('umrah.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form sebelum menyimpan ke database
        $request->validate([
            // Tentukan aturan validasi untuk setiap field yang dibutuhkan
            // Misalnya, 'nama_user' harus diisi, 'tgl_berangkat' harus berupa tanggal, dsb.
        ]);

        // Simpan data umrah ke database
        Umrah::create($request->all());

        // Redirect ke halaman index atau halaman detail data yang baru saja dibuat
        return redirect()->route('umrah.index')->with('success', 'Data umrah berhasil ditambahkan!');
    }

    public function show($id)
    {
        // Ambil data umrah berdasarkan ID dan lemparkan ke view
        $umrah = Umrah::find($id);
        return view('umrah.show', ['umrah' => $umrah]);
    }

    public function edit($id)
    {
        // Ambil data umrah berdasarkan ID dan tampilkan form untuk mengedit data
        $umrah = Umrah::find($id);
        return view('umrah.edit', ['umrah' => $umrah]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form sebelum melakukan update data di database
        $request->validate([
            // Aturan validasi untuk setiap field yang dibutuhkan
        ]);

        // Update data umrah berdasarkan ID
        $umrah = Umrah::find($id);
        $umrah->update($request->all());

        // Redirect ke halaman index atau halaman detail data yang baru saja diupdate
        return redirect()->route('umrah.index')->with('success', 'Data umrah berhasil diupdate!');
    }

    public function destroy($id)
    {
        // Hapus data umrah berdasarkan ID
        $umrah = Umrah::find($id);
        $umrah->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('umrah.index')->with('success', 'Data umrah berhasil dihapus!');
    }
}
