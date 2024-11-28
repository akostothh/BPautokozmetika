<?php

    session_start() ;

    session_unset();

    session_destroy() ;
    
    print "<script> parent.location.href ='./' </script>";

    ?>