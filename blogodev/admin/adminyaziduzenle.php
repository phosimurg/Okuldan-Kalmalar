

<!DOCTYPE html>
<html>
<head>

  <link href="css/styles.css" rel="stylesheet">

</head>
<body>
  <?php include 'adminheader.php';?>


  <?php 
  $yaziid=$_GET["yaziid"];
  $yazi=$db->prepare("SELECT * FROM yazilar WHERE yaziid=?");
  $yazi->execute(array($yaziid));
  $yazicek=$yazi->fetch(PDO::FETCH_ASSOC);
  ?>

  <div class="page-content">
   <div class="row">

    <!-- sol menüyü çekiyoruz -->

    <div class="col-md-2">
     <?php include 'adminsolmenu.php'; ?>
   </div>


   <!-- içerik kısmı burada -->

   <div class="col-md-7">


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

      <?php } elseif ($update=="buyuk") { ?>

        <div class="alert alert-warning">Fotoğraf Boyutu Büyük..</div>

      <?php } } ?>



      <!-- BURASI TEXTBOXLAR FALAN -->

      <div class="panel-body">

        <form method="POST" enctype="multipart/form-data" action="adminislem.php?yaziid=<?php echo $yaziid ?>">

          <div class="form-group">
            <label>Yazı Fotoğraf</label>
            <img class="img-thumbnail form-control" style="width: 100%; height: 300px;" alt="<?php echo $yazicek["yazibaslik"] ?>" src="../img/<?php echo $yazicek["yazifoto"] ?>">
          </div>

          <div class="form-group">
            <label>Fotoğraf Seç</label>
            <input type="file" class="form-control" name="yazifoto">
          </div>


          <div class="form-group">
            <label>Yazı Başlığı</label>
            <input class="form-control" name="yazibaslik" value="<?php echo $yazicek["yazibaslik"] ?>">
          </div>

          <div class="form-group">
            <label>Yazı Kategorisi</label>
            <select class="form-control" name="yazikategori">
             <?php 
             $kategoriler=$db->prepare("SELECT * FROM kategoriler");
             $kategoriler->execute();
             $kategoricek = $kategoriler->fetchALL(PDO::FETCH_ASSOC);

             foreach ($kategoricek as $row ) { ?>

              <option value="<?php echo $row["kategoriid"] ?>" <?php echo $yazicek["yazikategoriid"]==$row["kategoriid"] ? "selected" : null;?>>
                <?php echo $row["kategoriad"] ?>
              </option>  

            <?php } ?>
          </select>
        </div>


        <div class="form-group">
          <label>Yazı Tarihi</label>
          <input class="form-control"  value="<?php echo $yazicek["yazitarih"] ?>" disabled>
        </div>


        <div class="form-group">
          <label>Okunma Sayısı</label>
          <input class="form-control" value="<?php echo $yazicek["yaziokunma"] ?>" disabled>
        </div>


        <div class="form-group">
          <label>İçerik Düzenle</label>
          <textarea name="yaziicerik" class="ckeditor">
           <?php echo $yazicek["yaziicerik"] ?>
         </textarea>
       </div>

       <br>
       <button class="btn btn-primary btn-lg" style="width: 100px;" type="submit" name="yaziedit">Kaydet</button>

     </form>


   </div>

 </div>

 <!-- içerik kısmını sınırlamak için -->
 <div class="col-md-3"> 
 </div>


</div>
</div>

<br><br><br><br>
<footer>
 <div class="container">

  <div class="copy text-center">
   Copyright 2014 <a href='#'>Website</a>
 </div>

</div>
</footer>


</body>
</html>