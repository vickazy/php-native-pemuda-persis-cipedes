<?php include"data_atas.php";?>
<?php include"data_navbar.php";?>

<!--VERLY ACTION-->
<!-- Main row -->
<?php include"koneksi.php";?>
<div class="row">
<!-- Left col -->
<section class="col-lg-9 connectedSortable">  
<div class="col-md-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Daftar Member</h3>
</div><!-- /.box-header -->
<div class="box-body">
<table class="table table-striped">
<tr>
<th style="width: 10px">#</th>
<th>Nama Depan</th>
<th>Nama Belakang</th>
<th>Email</th>
<th>Tanggal Lahir</th>
<th>Alamat</th>
<th>Pekerjaan</th>
<th>Nomor Telp</th>
<th style="width: 40px">Option</th>
</tr>
<?php include"koneksi.php";
$verliqueri=$verlipdo->prepare("select*from tbl_member order by nama_depan");
$verliqueri->execute();
$no = 0; //variabel no untuk nomor urutnya.
while($verlitampil=$verliqueri->fetch()){
$nama_depan=$verlitampil['nama_depan'];
$nama_belakang=$verlitampil['nama_belakang'];
$email=$verlitampil['email'];
$tanggal_lahir=$verlitampil['tanggal_lahir'];
$alamat=$verlitampil['alamat'];
$pekerjaan=$verlitampil['pekerjaan'];
$nomor_telp=$verlitampil['nomor_telp'];
$no++; // ini sama saja dengan $no = $no + 1
?>
<tr>
<td><?php echo $no;?></td>
<td><?php echo $nama_depan;?></td>
<td><?php echo $nama_belakang;?></td>
<td><?php echo $email;?></td>
<td><?php echo $tanggal_lahir;?></td>
<td><?php echo $alamat;?></td>
<td><?php echo $pekerjaan;?></td>
<td><?php echo $nomor_telp;?></td>
<td>
<a href="data_ubah.php?idubah=<?php echo $verlitampil['id_member'];?>"<span class="badge bg-blue">Ubah</span></a>
<a href="data_hapus.php?idhapus=<?php echo $verlitampil['id_member'];?>"<span class="badge bg-red">Hapus</span></td>
</tr>
<?php } ?>
</table>
</div><!-- /.box-body -->
<div class="box-footer clearfix">
<ul class="pagination pagination-sm no-margin pull-right">
<li><a href="#">&laquo;</a></li>
<li><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">&raquo;</a></li>
</ul>
</div>
</div><!-- /.box -->
</div>
<div class="col-md-3">
<!--VERLY FORM INPUTDATA-->
<!-- general form elements -->
<div class="box box-primary">
<div class="box-header">
<h3 class="box-title">Form Ubah Siswa</h3>
</div><!-- /.box-header -->
<!-- form start -->
<?php include"koneksi.php";
$idubah=$_GET['idubah'];
$verliubah=$verlipdo->prepare("select * from tbl_member where id_member=$idubah");
$verliubah->execute();
$verlitampilagi=$verliubah->fetch();
?>
<form action="member_update.php" method="post" role="form">
<div class="box-body">
<div class="form-group">
<label for="verlyganteng">Nama</label>
<input type="hidden"name="idubah" value="<?php echo $idubah;?>">
<input type="text" class="form-control" name="nama_depan" value="<?php echo $verlitampilagi['nama_depan'];?>" required>
</div>
<div class="form-group">
<label for="wkwkwk">Alamat</label>
<input type="text" class="form-control" name="alamat" value="<?php echo $verlitampilagi['alamat'];?>" required>
<input type="submit" value="Simpan">
</div>
</div><!-- /.box-body -->                          
</section>
</div><!-- /.row (main row) -->
</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

    </body>
</html>