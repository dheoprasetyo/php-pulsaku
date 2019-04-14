<?php 
 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$conn = new mysqli("localhost", "root", "", "pulsa"); 
 ?>

<style>
	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>
<table border="1" width="100%" style="border-collapse: collapse;">
	<caption>Laporan Pulsa</caption>
	<thead>
			<tr>
               <th>No</th>
               <th>Tanggal Beli</th>
               <th>Pelanggan</th>
               <th>Tipe</th>
                
                                            
                
                                
                <th>Status</th>
                <th>Harga</th>
                                            
                                            
            </tr>
     </thead>
	<tbody>
		<?php 

			  $tgl_awal = $_POST['tgl_awal'];
			  $tgl_akhir = $_POST['tgl_akhir'];
			  $no = 1;
			  $sql = $conn->query("SELECT t.id, p.nama, c.Jenis, t.tanggal, t.status, l.harga from pelanggan p, layanan l, transaksi t, tipe c where p.id= t.pelanggan_id and l.id = t.layanan_id and l.tipe_id = c.id AND t.tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ");
			  while($row = $sql->fetch_assoc()) {
			  	?>
			  <tr>
			    <td><?=$no++ ?></td>
			     <td><?=date('d F Y', strtotime($row['tanggal']))?></td>   
			    <td><?= $row["nama"]; ?></td>
                <td><?= $row["Jenis"]; ?></td>
                
                                        
                <!-- <td><?= $row["tanggal"]; ?></td> -->
                                            
                <td><?= $row["status"]; ?></td>
                <td><?="Rp ".number_format($row["harga"]) ?></td>
			                                           
			   </tr>
        <?php 
        $total_pj = $total_pj + $row['harga'];
    	} ?>
	</tbody>
	<th colspan="5">Total Penjualan</th>
			<td><?="Rp ".number_format($total_pj)  ?></td>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">