<?php
require_once ('Database.php');
class Repots extends Database {
    function tampilData(){
        $query = "SELECT * FROM reports WHERE status = 'mahasiswa'";
        $data = mysqli_query($this->koneksi, $query);
        while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;

    }
}
$tampil = new Repots();
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
                    <th>Id Report</th>
                    <th>Id Warnings</th>
                    <th>Id Gpas</th>
                    <th>Id Guidance</th>
                    <th>Id Achievments</th>
                    <th>Id Scholarship</th>
                    <th>Id Student Withdrawals</th>
                    <th>Id Tuition Arreas</th>
                    <th>Reports Date</th>
                    <th>Status</th>
                    <th>Has Acc Academic Advisor</th>
                    <th>Has Acc Head Of program</th>
                </tr>
                <?php 
                $no = 1;
                foreach($data as $row){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['id_report']; ?></td>
                        <td><?php echo $row['id_warnings']; ?></td>
                        <td><?php echo $row['id_gpas']; ?></td>
                        <td><?php echo $row['id_guidance']; ?></td>
                        <td><?php echo $row['id_achievments']; ?></td>
                        <td><?php echo $row['id_scholarship']; ?></td>
                        <td><?php echo $row['id_students_withdrawals']; ?></td>
                        <td><?php echo $row['id_tuition_arrears']; ?></td>
                        <td><?php echo $row['report_date']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['has_acc_academic_advisor']; ?></td>
                        <td><?php echo $row['has_acc_head_of_program']; ?></td>
                    </tr>
                    <?php 
                }
                ?>
        </table>
</body>
</html>