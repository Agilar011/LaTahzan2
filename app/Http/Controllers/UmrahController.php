<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umrah;

class UmrahController extends Controller
{
    public function index()
    {
        // Ambil semua data umrah dari tabel "umrah" dan lemparkan ke view
        $umrahList = Umrah::all();
        return view('Template UI.admin.admin-category-page.prop.input-prop', ['umrahList' => $umrahList]);
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
