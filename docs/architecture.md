## 1. Présentation générale
Le projet **MaBagnole** est développé en PHP natif en respectant
l’architecture **MVC (Model – View – Controller)**.
Cette architecture permet une séparation claire des responsabilités
et facilite la maintenance et l’évolution du projet.

# Architecture MVC – MaBagnole
1. index.php : C'est le point d'entrée unique (Front Controller). Tout passe par ici. Son rôle est d'initialiser l'autoloader, de charger la configuration et de lancer le "Routeur" pour appeler le bon contrôleur.

2. Dossier config/
database.php : Contient les paramètres de connexion à ta base de données (host, dbname, user, password). Il retourne généralement une instance de PDO.

3. Dossier app/controllers/ (La Logique)
BaseController.php : Le contrôleur parent. Il contient les méthodes communes à tous les contrôleurs 
CategoriesController.php : Gère la logique liée aux catégories .
VehiculesController.php : Gère la logique des véhicules .

4. Dossier app/models/ (Les Données)
BaseModel.php : Contient la connexion à la base de données et les requêtes SQL génériques .
User.php, Categorie.php, Vehicule.php : Ces fichiers représentent tes tables SQL. Chaque classe contient les requêtes spécifiques à sa table.

5. Dossier app/views/ (L'Affichage)
C'est ici qu'on trouve uniquement du HTML et un peu de PHP pour afficher les variables.
layout/ (header.php / footer.php) : Contient les parties communes à toutes tes pages .
categories/list.php : La page qui affiche la liste des catégories de voitures.
vehicules/detail.php : La page qui affiche les informations détaillées d'un véhicule spécifique.

## Flux requête :
URL → index.php (Routeur) → Controller → Model → View

## Classes :
- BaseModel (abstrait) ← Categorie, Vehicule (héritage)
- BaseController (abstrait)

## Mots-clés : Encapsulation, Héritage, Abstraction, Polymorphisme
