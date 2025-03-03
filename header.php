<header class="header_section">
      <div class="header_top">
        <div class="container-fluid header_top_container">

          <div class="contact_nav">
            <a href="https://maps.app.goo.gl/WKaq4M62d9mHgN9v7" target="_blank">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Lokáció
              </span>
            </a>
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Telefonszám : +36 302960830
              </span>
            </a>
            <a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJNvvsRNPQXNgMKxkmXcZTBxSPZzwqgnjCKwhPmbdJZzCLdgcCbQxZsHSqrjZMjlKVtgbzg" target="_blank" >
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                bpkozmetika@gmail.com
              </span>
            </a>
            <?php
            if(isset($_SESSION['uid']) && $_SESSION['ustatusz'] == 'A'){
              print("            <a href='?o=admin'>admin</a>");
            }
          ?>
            </div>
          <div class="social_box">
      
            <a href="">
            </a>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand " href="index.php"> Autokozmetika BP </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="?o=kezdolap">Főoldal <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?o=about"> Rólunk</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?o=service">Szolgáltatások</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?o=team"> Csapat </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?o=shop">Bolt</a>
                </li>
                <li class="nav-item">
                      <?php
                      if(!isset($_SESSION["uid"])){
                        print('<a class="nav-link" href="login_form.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>bejelentkezés</span>
                        </a>');
                      }
                      else
                      {

                        include("./kapcsolat.php");
                        $sql = "SELECT unick FROM user WHERE uid = " . $_SESSION["uid"];

                        
      
                       $unick =  mysqli_fetch_assoc(mysqli_query($adb, $sql));
                        print('<a class="nav-link" href="./?o=modositas">
                        <i class="fa fa-user" aria-hidden="true"></i> ' . $unick['unick'] . '
                        
                        </a>');
                      }
                      ?>

                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>