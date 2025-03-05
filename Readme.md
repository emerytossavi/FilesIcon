# Files Icon Generator

* V 01

Ce projet sert à la génération d'icons de fichiers à partir du fichier CSV à la racine du projet.

### Generation :

```
php Gen
```
##
If necessary

```
composer update
```

#### NB :
Le tableau csv est éditable.

#### Personnalisation du CSV

- name => Extension (Ex : txt)
- rectWith => Larguer du fichier (Ex : 80)
- rectHeight => Longueur du fichier (Ex : 110)
- radius => Angle des bords (Ex : 15)

- r1 => Couleur de texte  (Ex : 0 )
- g1 => Couleur de texte (Ex : 0 )
- b1 => Couleur de texte (Ex : 0 )

- r2 => Couleur du fond  (Ex : 90 )
- g2 => Couleur du fond (Ex : 90 )
- b2 => Couleur du fond (Ex : 90 )

- r3 => Couleur de déco  (Ex : 160 )
- g3 => Couleur de déco (Ex : 160 )
- b3 => Couleur de déco (Ex : 160 )

- extension => Type de fichier souhaité ["png", "webp", "jpeg", "jpp", "gif"] (Ex : png)

###### Exemple de ligne à ajouter à la table CSV :

```
txt,80,110,15,0,0,0,90,90,90,160,160,160,"png"

```