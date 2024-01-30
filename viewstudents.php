<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            color: #007bff;
        }

        th,
        td {
            text-align: center;
        }

        .table thead th {
            background-color: #007bff;
            color: #ffffff;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .no-data {
            color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>

        <!-- Formulir untuk menambahkan data -->
        <form method="post" action="insert_data.php">
            <div class="mb-3">
                <label for="nim">NIM Number</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <div class="mb-3">
                <label for="fullname">Registrasi number</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>

        <hr>

        <!-- Menampilkan data dalam tabel -->
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Registration Number</th>
                    <th>NIM Number</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // Koneksi ke database
                $conn = mysqli_connect('localhost', 'root', '12345', 'db_unklab');

                // Periksa koneksi
                if (!$conn) {
                    die("Koneksi gagal: " . mysqli_connect_error());
                }

                // Query untuk mendapatkan data mahasiswa
                $sql = "SELECT * FROM tbl_students";
                $result = mysqli_query($conn, $sql);

                // Tampilkan data dalam tabel
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['reg_number'] . "</td>";
                        echo "<td>" . $row['nim_number'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['fullname'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "<td>" . $row['updated_at'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='no-data'>Tidak ada data mahasiswa.</td></tr>";
                }
                // Tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
