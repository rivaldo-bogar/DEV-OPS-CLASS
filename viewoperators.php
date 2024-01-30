<!DOCTYPE html>
<html>

<head>
    <title>Data Operator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Data Operator</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">NIP</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Full Name</th>
                    <th class="text-center">Password</th>
                    <th class="text-center">Phone Number</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Updated At</th>
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
                
                // Query untuk mendapatkan data operator
                $sql = "SELECT * FROM tbl_operator";
                $result = mysqli_query($conn, $sql);

                // Tampilkan data dalam tabel
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nip'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['fullname'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['phone_number'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "<td>" . $row['updated_at'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data operator.</td></tr>";
                }

                // Tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
