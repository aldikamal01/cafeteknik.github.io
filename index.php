<?php
	error_reporting(0);
	include "config/koneksi.php";
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
    <meta charset="utf-8">
    <title>Website Cafe Teknik</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Allura&amp;subset=latin">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>
<meta name="description" content="Description">
<meta name="keywords" content="Keywords">




<style>.art-content .post-layout-item-0 { padding: 20px;  }
.ie7 .post .layout-cell {border:none !important; padding:0 !important; }
.ie6 .post .layout-cell {border:none !important; padding:0 !important; }

</style></head>
<?php
	if($_GET['module']=='beranda') {
		$beranda = 'active'; 
	} 
	elseif($_GET['module']=='profil') {
		$profil = 'active'; 
	} 
	elseif($_GET['module']=='berita') {
		$berita = 'active'; 
	} 
	elseif($_GET['module']=='download') {
		$download = 'active'; 
	} 
	elseif($_GET['module']=='agenda') {
		$agenda = 'active'; 
	} 
	elseif($_GET['module']=='album') {
		$album = 'active'; 
	} 
	elseif($_GET['module']=='kontak') {
		$kontak = 'active'; 
	} 

?>
<body>
<div id="art-main">
<nav class="art-nav clearfix">
    <ul class="art-hmenu">
	<li><a href="index.php?module=beranda" class="<?php echo "$beranda"; ?> ">Home</a></li>
	<li><a href="index.php?module=profil&jenis=profil" class="<?php echo "$profil";?> ">Profil</a>
	<ul>
	<li><a href="index.php?module=profil/isi-profil.html">profil</a>
	</li><li><a href="index.php?module=profil&jenis=visi">Visi</a>
	</li><li><a href="index.php?module=profil&jenis=misi">Misi</a>
	</li><li><a href="index.php?module=profil&jenis=struktur">Struktur</a></li>
	</ul>
	</li><li><a href="index.php?module=berita" class="<?php echo "$berita";?> ">Berita</a>
	</li><li><a href="index.php?module=download" class="<?php echo "$download";?> ">Download</a>
	</li><li><a href="index.php?module=agenda" class="<?php echo "$agenda";?> ">Agenda</a>
	</li><li><a href="index.php?module=album" class="<?php echo "$album";?> ">Album Foto</a>
	</li><li><a href="index.php?module=kontak" class="<?php echo "$kontak";?> ">Kontak</a></li>
	</ul> 
    </nav>
<header class="art-header clearfix">


    <div class="art-shapes">
<h1 class="art-headline" data-left="0%">
    <a href="#">Cafe Teknik</a>
</h1>

