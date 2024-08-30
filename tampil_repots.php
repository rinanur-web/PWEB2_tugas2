<?php
require_once ('Database.php');
//class Reports yang mewarisi dari class Database
class Repotrs extends Database {
    /* Override method tampilData
    method untuk mengambil dan menampilkan data dari tabel reports*/
    function tampilData(){
        $query = "SELECT * FROM reports where status = 'pending' "; // Membuat query SQL untuk mengambil semua data dari tabel "reports".
        $data = mysqli_query($this->koneksi, $query); // Mengeksekusi query dan menyimpan hasilnya ke variabel $data.
        while($row = mysqli_fetch_array($data)){ // Mengambil setiap baris hasil query dalam bentuk array.
			$hasil[] = $row; // Menyimpan setiap baris data ke dalam array $hasil.
		}
		return $hasil; // Mengembalikan array $hasil yang berisi semua data dari tabel "reports".
    }
}
//membuat instansiasi objek dari class Reports
$reports = new Repotrs();
// Memanggil fungsi "tampilData" dan menyimpan hasilnya ke variabel $tampil.
$tampil = $reports->tampilData();
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
            <th>Id Report</th> <!-- Kolom untukId Report. -->
            <th>Id Warnings</th> <!-- Kolom untuk Id Warnings. -->
            <th>Id Gpas</th> <!-- Kolom untuk Id Gpas. -->
            <th>Id Guidance</th> <!-- Kolom untuk Id Guidance -->
            <th>Id Achievments</th> <!-- Kolom untuk Id Achievments-->
            <th>Id Scholarship</th> <!-- Kolom untuk Id Scholarship -->
            <th>Id Student Withdrawals</th> <!-- Kolom untuk Id Student Withdrawals -->
            <th>Id Tuition Arreas</th> <!-- Kolom untuk Id Tuition Arreas. -->
            <th>Reports Date</th> <!-- Kolom untuk Reports Date. -->
            <th>Status</th> <!-- Kolom untuk Status. -->
            <th>Has Acc Academic Advisor</th> <!-- Kolom untuk status Has Acc Academic Advisor. -->
            <th>Has Acc Head Of program</th> <!-- Kolom untuk status Has Acc Head Of program -->
        </tr>
                <?php 
                $no = 1; // Inisialisasi nomor urut mulai dari 1.
                foreach($tampil as $row){ // Melakukan perulangan melalui setiap baris data yang diambil dari database.
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut dan menambahkannya setiap kali perulangan. -->
                        <td><?php echo $row['id_report']; ?></td> <!-- Menampilkan Id Report -->
                        <td><?php echo $row['id_warnings']; ?></td> <!-- Menampilkan Id Warnings. -->
                        <td><?php echo $row['id_gpas']; ?></td>     <!-- Menampilkan Id Gpas. -->
                        <td><?php echo $row['id_guidance']; ?></td>  <!-- Menampilkan Id Guidance. -->
                        <td><?php echo $row['id_achievments']; ?></td>  <!-- Menampilkan Id Achievments. -->
                        <td><?php echo $row['id_scholarship']; ?></td>  <!-- Menampilkan Id Scholarship -->
                        <td><?php echo $row['id_students_withdrawals']; ?></td>  <!-- Menampilkan Id Student Withdrawals -->
                        <td><?php echo $row['id_tuition_arrears']; ?></td>  <!-- Menampilkan Id Tuition Arreas -->
                        <td><?php echo $row['report_date']; ?></td> <!-- Menampilkan Reports Date -->
                        <td><?php echo $row['status']; ?></td>  <!-- Menampilkan Status. -->
                        <td><?php echo $row['has_acc_academic_advisor']; ?></td>  <!-- Menampilkan Has Acc Academic Advisor. -->
                        <td><?php echo $row['has_acc_head_of_program']; ?></td>  <!-- Menampilkan Has Acc Head Of program -->
                    </tr>
                    <?php 
                }
                ?>
        </table>
        </div>
</body>
</html>