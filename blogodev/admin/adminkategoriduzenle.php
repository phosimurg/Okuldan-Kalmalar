

<!DOCTYPE html>
<html>
<head>

  <link href="css/styles.css" rel="stylesheet">

</head>
<body>
  <?php include 'adminheader.php';?>


 <?php 
  $kategoriid=$_GET["kategoriid"];
  $kategori=$db->prepare("SELECT * FROM kategoriler WHERE kategoriid=?");
  $kategori->execute(array($kategoriid));
  $kategoricek=$kategori->fetch(PDO::FETCH_ASSOC);
  ?>
  

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

      <form method="POST"  action="adminislem.php?kategoriid=<?php echo $kategoricek["kategoriid"] ?>">


        <div class="form-group">
          <label>Kategori Adı</label>
          <input class="form-control" name="kategoriad" value="<?php echo $kategoricek["kategoriad"] ?>">
        </div>

        <br>
        <button class="btn btn-primary btn-md"  type="submit" name="kategoriduzenle">Kaydet</button>

      </form>


    </div>

  </div>

  <!-- içerik kısmını sınırlamak için -->
  <div class="col-md-3"> 
  </div>


</div>
</div>

<br><br><br><br><br><br><br><br>
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