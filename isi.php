<?php
function antixss($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}



	//bagian beranda
	if ($_GET['module']=='beranda'){
		$berita=mysqli_query($konek, "SELECT * FROM berita ORDER BY id_berita DESC LIMIT 5");
		while($data=mysqli_fetch_array($berita)){
			$duser = mysqli_fetch_array(mysqli_query($konek, "Select nama_user from user where id_user='$data[id_user]'"));
			$isi_berita = strip_tags($data['isi_berita']); // membuat paragraf pada isi berita dan mengabaikan tag html
			$isi = substr($isi_berita,0,635); // ambil sebanyak 635 karakter
			$isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat      
			echo "<div class='art-content-layout-wrapper post-layout-item-1'>
				<div class='art-content-layout post-layout-item-1'>
					<div class='art-content-layout-row'>
					<div class='art-layout-cell post-layout-item-3' style='width: 100%'>
						<article class='art-post art-article'>
							<h2 class='art-postheader'><a href='index.php?module=detailberita&id=$data[id_berita]'>$data[judul_berita]</a></h2><br/>
							<small><i>diposting oleh : <b>$duser[nama_user]</b> | $data[tgl_posting]</i></small>
							<div class='art-postcontent art-postcontent-0 clearfix'>
							<div class='art-content-layout'><div class='art-content-layout-row'>
							<div class='art-layout-cell layout-item-0' style='width: 100%'>
							<p style='text-align: justify;'>
								<img width='199' height='199' alt='' class='art-lightbox' 
								src='gambar/berita/medium_$data[gambar]' style='float: left; margin-right: 10px; margin-bottom: 5px;'>
								<span style='font-weight: bold;'>
									$isi
								</span>
							</p>
							</div></div></div><br>
							<a href='index.php?module=detailberita&id=$data[id_berita]'>Selengkapnya...</a>
							</div>
						
						</article>
					</div>
					</div>
				</div>
				</div>
				<div class='art-content-layout-br post-layout-item-2'></div>";
		}

	}
	//bagian berita
	elseif ($_GET['module']=='berita'){
		$berita=mysqli_query($konek, "SELECT * FROM berita ORDER BY id_berita DESC");
		while($data=mysqli_fetch_array($berita)){
			$duser = mysqli_fetch_array(mysqli_query($konek, "Select nama_user from user where id_user='$data[id_user]'"));
			$isi_berita = strip_tags($data['isi_berita']); // membuat paragraf pada isi berita dan mengabaikan tag html
			$isi = substr($isi_berita,0,635); // ambil sebanyak 635 karakter
			$isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat      
			echo "<div class='art-content-layout-wrapper post-layout-item-1'>
				<div class='art-content-layout post-layout-item-1'>
					<div class='art-content-layout-row'>
					<div class='art-layout-cell post-layout-item-3' style='width: 100%'>
						<article class='art-post art-article'>
							<h2 class='art-postheader'><a href='index.php?module=detailberita&id=$data[id_berita]'>$data[judul_berita]</a></h2><br/>
							<small><i>diposting oleh : <b>$duser[nama_user]</b> | $data[tgl_posting]</i></small>
							<div class='art-postcontent art-postcontent-0 clearfix'>
							<div class='art-content-layout'><div class='art-content-layout-row'>
							<div class='art-layout-cell layout-item-0' style='width: 100%'>
							<p style='text-align: justify;'>
								<img width='199' height='199' alt='' class='art-lightbox' 
								src='gambar/berita/medium_$data[gambar]' style='float: left; margin-right: 10px; margin-bottom: 5px;'>
								<span style='font-weight: bold;'>
									$isi
								</span>
							</p>
							</div></div></div><br>
							<a href='index.php?module=detailberita&id=$data[id_berita]'>Selengkapnya...</a>
							</div>
						
						</article>
					</div>
					</div>
				</div>
				</div>
				<div class='art-content-layout-br post-layout-item-2'></div>";
		}

	}
	
	//bagian hasil cari
	elseif ($_GET['module']=='hasil-cari'){
		// menghilangkan spasi
		$kata = trim($_POST['kata']);
		// pisahkan kata per kalimat lalu hitung jumlah kata
		$pisah_kata = explode(" ",$kata);
		$jml_katakan = (integer)count($pisah_kata);
		$jml_kata = $jml_katakan-1;
		
		$cari = "SELECT * FROM berita WHERE " ;
		for ($i=0; $i<=$jml_kata; $i++){
		  $cari .= "judul_berita OR isi_berita LIKE '%$pisah_kata[$i]%'";
		  if ($i < $jml_kata ){
			$cari .= " OR ";
		  }
		}
		$cari .= " ORDER BY id_berita DESC LIMIT 7";
		$berita  = mysqli_query($konek, $cari);
		$ketemu = mysqli_num_rows($berita);
		if ($ketemu > 0){
			while($data=mysqli_fetch_array($berita)){
				$duser = mysqli_fetch_array(mysqli_query($konek, "Select nama_user from user where id_user='$data[id_user]'"));
				$isi_berita = strip_tags($data['isi_berita']); // membuat paragraf pada isi berita dan mengabaikan tag html
				$isi = substr($isi_berita,0,635); // ambil sebanyak 635 karakter
				$isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat      
				echo "<div class='art-content-layout-wrapper post-layout-item-1'>
					<div class='art-content-layout post-layout-item-1'>
						<div class='art-content-layout-row'>
						<div class='art-layout-cell post-layout-item-3' style='width: 100%'>
							<article class='art-post art-article'>
								<h2 class='art-postheader'><a href='index.php?module=detailberita&id=$data[id_berita]'>$data[judul_berita]</a></h2><br/>
								<small><i>diposting oleh <b>$duser[nama_user]</b> | $data[tgl_posting]</i></small>
								<div class='art-postcontent art-postcontent-0 clearfix'>
								<div class='art-content-layout'><div class='art-content-layout-row'>
								<div class='art-layout-cell layout-item-0' style='width: 100%'>
								<p style='text-align: justify;'>
									<img class='art-lightbox' 
									src='gambar/berita/medium_$data[gambar]' style='float: left; margin-right: 10px; margin-bottom: 5px;'>
									<span style='font-weight: bold;'>
										$isi
									</span>
								</p>
								</div></div></div><br>
								<a href='index.php?module=detailberita&id=$data[id_berita]'>Selengkapnya...</a>
								</div>
							
							</article>
						</div>
						</div>
					</div>
					</div>
					<div class='art-content-layout-br post-layout-item-2'></div>";
			}
		}
		else{
			echo "<p><center><h3>maaf berita yang anda cari tidak ditemukan</h3></center></p>";
		}

	}
	
	
	//bagian detail berita
	elseif ($_GET['module']=='detailberita'){
		$berita=mysqli_query($konek, "SELECT * FROM berita Where id_berita='$_GET[id]'");
		$data=mysqli_fetch_array($berita);
		$baca = $data['dibaca']+1;
		$duser = mysqli_fetch_array(mysqli_query($konek, "Select nama_user from user where id_user='$data[id_user]'"));
		mysqli_query($konek, "UPDATE berita SET dibaca=$baca WHERE id_berita='$_GET[id]'");
		echo "<div class='art-layout-cell art-content'><article class='art-post art-article'>
			<h2 class='art-postheader'>$data[judul_berita]</h2><br/>
			<small><i>diposting oleh <b>$duser[nama_user]</b> | $data[tgl_posting]</i></small>
			<div class='art-postcontent art-postcontent-0 clearfix'><div class='art-content-layout'>
			<div class='art-content-layout-row'><div class='art-layout-cell layout-item-0' style='width: 100%' >
				<p></p><p></p><hr/>
				<img class='art-lightbox' 
					src='gambar/berita/medium_$data[gambar]' style='float: left; margin-right: 10px; margin-bottom: 5px;'>
				$data[isi_berita]
				<p/><hr/>
				<h2><a href=''>berikan komentar anda..!!</a></h2>
				<form method=post action='index.php?module=aksikomentar'>
				<input type='hidden' name='id_berita' value='$data[id_berita]'>
				<table width=65%>
					<tr><td width=25%>Nama</td><td><input type='text' name='nama'></td></tr>
					<tr><td width=25%>Komentar</td><td><textarea name='komentar' style='width: 400px; height: 100px;'></textarea></td></tr>
					<tr><td colspan=2><input type=submit value='Kirim'></td></tr>
				</table></form>
				<p/><br/><table width=100%>";
				$komentar=mysqli_query($konek, "SELECT * FROM komentar Where id_berita='$data[id_berita]' 
					AND publish='Y' ORDER BY id_komentar DESC");
				while($dt=mysqli_fetch_array($komentar)){
					echo "<tr><td width=20%>$dt[nama]</td><td>$dt[komentar]</td></tr>";
				}
			echo "</table></div></div></div></div>
			</article></div>";

	}
	
	//bagian profil
	elseif ($_GET['module']=='profil'){
				if ($_GET['jenis']=='profil'){
			$jenis = 'profil';
			$judul = 'Profil Cafe Teknik';
		}
		elseif ($_GET['jenis']=='visi'){
			$jenis = 'visi';
			$judul = 'Visi Cafe Teknik';
		}
		elseif ($_GET['jenis']=='misi'){
			$jenis = 'misi';
			$judul = 'Misi Cafe Teknik';
		}
		elseif ($_GET['jenis']=='struktur'){
			$jenis = 'struktur';
			$judul = 'Struktur Cafe Teknik';
	}
	
		
		$profil=mysqli_query($konek , "SELECT * FROM profil Where jenis='$jenis'");
		$data=mysqli_fetch_array($profil);
		echo "<div class='art-layout-cell art-content'><article class='art-post art-article'>
			<h2 class='art-postheader'>$judul</h2>
			<div class='art-postcontent art-postcontent-0 clearfix'><div class='art-content-layout'>
			<div class='art-content-layout-row'><div class='art-layout-cell layout-item-0' style='width: 100%' >
				<p></p><p>$data[isi_profil]</p>
			</div></div></div></div>
			</article></div>";

	}
	//bagian download
	elseif ($_GET['module']=='download'){
				$download = mysqli_query($konek, "SELECT * FROM download ORDER BY id_download DESC");
		echo "<div class='art-layout-cell art-content'><article class='art-post art-article'>
			<h2 class='art-postheader'>Daftar File Download</h2>
			<div class='art-postcontent art-postcontent-0 clearfix'><div class='art-content-layout'>
			<div class='art-content-layout-row'>
			<div class='art-layout-cell layout-item-0' style='width: 100%' >
			<ul>";
			while($data=mysqli_fetch_array($download)){
				echo "<li><a href='downlot.php?file=$data[file]'>$data[nama_file]</a></li>";
			}
		echo "</ul></div></div></div></div></article></div>";

	}
	
	//bagian agenda
	elseif ($_GET['module']=='agenda'){
		$agenda = mysqli_query($konek, "SELECT * FROM agenda ORDER BY id_agenda DESC");
		echo "<div class='art-layout-cell art-content'><article class='art-post art-article'>
			<h2 class='art-postheader'>Daftar Agenda</h2>
			<div class='art-postcontent art-postcontent-0 clearfix'><div class='art-content-layout'>
			<div class='art-content-layout-row'>
			<div class='art-layout-cell layout-item-0' style='width: 100%' ><p/><hr/>";
			while($data=mysqli_fetch_array($agenda)){
				echo "<h2 class='art-postheader'>$data[tema]</h2>
				<p style='text-align: justify;'>
				<span style='font-weight: bold;'>
					$data[isi_agenda]
				</span>
				</p><div class='art-content-layout-br post-layout-item-2'></div>";
			}
		echo "</div></div></div></div></article></div>";

	}
	
	//bagian album
	elseif ($_GET['module']=='album'){
		$album = mysqli_query($konek, "SELECT * FROM album ORDER BY id_album DESC");
		$col = 4;
		echo "<div class='art-layout-cell art-content'><article class='art-post art-article'>
			<h2 class='art-postheader'>Daftar Album</h2>
			<div class='art-postcontent art-postcontent-0 clearfix'><div class='art-content-layout'>
			<div class='art-content-layout-row'>
			<div class='art-layout-cell layout-item-0' style='width: 100%' >
			<table align=center><tr>";
			$cnt = 0;
			while ($data = mysqli_fetch_array($album)) {
				if ($cnt >= $col) {
					echo "</tr><tr>";
					$cnt = 0;
				}
				$cnt++;
				echo "<td align=center valign=top><br />
					<a href='index.php?module=foto&id=$data[id_album]'>
					<img width='170' height='170' alt='$data[judul_album]' src='gambar/album/medium_$data[gambar_album]'>
					<br />$data[judul_album]</a></td>";
			}
			echo "</tr></table></div></div></div></div></article></div>";

	}
	
	//bagian foto
	elseif ($_GET['module']=='foto'){
		$foto = mysqli_query($konek,"SELECT * FROM foto Where id_album='$_GET[id]' ORDER BY id_foto DESC");
		$col = 4;
		echo "<div class='art-layout-cell art-content'><article class='art-post art-article'>
			<h2 class='art-postheader'>Daftar Foto</h2>
			<div class='art-postcontent art-postcontent-0 clearfix'><div class='art-content-layout'>
			<div class='art-content-layout-row'>
			<div class='art-layout-cell layout-item-0' style='width: 100%' >
			<table align=center><tr>";
			$cnt = 0;
			while ($data = mysqli_fetch_array($foto)) {
				if ($cnt >= $col) {
					echo "</tr><tr>";
					$cnt = 0;
				}
				$cnt++;
				echo "<td align=center valign=top><br />
					<img width='170' height='170' class='art-lightbox' alt='$data[keterangan]' src='gambar/foto/medium_$data[nama_foto]'>
					</td>";
			}
			echo "</tr></table></div></div></div></div></article></div>";

	}
	
	//bagian kontak
	elseif ($_GET['module']=='kontak'){
			echo "<div class='art-layout-cell art-content'><article class='art-post art-article'>
			<h2 class='art-postheader'>Hubungi Kami</h2>
			<div class='art-postcontent art-postcontent-0 clearfix'><div class='art-content-layout'>
			<div class='art-content-layout-row'>
			<div class='art-layout-cell layout-item-0' style='width: 100%' >
			hubungi kami secara online dengan mengisi formulir di bawah in : <p/>
			<form method=post action='index.php?module=aksikontak'>
				<table width=65%>
					<tr><td width=25%>Nama</td><td><input type='text' name='nama'></td></tr>
					<tr><td width=25%>Email</td><td><input type='text' name='email'></td></tr>
					<tr><td width=25%>Subjek</td><td><input type='text' name='subjek'></td></tr>
					<tr><td width=25%>Pesan</td><td><textarea name='pesan' style='width: 400px; height: 100px;'></textarea></td></tr>
					<tr><td colspan=2><input type=submit value='Kirim'></td></tr>
				</table></form>
			</div></div></div></div></article></div>";

	}
	
	//bagian aksi kontak
	elseif ($_GET['module']=='aksikontak'){
		$nama=trim($_POST['nama']);
		$email=trim($_POST['email']);
		$subjek=trim($_POST['subjek']);
		$pesan=trim($_POST['pesan']);
		$tgl_sekarang = date("Ymd");
		if (empty($nama)){
		  echo "Anda belum mengisikan NAMA<br /><br />
				  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
		}
		elseif (empty($email)){
		  echo "Anda belum mengisikan EMAIL<br /><br />
				  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
		}
		elseif (empty($subjek)){
		  echo "Anda belum mengisikan SUBJEK<br /><br />
				  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
		}
		elseif (empty($pesan)){
		  echo "Anda belum mengisikan PESAN<br /><br />
				  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
		}
		else{
			mysqli_query($konek, "INSERT INTO hubungi(nama, email, subjek, pesan,tanggal) 
                        VALUES('$_POST[nama]', '$_POST[email]', '$_POST[subjek]','$_POST[pesan]', '$tgl_sekarang')");
			echo "<p>&nbsp;</p>
				<p align=center><b>Terimakasih telah menghubungi kami. <br /> Kami akan segera meresponnya.</b></p>";
		}

	}
	
	//bagian aksi komentar
	elseif ($_GET['module']=='aksikomentar'){
		$nama=trim($_POST['nama']);
		$komentar=trim($_POST['komentar']);
		
		if (empty($nama)){
		  echo "Anda belum mengisikan NAMA<br /><br />
				  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
		}
		elseif (empty($komentar)){
		  echo "Anda belum mengisikan KOMENTAR<br /><br />
				  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
		}
		else{
			mysqli_query($konek, "INSERT INTO komentar(id_berita, nama, komentar) 
                        VALUES('$_POST[id_berita]', '$nama', '$komentar')");
			echo "<script>window.alert('Terimakasih telah memberi komentar, kami akan moderasi komentar anda sebelum ditampilakan');
			window.location=('index.php?module=detailberita&id=$_POST[id_berita]')</script>";
		}

	}
	
	//jika tidak ada yang di get
	else{
				$berita=mysqli_query($konek, "SELECT * FROM berita ORDER BY id_berita DESC LIMIT 5");
		while($data=mysqli_fetch_array($berita)){
			$isi_berita = strip_tags($data['isi_berita']); // membuat paragraf pada isi berita dan mengabaikan tag html
			$isi = substr($isi_berita,0,635); // ambil sebanyak 635 karakter
			$isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat      
			echo "<div class='art-content-layout-wrapper post-layout-item-1'>
				<div class='art-content-layout post-layout-item-1'>
					<div class='art-content-layout-row'>
					<div class='art-layout-cell post-layout-item-3' style='width: 100%'>
						<article class='art-post art-article'>
							<h2 class='art-postheader'><a href='index.php?module=detailberita&id=$data[id_berita]'>$data[judul_berita]</a></h2>
							<div class='art-postcontent art-postcontent-0 clearfix'>
							<div class='art-content-layout'><div class='art-content-layout-row'>
							<div class='art-layout-cell layout-item-0' style='width: 100%'>
							<p style='text-align: justify;'>
								<img width='199' height='199' alt='' class='art-lightbox' 
								src='gambar/berita/$data[gambar]' style='float: left; margin-right: 10px; margin-bottom: 5px;'>
								<span style='font-weight: bold;'>
									$isi
								</span>
							</p>
							</div></div></div><br>
							<a href='index.php?module=detailberita&id=$data[id_berita]'>Selengkapnya...</a>
							</div>
						
						</article>
					</div>
					</div>
				</div>
				</div>
				<div class='art-content-layout-br post-layout-item-2'></div>";
		}

	}
?>
