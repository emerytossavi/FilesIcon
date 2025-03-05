<?php
    $image = imageCreate(175,200);

    $colorRed = imageColorAllocate($image, 255,0,0);
    $colorYellow = imageColorAllocate($image, 255,255,0);

    imageFilledRectangle($image, 10, 90, 165, 140, $colorYellow);

    /* 
        // Set the color of an ellipse. 
        $col_ellipse = imagecolorallocate($image, 250, 200, 200); 
            
        // Function to draw the filled ellipse. 
        imagefilledellipse($image, 175,  0, 100, 75, $col_ellipse); 
     */

     // Set the vertices of polygon
    $values = array(
        175,  0, // Point 1 (x, y)
        120, 0,  // Point 2 (x, y)
        250,  120 // Point 3 (x, y)
    );
    // Set image color
    $gr = imagecolorallocate($image, 0, 153, 0);

    // Draw the polygon
    imagefilledpolygon($image, $values, 3, $colorYellow);

    $text = "MP3";
    imagestring($image, 40, 70, 120, $text, $colorRed);


    //imagePolygon($image, $values, 3, $colorRed);

    header("Content-type: image/pgn");
    imagePng($image);

    imageDestroy($image);
?>

<?php
/* 
    $image = imageCreate(175,200);

    $colorRed = imageColorAllocate($image, 255,0,0);
    $colorYellow = imageColorAllocate($image, 255,255,0);

    imageFilledRectangle($image, 10, 90, 165, 140, $colorYellow);

    /*
        // Set the color of an ellipse. 
        //$col_ellipse = imagecolorallocate($image, 250, 200, 200); 
            
        // Function to draw the filled ellipse. 
        //imagefilledellipse($image, 175,  0, 100, 75, $col_ellipse); 
        /*

     // Set the vertices of polygon
    $values = array(
        175,  0, // Point 1 (x, y)
        120, 0,  // Point 2 (x, y)
        250,  120 // Point 3 (x, y)
    );
    // Set image color
    $gr = imagecolorallocate($image, 0, 153, 0);

    // Draw the polygon
    imagefilledpolygon($image, $values, 3, $colorYellow);

    $text = "MP3";
    imagestring($image, 40, 70, 120, $text, $colorRed);


    //imagePolygon($image, $values, 3, $colorRed);

    header("Content-type: image/png");
    imagePng($image);

    imageDestroy($image);
     */
?>



<?php
    /*
    // Définir la taille de l'image
    $width = 200;
    $height = 250;

    // Créer une image vide
    $image = imagecreatetruecolor($width, $height);

    // Définir les couleurs
    $blue = imagecolorallocate($image, 30, 144, 255);
    $white = imagecolorallocate($image, 255, 255, 255);

    // Remplir l'arrière-plan en bleu
    imagefilledrectangle($image, 0, 0, $width, $height, $blue);

    // Ajouter du texte "MP3"
    $font = __DIR__ . '/arial.ttf'; // Assure-toi d'avoir un fichier TTF dans le dossier
    $fontSize = 30;
    $text = "MP3";
    $textX = 50;
    $textY = 150;

    // Vérifier si la police existe
    if (file_exists($font)) {
        imagettftext($image, $fontSize, 0, $textX, $textY, $white, $font);
    } else {
        imagestring($image, 5, 70, 120, $text, $white);
    }

    // Enregistrer l'image sur le serveur
    $imagePath = __DIR__ . "/icone_mp3.png";
    imagepng($image, $imagePath);

    // Détruire l'image en mémoire
    imagedestroy($image);

    // Afficher un message de confirmation
    echo "Image générée et enregistrée : <a href='icone_mp3.png'>Télécharger l'icône</a>";
    */
?>

<?php
    /* 
        // Définir la taille de l'image
        $width = 175;
        $height = 200;

        // Créer une image vide
        $image = imagecreatetruecolor($width, $height);

        // Définir les couleurs
        $blue = imagecolorallocate($image, 30, 144, 255);
        $white = imagecolorallocate($image, 255, 255, 255);

        // Remplir l'arrière-plan en bleu
        imagefilledrectangle($image, 0, 0, $width, $height, $blue);

        // Ajouter du texte "MP3"
        $font = __DIR__ . '/arial.ttf'; // Assure-toi d'avoir un fichier TTF dans le dossier
        $fontSize = 30;
        $text = "MP3";
        $textX = 50;
        $textY = 150;

        // Vérifier si la police existe
        if (file_exists($font)) {
            imagettftext($image, $fontSize, 0, $textX, $textY, $white, $font, $text);
        } else {
            imagestring($image, 5, 70, 120, $text, $white);
        }

        // Enregistrer l'image sur le serveur
        $imagePath = __DIR__ . "/icone_mp3.png";
        imagepng($image, $imagePath);

        // Détruire l'image en mémoire
        imagedestroy($image);

        // Afficher un message de confirmation
        echo "Image générée et enregistrée : <a href='icone_mp3.png'>Télécharger l'icône</a>";
    */
?>

<?php
    /* // Définir la taille de l'image
    $width = 175;
    $height = 200;

    // Créer une image vide
    $image = imagecreatetruecolor($width, $height);

    // Définir les couleurs
    $blue = imagecolorallocate($image, 30, 144, 255);
    $white = imagecolorallocate($image,  0, 0, 0);

    // Remplir l'arrière-plan en bleu
    imagefilledrectangle($image, 0, 0, $width, $height, $blue);

    // Ajouter du texte "MP3"
    $font = __DIR__ . '/arial.ttf'; // Assure-toi d'avoir un fichier TTF dans le dossier
    $fontSize = 100;
    $text = "MP3";
    $textX = 50;
    $textY = 150;

    // Vérifier si la police existe
    if (file_exists($font)) {
        imagettftext($image, $fontSize, 0, $textX, $textY, $white, $font, $text);
    } else {
        imagestring($image, 5, 70, 120, $text, $white);
    }

    // Enregistrer l'image sur le serveur
    $imagePath = __DIR__ . "/icone_mp3.png";
    imagepng($image, $imagePath);

    // Détruire l'image en mémoire
    imagedestroy($image);

    // Afficher un message de confirmation
    echo "Image générée et enregistrée : <a href='icone_mp3.png'>Télécharger l'icône</a>"; */
?>
