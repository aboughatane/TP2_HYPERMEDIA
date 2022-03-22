<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css.css">
      <title>bdd images</title>
   </head>
   <body>
   <?php
      include ("transfert.php");
      if ( isset($_FILES['file'])){
             transfert();
      }                 
   ?>
<div  id="div">
      <h1>Envoyer une image </h1>
      <form enctype="multipart/form-data" action="#" method="post">
         <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
         <input type="file" name="fic" size=1000/>
         <input type="submit" value="Envoyer" />
         <br><br>
      </form>
</div>
      <h2 > Voici les images présentes dans la base : </h2>
      <div style="padding: 50px 50px 50px 50px; bottom: 20; text-align:center;">
         <?php
            // Afficher l'image
            $imgs = glob("photo/*.{jpg,png,gif}", GLOB_BRACE);
            foreach ($imgs as $img) {
               echo "<img src='$img' alt='image bdd' width='150' height='150'>";
            }
         ?>
      </div>

      <footer id="footer">

    // la boucle pour afficher les elements page par page
   //  echo "heloo"
   //  for($i=1; $i<=$pagesCount; $i++)
      //   echo "<a href='?page=$i'> $i </a>&nbsp &nbsp";

   </body>
</html>
