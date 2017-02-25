<!-- Content Header (Page header) -->
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<?php
include 'koneksi.php';
$iduser=$_SESSION['id_user'];
$cekuser = sqlsrv_query($koneksi, "SELECT * FROM [dbo].[user] WHERE id_user = $iduser");
$selus = sqlsrv_fetch_array($cekuser);
$idbagian = $selus['id_bag'];
$coba22 = sqlsrv_query($koneksi, "SELECT * FROM apd_base.dbo.work_order,apd_base.dbo.gi,apd_base.dbo.pen,apd_base.dbo.bagian,[apd_base].[dbo].[user] WHERE work_order.id_gi=gi.id_gi
  AND work_order.id_pen=pen.id_pen AND work_order.id_bag=bagian.id_bag AND type_wo='project' AND work_order.id_bag = $idbagian
  ");
$cb2 = sqlsrv_query($koneksi, "SELECT * FROM [gi]");

$b = sqlsrv_fetch_array($coba22);

?>


<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
     <div class="box-header with-border">
      <h3 class="box-title">Work Order List Project</h3>

      <div class="box-tools pull-right">
                <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama G.I</th>
                      <th>Penyulang</th>
                      <th>Bagian</th>
                      <th>Tanggal Gangguan</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                      <th>Tanggal Selesai</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($lihat = sqlsrv_fetch_array($coba22)) {
                      # code...?>
                      <tr>
                        <td><a href="#"><?php echo $lihat['id_wo']; ?></a></td>
                        <td><?php echo $lihat['nama_gi']; ?></td>
                        <td><?php echo $lihat['nama_pen']; ?></td>
                        <td><b><?php echo $lihat['nama_bag']; ?></b></td>
                        <td><?php echo $lihat['tanggal_gangguan']->format('d/m/Y');?></td>
                        <td><?php echo $lihat['keterangan']; ?></td>
                        <?php
                        if ($lihat['status']=='proses') { ?>
                        <td><span class="label label-danger"><?php echo $lihat['status']; ?></span></td>
                        <?php } else {
                          ?>
                          <td><span class="label label-success"><?php echo $lihat['status']; ?></span></td>
                          <?php
                        }
                        ?>
                        <td><?php echo $lihat['tanggal_selesai']; ?></td>
                        <td>
                          <a href="#" class="edit-record" data-id="<?php echo $lihat['id_wo'] ?>" data-us="<?php echo $iduser; ?>"><i data-toggle="modal" data-target="#myModal"class="fa fa-plus" aria-hidden="true" title="Drop Work Order"></i></a> |
                          <a href="?p=det_workorder&&id=<?php echo $lihat['id_wo']; ?>" title="Lihat Detail"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a> |
                          <a href="hapus_workorder.php?id=<?php echo $lihat['id_wo']; ?>" title= "Hapus Data"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>
                      </tr>
                      <?php }
                      ?>


                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->


                <!-- modal input -->
                <div id="myModal" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Drop Work Order</h4>
                      </div>
                      <div class="modal-body">

                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
             <!--  <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
             <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> -->
           </div>
         </div>
         <!-- /. box -->
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
     <script src="js-script.js" type="text/javascript"></script>
     <script type="text/javascript" src="jquery.js"></script>
     <script type="text/javascript" src="plugins/datepicker/bootstrap-datepicker.js"></script>
     <script type="text/javascript">
      $(document).ready(function() {
        $("#datepicker").datepicker({
          autoclose: true,
          dateFormat: 'yy/mm/dd'
        });
      });
      $(document).ready(function() {
        $("#datepicker2").datepicker({
          autoclose: true,
          dateFormat: 'yy/mm/dd'
        });
      });
    </script>
    <script>
      $(function(){
        $(document).on('click','.edit-record',function(e){
          e.preventDefault();
          $("#myModal").modal('show');
          $.post('entrydwo.php',
            {id:$(this).attr('data-id'),us:$(this).attr('data-us')},
            function(html){
              $(".modal-body").html(html);
            }
            );
        });
      });
    </script>
    </html>
