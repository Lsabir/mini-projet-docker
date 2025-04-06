projet realisé par:
abdessamad sabir 
nabil abdelwahd


 Objectif du Projet

Ce projet vise à développer et déployer un Système de Gestion des Âges des Étudiants en utilisant Flask API, PHP, et Docker. Le système permet aux utilisateurs de récupérer les données d'âge des étudiants via une API et de les afficher sur une interface web.

Voici les informations extraites des images :

Image 1 (1.png)
<img width="1470" alt="1" src="https://github.com/user-attachments/assets/bde347f0-a466-4137-ac10-974b7ef8f92e" />

Capture d'écran de Docker Desktop montrant l'état d'un build pour le projet mini-projet-docker.
Il y a un avertissement concernant l'utilisation d'un serveur de développement Flask.
Apache signale un problème avec le ServerName non défini.
Logs indiquant que les services supmit-api et supmit-website fonctionnent.



Image 2 (2.jpeg)

![2](https://github.com/user-attachments/assets/54f9b552-6048-4251-8a29-d75ff01a41dd)
Affiche une erreur liée à un port déjà utilisé (0.0.0.0:5000).
Liste des conteneurs et services démarrés.
Information sur l'utilisation des ressources système.


Image 3 (3.jpeg)<img 

![3](https://github.com/user-attachments/assets/5ffd8976-9a99-4be0-8711-fbfd4914b373)

Historique des builds du projet mini-projet-docker.
Plusieurs builds effectués avec différentes durées.
Informations sur les performances système.










Image 4 (affichage.jpeg)
![affichage](https://github.com/user-attachments/assets/18b60ec8-1f87-47e7-b87a-8e1febe83e2b)


Liste d'étudiants avec leurs âges :
Sabir, 22 ans
Abdessamad, 23 ans
Nabil, 21 ans





PARTIE 2



1. **Cloner ton projet depuis GitHub**
2. **Construire une image Docker**
3. **Tester cette image en lançant un conteneur temporaire**

---

##  **Détail de chaque section du pipeline**

### ### `pipeline { ... }`
C’est le bloc principal qui contient tout le pipeline.

---

###  `agent any`
Indique que le pipeline peut s’exécuter sur n’importe quel agent Jenkins disponible (machine/esclave).

---

###  `environment { ... }`
Définit des **variables d’environnement** que tu réutilises plus tard :
- `DOCKER_IMAGE = "itsaliiiiiiii/simple_api"` → Nom de ton image Docker
- `VERSION = "latest"` → Tag de version de l’image (ici, "latest")

---

##  **Les stages (étapes)**

---

###  `stage('Cloner le projet')`
- Utilise la commande `git` pour **cloner ton dépôt GitHub** :  
   `https://github.com/itsaliiiiiiii/MPDocker.git`

---

###  `stage('Construire image Docker')`
- Exécute la commande Docker :  
   `docker build -t $DOCKER_IMAGE:$VERSION .`
- Cela construit une image Docker avec le tag `itsaliiiiiiii/simple_api:latest`

---

###  `stage('Tester image Docker')`
- **Lance un conteneur Docker temporaire** depuis l’image que tu viens de construire :
  ```bash
  docker run -d --name test-container -p 8080:80 $DOCKER_IMAGE:$VERSION
  ```
- **Attend 5 secondes** pour laisser le conteneur démarrer.
- **Teste l'API** avec `curl -I http://localhost:8080` → vérifie si le serveur répond.
- **Stoppe et supprime le conteneur** une fois le test terminé :
  ```bash
  docker stop test-container && docker rm test-container


# Partie 3
![aws1](https://github.com/user-attachments/assets/ab74f421-a5c6-4726-b7d5-12533b74dc1b)

![Screenshot 2025-04-06 at 23 44 20](https://github.com/user-attachments/assets/1fcf6748-7f99-4b2c-9337-6a216db18bde)


![Screenshot 2025-04-06 at 23 44 25](https://github.com/user-attachments/assets/91ef4cae-8f86-4440-aea3-d4bb6660dbfb)


![Screenshot 2025-04-06 at 23 44 33](https://github.com/user-attachments/assets/8d57f2f5-f9df-4f1d-9286-f219a8172dec)
