<?php 


include '../sistem/baglan.php';
extract($_POST);



// GENEL AYARLAR KAYDET İŞLEMİ

if (isset($genelayar)) {
	


	if (!$blogbaslik || !$blogurl || !$blogaciklama || !$bloganahtarkelime) {
		
		header("Location:admingenelayar.php?update=bos");
	}

	else{

		$ayar=$db->prepare("UPDATE ayarlar SET blogbaslik=?, blogurl=?, blogaciklama=?, bloganahtarkelime=? WHERE blogid=?");

		$update=$ayar->execute(array($blogbaslik, $blogurl, $blogaciklama, $bloganahtarkelime, 1));


		if ($update) {
			header("Location:admingenelayar.php?update=yes" );
		}

		else{
			header("Location:admingenelayar.php?update=no" );
		}
	}	
}





// SOSYAL MEDYA AYARLAR DÜZENLEME

if (isset($sosyalmedya)) {



	if (!$bloginsta || !$bloglinkedin || !$blogagithub) {
		
		header("Location:adminsosyalmedya.php?update=bos");
	}

	else{

		$ayar=$db->prepare("UPDATE ayarlar SET bloginsta=?, bloglinkedin=?, bloggithub=? WHERE blogid=?");

		$update=$ayar->execute(array($bloginsta, $bloglinkedin, $bloggithub, 1));


		if ($update) {
			header("Location:adminsosyalmedya.php?update=yes" );
		}

		else{
			header("Location:adminsosyalmedya.php?update=no" );
		}
	}	
}



// YAZI DÜZENLE İŞLEMİ

$Dosyaturu = array("image/jpeg","image/jpg","image/png","image/x-png");
$Dosyauzanti=array("jpeg","jpg","png","x-png");
if (isset($yaziedit)) {

	// eğer foto değişirse çalışsın bakalım

	if ($_FILES["yazifoto"]["size"] > 0 ) {

		$yaziid=$_GET["yaziid"];

		$kaynak = $_FILES["yazifoto"]["tmp_name"];
		$isim = $_FILES["yazifoto"]["name"];
		$boyut = $_FILES["yazifoto"]["size"];
		$turu = $_FILES["yazifoto"]["type"];

		$uzanti = substr($isim,strpos($isim, ".")+1);
		$resimAd = rand()."_".$isim;
		$hedef="../img/".$resimAd;
		if ($kaynak) {
			if (!in_array($uzanti, $Dosyauzanti) && !in_array($turu, $Dosyaturu)) {
				header("Location: adminyazilar.php?update=gecersizuzanti");
			}elseif ($boyut > 1024 * 1024) {
				header("Location: adminyazilar.php?update=buyuk");
			}else{
				$sil= $db->prepare("SELECT * FROM yazilar WHERE yaziid=?");
				$sil->execute(array($yaziid));
				$eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
				$eski_resim["yazifoto"];

				unlink("../img/".$eski_resim["yazifoto"]);

				if (move_uploaded_file($kaynak, $hedef)) {
					$yukle = $db->prepare("UPDATE yazilar SET yazifoto=?, yazibaslik=?,yazikategoriid=?, yaziicerik=? WHERE yaziid=?");
					$update = $yukle->execute(array($resimAd,$yazibaslik,$yazikategori,$yaziicerik,$yaziid));

					if ($update) {
						header("Location: adminyazilar.php?update=yes");
					}else{
						header("Location: adminyazilar.php?update=no");
					}
				}
			}
		}
	}else{ 

		$yaziid = $_GET["yaziid"];
		if (!$yazibaslik || !$yaziicerik  || !$yazikategori ) {
			header("Location: adminyazilar.php?update=bos");
		}
		else{

			$yukle = $db->prepare("UPDATE yazilar SET yazibaslik=?, yazikategoriid=?, yaziicerik=? WHERE yaziid=?");
			$update = $yukle->execute(array($yazibaslik,$yazikategori,$yaziicerik,$yaziid));

			if ($update) {
				header("Location: adminyazilar.php?update=yes");
			}else{
				header("Location: adminyazilar.php?update=no");
			}


		}
	}
}



// YAZI SİLME İŞLEMİ

$yazidelete=$_GET["yazisilid"];

if (isset($yazidelete)) {
	
	// Yazının resmini silelim
	$sil= $db->prepare("SELECT * FROM yazilar WHERE yaziid=?");
	$sil->execute(array($yazidelete));
	$eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
	$eski_resim["yazifoto"];

	unlink("../img/".$eski_resim["yazifoto"]);


	$delete = $db->prepare("DELETE FROM yazilar WHERE yaziid=?");
	$silbakalim = $delete->execute(array($yazidelete));


	if ($silbakalim) 
	{
		header("Location: adminyazilar.php?update=yes");
	}else{
		header("Location: adminyazilar.php?update=no");
	}


}




