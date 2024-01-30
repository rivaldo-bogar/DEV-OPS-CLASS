<!DOCTYPE html>
<html>

<head>
    <title>Data Kelas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Data Kelas</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID Class</th>
                    <th class="text-center">Email Lecturer</th>
                    <th class="text-center">Code Class</th>
                    <th class="text-center">Name Subject</th>
                    <th class="text-center">Name Lecturer</th>
                    <th class="text-center">Fakultas</th>
                    <th class="text-center">Prodi</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">Building Room</th>
                    <th class="text-center">Room Latitude</th>
                    <th class="text-center">Room Longitude</th>
                    <th class="text-center">Jadwal Class Day Time</th>
                    <th class="text-center">Daftar Email Student</th>
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
                
                // Query untuk mendapatkan data kelas
                $sql = "SELECT * FROM tbl_classes";
                $result = mysqli_query($conn, $sql);

                // Tampilkan data dalam tabel
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_class'] . "</td>";
                        echo "<td>" . $row['email_lecturer'] . "</td>";
                        echo "<td>" . $row['code_class'] . "</td>";
                        echo "<td>" . $row['name_subject'] . "</td>";
                        echo "<td>" . $row['name_lecturer'] . "</td>";
                        echo "<td>" . $row['fakultas'] . "</td>";
                        echo "<td>" . $row['prodi'] . "</td>";
                        echo "<td>" . $row['sks'] . "</td>";
                        echo "<td>" . $row['building_room'] . "</td>";
                        echo "<td>" . $row['room_latitude'] . "</td>";
                        echo "<td>" . $row['room_longitude'] . "</td>";
                        echo "<td>" . $row['jadwal_class_day_time'] . "</td>";
                        echo "<td>" . $row['daftar_email_student'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='13'>Tidak ada data kelas.</td></tr>";
                }

                // Tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