<div class="art-object0" data-left="100%"></div>
<div class="art-object306567849" data-left="0%"></div>
<div class="art-object1140282180" data-left="9.49%"></div>
<div class="art-object1456201805" data-left="0%"></div>

            </div>

                        
                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper clearfix">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-sidebar1 clearfix"><div class="art-vmenublock clearfix">
        <div class="art-vmenublockheader">
            <h3 class="t">Menu</h3>
        </div>
        <div class="art-vmenublockcontent">
		
	<ul class="art-vmenu">
		<li><a href="index.php?module=beranda"  class="<?php echo "$beranda";?> ">Home</a></li>
		<li><a href="index.php?module=profil&jenis=profil" class="<?php echo "$profil";?> ">Profil</a>
		<ul class="<?php echo "$profil";?> ">
			<li><a href="index.php?module=profil&jenis=profil">profil</a>
			</li><li><a href="index.php?module=profil&jenis=visi">Visi</a></li>
			<li><a href="index.php?module=profil&jenis=misi">Misi</a></li>
			<li><a href="index.php?module=profil&jenis=struktur">Struktur</a></li>
		</ul>
		</li>
		<li><a href="index.php?module=berita" class="<?php echo "$berita";?> ">Berita</a></li>
		<li><a href="index.php?module=download" class="<?php echo "$download";?> ">Download</a></li>
		<li><a href="index.php?module=agenda" class="<?php echo "$agenda";?> ">Agenda</a></li>
		<li><a href="index.php?module=album" class="<?php echo "$album";?> ">Album Foto</a></li>
		<li><a href="index.php?module=kontak" class="<?php echo "$kontak";?> ">Kontak</a></li>
	</ul>
                
        </div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Statistik Pengunjung</h3>
        </div>
        <div class="art-blockcontent">
		<p></p>
	
		</div>
		<?php
	$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
				$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
				$waktu   = time(); // 
				// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
				mysqli_query($konek, "SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
				// Kalau belum ada, simpan data user tersebut ke database
				if(mysqli_num_rows($s) == 0){
					mysqli_query($konek, "INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
				} 
				else{
					mysqli_query($konek, "UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
				}
				$pengunjung       = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
				$query			  = mysqli_query($konek, "SELECT count(hits) as jumlah FROM statistik"); 
				$hasil			  = mysqli_fetch_array($query);
				$totalpengunjung  = $hasil['jumlah'];
				$hits             = mysqli_fetch_assoc(mysqli_query($konek, "SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
				$query2	          = mysqli_query($konek,"SELECT SUM(hits) as total FROM statistik"); 
				$hasil2			  = mysqli_fetch_array($query2);
				$totalhits		  = $hasil2['total'];
				$bataswaktu       = time() - 300;
				$pengunjungonline = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM statistik WHERE online > '$bataswaktu' GROUP BY ip"));
				
				echo "<table widh=100%>
					<tr><td>Pengunjung hari ini </td><td> : $pengunjung </td></tr>
					<tr><td>Total pengunjung </td><td> : $totalpengunjung </td></tr>
					<tr><td>Hits hari ini </td><td> : $hits[hitstoday] </td></tr>
					<tr><td>Total hits </td><td> : $totalhits </td></tr>
					<tr><td>Pengunjung Online </td><td> : $pengunjungonline </td></tr>
					</table>";
?>

		
		
</div></div>
                        <div class="art-layout-cell art-content clearfix">
						<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell post-layout-item-0" style="width: 100%">
        <article class="art-post art-article">
		
            <h2 class="art-postheader"><a href="Blog Posts/post.html"></a></h2>
            <div class="art-postheadericons art-metadata-icons">          
            <div class="art-postfootericons art-metadata-icons">
        <?php
			include "isi.php";
		?>
                                            </div>
															
											
                        </article>
    </div>
    </div>
</div>
</div>
                        <div class="art-layout-cell art-sidebar2 clearfix"><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Pencarian</h3>
        </div>
        <div class="art-blockcontent"><div>
  <form action="index.php?module=hasil-cari" class="art-search" method="post" name="searchform">
    <input type="text" name="kata" maxlength="50" value="Pencarian..." onblur="if(this.value=='') this.value='Pencarian...';" onfocus="if(this.value=='Pencarian...') this.value='';" />

    <input type="submit" value="Search" name="search" class="art-search-button" />
  </form>
  
</div></div>
</div>
<div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Berita Terbaru</h3>
        </div>
        <div class="art-blockcontent"><div>
	<?php
	$terbaru=mysqli_query($konek, "SELECT id_berita, judul_berita FROM berita ORDER BY id_berita DESC LIMIT 10");
	while($data=mysqli_fetch_array($terbaru)){ 
		echo "<li><a href='index.php?module=detailberita&id=$data[id_berita]'>$data[judul_berita]</a></li>";
	}
			?>
			
			
			
			<div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Berita Terpopuler</h3>
        </div>
        <div class="art-blockcontent"><div>
			
	<?php
	$populer=mysqli_query($konek, "SELECT id_berita, judul_berita FROM berita ORDER BY dibaca DESC LIMIT 10");
	while($data=mysqli_fetch_array($populer)){ 
		echo "<li><a href='index.php?module=detailberita&id=$data[id_berita]'>$data[judul_berita]</a></li>";
	}

?>
</div>


  
</div></div>
</div></div>
                    </div>
                </div>
            
                    </div>
                </div>
            </div><footer class="art-footer clearfix">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 23%">
        
        <br>
        <ul>
        <li><a href="#">Kembali Keatas ↑↑↑</a></li>
        
        </ul>
    </div>
	
	<div class="art-layout-cell layout-item-0" style="width: 20%">
        <p style="font:20px 'Times New Roman';">Lokasi</p>
        <br>
        <ul>
        <li><p> Akehuda Jl. Batu Angus, Bandara no 25</p>
        </ul>
    </div>
	
	<div class="art-layout-cell layout-item-0" style="width: 18%">
        <p style="font:20px 'Times New Roman';">Layanan</p>
        <br>
        <ul>
        <li><p> Call : 0921000000</p>
		<li><p> Wa : 081340343241</p>
        </ul>
    </div>
	
	<div class="art-layout-cell layout-item-0" style="width: 39%">
        <p><a href="#"></a></p><div id="welcome" style="position: relative; display: inline-block; z-index: 0; margin: 0px;  border-width: 0px;  " class="art-collage">
<div class="art-slider art-slidecontainerwelcome">
    <div class="art-slider-inner">
	


<div class="art-slide-item art-slidewelcome3">

</div>

    </div>
</div>
<div class="art-slidenavigator art-slidenavigatorwelcome">
<a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a>
</div>


    </div>
<p></p>
    </div>
    </div>
</div>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%">
        <p style="text-align: center;"><a href="#"></a>Copyright © 2019. Web Desidned By Abdulrahim Hasibuan </p>
    </div>
    </div>
</div>

</footer>

    </div>
    <p class="art-page-footer">
        <span id="art-footnote-links"><a href="http://www.artisteer.com/" target="_blank">Web Template</a> created with Artisteer.</span>
    </p>
</div>


</body></html>