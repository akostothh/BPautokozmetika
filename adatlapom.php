<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

   $user = mysqli_fetch_array( mysqli_query( $adb , "SELECT * FROM user WHERE uid='$_SESSION[uid]' ")) ;

?>

<div class="valtozok">
            <form action='adatlap_ir.php' method="post" class="reglog" enctype="multipart/form-data"><br>

					<label for="chk" aria-hidden="true">Adatok változtatása</label><br>
                    <br>
					<input type="hidden" name="uid" placeholder="Új név" value="<?=$user['uid'];?>"><br>
                    <input type="text" name="txt" placeholder="Új név" value="<?=$user['unick'];?>"><br>
                    <br>
					<input type="email" name="email" placeholder="Új e-mail" value="<?=$user['uemail'];?>"><br>
                    <br>
                    <input type="file" name="uprofkep" ><br>

          <br>
					<button>Mentés</button>
				</form>
			</div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
</body>
</html>

<style>

.valtozok{
    text-align:center
}

</style>
