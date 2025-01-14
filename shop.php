<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>

<link href="css/font-awesome.min.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="css/responsive.css" rel="stylesheet" />
<link href="css/bootstrap.css" rel="stylesheet" />


    </head>
<body>


    <main>
        
            

    
        <section id="contact">
            
        <section id="products">
       
       <?php
       
       include("kapcsolat.php");

       $result = mysqli_query( $adb , "
           
       SELECT * FROM termekek

         " );
       $datas = mysqli_fetch_array($result, MYSQLI_ASSOC);
       for($i = 0; $i < mysqli_num_rows($result); $i = $i + 1){
         $nev = utf8_encode($datas["nev"]);
         if($i % 3 == 0){
           echo "<div class='product-grid'>";
           echo "
           <div class='product'>
               <img src=kepek/apolo1.png alt='$nev'>
               <h3>$nev</h3>
               <p>Ár: $datas[ar] Ft</p>
               <button>Kosárba</button>
           </div>
           ";
         }else if($i % 3 == 2){
           echo "
           <div class='product'>
               <img src='https://via.placeholder.com/150' alt='$nev'>
               <h3>$nev</h3>
               <p>Ár: $datas[ar] Ft</p>
               <button>Kosárba</button>
           </div>
           ";
           echo "</div>";
         }
         else{
           echo "
           <div class='product'>
               <img src='https://via.placeholder.com/150' alt='$nev'>
               <h3>$nev</h3>
               <p>Ár: $datas[ar] Ft</p>
               <button>Kosárba</button>
           </div>
           ";
         }
         $datas = mysqli_fetch_array($result, MYSQLI_ASSOC);
       }

         mysqli_close( $adb );
       
       ?>
   </section>
        
        </section>
        
    </main>


</body>
</html>

<style>
/* Alapvető stílusok */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    line-height: 1.6;
    color: white;

}






h2 {
    color: #007BFF;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin: 2rem 0;
    border-color: red;
    border: 200 px
}

.product {
  
    border-radius: 5px;
    padding: 1rem;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.product img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

button {
    background: #007BFF;
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #0056b3;
}



    </style>
