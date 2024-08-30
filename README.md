# TUGAS 2 (PHP OOP Case Study)
<p>Task:
  <ol>
<li> Create an OOP-based View, by retrieving data from the MySQL database</li>
<li>Use the _construct as a link to the database</li>
<li>Apply encapsulation according to the logic of the case study</li>
<li>Create a derived class using the concept of inheritance</li>
<li>Apply polymorphism for at least 2 roles according to the case study</li>
  </ol>
</p>
<p>Case Study: Menggunakan tabel reports & student_withdrawal</p>

<h4>1. Membuat Database dan tabel reports & student_withdrawal</h4>
<p>Membuat database dan tabel reports & student_withdrawal di phpmyadmin. Nama dan isi tabel disesuaikan dengan ERD yang dibuat.<br>
Isi tabel reports meliputi:
<ol>
  <li>Id Report</li>
  <li>Id Warnings</li>
  <li>Id Gpas</li>
  <li>Id Guidance</li>
  <li>Id Achievments</li>
  <li>Id Scholarship</li>
  <li>Id Student Withdrawals</li>
  <li>Id Tuition Arreas</li>
  <li>Reports Date</li>
  <li>Status</li>
  <li>Has Acc Academic Advisor</li>
  <li>Has Acc Head Of program</th></li>
</ol>
Isi tabel student_withdrawal meliputi:
<ol>
   <li>Id Id Student Withdrawals</li>
   <li>Id Student</li>
   <li>Withdrawal Type</li>
   <li>Decree Number</li>
   <li>Reason</li>
</ol>
</p>

