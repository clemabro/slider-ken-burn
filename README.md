# slider-ken-burn

## Config :
Il faut renseigné le fichier `config.json` pour pouvoir connecter l'application à une BDD et le mettre dans le dossier `modeles`.
Le fichier de création de base avec de données se trouve dans le dossier `bdd/slider_structure.sql`

### Exemple de ficher `config.json`

```json
{
    "HOSTBDD" : "localhost:3306",
    "LOGIN" : "root",
    "PASSWORD" : "root",
    "NOMDELABASE" : "slider"
}
```

Une fois l'application lancé, il suffit de vous y inscrire et vous pourrez créer des diaporamas.

## Fonctionalités implémentées
* Création de diaporamas avec l'upload d'image.
* Voir le diaporama d'image.

## Fonctionalités non implémentées
* La visualisation du diaporama avec l'effet ken burn.
* La configuration de l'effet.
