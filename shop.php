<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<!-- fonts style -->
<!--owl slider stylesheet -->
<!-- nice select -->
<!-- font awesome style -->
<link href="css/font-awesome.min.css" rel="stylesheet" />

<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet" />
<!-- responsive style -->
    </head>
<body>


    <main>
        <header>
            
    <div class="hero_area">
    <div class="hero_bg_box">

    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid header_top_container">

          <div class="contact_nav">
            <a href="">
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
            <a href="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                bpkozmetika@gmail.com
              </span>
            </a>
          </div>
          <div class="social_box">
      
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
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
                  <a class="nav-link" href="index.php">Főoldal <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> Rólunk</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.php">Szolgáltatások</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="team.php"> Csapat </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Elérhetőség</a>
                </li>
                <li class="nav-item">
                      <?php
                      if(!isset($_SESSION["uid"])){
                        print('<a class="nav-link" href="login_form.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>bejelentkezés</span>
                        </a>');
                      }
                      else{
                        print('<a class="nav-link" href="logout.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>kijelentkezés</span>
                        </a>');
                      }
                      ?>
                </li>
                <form class="form-inline justify-content-center">


        

        <section id="contact">
           
            
            <section id="products">
       
            <div class="product-grid">
                <div class="product">
                    <img src="https://via.placeholder.com/150" alt="Termék 1">
                    <h3>Termék 1</h3>
                    <p>Ár: 5000 Ft</p>
                    <button>Kosárba</button>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/150" alt="Termék 2">
                    <h3>Termék 2</h3>
                    <p>Ár: 7000 Ft</p>
                    <button>Kosárba</button>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/150" alt="Termék 3">
                    <h3>Termék 3</h3>
                    <p>Ár: 6000 Ft</p>
                    <button>Kosárba</button>
                </div>
            </div>
        </section>
        </section>
        
    </main>


</body>
</html>

<style>
/* Alapvető stílusok */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    line-height: 1.6;
    color: white;
    background-color: black;
}


header h1 {
    margin: 0;
}

nav ul {
    list-style: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin: 0 10px;
}

nav ul li a {
    color: white;
    text-decoration: none;
}

main {
    padding: 1rem;
}

h2 {
    color: #007BFF;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin: 2rem 0;
}

.product {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 1rem;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.product img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

button {
    background: #007BFF;
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #0056b3;
}

footer {
    text-align: center;
    padding: 1rem;
    background: #f4f4f4;
    margin-top: 2rem;
}

    </style>
