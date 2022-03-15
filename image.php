<!DOCTYPE html>
<html>
   <head>
      <title>bdd images</title>
   </head>
   <body>
   <?php
      include ("transfert.php");
      if ( isset($_FILES['file'])){
             transfert();
      }                 
   ?>
   <div style="text-align:center;">  
      <h1>Envoyer une image </h1>
      <form enctype="multipart/form-data" action="#" method="post">
         <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
         <input type="file" name="fic" size=1000/>
         <input type="submit" value="Envoyer" />
         <br><br>
      </form>
      <h2 > Voici les images présentes dans la base : </h2>
      <div style="padding: 50px 50px 50px 50px; bottom: 20;">
         <?php
            // Afficher l'image
            $imgs = glob("photo/*.{jpg,png,gif}", GLOB_BRACE);
            foreach ($imgs as $img) {
               echo "<img src='$img' alt='image bdd' width='150' height='150'>";
              
            }
         ?>
      </div>
   </div>
   </body>
</html>
