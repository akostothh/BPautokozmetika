<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>

    <!-- Gyári CSS-ek -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />

    <style>
        /* Alapvető stílusok */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-color: #f8f9fa;
        }

        #products {
            padding: 20px;
        }

        /* Kosár ikon és elrendezés */
        .cart {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .cart i {
            font-size: 20px;
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            font-size: 14px;
            border-radius: 50%;
            padding: 5px 10px;
        }

        .cart-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 999;
        }

        .cart-modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            width: 80%;
            max-width: 400px;
            border-radius: 8px;
            text-align: center;
        }

        .cart-modal-content ul {
            list-style: none;
            padding: 0;
        }

        .cart-modal-content ul li {
            padding: 5px 0;
            border-bottom: 1px solid #ccc;
        }

        .cart-modal-content .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .cart-modal-content .close:hover {
            color: black;
        }

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .product {
            flex: 1 1 calc(33.333% - 20px); /* 3 oszlop */
            background: black;
            border: 1px solid darkgray;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .product img {
            max-width: 100%;
            height: 225px;
            width: 225px;
            border-radius: 5px;
        }

        .product h3 {
            font-size: 18px;
            margin: 10px 0;
            color: white;
        }

        .product p {
            font-size: 16px;
            color: #555;
        }

        .product button {
            background: #007BFF;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .product button:hover {
            background: #0056b3;
        }

        /* Felugró ablak stílus */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 999;
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
            text-align: center;
        }

        .modal-content .modal-close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .modal-content .close:hover {
            color: black;
        }
    </style>
</head>
<body>
    <main>
        <!-- Kosár ikon -->
        <div class="cart">
            <i class="fa fa-shopping-cart"></i>
            <span class="cart-count" id="cart-count">0</span>
        </div>

        <!-- Kosár modal -->
        <div id="cart-modal" class="cart-modal">
            <div class="cart-modal-content">
                <span class="close">&times;</span>
                <h3>Kosár tartalma</h3>
                <ul id="cart-items"></ul>
                <p><strong>Összesen: <span id="cart-total">0 Ft</span></strong></p>
            </div>
        </div>

        <!-- Felugró ablak a termékekhez -->
        <div id="productModal" class="modal">
            <div class="modal-content">
                <span class="modal-close">&times;</span>
                <h2 id="productTitle"></h2>
                <img id="productImage" src="" alt="" style="max-width: 200px; margin-bottom: 20px;">
                <p id="productDescription"></p>
                <p id="productPrice"></p>

                <!-- Darabszám input -->
                <label for="quantity">Mennyiség:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" style="margin-bottom: 10px;">

                <!-- Vásárlás gomb -->
                <button id="buyButton" onclick="addToCart()">Vásárlás</button>
            </div>
        </div>

        <section id="products">
            <div class="product-grid">
                <?php
                    include("kapcsolat.php");

                    $result = mysqli_query($adb, "SELECT * FROM termekek");

                    if ($result) {
                        while ($termek = mysqli_fetch_assoc($result)) {  
                            $nev = utf8_encode($termek["nev"]);
                            $ar = $termek["ar"];
                            $leiras = utf8_encode($termek["leiras"]);
                            $kep = $termek["kep"];  
                            echo "
                            <div class='product'>
                                <img src='kepek/$kep' alt='$nev'>
                                <h3>$nev</h3>
                                <p>Ár: $ar Ft</p>
                                <button class='valami' data-name='$nev' data-description='$leiras' data-price='$ar' data-image='$kep'>Kosárba</button>
                            </div>
                            ";
                        }
                    } else {
                        echo "Nincs elérhető termék!";
                    }

                    mysqli_close($adb);
                ?>
            </div>
        </section>
    </main>

    <script>
        // Kosár adatok
        let cart = [];
        const cartCount = document.getElementById("cart-count");
        const cartModal = document.getElementById("cart-modal");
        const cartItems = document.getElementById("cart-items");
        const cartTotal = document.getElementById("cart-total");
        const closeBtn = document.querySelector(".cart-modal-content .close");
        const cartButton = document.querySelector(".cart");
        const modalClose = document.querySelector(".modal-close");
        const productModal = document.getElementById("productModal");

        modalClose.onclick = () => {
            productModal.style.display = 'none';
        }

        // Kosárba rakás
        const buttons = document.querySelectorAll(".product button");
        buttons.forEach((button) => {
            button.addEventListener("click", () => {
                const name = button.getAttribute("data-name");
                const description = button.getAttribute("data-description");
                const price = parseInt(button.getAttribute("data-price"));
                const image = button.getAttribute("data-image");

                // Felugró ablak
                document.getElementById("productTitle").textContent = name;
                document.getElementById("productDescription").textContent = description;
                document.getElementById("productPrice").textContent = `Ár: ${price} Ft`;
                document.getElementById("productImage").src = 'kepek/' + image;
                document.getElementById("productModal").style.display = "block";
            });
        });

        // Kosár frissítése
        function updateCart() {
            cartCount.innerText = cart.length;
            cartItems.innerHTML = "";
            let total = 0;
            cart.forEach(item => {
                total += item.price;
                cartItems.innerHTML += `<li>${item.name} - ${item.price} Ft</li>`;
            });
            cartTotal.innerText = `${total} Ft`;
        }

        // Kosár modal megjelenítése
        cartButton.onclick = () => {
            cartModal.style.display = "block";
        };

        // Kosár modal bezárása
        closeBtn.onclick = () => {
            cartModal.style.display = "none";
        };

        window.onclick = (event) => {
            if (event.target == cartModal) {
                cartModal.style.display = "none";
            }
        };

        // Vásárlás gomb funkció
        function addToCart() {
            const quantity = document.getElementById('quantity').value;
            const name = document.getElementById('productTitle').textContent;
            const price = parseInt(document.getElementById('productPrice').textContent.split(' ')[1]);
            alert(`${name} hozzáadva a kosárhoz ${quantity} db termékkel. Összesen: ${price * quantity} Ft.`);

            cart.push({ name, price: price * quantity });
            updateCart();
            document.getElementById('productModal').style.display = 'none'; // Bezárja a felugró ablakot
        }
        
        

    </script>
</body>
</html>
