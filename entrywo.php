<!-- Content Header (Page header) -->
<?php
include 'koneksi.php';
$coba2 = sqlsrv_query($koneksi, "SELECT * FROM [gi]");
$coba3 = sqlsrv_query($koneksi, "SELECT * FROM [bagian]");

?>

<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
     <div class="box-header with-border">
      <h3 class="box-title">Entry Work Order</h3>

      <div class="box-tools pull-right">
                <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" action="tambah_wo.php">
               <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Type</label>
                <select class="form-control" id="idtype" name="idtype">
                  <option value="project">Project</option>
                  <option value="rutin">Rutin</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Gardu induk</label>
                <select class="form-control" id="idgardu" name="idgardu">

                  <?php
                  while ($row2 = sqlsrv_fetch_array($coba2)) {
                    # code...
                    ?>
                    <option value="<?php echo $row2['id_gi'];?>"><?php echo $row2['nama_gi']; ?></option>
                    <?php
                  }
                  ?>

                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Penyulang</label>
                <select class="form-control" id="idpen" name="idpen">
                  <option value="6">Tidak ada</option>
                </select>
              </div>
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Bagian</label>
                <select class="form-control" id="id_bag" name="id_bag">
                  <?php
                  while ($row3 = sqlsrv_fetch_array($coba3)) {
                    # code...
                    ?>
                    <option value="<?php echo $row3['id_bag'];?>"><?php echo $row3['nama_bag']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-12">
                <label>Tanggal Gangguan</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="tanggal_gangguan" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group col-md-12">
                <label>Keterangan</label>
                <textarea class="form-control" rows="4" name="keterangan"></textarea>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <div class="form-group col-md-12">
                <input type="hidden" class="form-control" name="id_user" value="<?php echo $iduser?>">
              </div>
              <div class="form-group col-md-12">
                <input type="hidden" class="form-control" name="status" value="proses">
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <script src="js-script.js" type="text/javascript"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=propinsi>
      $("#idgardu").change(function(){
        var idgardu = $("#idgardu").val();
        $.ajax({
          url: "ambilpenyulang.php",
          data: "idgardu="+idgardu,
          cache: false,
          success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#idpen").html(msg);
              }
            });
      });
    });
  </script>
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
