<?php
require_once ('Database.php');
class StudentWithdrawal extends Database {
    function tampilData(){
        $query = "SELECT * FROM student_withdrawals";
        $data = mysqli_query($this->koneksi, $query);
        while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;

    }
}
$tampil = new StudentWithdrawal();
$data = $tampil->tampilData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data</title>
</head>
<body>
<table border="1">
                <tr>
                    <th>No</th>
                    <th>Id Student Withdrawals </th>
                    <th>Id Student </th>
                    <th>Withdrawal Type</th>
                    <th>Decree Number</th>
                    <th>Reason</th>
                </tr>
                <?php 
                $no = 1;
                foreach($data as $row){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['id_student_withdrawals']; ?></td>
                        <td><?php echo $row['id_student']; ?></td>
                        <td><?php echo $row['withdrawal_type']; ?></td>
                        <td><?php echo $row['decree_number']; ?></td>
                        <td><?php echo $row['reason']; ?></td>
                    </tr>
                    <?php 
                }
                ?>
        </table>
</body>
</html>