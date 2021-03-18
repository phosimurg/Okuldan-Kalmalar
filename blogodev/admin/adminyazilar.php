

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
           <i class="fa fa-list"></i>&nbspYAZILAR
           <a href="adminyaziekle.php" class="btn btn-warning pull-right"><i class="fas fa-plus"></i>&nbspYeni Yazı Ekle</a>
         </div>
         <div class="panel-body">
          <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>

              <tr>
                <th>#</th>
                <th>Fotoğraf</th>
                <th>Başlık</th>
                <th>Kategori</th>
                <th>Okunma</th>
                <th>Tarih</th>
                <th>İşlemler</th>
              </tr>

            </thead>
            <tbody>

              <?php 

              $yazi=$db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategoriid=yazilar.yazikategoriid ORDER BY yaziid DESC");
              $yazi-> execute();
              $yazicek = $yazi->fetchALL(PDO::FETCH_ASSOC);
              $yazisay = $yazi->rowCount();

              if ($yazisay) {
                foreach ($yazicek as $row) { ?>



                  <tr class="odd gradeX">

                    <td><?php echo $row["yaziid"] ?></td>

                    <td><img class="img-thumbnail" src="../img/<?php echo $row["yazifoto"] ?>" alt="<?php echo $row["yazibaslik"] ?>" style="width:70px; height: 70px;"></td>

                    <td><?php echo $row["yazibaslik"] ?></td>

                    <td class="center"> <?php echo $row["kategoriad"] ?></td>
                    <td class="center"><?php echo $row["yaziokunma"] ?></td>
                    <td class="center"><?php echo $row["yazitarih"] ?></td>
                    <td class="center">

                      <a href="adminyaziduzenle.php?yaziid=<?php echo $row["yaziid"] ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>Düzenle</button></a>

                      <a href="adminislem.php?yazisilid=<?php echo $row["yaziid"] ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Sil</button></a>

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