<?php 
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
	<caption>Laporan Data Transaksi</caption>
	<thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelanggan</th>
                                            <th>Tipe</th>
                                            <th>Harga</th>
                                            
                                            <th>Tanggal Beli</th>
                                
                                            <th>Status</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = $conn->query("SELECT t.id, p.nama, c.Jenis, t.tanggal, t.status, l.harga from pelanggan p, layanan l, transaksi t, tipe c where p.id= t.pelanggan_id and l.id = t.layanan_id and l.tipe_id = c.id and t.status='LUNAS' ");
                                        //SELECT p.nama, t.layanan_id, t.tanggal, t.status, l.harga from pelanggan p, layanan l, transaksi t where p.id= t.pelanggan_id and l.id = t.layanan_id and l.tipe_id = t.id

                                        //SELECT p.nama, c.Jenis, t.tanggal, t.status, l.harga from pelanggan p, layanan l, transaksi t, tipe c where p.id= t.pelanggan_id and l.id = t.layanan_id and l.tipe_id = t.id
                                        while($row = $sql->fetch_assoc()) {?>
                                        <tr>
                                            <td><?=$no++ ?></td>
                                            <td><?= $row["nama"]; ?></td>
                                            <td><?= $row["Jenis"]; ?></td>
                                            <td><?= $row["harga"]; ?></td>
                                            
                                            <td><?= $row["tanggal"]; ?></td>
                                            
                                            <td><?= $row["status"]; ?></td>
                                            
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">