<?php 
$conn = new mysqli("localhost", "root", "", "perpus"); 
 ?>

<style>
	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>
<table border="1" width="100%" style="border-collapse: collapse;">
	<caption>Laporan Data Anggota</caption>
	<thead>
		<tr>
			<th>Nomor</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Tanggal Lahir</th>
            <th>Kelamin</th>
            <th>Jurusan</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			  $no = 1;
			  $sql = $conn->query("SELECT * FROM anggota");
              while($row = $sql->fetch_assoc()) {?>
             <tr>
              <td><?=$no++ ?></td>
              <td><?=$row['npm']  ?></td>
               <td><?=$row['nama']  ?></td>
               <td><?=$row['kelas']  ?></td>
               <td><?=$row['tgl_lahir']  ?></td>
                <td><?=$row['kelamin']  ?></td>
                <td><?=$row['jurusan']  ?></td>
			                                           
			   </tr>
        <?php } ?>
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">