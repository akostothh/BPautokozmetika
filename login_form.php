<p class="adatok">Adja meg bejelentkezési adatait:</p>
<form action='login_ir.php' method='post' target='kisablak'>
    <input class="email" name='email'                  placeholder='e-mail cím'><br>
    <br>
     <br><br>
    <input class="password" name='pw'     type='password' placeholder='Jelszó'><br>
    <input class="belepes"              type='submit'   value='Belépés'><br>
 
</form>

<input class="reg" type='button' value='Regisztráció' onclick=' location.href="reg_form.php" '>

<style>


.belepes{
  border-radius: 10px 10px 10px 10px;
  border-style: solid;
  border-width: 1px;
  box-shadow: 1px 1px 3px #3f3e3c;
  color: black;
  cursor: pointer;
  background-color: rgb(34, 38, 41);
  color: white;
  font-family: var(--font-main);
  position: absolute;
  left: 44%;
  margin: 30px;
  top: 42%
}
.reg{
  border-radius: 10px 10px 10px 10px;
  border-style: solid;
  border-width: 1px;
  box-shadow: 1px 1px 3px #3f3e3c;
  color: black;
  cursor: pointer;
  background-color: rgb(34, 38, 41);
  color: white;
  font-family: var(--font-main);
  position: absolute;
left: 43%;
margin: 30px;
top: 52%


}
.password{
    position: absolute;
left:38%;
margin: 30px;
top: 30%;
border: 2px solid black;
}
.email{
    position: absolute;
left: 38%;
margin: 30px;
top: 20%;
border: 2px solid black;
}

.adatok{
  font-size: 15px;
  position: absolute;
  left: 40%;
  top: 22%;
}

 



</style>
