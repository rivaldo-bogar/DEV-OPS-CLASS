<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $conn = mysqli_connect('localhost', 'root', '12345', 'db_unklab');

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Ambil data dari formulir
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];

    // Query untuk menyimpan data mahasiswa
    $sql = "INSERT INTO tbl_students (nim_number, email, fullname) VALUES ('$nim', '$email', '$fullname')";
    $result = mysqli_query($conn, $sql);

    // Periksa apakah penyimpanan berhasil
    if ($result) {
        echo "<script>alert('Data berhasil ditambahkan');</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data. Error: " . mysqli_error($conn) . "');</script>";
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>
