<?php
ob_start(); // Output buffering bekapcsolása
include("kapcsolat.php");

if (isset($_SESSION['velemenyScroll'])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('velemeny-container').scrollIntoView({ behavior: 'smooth' });
        });
    </script>";
    unset($_SESSION['velemenyScroll']); // Hogy ne görgessen minden frissítéskor
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_SESSION['uid'])) {
      // Biztonságos bemenetkezelés
      $velemeny = mysqli_real_escape_string($adb, trim($_POST["rate"]));
      $csillagok = isset($_POST["csillagok"]) ? intval($_POST["csillagok"]) : 1;
      $userid = intval($_SESSION['uid']);
      $datum = date("Y-m-d H:i:s");

      // SQL lekérdezés a vélemény hozzáadásához
      $ertekeles = "INSERT INTO `velemeny` (`uid`, `comment`, `rate`, `date`) VALUES ('$userid', '$velemeny', '$csillagok', '$datum')";

      if (mysqli_query($adb, $ertekeles)) {
          $_SESSION['velemenyScroll'] = true;
          // JSON válasz küldése
          echo json_encode(["status" => "success", "message" => "Vélemény sikeresen elküldve!"]);
      } else {
          echo json_encode(["status" => "error", "message" => "Hiba a beszúrásnál: " . mysqli_error($adb)]);
      }

      // Adatbázis lezárása
      mysqli_close($adb);
  } else {
      echo json_encode(["status" => "error", "message" => "Nem vagy bejelentkezve."]);
  }
  exit();
}


ob_end_flush(); // Output buffering leállítása és tartalom küldése
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

</head>
<body>


<main id="main" class="flexbox-col">
<section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container ">
                    <div class="row">
                        <div class="col-lg-10 col-md-11 mx-auto">
                            <div class="detail-box">
                                <br>
                                <br>
                                <br>
                                <br>
                                <h1>
                                    Ne csak maga ragyogjon<br>
                                    Hanem <br>
                                    Az autoja is!
                                </h1>
                                <p>
                                    Professzionális autókozmetikai szolgáltatásainkkal autója mindig ragyogó és újszerű
                                    állapotban tündököl. Bízza ránk a tisztítást, polírozást és védelmet, hogy autója
                                    megérdemelt törődést kapjon!
                                </p>
                                <div class="btn-box">
                                    <a href="" class="btn1">
                                        Elérhetőség
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                    <div class="row">
                        <div class="col-lg-10 col-md-11 mx-auto">
                            <div class="detail-box">
                                <br>
                                <br>
                                <br>
                                <br>
                                <h1>
                                    Engedje, <br>
                                    hogy az autója megmutassa <br>
                                    valódi fényét!
                                </h1>
                                <p>
                                    Autókozmetikai szolgáltatásunk segít abban, hogy járműve mindig újszerű állapotban
                                    legyen. Kíméletes, de hatékony tisztítással és polírozással új életet lehelünk az
                                    autójába. Bízza ránk, és élvezze a ragyogóan tiszta autót minden nap!
                                </p>
                                <div class="btn-box">
                                    <a href="" class="btn1">
                                        Elérhetőség
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="carousel-item">
                <div class="container ">
                    <div class="row">
                        <div class="col-lg-10 col-md-11 mx-auto">
                            <div class="detail-box">
                                <h1>
                                    Ne csak a motor pörögjön, <br>
                                    Hanem <br>
                                    az autója is tündököljön!
                                </h1>
                                <p>
                                    Az autókozmetika szolgáltatásunk teljeskörűen ápolja járművét, hogy az kívül-belül
                                    ragyogjon. Professzionális tisztítószerekkel és eszközökkel dolgozunk, biztosítva a
                                    hosszú távú védelmet és friss megjelenést. Bízza ránk autója tisztaságát, és élvezze
                                    a tökéletes eredményt! </p>
                                <div class="btn-box">
                                    <a href="" class="btn1">
                                        Elérhetőség
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel_btn-box">
            <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                <span class="sr-only">Elöző</span>
            </a>
            <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                <span class="sr-only">Következő</span>
            </a>
        </div>
    </div>
