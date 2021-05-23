# Equipo

## Introduction
Notre réseau social, appelé Equipo, a été conçu pour les étudiants de l’université de Paris qui souhaitent développer et collaborer avec d’autres étudiants des projets de plusieurs thèmes différents (sciences, design, finances, etc…).

Nous souhaitons faciliter le développement de projets pour les jeunes. Le grand problème que les jeunes rencontrent lorsqu’ils commencent un nouveau projet est de trouver des gens qui partagent les mêmes intérêts et qui ont des compétences complémentaires pour le projet, Equipo souhaite résoudre ce problème, en fournissant un réseau social pour diffuser votre projet comportant un mécanisme de recherche basé sur des intérêts et de collaboration numérique.

En ce qui concerne le développement du projet, nous avons décidé de suivre une méthodologie de développement Agile, de sorte que pour chaque module du projet on avait le processus suivante à completer:

+ Requirements → Design → Development → Test → Review

En outre, nous avons utilisé git et Github pour contrôler les versions du projet et surtout pour travailler à distance sans conflit de version du code. Nous avons utilisé le système "issues" de Github pour organiser les tâches de notre projet et pour avoir un suivi de "bugs" repérés lors des tests qu'on réalisait et pour identifier les fonctionnalités qui restaient pour compléter le projet dans sa version prototype.

Pour la création de nos pages nous avons utilisé le logiciel Figma afin de prototyper en avance les pages et comprendre le parcours que l'utilisateur devra faire dans le site. C'était très utile car cela nous a permis de comprendre les fonctions PHP nécessaires et le bon chemin à prendre pour arriver à notre idée initiale.

Le projet a deux "releases", le premier étant la version 1 du projet qui est équivalent à 50% des tâches terminées et la version 2, 100% des tâches ont été achevées et le projet est au niveau "prototype", nous pouvons trouver dans cette version du projet toutes les "fonctionnalités" relatives à ce que le projet propose.

## Fonctionnement
Notre projet a été développé en modules. Chaque module représente une partie significative du projet, il est important de souligner que les modules ont des interdépendances, même s’ils sont écrits séparément, pour que le projet fonctionne correctement, tous les modules doivent être présents dans le dossier.

## Modules
* admin : création de comptes de type administrateur.
* database : création, manipulation et suppression réalisées avec la base de données.
* design : fichiers de css pour la conception du site.
* home : module qui abrite les fonctions relatives à la page d’accueil et le système de recherche du site.

* login : module contenant les fonctions relatives à la connexion de l’utilisateur.
* signup : module abritant les fonctions relatives à la création d’un compte.
* profil : module abritant les fonctions relatives au profil de l’utilisateur.
* project : module abritant les fonctions relatives au projet de l’utilisateur.

## Structure
Presque tous les modules suivent la structure de fichier suivante : Un fichier [nom_module].php qui est responsable de la gestion des URLs du site.  Un fichier func_display.php qui s'occupe des fonctions qui renvoient des portions de code html dynamique relatif au module. Un fichier func_valid.php, si le module possède un formulaire qui doit être traité, par exemple le module signup et login.

## Fonctionnalités
Sur Equipo vous pouvez
- créer un compte (pseudo, email, mot de passe, âge, genre et intérêts).
- créer un projet (nom, description et sujet).
- rechercher des projets basés sur les sujets, le nom de l’utilisateur et le nom du projet.
- Upvote un projet.
- Envoyer une demande pour devenir un collaborateur du projet.
## Testez
Pour tester le projet, lancez XAMPP dans le terminal, puis accédez au dossier des fichiers binaires Mysql pour créer la base de données. Par exemple:

Windows
// Etape 1
C:\Users\user\XAMPP>xampp-control.exe
// Etape 2
C:\Users\user\XAMPP\mysql\bin>mysql -u root -p
//Etape 3
MariaDB [(none)]> use equipo;
// Etape 4
MariaDB [equipo]> source C:\Users\user\XAMPP\equipo\create_app_tables.sql


Linux
// Etape 1
Lancez XAMPP et mettez le répertoire du site dans : /opt/lampp/htdocs/
// Etape 2
/opt/lampp/bin/mysql -u root -p
//Etape 3
MariaDB [(none)]> use (nom de base de données);
// Etape 4
Faites : source /opt/lampp/htdocs/equipo/database/create_app_tables.sql;


Dans le fichier user.php changer les variables globales $password et $database selon votre base de données ($password étant le mot de passe de votre base de données et $database son nom).

Ensuite accédez au serveur php localement via votre navigateur favori et accédez à l'URL suivante afin que le projet démarre de la façon attendu. Faites attention à respecter le chemin du dossier dans votre machine.



Les comptes administrateurs seront créés voici leur identifiant :
-pseudo : admin_yacine -mdp: admin01
-pseudo: admin_paris -mdp: admin02
Vous êtes maintenant prêt à explorer la plateforme !
Equipo Team
Paris Mollo & Yacine Ahmed Yahia
