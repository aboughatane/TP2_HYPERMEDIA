<?php
function transfert(){
    $size_image = 0;
    $type_image = '';
    $title_image = '';
    $taille_max = 250000;
    $mysqlClient = is_uploaded_file($_FILES['file']['tmp_name']);
    
    if (!$mysqlClient) {
        echo "Problème de transfert";
        return false;

    } else {
        $size_image = $_FILES['file']['size'];
        
        // Gérer la taille de l'image
        if ($size_image > $taille_max) {
            echo "Attention ce fichier est trop gros !";
            return false;
        }

        $file_tmp = $_FILES['file']["tmp_name"];
        $type_image = $_FILES['file']['type'];
        $title_image  = $_FILES['file']['name'];
        $path_image = "photo/".$title_image;
        
        // connexion à la base de données
        include("pdo.php");
        echo "Fichier bien reçu ! <br>";


    // enregistrer l'images et ses informations dans la bdd
    $querry = "INSERT INTO images (" . "title_image, size_image, type_image, blob_image, path_image " .") VALUES (" .
    "'" . $title_image . "', " .
    "'" . $size_image . "', " .
    "'" . $type_image . "', " .
    "'" . $path_image . "', " .
    "') ";
        move_uploaded_file($file_tmp,$path_image);
        $imageInsert = $mysqlClient->prepare($querry);
        $inserted = $imageInsert->execute();
    }
}

// include("pdo.php");
// $sqlQuery = 'select count(id) as compt from books';  // la requete sql
// $count = $mysqlClient->prepare($sqlQuery); 
// $count->execute(); 	
// $booksCount = $count->fetchAll();

// // Mise en place de la pagination
// $page = $_GET["page"];
// $elementsPerPage = 1;  // Mettre qu'un seul element dans la page (un livre par page)
// $pagesCount=ceil($booksCount[0]["compt"]/$elementsPerPage);  // pagesCount est le nombre de page qu'on va avoir -  ceil permet d'arrondir le nombre pour un avoir un nombre entier
// $start = ($page-1) * $elementsPerPage;  // l'element par lequel commencer


// // On récupère tout le contenu de la table books
// $sqlQuery = 'SELECT * FROM books limit :start,:elementsPerPage';
// $booksStatement = $mysqlClient->prepare($sqlQuery);
// $booksStatement->bindValue('elementsPerPage',$elementsPerPage,PDO::PARAM_INT);
// $booksStatement->bindValue('start',$start,PDO::PARAM_INT);
// $booksStatement->execute();
// $books = $booksStatement->fetchAll();

?>
