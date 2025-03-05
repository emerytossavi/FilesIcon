<?php


function createIcon($name, $rectWidth = 80, $rectHeight = 110, $radius = 15, $color1 = ["r" => 255, "g" => 0, "b" => 0] , $color2 = ["r" => 25, "g" => 10, "b" => 155], $color3 = ["r" => 130, "g" => 190, "b" => 255], $style = IMG_ARC_EDGED) {

}

// Appliquer un rectangle avec coins arrondis (utiliser imagefilledarc pour chaque coin)
$radius = 15; // Rayon des coins arrondis
$rectWidth = 80;
$rectHeight = 110;

$name = "MP3";

$style = IMG_ARC_EDGED; // Style des arcs


// Création de l'image de base (taille 80x100)
$imageWithRadius = imageCreateTrueColor($rectWidth, $rectHeight);

// Allouer des couleurs
$color1 = imageColorAllocate($imageWithRadius, 255, 0, 0);
$color2 = imageColorAllocate($imageWithRadius, 25, 100, 155);
$color3 = imageColorAllocate($imageWithRadius, 130, 190, 255);


// Créer une image avec fond transparent
$transparentColor = imageColorAllocateAlpha($imageWithRadius, 0, 0, 0, 127); // Couleur transparente
imageFill($imageWithRadius, 0, 0, $transparentColor);
imageSaveAlpha($imageWithRadius, true);


// Dessiner le rectangle avec coins arrondis
imageFilledRectangle($imageWithRadius, $radius, 0, $rectWidth - 1.5 * $radius, 1.5 * $radius, $color2); // Bloc Y1
imageFilledRectangle($imageWithRadius, $radius, 1.5 *$radius, $rectWidth - $radius,$rectHeight, $color2); // Bloc Y2

imageFilledRectangle($imageWithRadius, 0,  $radius, $rectWidth - 1.5 * $radius,  1.5 * $radius, $color2); // Bloc X1
imageFilledRectangle($imageWithRadius, 0,  1.5 * $radius, $rectWidth, $rectHeight - $radius, $color2); // Bloc X2


imageFilledArc($imageWithRadius, $radius, $radius, $radius * 2, $radius * 2, 180, 270, $color2, $style); // Coin haut gauche
//imageFilledArc($imageWithRadius, $rectWidth - $radius, $radius, $radius * 2, $radius * 2, 270, 360, $color2, $style); // Coin haut droit

//imageFilledArc($imageWithRadius, $rectWidth - $radius, $radius, $radius * 2, $radius * 2, 270, 360, $color3, $style); // Coin haut droit

imageFilledArc($imageWithRadius, $radius, $rectHeight - $radius, $radius * 2, $radius * 2, 90, 180, $color2, $style); // Coin bas gauche
imageFilledArc($imageWithRadius, $rectWidth - $radius, $rectHeight - $radius, $radius * 2, $radius * 2, 0, 90, $color2, $style); // Coin bas droit

// Ajouter le polygone
    
$values = array(
    60, -50, // Point 1 (x, y)
    60, 15,  // Point 2 (x, y)
    800, 15 // Point 3 (x, y)
);


$values = array(
    $rectWidth - 1.5 * $radius, 1.5 *$radius, // Point 1 (x, y)
    $rectWidth - 1.5 * $radius, -1,  // Point 2 (x, y)
    $rectWidth, 1.5 * $radius // Point 3 (x, y)
);

// Draw the polygon
imagefilledpolygon($imageWithRadius, $values, 3, $color3);


// Ajouter le texte

imageFilledRectangle($imageWithRadius, 8, $rectHeight* 0.5, 72, 25 + $rectHeight* 0.5, $color3);

//$text = ".MP3";
//imagestring($imageWithRadius, 20, 15, 50, $text, $color1);

// Ajouter le texte avec une police TTF
$fontFile = __DIR__ . "/Arial.ttf"; // Chemin vers la police (changez selon votre fichier)
$text = ".".strtolower($name);

$fontSize = 15; // Taille du texte
$x = 15; // Position X
$y = 20 + $rectHeight * 0.5 ; // Position Y
imagettftext($imageWithRadius, $fontSize, 0, $x, $y, $color1, $fontFile, $text);


// Afficher l'image avec coins arrondis
header("Content-type: image/png");
imagePng($imageWithRadius);

// Libérer la mémoire
imageDestroy($imageWithRadius);
?>


<?php
/* 
    // Création de l'image de base
    $image = imageCreate(80, 100);

    // Allouer des couleurs
    $color1 = imageColorAllocate($image, 255, 0, 0);
    $color2 = imageColorAllocate($image, 255, 185, 0);
    $color3 = imageColorAllocate($image, 0, 153, 0);

    // Créer une image avec fond transparent
    $imageWithRadius = imageCreateTrueColor(175, 200);
    $transparentColor = imageColorAllocateAlpha($imageWithRadius, 0, 0, 0, 127); // Couleur transparente
    imageFill($imageWithRadius, 0, 0, $transparentColor);
    imageSaveAlpha($imageWithRadius, true);

    // Appliquer un rectangle avec coins arrondis (utiliser imagefilledarc pour chaque coin)
    $radius = 30; // Rayon des coins arrondis
    $rectWidth = 175;
    $rectHeight = 200;

    // Dessiner le rectangle avec coins arrondis
    imageFilledRectangle($imageWithRadius, $radius, 0, $rectWidth - $radius, $rectHeight, $color2); // Bord droit
    imageFilledRectangle($imageWithRadius, 0, $radius, $rectWidth, $rectHeight - $radius, $color2); // Bord bas
    imageFilledArc($imageWithRadius, $radius, $radius, $radius * 2, $radius * 2, 180, 270, $color2, IMG_ARC_EDGED); // Coin haut gauche
    imageFilledArc($imageWithRadius, $rectWidth - $radius, $radius, $radius * 2, $radius * 2, 270, 360, $color2, IMG_ARC_EDGED); // Coin haut droit
    imageFilledArc($imageWithRadius, $radius, $rectHeight - $radius, $radius * 2, $radius * 2, 90, 180, $color2, IMG_ARC_EDGED); // Coin bas gauche
    imageFilledArc($imageWithRadius, $rectWidth - $radius, $rectHeight - $radius, $radius * 2, $radius * 2, 0, 90, $color2, IMG_ARC_EDGED); // Coin bas droit

    // Ajouter le texte
    $text = "MP3";
    imagestring($imageWithRadius, 40, 70, 120, $text, $color1);

    // Afficher l'image avec coins arrondis
    header("Content-type: image/png");
    imagePng($imageWithRadius);

    // Libérer la mémoire
    imageDestroy($imageWithRadius);
 */
?>