</section>

    <!-- end slider section -->
  </div>


  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center ">
        <h2 class="">
          Szolgáltatások
        </h2>
        <p class="col-lg-8 px-0 text-dark">
        Teljes körű autókozmetikai szolgáltatásaink között megtalálható a külső mosás, viaszolás és polírozás, a belső kárpittisztítás és bőrápolás, valamint a kerámia- és nanotechnológiás bevonatok felvitele. Emellett motortér tisztítást, ózonos fertőtlenítést, és autók előkészítését is vállaljuk eladásra vagy különleges eseményekre.
        </p>
      </div>
      <div class="service_container">
        <div class="carousel-wrap ">
          <div class="service_owl-carousel owl-carousel">
            <div class="item">
              <div class="box ">
                <div class="img-box">
                  <img src="images/s1.png" alt="" />
                </div>
                <div class="detail-box">
                  <h5>
                    Home Welding
                  </h5>
                  <p>
                    when looking at its layout. The point of using Lorem Ipsum is
                    that it has a more-or-less normal
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box ">
                <div class="img-box">
                  <img src="images/s4.png" alt="" />
                </div>
                <div class="detail-box">
                  <h5>
                    Machine Welding
                  </h5>
                  <p>
                    when looking at its layout. The point of using Lorem Ipsum is
                    that it has a more-or-less normal
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box ">
                <div class="img-box">
                  <img src="images/s6.png" alt="" />
                </div>
                <div class="detail-box">
                  <h5>
                    Car Welding
                  </h5>
                  <p>
                    when looking at its layout. The point of using Lorem Ipsum is
                    that it has a more-or-less normal
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box ">
                <div class="img-box">
                  <img src="images/s1.png" alt="" />
                </div>
                <div class="detail-box">
                  <h5>
                    Home Welding
                  </h5>
                  <p>
                    when looking at its layout. The point of using Lorem Ipsum is
                    that it has a more-or-less normal
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box ">
                <div class="img-box">
                  <img src="images/s4.png" alt="" />
                </div>
                <div class="detail-box">
                  <h5>
                    Machine Welding
                  </h5>
                  <p>
                    when looking at its layout. The point of using Lorem Ipsum is
                    that it has a more-or-less normal
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box ">
                <div class="img-box">
                  <img src="images/s6.png" alt="" />
                </div>
                <div class="detail-box">
                  <h5>
                    Car Welding
                  </h5>
                  <p>
                    when looking at its layout. The point of using Lorem Ipsum is
                    that it has a more-or-less normal
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="./service.php">
          Több információ
        </a>
      </div>
    </div>
  </section>

  <!-- service section ends -->

  <!-- about section -->

  <section class="about_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="detail-box pr-md-2">
            <div class="heading_container">
              <h2 class="">
                Rólunk
              </h2>
            </div>
            <p class="detail_p_mt">
            Cégünk szenvedélye az autók szépségének és állapotának megőrzése. Professzionális autókozmetikai szolgáltatásainkkal arra törekszünk, hogy ügyfeleink járművei mindig kifogástalan állapotban legyenek, mind kívül, mind belül. Csapatunk elkötelezett a minőség, a precizitás és a részletekre való odafigyelés iránt, hogy autója ne csak tiszta, hanem valóban megújult legyen. Nálunk a legmodernebb technológiák és környezetbarát megoldások találkoznak a szakértelemmel, hogy Ön mindig elégedetten térjen vissza hozzánk.
            </p>
            <a href="about.php" class="">
            Több információ
            </a>
          </div>
        </div>
        <div class="col-md-6 px-0">
          <div class="img-box ">
            <img src="kepek/mosas.webp" class="box_img" alt="about img">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- about section ends -->

  <!-- team section -->

  <section class="team_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          A mi Csapatunk
        </h2>
        <p>
        Tapasztalt és lelkes szakembereink gondoskodnak arról, hogy autója mindig a legjobb kezekben legyen.
        </p>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/t1.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Martin Anderson
              </h5>
              <h6 class="">
                supervisor
              </h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/t2.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Denny Butler
              </h5>
              <h6 class="">
                supervisor
              </h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/t3.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Nathan Mcpherson
              </h5>
              <h6 class="">
                supervisor
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end team section -->
  <?php