// YAZI EKLEME İŞLEMİ


$Dosyaturu = array("image/jpeg","image/jpg","image/png","image/x-png");
$Dosyauzanti=array("jpeg","jpg","png","x-png");
if (isset($yaziekle)) {


	$kaynak = $_FILES["yazifoto"]["tmp_name"];
	$isim = $_FILES["yazifoto"]["name"];
	$boyut = $_FILES["yazifoto"]["size"];
	$turu = $_FILES["yazifoto"]["type"];

	$uzanti = substr($isim,strpos($isim, ".")+1);
	$resimAd = rand()."_".$isim;
	$hedef="../img/".$resimAd;
	if ($kaynak) {
		if (!in_array($uzanti, $Dosyauzanti) && !in_array($turu, $Dosyaturu)) {
			header("Location: adminyazilar.php?update=gecersizuzanti");
		}elseif ($boyut > 1024 * 1024) {
			header("Location: adminyazilar.php?update=buyuk");
		}else{

			if (move_uploaded_file($kaynak, $hedef)) {
				$yukle = $db->prepare("INSERT INTO yazilar SET yazifoto=?, yazibaslik=?,yazikategoriid=?, yaziicerik=? ");
				$eklebakalim = $yukle->execute(array($resimAd,$yazibaslik,$yazikategori,$yaziicerik));

				if ($eklebakalim) {
					header("Location: adminyazilar.php?update=yes");
				}else{
					header("Location: adminyazilar.php?update=no");
				}

			}
		}
	}
}





// KATEGORİ EKLEME 

if (isset($kategoriekle)) {



	if (!$kategoriad) {
		
		header("Location:adminkategoriler.php?update=bos");
	}

	else{

		$kategori=$db->prepare("INSERT INTO kategoriler SET kategoriad=?");

		$ekle=$kategori->execute(array($kategoriad));


		if ($ekle) {
			header("Location:adminkategoriler.php?update=yes");
		}

		else{
			header("Location:adminkategoriler.php?update=no");
		}
	}	
}







// KATEGORİ DÜZENLEME 

$kategoriid=$_GET["kategoriid"];

if (isset($kategoriduzenle)) {



	if (!$kategoriad) {
		
		header("Location:adminkategoriler.php?update=bos");
	}

	else{

		$kategori=$db->prepare("UPDATE kategoriler SET kategoriad=? WHERE kategoriid=?");

		$update=$kategori->execute(array($kategoriad,$kategoriid));


		if ($update) {
			header("Location:adminkategoriler.php?update=yes");
		}

		else{
			header("Location:adminkategoriler.php?update=no");
		}
	}	
}





// KATEGORİ SİL 

$kategorisil=$_GET["kategorisilid"];

if (isset($kategorisil)) {


	$kategori=$db->prepare("DELETE FROM kategoriler  WHERE kategoriid=?");

	$silbaba=$kategori->execute(array($kategorisil));


	if ($silbaba) {
		header("Location:adminkategoriler.php?update=yes");
	}

	else{
		header("Location:adminkategoriler.php?update=no");
	}
}	




// ADMİN BİLGİLERİ GÜNCELLE

extract($_POST);
$adminid=$_GET["adminid"];

if (isset($adminbilgidegistir)) {



	if (!$adminkadi) {
		
		header("Location:adminprofil.php?update=bos");
	}

	else{

		$adminguncelle=$db->prepare("UPDATE admin SET adminkadi=?, adminpass=? WHERE adminid=?");

		$adminupdate=$adminguncelle->execute(array($adminkadi,$adminpass,$adminid));


		if ($adminupdate) {
			header("Location:adminprofil.php?update=yes" );
		}

		else{
			header("Location:adminprofil.php?update=no" );
		}

	}	

}





// ADMİN GİRİŞ İŞLEMİ

if (isset($giris)) {

	$kadi=htmlspecialchars(trim($adminkadi));

	$pass=htmlspecialchars(md5($adminpass));

	if (!$kadi || !$pass) {
		
		header("Location: adminlogin.php?giris=bos");
	}

	else{

		$query=$db->prepare("SELECT * FROM admin WHERE adminkadi=? AND adminpass=?");
		$query->execute(array($kadi,$pass));

		$admin_giris=$query->fetch(PDO::FETCH_ASSOC);


		if ($admin_giris) {

			$_SESSION['login']=true;
			$_SESSION['adminkadi']=$admin_giris['adminkadi'];

			$_SESSION['adminid']=$admin_giris['adminid'];

			header("Location: adminindex.php");

		}

		else{

			header("Location:adminlogin.php?giris=no");

		}


	}

} 


?>