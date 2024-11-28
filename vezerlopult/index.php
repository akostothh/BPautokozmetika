<!DOCTYPE html>
<html>
    <head>

        <meta name='robots' content='noindex'>

            <style>
                    body
                    {
                        margin:0; 
                    }
                    div#menu
                    {
                        background-color :#BBB ;
                        text-align : center;
                    }
                    div#menu a
                    {
                        display: inline-block ;
                        width: 160px ;
                        text-decoration: none ;
                        color: #777;
                    }
                    div#menu a:hover
                    {
                        color: #000;
                    }
        </style>

    </head>

    <body>
    
            <div id='menu'>

                <a href='../' target=_blank>fooldal</a>
                <a href='./?p=userek'>Userek, belépések</a>
                <a href='./?p=tipusok'>Mosástípusok szerkesztése</a>
                <a href='./?p=valami'>Valami</a>
                <a href=''>Nem tudom...</a>

            </div>

            <div id='tartalom'>

                <?php

                    if   (isset($_GET['p']) ) $p = $_GET['p'] ;
                    else                      $p = ""         ;

                    if( $p=="userek"     )       include("userek.php"       );
                    if( $p=="tipusok"    )       include("tipusok.php"      );
                    if( $p=="Valami"     )       include("valami.php"       );


                ?>

            </div>
    </body>
</html>