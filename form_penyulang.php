<?php
include 'koneksi.php';
$coba2 = sqlsrv_query($koneksi, "SELECT * FROM [gi]");

?>
<form role="form" action="tambah_penyulang.php" method="post">
    <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Gardu Induk</label>
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
            <label for="exampleInputEmail1">Nama Penyulang</label>
            <input type="text" class="form-control" id="namapenyulang" placeholder="Nama Penyulang" name="namapenyulang">
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form> 