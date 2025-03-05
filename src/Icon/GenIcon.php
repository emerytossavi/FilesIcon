<?php

namespace Icon;

class GenIcon
{

    public function createIcon(
        $name,
        $rectWidth = 80,
        $rectHeight = 110,
        $radius = 15,
        $color1 = ["r" => 255, "g" => 100, "b" => 60],
        $color2 = ["r" => 95, "g" => 140, "b" => 255],
        $color3 = ["r" => 130, "g" => 190, "b" => 255],
        $extension = "png",
        $style = IMG_ARC_EDGED
    ) {
        try {
            //$dir = __DIR__ . "/icons/";
            $dir = dirname(__DIR__, 2) . "/icons/"; // Remonter de deux niveaux à partir du fichier actuel

            if (!is_dir($dir)) {
                mkdir($dir);
            }

            // Création de l'image de base (taille 80x100)
            $imageWithRadius = imageCreateTrueColor($rectWidth, $rectHeight);

            // Allouer des couleurs
            $color1 = imageColorAllocate($imageWithRadius, $color1["r"], $color1["g"], $color1["b"]);
            $color2 = imageColorAllocate($imageWithRadius, $color2["r"], $color2["g"], $color2["b"]);
            $color3 = imageColorAllocate($imageWithRadius, $color3["r"], $color3["g"], $color3["b"]);

            // Créer une image avec fond transparent
            $transparentColor = imageColorAllocateAlpha($imageWithRadius, 0, 0, 0, 127); // Couleur transparente
            imageFill($imageWithRadius, 0, 0, $transparentColor);
            imageSaveAlpha($imageWithRadius, true);

            // Dessiner le rectangle avec coins arrondis
            imageFilledRectangle($imageWithRadius, $radius, 0, $rectWidth - 1.5 * $radius, 1.5 * $radius, $color2); // Bloc Y1
            imageFilledRectangle($imageWithRadius, $radius, 1.5 * $radius, $rectWidth - $radius, $rectHeight, $color2); // Bloc Y2

            imageFilledRectangle($imageWithRadius, 0,  $radius, $rectWidth - 1.5 * $radius,  1.5 * $radius, $color2); // Bloc X1
            imageFilledRectangle($imageWithRadius, 0,  1.5 * $radius, $rectWidth, $rectHeight - $radius, $color2); // Bloc X2

            imageFilledArc($imageWithRadius, $radius, $radius, $radius * 2, $radius * 2, 180, 270, $color2, $style); // Coin haut gauche

            imageFilledArc($imageWithRadius, $radius, $rectHeight - $radius, $radius * 2, $radius * 2, 90, 180, $color2, $style); // Coin bas gauche
            imageFilledArc($imageWithRadius, $rectWidth - $radius, $rectHeight - $radius, $radius * 2, $radius * 2, 0, 90, $color2, $style); // Coin bas droit

            // Ajouter le polygone

            $values = array(
                $rectWidth - 1.5 * $radius,
                1.5 * $radius, // Point 1 (x, y)
                $rectWidth - 1.5 * $radius,
                -1,  // Point 2 (x, y)
                $rectWidth,
                1.5 * $radius // Point 3 (x, y)
            );

            // Draw the polygon
            imagefilledpolygon($imageWithRadius, $values, 3, $color3);

            // Ajouter le texte avec une police TTF
            $fontFile = __DIR__ . "/Arial.ttf"; // Chemin vers la police (changez selon votre fichier)
            $text = "." . strtolower($name);

            $fontSize = 15; // Taille du texte
            $x = 15; // Position X
            $y = 20 + $rectHeight * 0.5; // Position Y

            imageFilledRectangle($imageWithRadius, 8, $rectHeight * 0.5, 72, 25 + $rectHeight * 0.5, $color3);

            imagettftext($imageWithRadius, $fontSize, 0, $x, $y, $color1, $fontFile, $text);

            // Déterminer le type MIME et la fonction d'enregistrement en fonction de l'extension
            $mimeTypes = [
                "png"  => "image/png",
                "jpeg" => "image/jpeg",
                "jpg"  => "image/jpeg",
                "gif"  => "image/gif",
                "webp" => "image/webp",
            ];

            $imageFunctions = [
                "png"  => "imagePng",
                "jpeg" => "imageJpeg",
                "jpg"  => "imageJpeg",
                "gif"  => "imageGif",
                "webp" => "imageWebp",
            ];

            // Vérifier si l'extension est valide
            $extension = strtolower($extension);
            if (!isset($mimeTypes[$extension]) || !isset($imageFunctions[$extension])) {
                die("Extension non prise en charge !");
            }

            // Définir l'en-tête HTTP pour l'affichage de l'image
            //header("Content-type: image/png");
            //header("Content-type: " . $mimeTypes[$extension]);

            // Afficher l'image avec la fonction correspondante
            $imageFunction = $imageFunctions[$extension];
            $imageFunction($imageWithRadius);

            // Sauvegarder l'image sur le serveur
            $imagePath = $dir . $name . "." . $extension;
            $imageFunction($imageWithRadius, $imagePath);

            // Libérer la mémoire
            imageDestroy($imageWithRadius);

            //return $imagePath;
            return "Icons créées avec succès !";
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function create()
    {


        //createIcon("MP3");

        $file = fopen('list_extensions.csv', 'r');

        // Lire la première ligne (en-têtes)
        $headers = fgetcsv($file, 1000, ",");
        //$headers = fgetcsv($file, 1000, ",");

        // Lire les lignes du fichier CSV
        while (($data = fgetcsv($file, 1000, ",")) !== false) {

            // Equilibre les tableaux
            $data = array_pad($data, count($headers), '');
            // Afficher les données lues (chaque ligne sera un tableau)
            $row = array_combine($headers, $data);

            //print_r($data);
            //var_dump ($row['name']);
            //echo "<br>";
            //print_r($row);


            // Créer une icône pour chaque extension
            $texte = [
                'r' => $row['r1'] ?? null,
                'g' => $row['g1'] ?? null,
                'b' => $row['b1'] ?? null
            ];
            $fond = [
                'r' => $row['r2'] ?? null,
                'g' => $row['g2'] ?? null,
                'b' => $row['b2'] ?? null
            ];
            $bordure = [
                'r' => $row['r3'] ?? null,
                'g' => $row['g3'] ?? null,
                'b' => $row['b3'] ?? null
            ];
            // creation de l'image

            GenIcon::createIcon(
                $row['name'],
                $row['rectWidth'] ?? null,
                $row['rectHeight'] ?? null,
                $row['radius'] ?? null,
                $texte,
                $fond,
                $bordure,
                $row['extension'] ?? null
            );

            // Afficher la ligne sous forme de tableau associatif
            //print_r($row);
            //echo "<br><br><br>";
            //break;
        }

        // Fermer le fichier une fois que c'est fait
        fclose($file);
    }
}

//$action = new GenIcon();
//$action->create();