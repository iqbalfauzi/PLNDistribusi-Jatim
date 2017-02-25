<!-- Content Header (Page header) -->
<?php 
include 'koneksi.php';
$coba2 = sqlsrv_query($koneksi, "SELECT * FROM [gi]");

?>
<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
     <div class="box-header with-border">
      <h3 class="box-title">Data Gardu Induk APD Jatim</h3>
      
      <a class="edit-record" href="#"><button type="button" class="btn btn-sm btn-info btn-flat pull-right" data-toggle="modal" data-target="#myModal">Tambah Gardu Induk</button></a>
      <div class="box-tools pull-right">
                <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Gardu Induk</h4>
                      </div>
                      <div class="modal-body">        
                       
                      </div>
                      <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="box-header">
               <!--  <h3 class="box-title">Responsive Hover Table</h3> -->

               <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama Gardu Induk</th>
                </tr>
                <?php
                while ($row2 = sqlsrv_fetch_array($coba2)) {
                   # code...
                  ?>
                  <tr>
                    <td><?php echo $row2['id_gi']; ?></td>
                    <td><?php echo $row2['nama_gi']; ?></td>
                  </tr>
                  <?php
                } 
                ?>
                
                
              </table>
            </div>
          </div>
          <!-- /.box-body -->
          
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <script>
      $(function(){
        $(document).on('click','.edit-record',function(e){
          e.preventDefault();
          $("#myModal").modal('show');
          $.post('form_gi.php',
            {},
            function(html){
              $(".modal-body").html(html);
            }   
            );
        });
      });
    </script>
