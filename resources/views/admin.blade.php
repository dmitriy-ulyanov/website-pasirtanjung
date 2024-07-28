<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Carousel Wisata</h1>

    <div id="carousel-table-container"></div>

    <script>
        // Mendeklarasikan array dan mengisinya dengan data dari server
        var carouselwisata = @json($carouselwisata);

        console.log(carouselwisata);

        // Membuat tabel dan menambahkan data ke dalamnya
        var container = document.getElementById('carousel-table-container');
        var table = document.createElement('table');
        var thead = document.createElement('thead');
        var tbody = document.createElement('tbody');

        // Membuat header tabel
        var headerRow = document.createElement('tr');
        var headers = ['ID', 'Judul', 'Gambar'];
        headers.forEach(function(header) {
            var th = document.createElement('th');
            th.textContent = header;
            headerRow.appendChild(th);
        });
        thead.appendChild(headerRow);

        // Membuat baris untuk setiap item di carouselwisatas
        carouselwisatas.forEach(function(wisata) {
            var row = document.createElement('tr');

            var idCell = document.createElement('td');
            idCell.textContent = wisata.id;
            row.appendChild(idCell);

            var judulCell = document.createElement('td');
            judulCell.textContent = wisata.judul;
            row.appendChild(judulCell);

            var gambarCell = document.createElement('td');
            var img = document.createElement('img');
            img.src = `{{ asset('storage/public') }}/${wisata.gambar}`;
            img.alt = wisata.judul;
            img.style.maxWidth = '100px';
            gambarCell.appendChild(img);
            row.appendChild(gambarCell);

            tbody.appendChild(row);
        });

        table.appendChild(thead);
        table.appendChild(tbody);
        container.appendChild(table);
    </script>
</body>
</html>