$userid = $_SESSION['uid'] ?? null;
if ($userid) {
  $query = "SELECT COUNT(*) AS count FROM `velemeny` WHERE `uid` = $userid";
  $result = mysqli_query($adb, $query);
  $row = mysqli_fetch_assoc($result);

  if ($row['count'] == 0) {
      echo "<section class='rating_section'>
              <div class='container'>
                  <div class='heading_container heading_center'>
                      <h2>Értékelje szolgáltatásainkat!</h2>
                  </div>
                  <form method='POST' id='velemeny-form' action='velemeny.php' target='kisablak'>
                      <div class='rating'>
                          <label for='star1' class='star'>&#9733;</label>
                          <label for='star2' class='star'>&#9733;</label>
                          <label for='star3' class='star'>&#9733;</label>
                          <label for='star4' class='star'>&#9733;</label>
                          <label for='star5' class='star'>&#9733;</label>
                      </div>
                      <input type='hidden' id='csillag' name='csillagok'/>
                      <div class='review_section'>
                          <textarea id='review-text' name='rate' placeholder='Írja meg véleményét...'></textarea>
                      </div> 
                      <button type='submit'>Küldés</button>
                  </form>
              </div>
            </section>";
  }
}
// Vélemények lekérdezése (minden esetben)
$query = "SELECT v.*, u.unick FROM `velemeny` v 
          LEFT JOIN `user` u ON v.uid = u.uid 
          ORDER BY v.date DESC";
$result = mysqli_query($adb, $query);

// Vélemények megjelenítése
echo "<h3 class='ratesz'>Vélemények</h3>";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $username = $row['unick'] ?? 'Ismeretlen felhasználó';
        $comment = htmlspecialchars($row['comment']);
        $rate = $row['rate'];
        $date = $row['date'];
        
        echo "<div class='velemeny'>";
        echo "<strong>$username</strong> <span class='date'>($date)</span><br>";
        echo "<p>$comment</p>";
        echo "<p class='stars'>" . str_repeat("⭐", $rate) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>Még nincs vélemény.</p>";
}

// Ha a felhasználó be van jelentkezve, de még nem írt véleményt, akkor jelenik meg az űrlap


?>



<?php

$query = "SELECT v.*, u.unick FROM `velemeny` v 
          LEFT JOIN `user` u ON v.uid = u.uid 
          ORDER BY v.vid DESC";
$result = mysqli_query($adb, $query);
?>
</div>



  <!-- contact section -->
  <section class="contact_section ">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-6 px-0">
          <div class="img-box ">
            <img src="kepek/kocsi2.webp" class="box_img" alt="about img">
          </div>
        </div>
        <div class="col-md-5 mx-auto">
          <div class="form_container">
            <div class="heading_container heading_center">
              <h2>Lépj velünk kapcsolatba!</h2>
            </div>
            <form action="">
              <div class="form-row">
                <div class="form-group col">
                  <input type="text" class="form-control" placeholder="Név" />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <input type="text" class="form-control" placeholder="Telefonszám" />
                </div>
                <div class="form-group col-lg-6">
                  <select name="" id="" class="form-control wide">
                    <option value="">Szolgáltatások</option>
                    <option value="">Szolgáltatások 1</option>
                    <option value="">Szolgáltatások 2</option>
                    <option value="">Szolgáltatások 3</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col">
                  <input type="email" class="form-control" placeholder="Email" />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col">
                  <input type="text" class="message-box form-control" placeholder="Üzenet" />
                </div>
              </div>
              <div class="btn_box">
                <button>
                  Küldés
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->











  <!-- info section -->
  

