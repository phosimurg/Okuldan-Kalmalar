<!DOCTYPE html>
<html lang="tr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="https://img.icons8.com/dusk/64/000000/a.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/ustmenu.css">
    <link rel = "stylesheet" href = "https://use.typekit.net/tmk5ubs.css">
  </head>
  <body>

    <header>
      <div class="logo"><a href="index.php">Ahmet YILDIZ</a></div>
        <nav >
          <ul>
            <li><a href="index.php" >Ana Sayfa</a></li>
            <li><a href="hakkinda.php" >Hakkımda</a></li>
            <li><a href="fotolar.php" >Fotoğraflar</a></li>
            <li><a href="uygulamalar.php">Uygulamalarım</a></li>
            <li><a href="iletisim.php">İletişim</a></li>
          </ul>
        </nav>

        <div class="menu-toggle">
          <i class="fa fa-bars"></i>
        </div>


    </header>

    <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      </script>

    </script>
    <script type="text/javascript">
            $(document).ready(function(){
              $('.menu-toggle').click(function(){
                $('nav').toggleClass('active')

              })
            })

        </script>

  </body>
</html>
