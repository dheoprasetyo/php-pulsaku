 <?php 
    $sql = $conn->query("SELECT * FROM pelanggan");
    while ($row=$sql->fetch_assoc()){
        $jumlah_pengguna=$sql->num_rows;
    }
     $sql2 = $conn->query("SELECT * FROM transaksi WHERE status = 'NGUTANG'");
    while ($rows=$sql2->fetch_assoc()){
        $jumlah_transaksi=$sql2->num_rows;
    }

    ?>
 <marquee>Selamat Datang di Program Catetanku</marquee>
 <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people_outline</i>
                        </div>
                        <div class="content">
                            <div class="text">Jumlah Anggota</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $jumlah_pengguna; ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_ind</i>
                        </div>
                        <div class="content">
                            <div class="text">Data Ngutang</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?= $jumlah_transaksi; ?></div>
                        </div>
                    </div>
                </div>


<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Transaksi
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelanggan</th>
                                            <th>Tipe</th>
                                            <th>Harga</th>
                                            
                                            <th>Tanggal Beli</th>
                                
                                            <th>Status</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = $conn->query("SELECT t.id, p.nama, c.Jenis, t.tanggal, t.status, l.harga from pelanggan p, layanan l, transaksi t, tipe c where p.id= t.pelanggan_id and l.id = t.layanan_id and l.tipe_id = c.id and t.status='NGUTANG' order by t.tanggal ");
                                        //SELECT p.nama, t.layanan_id, t.tanggal, t.status, l.harga from pelanggan p, layanan l, transaksi t where p.id= t.pelanggan_id and l.id = t.layanan_id and l.tipe_id = t.id

                                        //SELECT p.nama, c.Jenis, t.tanggal, t.status, l.harga from pelanggan p, layanan l, transaksi t, tipe c where p.id= t.pelanggan_id and l.id = t.layanan_id and l.tipe_id = t.id
                                        while($row = $sql->fetch_assoc()) {?>
                                        <tr>
                                            <td><?=$no++ ?></td>
                                            <td><?= $row["nama"]; ?></td>
                                            <td><?= $row["Jenis"]; ?></td>
                                            <td><?= "Rp ". $row["harga"]; ?></td>
                                            
                                            <td><?=date('d F Y', strtotime($row['tanggal']))?></td>
                                            
                                            <td><?= $row["status"]; ?></td>
                                            <td>
                                                <?php  if ($_SESSION['admin']) {?>
                                             <a href="?page=transaksi&aksi=lunas&id=<?= $row["id"]; ?>&nama=<?= $row["nama"] ?>" class="btn btn-info">Lunas</a> 
                                             <?php } ?>
                                                 <!-- <a href="?page=transaksi&aksi=perpanjang&id=<?= $row["id"]; ?>&pelanggan_id=<?= $row["pelanggan_id"] ?>$lambat=<?= $lambat ?>&tgl_kembali=<?= $row["tgl_kembali"]?>" class="btn btn-danger">Perpanjang</a> -->
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>