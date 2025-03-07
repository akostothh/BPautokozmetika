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
            bottom: 20px;
            right: 20px;
            background-color: white;
            border-radius: 50%;
            padding: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s ease;
            z-index: 1;
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
            width: 90%;
            max-width: 600px;
            border-radius: 8px;
            text-align: center;
        }

        .cart-modal-content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cart-modal-content table th,
        .cart-modal-content table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .cart-modal-content table th {
            background-color: #f8f9fa;
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
            flex: 1 1 calc(33.333% - 20px);
            background: transparent;
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
            color: white;
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

        /* Mennyiség input stílusa */
        .quantity-input {
            width: 60px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }

        /* Törlés gomb stílusa */
        .remove-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .remove-btn:hover {
            background-color: #c82333;
        }

        .buy {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .buy:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .buy:active {
            transform: scale(0.98);
        }

        .continue {
            background-color: transparent;
            color: #888;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        .continue:hover {
            color: rgb(62, 236, 129);
            background-color: #f0f0f0;
        }

        .continue:active {
            transform: scale(0.98);
        }

        /* Bankkártya adatok stílusa */
        .card-details {
            display: none;
            margin-top: 20px;
        }

        .card-details label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .card-details input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
                <table>
                    <thead>
                        <tr>
                            <th>Termék</th>
                            <th>Ár</th>
                            <th>Mennyiség</th>
                            <th>Összesen</th>
                            <th>Művelet</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items"></tbody>
                </table>
                <p><strong>Összesen: <span id="cart-total">0 Ft</span></strong></p>
                <button class="continue" id="continueShoppingButton">Vásárlás Folytatása</button>
                <button class="buy" id="buyButton">Fizetés</button>
            </div>
        </div>

        <!-- Személyes adatok modal -->
        <div id="personalDataModal" class="modal">
            <div class="modal-content">
                <span class="modal-close" id="personalDataModalClose">&times;</span>
                <h2>Személyes adatok</h2>
                <form id="personalDataForm">
                    <label for="fullName">Teljes név:</label>
                    <input type="text" id="fullName" name="fullName" required><br><br>

                    <label for="email">Email cím:</label>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="address">Cím:</label>
                    <input type="text" id="address" name="address" required><br><br>

                    <button type="button" id="nextButton">Tovább</button>
                </form>
            </div>
        </div>

        <!-- Fizetési mód modal -->
        <div id="paymentModal" class="modal">
            <div class="modal-content">
                <span class="modal-close" id="paymentModalClose">&times;</span>
                <h2>Fizetési mód választás</h2>
                <form id="paymentForm">
                    <label>
                        <input type="radio" name="payment" value="creditCard" required> Bankkártyás fizetés
                    </label><br>
                    <label>
                        <input type="radio" name="payment" value="cash" required> Készpénz
                    </label><br><br>

                    <!-- Bankkártya adatok -->
                    <div id="cardDetails" class="card-details">
                        <label for="cardNumber">Kártyaszám:</label>
                        <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" required>

                        <label for="cardExpiry">Lejárati dátum:</label>
                        <input type="text" id="cardExpiry" name="cardExpiry" placeholder="MM/YY" required>

                        <label for="cardCVC">CVC:</label>
                        <input type="text" id="cardCVC" name="cardCVC" placeholder="123" required>
                    </div>

                    <button type="submit" id="submitPayment">Fizetés</button>
                </form>
            </div>
        </div>

        <!-- Termékek rész -->
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

        <!-- Termék modal -->
        <div id="productModal" class="modal">
            <div class="modal-content">
                <span class="modal-close">&times;</span>
                <h2 id="productTitle"></h2>
                <img id="productImage" src="" alt="" style="max-width: 200px; margin-bottom: 20px;">
                <p id="productDescription"></p>
                <p id="productPrice"></p>

                <!-- Mennyiség input -->
                <label for="quantity">Mennyiség:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" style="margin-bottom: 10px;">

                <!-- Kosárba gomb -->
                <button id="addToCartButton" onclick="addToCart()">Kosárba</button>
            </div>
        </div>
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
            cart.forEach((item, index) => {
                total += item.price * item.quantity;
                cartItems.innerHTML += `
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.price} Ft</td>
                        <td><input type="number" class="quantity-input" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, this.value)"></td>
                        <td>${item.price * item.quantity} Ft</td>
                        <td><button class="remove-btn" onclick="removeFromCart(${index})">Törlés</button></td>
                    </tr>
                `;
            });
            cartTotal.innerText = `${total} Ft`;
        }

        // Mennyiség frissítése
        function updateQuantity(index, quantity) {
            cart[index].quantity = parseInt(quantity);
            updateCart();
        }

        // Termék eltávolítása
        function removeFromCart(index) {
            cart.splice(index, 1);
            updateCart();
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
            const quantity = parseInt(document.getElementById('quantity').value);
            const name = document.getElementById('productTitle').textContent;
            const price = parseInt(document.getElementById('productPrice').textContent.split(' ')[1]);

            // Ellenőrizzük, hogy a termék már szerepel-e a kosárban
            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.quantity += quantity;
            } else {
                cart.push({ name, price, quantity });
            }

            updateCart();
            document.getElementById('productModal').style.display = 'none'; // Bezárja a felugró ablakot
        }

        // Modális ablakok
        const personalDataModal = document.getElementById("personalDataModal");
        const paymentModal = document.getElementById("paymentModal");
        const buyButton = document.getElementById("buyButton");
        const personalDataModalClose = document.getElementById("personalDataModalClose");
        const paymentModalClose = document.getElementById("paymentModalClose");
        const nextButton = document.getElementById("nextButton");
        const cardDetails = document.getElementById("cardDetails");

        // Személyes adatok modal bezárása
        personalDataModalClose.addEventListener("click", () => {
            personalDataModal.style.display = "none";
        });

        // Fizetési mód modal bezárása
        paymentModalClose.addEventListener("click", () => {
            paymentModal.style.display = "none";
        });

        // Tovább gomb
        nextButton.addEventListener("click", () => {
            const fullName = document.getElementById("fullName").value;
            const email = document.getElementById("email").value;
            const address = document.getElementById("address").value;

            if (fullName && email && address) {
                personalDataModal.style.display = "none";
                paymentModal.style.display = "block";
            } else {
                alert("Kérem, töltse ki az összes mezőt!");
            }
        });

        // Bankkártya adatok megjelenítése
        document.querySelectorAll('input[name="payment"]').forEach((radio) => {
            radio.addEventListener("change", (e) => {
                if (e.target.value === "creditCard") {
                    cardDetails.style.display = "block";
                } else {
                    cardDetails.style.display = "none";
                }
            });
        });

        // Fizetés elküldése
        document.getElementById("paymentForm").addEventListener("submit", (event) => {
            event.preventDefault();
            
            const paymentMethod = document.querySelector('input[name="payment"]:checked');
            if (paymentMethod) {
                if (paymentMethod.value === "creditCard") {
                    const cardNumber = document.getElementById("cardNumber").value;
                    const cardExpiry = document.getElementById("cardExpiry").value;
                    const cardCVC = document.getElementById("cardCVC").value;

                    if (!cardNumber || !cardExpiry || !cardCVC) {
                        alert("Kérem, töltse ki a bankkártya adatokat!");
                        return;
                    }
                }
                alert(`A fizetési mód: ${paymentMethod.value}`);
                paymentModal.style.display = "none"; // Fizetési modal bezárása
            } else {
                alert("Kérem, válasszon egy fizetési módot!");
            }
        });

        // Kosár tartalom ellenőrzése vásárlás előtt
        buyButton.addEventListener("click", () => {
            if (cart.length === 0) {
                alert("A kosár üres! Kérem, adjon hozzá terméket a kosárhoz.");
                cartModal.style.display = "none";  // Kosár bezárása
                window.location.href = "#products";  // Visszairányít a termékekhez
            } else {
                personalDataModal.style.display = "block";  // Ha van termék, akkor a személyes adatokat kérő modal jelenik meg
            }
        });

        document.getElementById("continueShoppingButton").addEventListener("click", () => {
            cartModal.style.display = "none"; // Kosár modál bezárása
        });
    </script>
</body>
</html>