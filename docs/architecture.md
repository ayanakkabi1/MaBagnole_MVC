# Architecture MVC – MaBagnole

## 1. Présentation générale
Le projet **MaBagnole** est développé en PHP natif en respectant
l’architecture **MVC (Model – View – Controller)**.
Cette architecture permet une séparation claire des responsabilités
et facilite la maintenance et l’évolution du projet.

## Flux requête :
URL → index.php (Routeur) → Controller → Model → View

## Classes :
- BaseModel (abstrait) ← Categorie, Vehicule (héritage)
- BaseController (abstrait)

## Mots-clés : Encapsulation, Héritage, Abstraction, Polymorphisme
