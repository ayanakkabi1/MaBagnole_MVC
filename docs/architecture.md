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
1. L'URL : Le point de départ
Tout commence quand l'utilisateur tape une adresse ou clique sur un lien (ex: mabagnole/vehicule/voir/5). Cette URL contient l'intention de l'utilisateur : "Je veux voir le véhicule avec l'ID 5".

2. index.php (Le Routeur) : L'aiguilleur
Dans un projet MVC, toutes les requêtes arrivent au même endroit : index.php.

Son rôle : Il analyse l'URL. Il se demande : "Quelle page est demandée ?".

L'action : Il fait appel à l'Autoloader pour charger les bons fichiers, puis il passe la main au bon Contrôleur.

3. Le Controller : Le cerveau
C'est lui qui prend les décisions. Il ne sait pas faire de SQL, et il ne sait pas faire de HTML. Il se contente de commander les autres.

Son rôle : Réceptionner la demande de index.php.

L'action : Il demande au Modèle : "Donne-moi les infos de la voiture n°5". Une fois qu'il a les infos, il appelle la Vue.

4. Le Model : Le bibliothécaire
Le Modèle est le seul qui a le droit de parler à la base de données (database.php).

Son rôle : Gérer les données.

L'action : Il va chercher la ligne correspondante en SQL, il prépare les données proprement, et il les renvoie au Contrôleur.

5. La View : L'artiste
C'est la fin du voyage. La Vue reçoit les données mais ne sait pas d'où elles viennent.

Son rôle : L'affichage.

L'action : Elle prend les infos (Marque, Prix, Photo) et les injecte dans ton HTML (avec tes fichiers header.php et footer.php). C'est ce que l'utilisateur voit enfin sur son écran.
## Classes :
- BaseModel (abstrait) ← Categorie, Vehicule (héritage)
- BaseController (abstrait)

## Mots-clés : Encapsulation, Héritage, Abstraction, Polymorphisme
