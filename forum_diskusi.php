<div class="col-md-9">
<?php
	$id_topik=$_GET['id_topik'];
	$query=mysql_query("select*from tbl_topik where id_topik='$id_topik'");
	
	//mencari total view (dilihat)
			$lihat=mysql_fetch_array(mysql_query("select dilihat from tbl_topik where id_topik='$_GET[id_topik]'"));
			$dilihat = $lihat ['dilihat'] + 1;
			$sql = "UPDATE tbl_topik SET dilihat='$dilihat' WHERE id_topik='$_GET[id_topik]'";
			$hasil = mysql_query($sql, $koneksi);
			
	$record=mysql_fetch_array($query);
?>
    	<div class="center">
        	<h2><b><?php echo $record['judul']; ?></b></h2>
            <p>Diposting oleh : <?php echo $record['pengirim']; ?> pada <i class="fa fa-calendar"></i>&nbsp <?php echo $record['tanggal_posting']; ?> &nbsp <i class="fa fa-clock-o"></i>&nbsp;<?php echo $record['jam']; ?> &nbsp; 
            <?php
				if($record['id_member']==$_SESSION['id_member'])
				{
			?> 
            <a class="pull-right" href="forum.php?page=forum_topik_hapus&id_topik=<?php echo $record['id_topik'];?>" onclick="return confirm('Apakah Anda yakin akan menghapus Topik <?php echo $record['judul']; ?> ini ?')"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Hapus Topik">&nbsp;</i></a>
            <a class="pull-right" href="forum.php?page=forum_topik_edit&id_topik=<?php echo $record['id_topik'];?>&judul=<?php echo $record['judul']; ?>" ><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Ubah Topik">&nbsp;</i></a>
            <?php
				}
			?>
            <hr>
  				<div class="bs-example">
                <p align="justify"> 
				<?php echo $record['isi_topik']; ?>
                </p>
                </div><!-- /.bs-example -->
                    <br>
                
                    
    	</div>
        
        <div class="media">
        <hr>
        <!-- Nested media object -->
       
        <?php
        	$sql="select * from tbl_komentar where id_topik='$id_topik' order by tanggal ";
			$komentar=mysql_query($sql);
		?>
        <?php
			while($record=mysql_fetch_array($komentar))
			{
		?>
                    <div class="media">
        <?php
        //Menyesuaikan gambar / avatar
		$user = $record['id_member'];
		$foto_member=mysql_fetch_array(mysql_query("select * from tbl_member where id_member='$user'"));
		?>
                      <a class="pull-left" href="javascript:;">
                        <img class="img-thumbnail" src="./foto/<?php echo $foto_member['foto']; ?>" width="80" height="80" alt="">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">
                          <a href="forum.php?page=member_lain"><?php echo $record['pengirim']; ?></a> &nbsp;
                    	  <i class="fa fa-calendar"></i> <?php echo $record['tanggal']; ?> &nbsp; 
                          <i class="fa fa-clock-o"></i>&nbsp;<?php echo $record['jam']; ?> &nbsp;
                           <?php
								if($record['id_member']==$_SESSION['id_member'])
								{
							?> 
                            <a class="pull-right" href="forum.php?page=forum_diskusi_hapuskomentar&id_komentar=<?php echo $record['id_komentar'];?>&id_topik=<?php echo $id_topik;?>"  onclick="return confirm('Apakah Anda yakin akan menghapus komentar ini ?')"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Hapus Komentar">&nbsp;</i></a>
                            
            <a class="pull-right" href="forum.php?page=forum_diskusi_editkomentar&id_komentar=<?php echo $record['id_komentar'];?>&id_topik=<?php echo $id_topik;?>&id_member=<?php echo $record['id_member'];?>" ><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Ubah Komentar">&nbsp;</i></a>
                            <?php
								}
							?>
                        </h4>
                        <p>
                        	<blockquote>
                        	<?php echo $record['isi_komentar']; ?>
                            </blockquote>
                        </p>
                      </div>
                    </div>
                    <!--end media-->
                    <hr>
        <?php 
			} 
		?> 
                  </div>
                  
                  <div class="center">
        	<h5>KOMENTAR</h5>
            <hr>
  				<p>Tambahkan komentar untuk topik <?php echo $record['judul']; ?></p>
  					<div class="bs-example">
    				<form method="post" action="forum_diskusi_simpankomentar.php?id_topik=<?php echo $id_topik;?>">
                        <input type="hidden" name="id_member" value="<?php echo $id_member; ?>" />
                        <input type="hidden" name="pengirim" value="<?php echo $nama_depan; ?> <?php echo $nama_belakang; ?>" />
                        <textarea class="form-control " rows="3" name="komentar" id="komentar"></textarea>
                        <button type="submit" class="btn btn-primary" name="kirim">&nbsp; Kirim &nbsp;</button>
                     </form>	
                    </div><!-- /.bs-example -->
                    
    	</div>
                  
        </div>
                </div>