<?php
include 'koneksi.php';
$idwo=$_GET['id_wo'];
$cb3 = sqlsrv_query($koneksi, "SELECT * FROM [bagian]");

$coba23 = sqlsrv_query($koneksi, "SELECT * FROM [work_order],[gi],[pen],[bagian],[dbo].[user] WHERE work_order.id_gi=gi.id_gi AND work_order.id_pen=pen.id_pen AND work_order.id_bag=bagian.id_bag AND work_order.id_user=[dbo].[user].id_user AND [dbo].[work_order].id_wo=$idwo");
$lihat1 = sqlsrv_fetch_array($coba23);

$idoper=$lihat1['id_bag'];
?>

<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
      <div class="box-header with-border">
        <h3 class="box-title">Entry Drop Work Order</h3>

        <div class="box-tools pull-right">
          <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form action="tambah_dropwo.php" method="post">

        <div class="form-group col-md-6">
          <label>Bidang</label>
          <input type="text" class="form-control" placeholder="Bidang .." name="Bidang" value="<?php echo $lihat1['nama_bag'];?>">
        </div>

        <div class="form-group col-md-6">
          <label>Tanggal Mulai Pengerjaan</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" name="tanggal_mulai" id="datepicker">
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group col-md-12">
          <label>Tipe Pekerjaan</label>
          <input type="text" class="form-control" placeholder="Tipe Pekerjaan" name="tipe_pekerjaan">
        </div>
        <div class="form-group col-md-12">
          <label for="exampleInputEmail1">Tindakan</label>
          <select class="form-control" id="id" name="tindakan">
            <option>-- Pilih Tindakan --</option>>
            <option value="Tunjuk Langsung">Tunjuk Langsung</option>
            <option value="Eproc">Eproc</option>
          </select>
        </div>
        <div>
          <div class="form-group col-md-12">
            <label>Keterangan</label>
            <textarea class="form-control" rows="4" name="keterangan"></textarea>
          </div>
          <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Status</label>
            <select class="form-control" id="status1" name="status">
              <option>-- Pilih Status --</option>>
              <option value="selesai">Selesai</option>
              <option value="proses">Proses</option>
            </select>
          </div>
          <div id="operbidang" style="display:none;" class="form-group col-md-12">
            <label for="exampleInputEmail1">Oper Bidang</label>
            <select class="form-control" id="idoper" name="id_oper">
              <option value="">-- Pilih Bidang --</option>
              <?php
              while ($row2 = sqlsrv_fetch_array($cb3)) {
                # code...
                ?>
                <option value="<?php echo $row2['id_bag'];?>"><?php echo $row2['nama_bag']; ?></option>
                <?php
              }
              ?>
            </select>
          </div>
        </div>

        <!-- /.input group -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <input type="reset" class="btn btn-danger" value="Reset">
        <input type="submit" class="btn btn-primary" value="Simpan">
        <div class="form-group col-md-12">
          <input type="hidden" name="id_wo" class="form-control"  value="<?php echo $idwo?>">
          <input type="hidden" name="id_bag" class="form-control" value="<?php echo $lihat1['id_bag'];?>">
          <input type="hidden" name="id_user" class="form-control" value="<?php echo $iduser?>">
          <input type="date" id="tanggal_selesai" name="tanggal_selesai" style="display: none;" class="form-control"  value="<?php echo date('Y-m-d');?>" >
        </div>
      </div>
    </form>
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
<script>
$(function(){
  $(document).on('click','.edit-record',function(e){
    e.preventDefault();
    $("#myModal").modal('show');
    $.post('entrydwo.php',
    {id:$(this).attr('data-id')},
    function(html){
      $(".modal-body").html(html);
    }
  );
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
</script>

<script type="text/javascript">
$(document).ready(function(){
  $('#status1').on('change', function() {
    if(this.value=="proses") {
      $("#operbidang").show();
      document.getElementById('tanggal_selesai').setValue(null);
    } else {
      $("#operbidang").hide();
      document.getElementById('idoper').setValue(null);
    }
  });
});
</script>
