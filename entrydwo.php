<?php
include 'koneksi.php';
$idwo=$_POST['id'];
$idus=$_POST['us'];
$cb3 = sqlsrv_query($koneksi, "SELECT * FROM [bagian]");

$coba23 = sqlsrv_query($koneksi, "SELECT * FROM [work_order],[gi],[pen],[bagian],[dbo].[user] WHERE work_order.id_gi=gi.id_gi AND work_order.id_pen=pen.id_pen AND work_order.id_bag=bagian.id_bag AND work_order.id_user=[dbo].[user].id_user");
$lihat1 = sqlsrv_fetch_array($coba23)
?>
<form action="tambah_dropwo.php" method="post">
  
  <div class="form-group col-md-6">
    <label>Bidang</label>
    <input type="text" class="form-control" placeholder="Bidang .." name="Bidang" value="<?php echo $lihat1['nama_bag'];?>">
  </div>
  
  <div class="form-group col-md-6">
    <label>Tanggal Mulai</label>
    <div class="input-group date">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input type="date" class="form-control pull-right" name="tanggal_mulai" id="datepicker">
    </div>
    <!-- /.input group -->
  </div>
  <div class="form-group col-md-12">
    <label>Tipe Pekerjaan</label>
    <input type="text" class="form-control" placeholder="Tipe Pekerjaan .." name="lanjut">
  </div>
  <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Tindakan</label>
    <select class="form-control" id="id" name="id">
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
      <select class="form-control" id="status" name="status">
        <option value="selesai">Selesai</option>
        <option value="proses">Proses</option>
      </select>
    </div>
    <div id="operbidang" style="display:none;" class="form-group col-md-12">
      <label for="exampleInputEmail1">Bidang</label>
      <select class="form-control" id="idgardu" name="idgardu">
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
    
    <!-- /.input group -->
  </div>
  
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    <input type="reset" class="btn btn-danger" value="Reset">
    <input type="submit" class="btn btn-primary" value="Simpan">
    <div class="form-group col-md-12">
      <input type="hidden" class="form-control" name="id_user" value="<?php echo $idus?>">
      <input type="hidden" class="form-control" name="id_wo" value="<?php echo $idwo?>">
      <input type="date" style="display: none;" class="form-control" name="tanggal_selesai" value="<?php echo date('Y-m-d');?>" >
      <input type="hidden" name="id_bag" class="form-control" value="<?php echo $lihat1['id_bag'];?>">
    </div>
  </div>
</form>
</form>
<script src="js-script.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#status').on('change', function() {
      if(this.value=="proses") {
        $("#operbidang").show()
      }else{
        $("#operbidang").hide()
      }
    });
  });
</script>
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