
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

<div class="bg-img"></div>
<div class="container">
	<div class="screen">
		<div class="screen__content">
		<form class="login" action='login_ir.php' method='post'>
    <div class="login__field">
        <i class="login__icon fas fa-user"></i>
		

        <input type="text" class="login__input" id="email" placeholder="e-mail cím" name="email" required onchange="validate_mail()">
		<p id="email_error"></p>
    </div>
    <div class="login__field">
        <i class="login__icon fas fa-lock"></i>
        <input type="password" class="login__input" id="pw" placeholder="Jelszó" name="pw" required onchange="validate_passw()">
		<p id="pw_error"></p>
    </div>
    <button class="button login__submit" id="sigbtn" >
        <span class="button__text" >Belépés</span>
        <i class="button__icon fas fa-chevron-right"></i>
    </button>				
</form>

			<div class="social-login">
			<button class="button login__submit" id="regbtn" type='button' onclick=' location.href="reg_form.php" '><span class="button__text">Regisztráció</span><i class="button__icon fas fa-chevron-right"></i></button>
				<div class="social-icons">

				</div>
			</div>
		</div>
		<div class="screen__background">
	
		</div>		
	</div>
</div>

<style>

@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}

body {
	background-image: url("./images/fokep2.jpg");
	position: relative;
}

.bg-img{
	background-image: url("./images/fokep2.jpg");
	position: absolute;
	filter: blur(8px);
	z-index: -10000;
	width: 100%;
	height: 100%;

}

body::before {
	content: "";
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, 0.9)), to(rgba(0, 0, 0, 0.7)));
  background: linear-gradient(to right, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.7));	z-index: -1;
}

.container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
}




.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
	
}

.screen__background {		
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}


.login {
	width: 320px;
	padding: 30px;
	padding-top: 30px;
}

.login__field {
	padding: 20px 0px;	
	position: relative;	
	left: 33%;
}



.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 700;
	width: 75%;
	transition: .2s;
	color: white;
	
}

.login__input::placeholder{
	color: white;
}


.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: gray;
	
}

.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid grey;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: black;
	cursor: pointer;
	transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: black;
	outline: none;
	
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #7875B5;
}

.social-login {	
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: 0px;
	right: 0px;
	color: #fff;
}

.social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}

.social-login__icon {
	padding: 20px 10px;
	color: #fff;
	text-decoration: none;	
	text-shadow: 0px 0px 8px #7875B5;
}

.social-login__icon:hover {
	transform: scale(1.5);	
}

.login {
	width: 320px;
	padding: 30px;
	padding-top: 10px;
}

.login__field {
	padding: 20px 0px;	
	position: relative;	
}

.reg__icon {
	position: absolute;
	top: 30px;
	color: #7875B5;
}


#regbtn{
	position: relative;
	right: 30%;
    width: 164%;
	align-items: center;

}
#sigbtn{
	position: relative;
	left: 31%;
	margin-bottom: 100px;
	align-items: center;
}

.reg__input:active,
.reg__input:focus,
.reg__input:hover {
	outline: none;
	border-bottom-color: #6A679E;

}

.reg__submit {
	
}

.reg__submit:active,
.reg__submit:focus,
.reg__submit:hover {
	border-color: #6A679E;
	outline: none;
	
}

.screen{
	text-align:center;
	margin-right: 240px;
	
}
.bg-img{
	background-image: url("./images/fokep2.jpg");
	position: absolute;
	filter: blur(8px);
	z-index: -10000;
	width: 100%;
	height: 100%;

}
#email_error{
	color:white;
	font-family: "Monaco", serif;
	position: relative;
	margin-top: 20px;
}
#pw_error{
	color:white;
	font-family: "Monaco", serif;
	position: relative;
	margin-top: 20px;
}



</style>

<script>
const mail = document.getElementById("email");
const passw = document.getElementById("pw");
const mail_error = document.getElementById("email_error");
const passw_error = document.getElementById("pw_error");

function validate_mail(event) {
    const emailValue = event.target.value;
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // E-mail formátum ellenőrzése

    if (emailValue === "") {
        mail_error.textContent = "Az e-mail cím nem lehet üres.";
    } else if (!emailRegex.test(emailValue)) {
        mail_error.textContent = "Hibás e-mail cím formátum.";
    } else {
        mail_error.textContent = ""; // Ha helyes
    }
}

function validate_pw(event) {
    const pwValue = event.target.value;
    const pwRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{6,}$/; // Minimum 6 karakter, szám és speciális karakter szükséges

    if (pwValue === "") {
        passw_error.textContent = "A jelszó nem lehet üres.";
        } else {
        passw_error.textContent = ""; // Ha helyes
    }
}

mail.addEventListener("input", validate_mail); // E-mail valós idejű ellenőrzése
passw.addEventListener("input", validate_pw); // Jelszó valós idejű ellenőrzése

</script>

