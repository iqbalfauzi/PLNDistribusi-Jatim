<!-- Content Header (Page header) -->
<?php 
include 'koneksi.php';
$idwo = $_GET['id'];
$coba22 = sqlsrv_query($koneksi, "SELECT * FROM [work_order],[gi],[pen],[bagian],[dbo].[user] WHERE work_order.id_gi=gi.id_gi AND work_order.id_pen=pen.id_pen AND work_order.id_bag=bagian.id_bag AND work_order.id_user=[dbo].[user].id_user AND id_wo=$idwo");
$cb2 = sqlsrv_query($koneksi, "SELECT * FROM [gi]");

$coba23 = sqlsrv_query($koneksi, "SELECT *
  FROM [apd_base].[dbo].[drop_wo],[work_order],[bagian],[user] WHERE drop_wo.id_wo=work_order.id_wo AND drop_wo.id_bag=bagian.id_bag AND drop_wo.id_user=[dbo].[user].id_user  AND drop_wo.id_wo=$idwo");

  ?>    
  <div class="col-md-9">
    <div class="box box-primary">
      <div class="box-header with-border">
       <div class="box-header with-border">
        <h3 class="box-title"><span class="glyphicon glyphicon-briefcase"></span>  Detail Work Order</h3>
        <a class="btn" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

        <?php 
        while ($d = sqlsrv_fetch_array($coba22)) {
          ?>
          <table class="table">
            <tr>
              <td>ID Work Order</td>
              <td><?php echo $d['id_wo'] ?></td>
            </tr>
            <tr>
              <td>Nama G.I</td>
              <td><?php echo $d['nama_gi'] ?></td>
            </tr>
            <tr>
              <td>Penyulang</td>
              <td><?php echo $d['nama_pen'] ?></td>
            </tr>
            <tr>
              <td>Bagian</td>
              <td><?php echo $d['nama_bag'] ?></td>
            </tr>
            <tr>
              <td>Tanggal Gangguan</td>
              <td><?php echo $d['tanggal_gangguan'] ->format('d/m/Y');?></td>
            </tr>
            <tr>
              <td>Keterangan</td>
              <td><?php echo $d['keterangan'] ?></td>
            </tr>
            <tr>
              <td>Status</td>
              <td><?php echo $d['status'] ?></td>
            </tr>
            <tr>
              <td>Tanggal Selesai</td>
              <td><?php echo $d['tanggal_selesai'];?></td>
            </tr>
          </table>
          <?php 
        }
        ?>
        <h3 class="box-title"><span class="glyphicon glyphicon-briefcase"></span> Drop Work Order</h3>
        <table class="table no-margin">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Bagian</th>
              <th>Tindakan</th>
              <th>Keterangan</th>
              <th>Tipe Pekerjaan</th>
              <th>Status Lanjutan</th>
              <!--  <th>Action</th> -->
            </tr>
          </thead>
          <tbody>
            <?php 
            while ($lihat2 = sqlsrv_fetch_array($coba23)) {
                      # code...?>
                      <tr>
                        <td><a href="#"><?php echo $lihat2['id_dwo']; ?></a></td>
                        <td><?php echo $lihat2['tanggal_mulai']->format('d-m-y'); ?></td>
                        <td><?php echo $lihat2['tanggal_selesai']; ?></td>
                        <td><b><?php echo $lihat2['nama_bag']; ?></b></td>
                        <td><?php echo $lihat2['tindakan'];?></td>
                        <td><?php echo $lihat2['keterangan']; ?></td>
                        <td><?php echo $lihat2['tipe_pekerjaan']; ?></td>
                        <td><?php echo $lihat2['status']; ?></td>
                        
                      </tr>
                      <?php }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

 <!-- <div class="box-body">
              <div class="table-responsive">
               
              </div> -->
              <!-- ->format('d/m/Y') -->