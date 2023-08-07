<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Table</title>
    <style>
        .container-all-form {
            max-width: 100%;
        }

        .info-pemesan {
            display: grid;
            align-items: center;
            max-width: 80%;
            margin: auto;
        }

        .input-pemesan {
            display: grid;
            align-items: center;
            max-width: 80%;
            margin: auto;
        }

        body {
            font-family: Arial, sans-serif;
        }

        table {
            display: flex;
            align-items: center;
            justify-content: center;
            border-collapse: collapse;
            max-width: 80%;

        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            margin-top: 50px
        }

        th {
            background-color: #f2f2f2;
        }

        .input-container {
            display: grid;
            align-items: center;
            max-width: 80%;
            margin: auto;
        }

        label {
            margin-top: 20px
        }

        .table-container {

        }

    </style>
</head>

<body>
    <div class="container-all-form">
        <div class="info-pemesan">
            <label for="">Nama Pemesan :</label>
            <input type="text" placeholder="Adimas Surya" disabled></input>
            <label for="">Alamat Pemesan :</label>
            <input type="text" placeholder="Jl. Dr. Sutomo no. 4B" disabled></input>
            <label for="">Paket yang di pesan:</label>
            <input type="text" placeholder="Paket Umroh 12 Hari" disabled></input>
            <label for="">Tanggal Berangkat</label>
            <input type="date" placeholder="21-08-2023" disabled></input>
            <label for="">Durasi</label>
            <input type="text" placeholder="12 Hari" disabled></input>
            <label for="">Jasa Travel</label>
            <input type="text" placeholder="An-Namiroh" disabled></input>
            <label for="">Maskapai</label>
            <input type="text" placeholder="12 Hari" disabled></input>
            <label for="">Hotel</label>
            <input type="text" placeholder="An-Namiroh" disabled></input>
            <label for="">Harga Paket</label>
            <label type="number">Rp. 30000000</label>
        </div>
        <div class="input-pemesan">
            <label for="">No. KK Pemesan:</label>
            <input type="text">
        </div>
        <div class="input-container">
            <label for="row-input">Masukkan Jumlah Jemaat Umroh (Termasuk Anda):</label>
            <input type="number" id="row-input" min="1" max="10" step="1" value="1">
            <button id="create-table-btn">Buat Tabel</button>
        </div>

        <div id="table-container"></div>
        <div class="input-pemesan">
            <label for="">Harga Estimasi</label>
            <label id="harga-estimasi-label">Rp. 30.000.000,-</label>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const createTableBtn = document.getElementById("create-table-btn");

            createTableBtn.addEventListener("click", function () {
                const numRows = parseInt(document.getElementById("row-input").value, 10);
                const numCols = 6;
                const tableHTML = generateTableHTML(numRows, numCols);
                document.getElementById("table-container").innerHTML = tableHTML;

                // Hitung harga estimasi
                updateHargaEstimasi();
            });

            function updateHargaEstimasi() {
                const numRows = parseInt(document.getElementById("row-input").value, 10);
                const hargaPaket = 30000000; // Harga paket umroh, bisa disesuaikan dengan harga yang sesuai
                const hargaEstimasiPerKolom = 200000;
                let totalHarga = hargaPaket * numRows;

                // Cari elemen-elemen dropdown untuk status vaksin
                const statusVaksinDropdowns = document.querySelectorAll('select[name^="data["][name$="][6]"]');

                // Tambahkan biaya tambahan jika status vaksin adalah "Belum"
                statusVaksinDropdowns.forEach(dropdown => {
                    if (dropdown.value === "Belum") {
                        totalHarga += hargaEstimasiPerKolom;
                    }
                });

                const hargaEstimasiLabel = document.getElementById("harga-estimasi-label");
                hargaEstimasiLabel.textContent = `Rp. ${totalHarga.toLocaleString()}`;
            }

            function generateTableHTML(numRows, numCols) {
                let tableHTML = '<table>';
                // Header row
                tableHTML += '<tr>';
                tableHTML += '<th>Nama</th>';
                tableHTML += '<th>No. Ktp</th>';
                tableHTML += '<th>Fotokopi Ktp</th>';
                tableHTML += '<th>No. Telfon</th>';
                tableHTML += '<th>No. Passport (Jika Ada)</th>';
                tableHTML += '<th>Status Vaksin</th>';
                tableHTML += '</tr>';

                // Data rows
                for (let row = 1; row <= numRows; row++) {
                    tableHTML += '<tr>';
                    for (let col = 1; col <= numCols; col++) {
                        if (col === 3) {
                            tableHTML +=
                                `<td><input type="file" name="data[${row}][${col}]" accept="image/*"></td>`;
                        } else if (col === 6) {
                            tableHTML += `<td>
                            <select name="data[${row}][${col}]">
                                <option value="Sudah">Sudah</option>
                                <option value="Belum">Belum</option>
                            </select>
                        </td>`;
                        } else if (col === 2 || col === 4 || col === 5) {
                            tableHTML += `<td><input type="number" name="data[${row}][${col}]" value=""></td>`;
                        } else {
                            tableHTML += `<td><input type="text" name="data[${row}][${col}]" value=""></td>`;
                        }
                    }
                    tableHTML += '</tr>';
                }

                tableHTML += '</table>';
                return tableHTML;
            }

            // Tambahkan event listener untuk setiap dropdown status vaksin
            document.addEventListener("change", function (event) {
                const target = event.target;
                if (target && target.tagName === "SELECT" && target.name.endsWith("[6]")) {
                    updateHargaEstimasi();
                }
            });
        });
    </script>
</body>

</html>