</main>
<script>
// Vélemények frissítése
function frissitVelemenyeket() {
    fetch("velemeny_listazas.php")
        .then(response => response.json())
        .then(data => {
            let container = document.getElementById("velemeny-lista");
            container.innerHTML = ""; // Régi vélemények törlése

            if (data.length > 0) {
                data.forEach(velemeny => {
                    let html = `
                        <div class='velemeny'>
                            <strong>${velemeny.username}</strong>
                            <span class='date'>(${velemeny.date})</span><br>
                            <p>${velemeny.comment}</p>
                            <p class='stars'>${"⭐".repeat(velemeny.rate)}</p>
                        </div>`;
                    container.innerHTML += html;
                });

                // Kis késleltetés után görgessünk le a friss véleményekhez
                setTimeout(() => {
                    document.getElementById("velemeny-container").scrollIntoView({ behavior: "smooth" });
                }, 300);
            } else {
                container.innerHTML = "<p>Még nincs vélemény.</p>";
            }
        })
        .catch(error => console.error("Hiba a vélemények betöltésekor:", error));
}

document.getElementById("velemeny-form").addEventListener("submit", async function(event) {
    event.preventDefault(); // Megakadályozzuk az alapértelmezett form elküldést

    const formData = new FormData(this);

    try {
        const response = await fetch("velemeny.php", {
            method: "POST",
            body: formData,
        });
        const data = await response.json();

        if (data.status === "success") {
            // Frissítjük az oldalt
            location.reload(); // Az oldal újratöltése
        } else {
            alert("Hiba: " + data.message); // Hibakezelés
        }
    } catch (error) {
        console.error("Hálózati hiba:", error);
    }
});

// Csillagok kiválasztásának kezelése
let selectedRating = 0;
const stars = document.querySelectorAll('.star');

stars.forEach((star, index) => {
    star.addEventListener('click', () => {
        selectedRating = index + 1;
        document.getElementById('csillag').value = selectedRating;
        updateStars();
    });
});

function updateStars() {
    stars.forEach((star, index) => {
        if (index < selectedRating) {
            star.classList.add('selected');
        } else {
            star.classList.remove('selected');
        }
    });
}



</script>
</body>
</html>
<style>
.velemeny {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 12px;
    padding: 20px;
    margin: 15px auto;
    width: 80%; /* Keskenyebb, a szülő elemhez igazítva */
    max-width: 600px; /* Maximális szélesség */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease; /* Simulás animáció */
}

