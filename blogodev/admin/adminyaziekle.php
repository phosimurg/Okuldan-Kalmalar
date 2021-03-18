

<!DOCTYPE html>
<html>
<head>

  <link href="css/styles.css" rel="stylesheet">

</head>
<body>
  <?php include 'adminheader.php';?>


  

  <div class="page-content">
   <div class="row">

    <!-- sol menüyü çekiyoruz -->

    <div class="col-md-2">
     <?php include 'adminsolmenu.php'; ?>
   </div>


   <!-- içerik kısmı burada -->

   <div class="col-md-7">


      <!-- BURASI TEXTBOXLAR FALAN -->

      <div class="panel-body">

        <form method="POST" enctype="multipart/form-data" action="adminislem.php">

         

          <div class="form-group">
            <label>Fotoğraf Yükle</label>
            <input type="file" class="form-control" name="yazifoto">
          </div>


          <div class="form-group">
            <label>Yazı Başlığı</label>
            <input class="form-control" name="yazibaslik" placeholder="Yazı Başlığını Girin..">
          </div>

          <div class="form-group">
            <label>Yazı Kategorisi</label>
            <select class="form-control" name="yazikategori">
             <?php 
             $kategoriler=$db->prepare("SELECT * FROM kategoriler");
             $kategoriler->execute();
             $kategoricek = $kategoriler->fetchALL(PDO::FETCH_ASSOC);

             foreach ($kategoricek as $row ) { ?>

              <option value="<?php echo $row["kategoriid"] ?>">
                <?php echo $row["kategoriad"] ?>
              </option>  

            <?php } ?>
          </select>
        </div>


      

        <div class="form-group">
          <label>İçerik Düzenle</label>
          <textarea name="yaziicerik" placeholder="Blog Yazısını Girin.." class="ckeditor">
           
         </textarea>
       </div>

       <br>
       <button class="btn btn-primary btn-lg"  type="submit" name="yaziekle"><i class="fas fa-plus"></i>&nbspYazı Ekle</button>

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