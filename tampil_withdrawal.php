<?php
require_once ('Database.php');
//class StudentWtihdrawal yang mewarisi dari class Database
class StudentWithdrawal extends Database {
    /* Override method tampilData
    method untuk mengambil dan menampilkan data dari tabel reports*/
    function tampilData(){
        $query = "SELECT * FROM student_withdrawals where withdrawal_type = 'withdrawal'"; // Membuat query SQL untuk mengambil semua data dari tabel "withdrawal"
        $data = mysqli_query($this->koneksi, $query); // Mengeksekusi query dan menyimpan hasilnya ke variabel $data.
        while($row = mysqli_fetch_array($data)){ // Mengambil setiap baris hasil query dalam bentuk array.
			$hasil[] = $row; // Menyimpan setiap baris data ke dalam array $hasil.
		}
		return $hasil; // Mengembalikan array $hasil yang berisi semua data dari tabel withdrawal

    }
}
//membuat instansiasi objek dari class StudentWithdrawal
$withdrawal = new StudentWithdrawal();
// Memanggil fungsi "tampilData" dan menyimpan hasilnya ke variabel $tampil.
$tampil = $withdrawal->tampilData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <!--Tampilan Navbar-->
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="tampil_repots.php">Data Reports</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tampil_withdrawal.php">Data Withdrawal</a>
    </li>
    </ul>
    <div class="container-fluid">
    <table class="table table-bordered">
                <tr>
                    <th>No</th> <!-- Kolom untuk nomor urut. -->
                    <th>Id Student Withdrawals </th> <!-- Kolom untuk Id Student Withdrawals. -->
                    <th>Id Student </th> <!-- Kolom untuk Id Student. -->
                    <th>Withdrawal Type</th> <!-- Kolom untuk Withdrawal Type. -->
                    <th>Decree Number</th> <!-- Kolom untuk Decree Number. -->
                    <th>Reason</th> <!-- Kolom untuk Reason -->
                </tr>
                <?php 
                $no = 1; // Inisialisasi nomor urut mulai dari 1.
                foreach($tampil as $row){ // Melakukan perulangan melalui setiap baris data yang diambil dari database.
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut dan menambahkannya setiap kali perulangan. -->
                        <td><?php echo $row['id_student_withdrawals']; ?></td> <!-- Menampilkan Id Student withdrawal -->
                        <td><?php echo $row['id_student']; ?></td> <!-- Menampilkan Id Report -->
                        <td><?php echo $row['withdrawal_type']; ?></td> <!-- Menampilkan withdrawal type -->
                        <td><?php echo $row['decree_number']; ?></td> <!-- Menampilkan decree number -->
                        <td><?php echo $row['reason']; ?></td> <!-- Menampilkan reason -->
                    </tr> 
                    <?php 
                }
                ?>
        </table>
        </div>
</body>
</html>