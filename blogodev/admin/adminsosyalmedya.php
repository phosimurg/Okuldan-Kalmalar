

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
            <label>Instagram Hesap Adresi</label>
            <input class="form-control" name="bloginsta" value="<?php echo $ayarcek["bloginsta"] ?>">
          </div>

          <div class="form-group">
            <label>Linkedin Hesap Adresi</label>
            <input class="form-control" name="bloglinkedin" value="<?php echo $ayarcek["bloglinkedin"] ?>">
          </div>


          <div class="form-group">
            <label>Github Hesap Adresi</label>
            <input class="form-control" name="bloggithub" value="<?php echo $ayarcek["bloggithub"] ?>">
          </div>


        

          <br>
          <button class="btn btn-primary" style="width: 100px;" type="submit" name="sosyalmedya">Kaydet</button>

        </form>


      </div>

    </div>

    <!-- içerik kısmını sınırlamak için -->
    <div class="col-md-5"> 
    </div>


  </div>
</div>

<br><br><br><br>
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