<?php
	print_r($_POST);
	
	if( $_POST['txt']=="" )
		die("<script> alert('Nem adott meg felhasználónevet!')</script>");

	include( "kapcsolat.php") ;

	//var_dump( $adb ) ;

	$upd = md5($_POST['pswd'] ) ;

	mysqli_query( $adb , "
		
INSERT INTO user ( uid,           uemail,           unick,   upd, uszuldatum,  udatum,  uip, session, ustatusz, ukomment)
VALUES 		 (NULL, '$_POST[email]', '$_POST[txt]',   '$upd',         '', 'NOW()', ''  , ''     , '', '');

	" );

	mysqli_close( $adb );
?>