<h4>2. Membuat Class Database untuk mengkoneksi ke database</h4>
<p>Mendefinisikan class Database</p>

        //mendefinisikan class Database
        class Database {
        	//property privat untuk menyimpan informasi koneksi database
            private $host = "localhost"; //host untuk koneksi database
          	private $username = "root";  //username untuk koneksi database
          	private $password = "";		//password untuk koneksi database
          	private $database = "pweb2"; //nama database yang akan digunakan
          	protected $koneksi = "";	//property untuk menyimpan objek koneksi database bersifat protected

<p>class Database mendefinisikan class dengan nama Database sebagai parent class.</p>
<p>private $host = "localhost", private $username = "root", private $password = "", private $database = "pweb2"	digunakan untuk mendeklarasikan property privat tersebut yang menyimpan data untuk koneksi database. Property yang digunakan bersifat private yang artinya hanya dapat diakses dari dalam class Databse itu sendiri. Metode ini merupakan Encaplutaion dimana menyembunyikan data internal dari akses langsung luar class.</p>

<p>protected $koneksi = "" digunakan untuk mendeklarasikan property dilindungi $koneksi yang akan menyimpan objek koneksi database. Property yang digunakan bersifat protected artinya property ini dapat diakses oleh class Database dan class yang mewarisi (child class) tetapi tidak dapat diakses dari luar kelas.</p>

          //Constructor untuk menginisialisasi class yang dijalankan saat objek dibuat
          function __construct(){
      		//menginisialisasi koneksi database menggunakan mysqli_connect
      		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
      		// Mengecek apakah koneksi gagal dan menampilkan pesan error jika gagal
      		if (mysqli_connect_errno()){
      			echo "Koneksi database gagal : " . mysqli_connect_error();
      		}
      	  
<p>Construktor akan dipanggil saat objek dari kelas Database dibuat.</p>
<p>mysqli_connect($this->host, $this->username, $this->password, $this->database) untuk membuat koneksi ke database menggunakan informasi yang telah dideklarasikan.</p>
<p>if (mysqli_connect_errno()){ ... } digunakan untuk memeriksa apakah koneksi gagal dan jika ya akan menampilkan pesan kesalahan dengan mysqli_connect_error().</p>

            //method tampilData di parent class Database
          	function tampilData(){
          	}

<p>Metode tampilData di parent class Database yang akan di implemetasikan di class turunannya</p>
           

<h5>Berikut Full Kodenya</h5>

          <?php
          //mendefinisikan class Database
          class Database {
          	//property privat untuk menyimpan informasi koneksi database
              private $host = "localhost"; //host untuk koneksi database
          	private $username = "root";  //username untuk koneksi database
          	private $password = "";		//password untuk koneksi database
          	private $database = "pweb2"; //nama database yang akan digunakan
          	protected $koneksi = "";	//property untuk menyimpan objek koneksi database bersifat protected
          
          	//Constructor untuk menginisialisasi class yang dijalankan saat objek dibuat
              function __construct()
          	{
          		//menginisialisasi koneksi database menggunakan mysqli_connect
          		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
          		// Mengecek apakah koneksi gagal dan menampilkan pesan error jika gagal
          		if (mysqli_connect_errno()){
          			echo "Koneksi database gagal : " . mysqli_connect_error();
          		}
          	}

            //method tampilData di parent class Database
          	function tampilData(){
          	}
          }
          ?>
          
<h4>3. Mambuat Class Repots yang mewarisi Class Database</h4>
<p>Definisi class Reports</p>

        <?php
        require_once ('Database.php');
        //class Reports yang mewarisi dari class Database
        class Repotrs extends Database {

<p>require_once ('Database.php') untuk menyertakan file Database.php yang berisi definisi class Database ke dalam skrip ini. Ini memastikan file hanya disertakan satu kali.</p>
<p> Class Repotrs (child class) mewarisi (inheritance) dari class Database (parent class). Ini berarti Repotrs memiliki akses ke semua properti dan metode yang didefinisikan dalam Database termasuk koneksi ke database.</p>
        
            /* Override method tampilData
            method untuk mengambil dan menampilkan data dari tabel reports*/
            function tampilData(){
                $query = "SELECT * FROM reports where status = 'pending'"; // Membuat query SQL untuk mengambil semua data dari tabel "reports".
                $data = mysqli_query($this->koneksi, $query); // Mengeksekusi query dan menyimpan hasilnya ke variabel $data.
                while($row = mysqli_fetch_array($data)){ // Mengambil setiap baris hasil query dalam bentuk array.
        			$hasil[] = $row; // Menyimpan setiap baris data ke dalam array $hasil.
        		}
        		return $hasil; // Mengembalikan array $hasil yang berisi semua data dari tabel "reports".    
            }

<p>Metode tampilData dalam kelas Repotrs digunakan untuk mengambil data dari tabel reports di mana statusnya adalah 'pending'. Metode ini mengembalikan data dalam bentuk array.</p>
      
        //membuat instansiasi objek dari class Reports
        $tampil = new Repotrs();

<p>Membuat objek baru dari kelas Repotrs yang secara otomatis akan memanggil Construktor dari kelas Database untuk menginisialisasi koneksi database.</p>
        
        // Memanggil fungsi "tampilData" dan menyimpan hasilnya ke variabel $data.
        $data = $tampil->tampilData();

<p>Memanggil metode tampilData dari objek Repotrs untuk mendapatkan data yang kemudian akan ditampilkan di halaman HTML.</p>
                
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
<p>Kode ini digunakan untuk menampilkan data dari tabel reports yang memiliki status 'pending'. Data ditampilkan dalam tabel HTML di mana setiap baris mewakili satu entri dari tabel reports. Kode PHP mengambil data dari database menggunakan class Reports sementara bagian HTML menggunakan Bootstrap untuk mempercantik tampilan data.</p>

<h5>Berikut Full Kodenya</h5>

        <?php
        require_once ('Database.php');
        //class Reports yang mewarisi dari class Database
        class Repotrs extends Database {
            //method untuk mengambil dan menampilkan data dari tabel reports
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
        
        <!DOCTYPE html>![Screenshot 2024-08-30 103321](https://github.com/user-attachments/assets/063e3d72-0f4b-47d0-b1e5-245821d138da)

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

<p>Kode ini digunakan untuk menampilkan data dari tabel student_withdrawals. Data ditampilkan dalam tabel HTML di mana setiap baris mewakili satu entri dari tabel student_withdrawals. Kode PHP mengambil data dari database menggunakan class StudentWithdrawal sementara bagian HTML menggunakan Bootstrap untuk mempercantik tampilan data.</p>
        
<h5>Berikut Outputnya</h5>

![Screenshot 2024-08-30 103321](https://github.com/user-attachments/assets/293838c1-6abc-421d-8fd4-1ac8e18e6829)

----------------------------------------------------------------
<h4>4. Membuat Class StudentWithdrawal yang mewarisi Class Database</h4>
<p>Definisi class StudentWithdrawal</p>

        <?php
        require_once ('Database.php');
        //class StudentWtihdrawal yang mewarisi dari class Database
        class StudentWithdrawal extends Database {

<p>require_once ('Database.php') untuk menyertakan file Database.php yang berisi definisi class Database ke dalam skrip ini. Ini memastikan file hanya disertakan satu kali.</p>
<p> Class StudentWithdrawal (child class) mewarisi (inheritance) dari class Database (parent class). Ini berarti StudentWithdrawal memiliki akses ke semua properti dan metode yang didefinisikan dalam Database termasuk koneksi ke database.</p>
        
            /* Override method tampilData
            method untuk mengambil dan menampilkan data dari tabel reports*/
            function tampilData(){
                $query = "SELECT * FROM student_withdrawals where withdrawal_type = 'withdrawal'"; // Membuat query SQL untuk mengambil semua data dari tabel "withdrawal"
                $data = mysqli_query($this->koneksi, $query); // Mengeksekusi query dan menyimpan hasilnya ke variabel $data.
                while($row = mysqli_fetch_array($data)){ // Mengambil setiap baris hasil query dalam bentuk array.
        			$hasil[] = $row; // Menyimpan setiap baris data ke dalam array $hasil.
        		}
        		return $hasil; // Mengembalikan array $hasil yang berisi semua data dari tabel withdrawal
        
<p>Metode tampilData di-override dalam kelas StudentWithdrawal untuk mengambil data spesifik dari tabel student_withdrawals di mana withdrawal_type adalah 'withdrawal'. Metode ini mengembalikan data yang diambil dalam bentuk array $hasil.</p>
          
        //membuat instansiasi objek dari class StudentWithdrawal
        $withdrawal = new StudentWithdrawal();

<p>Membuat objek StudentWithdrawal yang secara otomatis menginisialisasi koneksi database.</p>
        
        // Memanggil fungsi "tampilData" dan menyimpan hasilnya ke variabel $tampil.
        $tampil = $withdrawal->tampilData();

<p>Memanggil metode tampilData untuk mengambil data dari tabel student_withdrawals dan menyimpannya dalam variabel $tampil.</p>
          
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

<p>Kode ini digunakan untuk menampilkan data dari tabel student_withdrawals yang memiliki tipe penarikan 'withdrawal'. Data ditampilkan dalam tabel HTML di mana setiap baris mewakili satu entri dari tabel student_withdrawals. Kode PHP mengambil data dari database menggunakan kelas StudentWithdrawal, sementara bagian HTML menggunakan Bootstrap untuk mempercantik tampilan data.</p>
        
--------------------------------------------
<h5>Berikut Full Kodenya</h5>

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

<h5>Berikut Outputnya</h5>

![Screenshot 2024-08-30 104047](https://github.com/user-attachments/assets/3cad6273-d994-49e2-8fe3-26e3a9fc5361)

        
                  
        
                
         
