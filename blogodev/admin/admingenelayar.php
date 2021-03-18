
<!DOCTYPE html>
<html>
<head>

  <link href="css/styles.css" rel="stylesheet">

</head>
<body>
  <?php include 'adminheader.php';?>


  <?php 

  $ayar=$db->prepare("SELECT * FROM ayarlar");
  $ayar->execute();
  $ayarcek=$ayar->fetch(PDO::FETCH_ASSOC);
  ?>

  <div class="page-content">
   <div class="row">

    <!-- sol menüyü çekiyoruz -->

    <div class="col-md-2">
     <?php include 'adminsolmenu.php'; ?>
   </div>


   <!-- içerik kısmı burada -->

   <div class="col-md-5">


    <?php 

    extract($_GET);

    // EĞER UPDATE DEĞİŞKENİ DOLUYSA AŞAĞIDAKİ MESAJLARI VERMESİNİ SAĞLADIM
    
    if (isset($update)) { 


      if ($update=="bos") {?>

        <div class="alert alert-warning">Lütfen Tüm Alanları Doldurun..</div>

      <?php } elseif($update=="no") { ?>

        <div class="alert alert-danger">Kaydetme İşlemi Başarısız. Bir Hata Meydana Geldi..</div>

      <?php } elseif($update=="yes") {?>

        <div class="alert alert-success">Kayıt Ekleme Başarılı..</div>

      <?php } } ?>



      <!-- BURASI TEXTBOXLAR FALAN -->

      <div class="panel-body">

        <form method="POST" action="adminislem.php">

          <div class="form-group">
            <label>Blog Başlığı</label>
            <input class="form-control" name="blogbaslik" value="<?php echo $ayarcek["blogbaslik"] ?>">
          </div>

          <div class="form-group">
            <label>Blog URL</label>
            <input class="form-control" name="blogurl" value="<?php echo $ayarcek["blogurl"] ?>">
          </div>


          <div class="form-group">
            <label>Blog Açıklama</label>
            <input class="form-control" name="blogaciklama" value="<?php echo $ayarcek["blogaciklama"] ?>">
          </div>


          <div class="form-group">
            <label>Blog Anahtar Kelimeler</label>
            <input class="form-control" name="bloganahtarkelime" value="<?php echo $ayarcek["bloganahtarkelime"] ?>">
          </div>

          <br>
          <button class="btn btn-primary" style="width: 100px;" type="submit" name="genelayar">Kaydet</button>

        </form>


      </div>

    </div>

    <!-- içerik kısmını sınırlamak için -->
    <div class="col-md-5"> 
    </div>


  </div>
</div>

<br><br><br><br><br><br><br>
    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Tüm Hakları Saklıdır 2020 <a href=''>Ahmet YILDIZ</a>
            </div>
            
         </div>
      </footer>

</body>
</html>