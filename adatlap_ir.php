<?php

    session_start() ;
    print_r( $_POST ) ;
    print "<hr>" ;
    print_r( $_FILES ) ;




    include( "kapcsolat.php" ) ;

    function randomstring($h)
    {
        $c = "0123456789abcdefghijklmnopqrstuvwxyz" ;
        $s = "" ;
        for( $i=0; $i<$h; $i++) $s .= substr( $c , rand(0, strlen($c)-1) , 1 ) ;
        return $s ;
    }
    
    $kepnev = $_SESSION['uid'] . "_" . date("ymdHis") . "_" . randomstring(10) ;

    $kepadat = $_FILES['uprofkep'] ;

    if( $kepadat['type']=="image/jpeg" ) $kiterj = ".jpg" ; else
    if( $kepadat['type']=="image/png" ) $kiterj = ".png" ; else
        die("<script> alert ('A kép csak JPG vagy PNG lehet!') </script>") ;

        $kepnev .= $kiterj ;

        move_uploaded_file(  $kepadat['tmp_name'], "./profilkepek/" . $kepnev ) ;

        $eredetikepnev = $kepadat['name'] ;

        print "<br>" . randomstring(10) ;



            if( $_POST['txt']=="") die("<script> alert('Nick név?') </script> ") ;

    mysqli_query( $adb , "
    
            UPDATE user
            SET unick                   = '$_POST[txt]'    ,
                uemail                  = '$_POST[email]'  ,
                uprofkep_nev            = '$kepnev' ,
                uprofkep_eredetinev     = '$eredetikepnev'

                WHERE uid = '$_POST[uid]'

    " );
        $_SESSION['txt'] = $_POST['txt'];

        print "
                <script>
                        alert('Adataidat módosítottuk.')
                        parent.location.href = parent.location.href
                </script>

        ";
    mysqli_close( $adb );
?>