.velemeny:hover {
    transform: scale(1.02); /* Kis animáció, amikor ráhúzod az egeret */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

.velemeny strong {
    font-size: 18px;
    color: #333;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 5px;
}

.velemeny .date {
    font-size: 12px;
    color: #888;
    margin-left: 10px;
    font-style: italic;
}

.velemeny p {
    font-size: 15px;
    color: #444;
    line-height: 1.6;
    margin-bottom: 10px;
}

.velemeny .stars {
    color: #ffcc00;
    font-size: 22px;
    margin-top: 10px;
}

.velemeny .stars::after {
    content: " · ";
    color: #888;
    font-size: 14px;
}

.velemeny .stars:last-child::after {
    content: "";
}

.gallery {
  --g: 8px;   /* the gap */
  --s: 400px; /* the size */
  
  display: grid;
  border-radius: 50%;
}
.gallery > img {
  grid-area: 1/1;
  width: 300px;
  aspect-ratio: 1;
  object-fit: cover;
  border-radius: 50%;
  transform: translate(var(--_x,0),var(--_y,0));
  cursor: pointer;
  z-index: 0;
  transition: .3s, z-index 0s .3s;
  position: absolute;
  left: 70%;
  top: 20%
}
.gallery img:hover {
  --_i: 1;
  z-index: 1;
  transition: transform .2s, clip-path .3s .2s, z-index 0s;
}
.gallery:hover img {
  transform: translate(0,0);
}
.gallery > img:nth-child(1) {
  clip-path: polygon(50% 50%,calc(50%*var(--_i,0)) calc(120%*var(--_i,0)),0 calc(100%*var(--_i,0)),0 0,100% 0,100% calc(100%*var(--_i,0)),calc(100% - 50%*var(--_i,0)) calc(120%*var(--_i,0)));
  --_y: calc(-1*var(--g))
}
.gallery > img:nth-child(2) {
  clip-path: polygon(50% 50%,calc(100% - 120%*var(--_i,0)) calc(50%*var(--_i,0)),calc(100% - 100%*var(--_i,0)) 0,100% 0,100% 100%,calc(100% - 100%*var(--_i,0)) 100%,calc(100% - 120%*var(--_i,0)) calc(100% - 50%*var(--_i,0)));
  --_x: var(--g)
}
.gallery > img:nth-child(3) {
  clip-path: polygon(50% 50%,calc(100% - 50%*var(--_i,0)) calc(100% - 120%*var(--_i,0)),100% calc(100% - 120%*var(--_i,0)),100% 100%,0 100%,0 calc(100% - 100%*var(--_i,0)),calc(50%*var(--_i,0)) calc(100% - 120%*var(--_i,0)));
  --_y: var(--g)
}
.gallery > img:nth-child(4) {
  clip-path: polygon(50% 50%,calc(120%*var(--_i,0)) calc(50%*var(--_i,0)),calc(100%*var(--_i,0)) 0,0 0,0 100%,calc(100%*var(--_i,0)) 100%,calc(120%*var(--_i,0)) calc(100% - 50%*var(--_i,0)));
  --_x: calc(-1*var(--g))
}

.rating_section {
  text-align: center;
  margin: 50px 0;
}

.rating {
  font-size: 40px;
  display: inline-block;
}

.star {
  color: #ccc;
  cursor: pointer;
  transition: color 0.3s;
}

.star:hover, .star.selected {
  color: #f5b301;
}
.ratesz{
  color:black;
  text-align:center;
}

button {
  margin-top: 20px;
  padding: 10px 20px;
  font-size: 16px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

button:hover {
  background-color: #45a049;
}
/* Vélemény szövegterület */
.review_section {
  margin-top: 20px;
}

textarea {
  width: 100%;
  height: 100px;
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
  resize: vertical;
}

textarea:focus {
  border-color: #4CAF50;
  outline: none;
}
.ert{
  color:black;
}
iframe {
  width: 100%;
  height: 500px;
  border: none;
  border-radius: 10px;
}
iframe {
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
  border-radius: 15px
}
</style>

<script>
// Vélemény és értékelés együttes kezelése
let selectedRating = 0;

// A csillagok kiválasztásának kezelése
const stars = document.querySelectorAll('.star');
stars.forEach((star, index) => {
  star.addEventListener('click', () => {
    selectedRating = index + 1;
    document.getElementById('csillag').value = selectedRating;
    updateStars();
  });
});

function updateStars() {
  stars.forEach((star, index) => {
    if (index < selectedRating) {
      star.classList.add('selected');
    } else {
      star.classList.remove('selected');
    }
  });
}

// Vélemény beküldésének kezelése
function submitRating() {
  const reviewText = document.getElementById('review-text').value.trim();

  if (selectedRating > 0 && reviewText) {
    alert(`Köszönjük az értékelését! Ön ${selectedRating} csillagot adott. Véleménye: "${reviewText}"`);
    // Itt lehet elküldeni az értékelést és véleményt a szerverre.
  } else if (selectedRating > 0) {
    alert(`Köszönjük az értékelést! Ön ${selectedRating} csillagot adott, de nem írt véleményt.`);
  } else {
    alert("Kérem válasszon csillagokat és írjon véleményt az értékeléshez!");
  }
}



  </script>