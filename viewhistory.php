<!DOCTYPE html>
<html>

<head>
    <title>Data Absensi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Data Absensi</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID Attendance</th>
                    <th class="text-center">ID Class</th>
                    <th class="text-center">Email Student</th>
                    <th class="text-center">Name Subject</th>
                    <th class="text-center">Email Lecturer</th>
                    <th class="text-center">Student Latitude</th>
                    <th class="text-center">Student Longitude</th>
                    <th class="text-center">Distance</th>
                    <th class="text-center">Time Take Attendance</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Note</th>
                    <th class="text-center">Created At</th>
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
                
                // Query untuk mendapatkan data absensi
                $sql = "SELECT * FROM tbl_attendance_history";
                $result = mysqli_query($conn, $sql);

                // Tampilkan data dalam tabel
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_attendance'] . "</td>";
                        echo "<td>" . $row['id_class'] . "</td>";
                        echo "<td>" . $row['email_student'] . "</td>";
                        echo "<td>" . $row['name_subject'] . "</td>";
                        echo "<td>" . $row['email_lecturer'] . "</td>";
                        echo "<td>" . $row['student_lat'] . "</td>";
                        echo "<td>" . $row['student_long'] . "</td>";  // perubahan disini
                        echo "<td>" . $row['distance'] . "</td>";
                        echo "<td>" . $row['time_take_attendance'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>" . $row['note'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>Tidak ada data absensi.</td></tr>";
                }

                // Tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
