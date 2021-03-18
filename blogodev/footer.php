

<br><br><br>
<footer class="page-footer font-small stylish-color-dark pt-4 bg-dark text-white">

  <!-- Footer Linkler -->
  <div class="container text-center text-md-left">

    <!-- satır -->
    <div class="row">

      <!-- kolon -->
      <div class="col-md-3 mx-auto" align="center"  >

        <!-- içerik -->
        <h5 class="font-weight-bold text-uppercase mt-3 ">Sosyal Medya</h5>
        

        <!-- sosyal medya -->
        <ul class="list-unstyled list-inline text-center" style="font-size:40px; "  >
          <li class="list-inline-item">
            <a class="btn-floating btn-fb mx-1" target="_blank" href="https://www.instagram.com/phosimurgtr/"> 
              <i class="fab fa-instagram"> </i>
            </a>
          </li>

          <li class="list-inline-item">
            <a class="btn-floating btn-li mx-1" target="_blank"href="https://www.linkedin.com/in/ahmet-y%C4%B1ld%C4%B1z-ab5824183/" >
              <i class="fab fa-linkedin-in"> </i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn-floating btn-dribbble mx-1" target="_blank" href="https://github.com/phoenix2071">
              <i class="fab fa-github"> </i>
            </a>
          </li>
        </ul>
        <!-- sosyal medya -->

      </div>
      <!-- kolon -->


      <hr class="clearfix w-100 d-md-none">


      <div class="col-md-4 mx-auto" >

        <!-- Linkler -->
        <h5 align="center" class="font-weight-bold text-uppercase mt-3 mb-4">En Popüler Yazılar</h5>

        <ul class="list-unstyled"  >


          <?php 

            $yazi1 = $db->prepare("SELECT * FROM yazilar  ORDER BY yaziokunma DESC LIMIT 3");
            $yazi1->execute(); 

            $yazicek1=$yazi1->fetchALL(PDO::FETCH_ASSOC);

            foreach ($yazicek1 as $row1) { ?>


          <li class="card-header">
           <a href="yazidetay.php?yaziid=<?php echo $row1["yaziid"] ?>"><img src="img/<?php echo $row1["yazifoto"] ?>" style="width: 30px; height: 30px;"></a> 
            
            <a style="text-decoration: none;" href="yazidetay.php?yaziid=<?php echo $row1["yaziid"] ?>"><?php echo mb_strimwidth($row1["yazibaslik"], 0, 20,"...") ?></a>
          </li>
        
          <?php } ?>

        </ul>

      </div>
      <!-- kolon -->

      <hr class="clearfix w-100 d-md-none">

      <!-- kolon -->
      <div class="col-md-4 mx-auto">

        <!-- Linkler -->
        <h5 align="center" class="font-weight-bold text-uppercase mt-3 mb-4">Son Eklenen Yazılar</h5>


        <ul class="list-unstyled" >

          <?php 

            $yazi2 = $db->prepare("SELECT * FROM yazilar  ORDER BY yaziid DESC LIMIT 3");
            $yazi2->execute(); 

            $yazicek2=$yazi2->fetchALL(PDO::FETCH_ASSOC);

            foreach ($yazicek2 as $row2) { ?>


          <li class="card-header" >

           <a href="yazidetay.php?yaziid=<?php echo $row2["yaziid"] ?>"><img src="img/<?php echo $row2["yazifoto"] ?>" style="width: 30px; height: 30px;"></a> 
            <a style="text-decoration: none;" href="yazidetay.php?yaziid=<?php echo $row2["yaziid"] ?>"><?php echo mb_strimwidth($row2["yazibaslik"], 0, 20,"...") ?></a>
          </li>
        
          <?php } ?>

        </ul>

      </div>
      <!-- kolon -->

    </div>
    <!-- satır -->

  </div>
  <!-- Footer Linkler -->



  

  <!-- hak -->
  <div class="footer-copyright text-center py-3">© 2020 Tüm Hakları Saklıdır
    <a href="index.php"> Ahmet YILDIZ</a>
  </div>
  <!-- hak -->

</footer>




<!-- 
<footer class="footer bg-dark" style="position: static;  width: 100%;  height:250px; ">

  <div class="">
    <div class="row" width="100%">


      <div class="col-md-4">
       <a  class="text-white" href="https://www.instagram.com/phosimurgtr/"><i class="fab fa-instagram mr-4"></i></a>
       <a class="text-white" href="https://github.com/phoenix2071"><i class="fab fa-github"></i></a>

       <a  class="text-white" href="https://www.linkedin.com/in/ahmet-y%C4%B1ld%C4%B1z-ab5824183/"><i class="fab fa-linkedin ml-4"></i></a>
     </div>


     <div class="col-md-4 bg-warning">

     </div>


     <div class="col-md-4 bg-danger">

     </div>


   </div>
 </div>
</footer>
-->

