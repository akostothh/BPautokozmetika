<?php

    session_start() ;
    print_r( $_POST ) ;

    $ip = $_SERVER['REMOTE_ADDR'] ;
    $sess = substr( session_id() , 0 , 8 )  ;
    if ( isset($_SESSION['uid']) )  $uid = $_SESSION['uid'] ;
    else   $uid = 0                ;

    mysqli_query( $adb, "
    
    INSERT INTO login (lid, ldatum, lip, lsession, luid)
    VALUES            (NULL, NOW(), '$ip', '$sess', '$uid')
    
    ");


    include("kapcsolat.php") ;

    $upd = md5 ( $_POST ["pw"]) ;
    

    $userek = mysqli_query(    
                                              $adb, "SELECT * FROM user
                                              WHERE (uemail='$_POST[email]')
                                              AND upd='$upd' 

                                              ") ;


if( mysqli_num_rows($userek)==0 )
{
    print "<script> alert('Hibás belépési adatok!') </script>" ;
}
else
{
    $user = mysqli_fetch_array($userek) ;
    $_SESSION['uid'] =  $user['uid'];
    $_SESSION['unick'] =  $user['unick'];
}


    mysqli_close ( $adb ) ;

    print "<script> parent.location.href = './'</script>" ;
?>