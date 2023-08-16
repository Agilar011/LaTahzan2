 @extends('Template UI.layouts.admin-sidebar')
 @section('content')
     <h1>Riwayat Transaksi Otomotif</h1>
     <table class="content-table">
         <thead>
             <tr>
                 <th rowspan="3">id</th>
                 <th>Nama Produk</th>
                 <th rowspan="3">Foto Kendaraan</th>
                 <th>Foto BPKB</th>
                 <th rowspan="3">Deskripsi (maks. 70 karakter)</th>
                 <th>Transmisi</th>
                 <th rowspan="2">Tahun</th>
                 <th>Alamat</th>
                 <th>Buyer ID</th>
                 <th>Diupload Oleh</th>
                 <th>Tanggal Input</th>
                 <th rowspan="3">Opsi</th>
             </tr>
             <tr>
                 <th>Merk</th>
                 <th>Foto STNK</th>
                 <th>Kapasitas Mesin</th>
                 <th>Kecamatan</th>
                 <th>Buyer Name</th>
                 <th>Approve Etalase Oleh</th>
                 <th>Tanggal Update</th>

             </tr>
             <tr>
                 <th>Warna</th>
                 <th>Foto Ktp Penjual</th>
                 <th>Status</th>
                 <th>Harga</th>
                 <th>Kota</th>
                 <th>Buyer Phone Number</th>
                 <th>Approve Payment Oleh</th>
                 <th>Tanggap DIbeli</th>


             </tr>
         </thead>

         <tbody>
             @php
                 $no = 1;
             @endphp
             @foreach ($purchasedOtomotifs as $row)
                 <tr>
                     <th scope="row" rowspan="3">{{ $no++ }}</th>
                     <td>{{ $row->nama_kendaraan }} </td>
                     <td>
                         <img src="{{ asset('fotoOto/' . $row->foto1) }}" height="50px">
                     </td>
                     <td>
                         <img src="{{ asset('fotoBpkb/' . $row->foto_bpkb) }}" height="50px">
                     </td>
                     <td rowspan="3">{{ $row->deskripsi }}</td>
                     {{-- <td>{{ $row->merk }}</td> --}}
                     <td>{{ $row->kapasitas_mesin }}cc</td>
                     <td rowspan="2">{{ $row->tahun }}</td>
                     <td rowspan="1">{{ $row->alamat }}</td>
                     <td>{{ $row->purchased_by_user_id }}</td>
                     <td>{{ $row->upload_by_user_name }}</td>
                     <td rowspan="1">{{ $row->created_at }}</td>
                     <td rowspan="3">
                         <div class="btn">
                             <a href="/tampilkandataoto/{{ $row->id }}" class="btn-update">Update</a>
                             <a href="/deletedataoto/{{ $row->id }}" class="btn-hapus">Hapus</a>
                             <form action="{{ route('otomotif.approvepayment', $row->id) }}" method="POST">
                                 @csrf
                                 <button type="submit" class="btn-ekspor">Approve Payment</button>
                             </form>
                         </div>
                     </td>
                 </tr>

                 <tr>
                     <td>{{ $row->merk }}</td>
                     <td>
                         <img src="{{ asset('fotoOto2/' . $row->foto2) }}" height="50px">
                     </td>
                     <td>
                         <img src="{{ asset('fotoStnk/' . $row->foto_stnk) }}" height="50px">
                     </td>
                     <td>{{ $row->transmisi }}</td>
                     <td rowspan="1">{{ $row->kecamatan }}</td>
                     <td>{{ $row->purchased_by_user_name }}</td>
                     <td>{{ $row->approved_by_user_name }}</td>
                     <td rowspan="2">{{ $row->updated_at }}-</td>

                 </tr>

                 <tr>
                     <td>{{ $row->warna }}</td>

                     <td>
                         <img src="{{ asset('fotoOto3/' . $row->foto3) }}" height="50px">
                     </td>
                     <td>
                         <img src="{{ asset('fotoKtp/' . $row->foto_ktp) }}" height="50px">
                     </td>
                     <td>{{ $row->status }}</td>
                     <td>Rp.{{ $row->harga }}</td>
                     <td rowspan="1">{{ $row->kota }}</td>
                     <td>{{ $row->purchased_by_user_phone_number }}</td>
                     <td> {{ $row->approved_payment_by_user_name }}</td>
                 </tr>
             @endforeach
         </tbody>
     </table>
 @endsection
