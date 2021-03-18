

<!DOCTYPE html>
<html>
<head>

  <link href="css/styles.css" rel="stylesheet">

</head>
<body>
  <?php include 'adminheader.php';?>


  <?php 


  $adminid=1;

  $admin=$db->prepare("SELECT * FROM admin WHERE adminid=?");
  $admin->execute(array($adminid));
  $admincek=$admin->fetch(PDO::FETCH_ASSOC);
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

        <div class="alert alert-danger">İşlem Başarısız. Bir Hata Meydana Geldi..</div>

      <?php } elseif($update=="yes") {?>

        <div class="alert alert-success">İşlem Başarılı..</div>


      <?php }} ?>




  <!-- BURASI TEXTBOXLAR FALAN -->

  <div class="panel-body">

    <form method="POST"  action="adminislem.php?adminid=<?php echo $admincek["adminid"] ?>">


      <div class="form-group">
        <label>Kullanıcı Adı Değiştir</label>
        <input class="form-control" name="adminkadi" value="<?php echo $admincek["adminkadi"] ?>">
      </div>

      <div class="form-group">
        <label>Kullanıcı şifre Değiştir</label>
        <input class="form-control" name="adminpass" value="<?php echo $admincek["adminpass"] ?>">
      </div>

      <br>
      <button class="btn btn-primary btn-md"  type="submit" name="adminbilgidegistir">Kaydet</button>

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