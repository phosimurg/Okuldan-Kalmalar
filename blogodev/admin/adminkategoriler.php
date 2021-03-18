

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

   <div class="col-md-10">


    <?php 

    extract($_GET);

    // EĞER UPDATE DEĞİŞKENİ DOLUYSA AŞAĞIDAKİ MESAJLARI VERMESİNİ SAĞLADIM
    
    if (isset($update)) { 


      if ($update=="bos") {?>

        <div class="alert alert-warning">Lütfen Tüm Alanları Doldurun..</div>

      <?php } elseif($update=="no") { ?>

        <div class="alert alert-danger">İşlem Başarısız. Bir Hata Meydana Geldi..</div>

      <?php } elseif($update=="yes") {?>

        <div class="alert alert-success">İşlem Başarılı..</div>

      <?php } elseif ($update=="buyuk") { ?>

        <div class="alert alert-warning">Fotoğraf Boyutu Büyük..</div>

      <?php } elseif ($update=="gecersizuzanti") {?>

        <div class="alert alert-warning">Fotoğraf Uzantısı Geçersiz..</div>

      <?php }} ?>




      <!-- BURASI TEXTBOXLAR FALAN -->

      <div class="panel-body">

        <div class="content-box-large">
          <div class="panel-heading">
           <i class="fa fa-tags"></i>&nbspKategoriler
           <a href="adminkategoriekle.php" class="btn btn-warning pull-right"><i class="fas fa-plus"></i>&nbspYeni Kategori Ekle</a>
         </div>
         <div class="panel-body">
          <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>

              <tr>
                <th>#</th>
                <th>Kategori Adı</th>
                <th>Yazı Sayısı</th>              
                <th>İşlemler</th>
              </tr>

            </thead>
            <tbody>

              <?php 

              $kategori=$db->prepare("SELECT * FROM kategoriler ORDER BY kategoriid DESC");
              $kategori-> execute();
              $kategorial = $kategori->fetchALL(PDO::FETCH_ASSOC);
              $kategorisay = $kategori->rowCount();

              if ($kategorisay) {
                foreach ($kategorial as $row) { 



                  $yazilar=$db->prepare("SELECT * FROM yazilar WHERE yazikategoriid=?");
                  $yazilar-> execute(array($row["kategoriid"]));
                  $yazilar->fetchALL(PDO::FETCH_ASSOC);
                  $yazisay = $yazilar->rowCount();


                  ?>


                  <tr class="odd gradeX">

                    <td><?php echo $row["kategoriid"] ?></td>

                    <td><?php echo $row["kategoriad"] ?></td>

                    <td class="center"> <?php echo $yazisay ?></td>
                    
                    <td class="center">

                      <a href="adminkategoriduzenle.php?kategoriid=<?php echo $row["kategoriid"] ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>Düzenle</button></a>

                      <a href="adminislem.php?kategorisilid=<?php echo $row["kategoriid"] ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Sil</button></a>

                    </td>
                  </tr>


                <?php } } ?>


              </tbody>
            </table>
          </div>
        </div>



      </div>
    </div>
  </div>


</div>

</div>



</div>
</div>

<br><br><br><br>
<footer>
 <div class="container">

  <div class="copy text-center">
    Tüm Hakları Saklıdır <a href='#'>Ahmet YILDIZ</a>
  </div>

</div>
</footer>



<link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>

<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->



<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

<script src="vendors/datatables/dataTables.bootstrap.js"></script>


<script src="js/tables.js"></script>


</body>
</html>