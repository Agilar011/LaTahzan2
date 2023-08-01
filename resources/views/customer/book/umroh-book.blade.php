<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auto Generate Table with Input</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
    }
    input {
      width: 10%;
      box-sizing: border-box;
    }
  </style>
</head>
<body>
  <div class="input-container">
    <label for="row-input">Masukkan jumlah rombongan anda:</label>
    <input type="number" id="row-input" min="1" max="10" step="1" value="1">
    <button id="create-table-btn">Submit</button>
  </div>

  <div id="table-container"></div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const createTableBtn = document.getElementById("create-table-btn");

      createTableBtn.addEventListener("click", function() {
        const numRows = parseInt(document.getElementById("row-input").value, 10);
        const numCols = 3;
        const tableHTML = generateTableHTML(numRows, numCols);
        document.getElementById("table-container").innerHTML = tableHTML;
      });

      function generateTableHTML(numRows, numCols) {
        let tableHTML = '<table>';
        // Header row
        tableHTML += '<tr>';
        for (let col = 1; col <= numCols; col++) {
          tableHTML += `<th>Kolom ${col}</th>`;
        }
        tableHTML += '</tr>';

        // Data rows
        for (let row = 1; row <= numRows; row++) {
          tableHTML += '<tr>';
          for (let col = 1; col <= numCols; col++) {
            tableHTML += '<td><input type="text"></td>';
          }
          tableHTML += '</tr>';
        }

        tableHTML += '</table>';
        return tableHTML;
      }
    });
  </script>
</body>
</html>

</body>
</html>
