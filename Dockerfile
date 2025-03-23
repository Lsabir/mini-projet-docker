# Utiliser l'image de base Python 3.8
FROM python:3.8-buster

# Définir le mainteneur
LABEL maintainer="Votre Nom <votre.email@example.com>"

# Mettre à jour les paquets et installer les dépendances système
RUN apt-get update -y && \
    apt-get install -y python3-dev libsasl2-dev libldap2-dev libssl-dev

# Copier le fichier requirements.txt dans le conteneur
COPY requirements.txt /requirements.txt

# Installer les dépendances Python
RUN pip3 install -r /requirements.txt

# Créer un dossier pour les données persistantes
RUN mkdir /data

# Copier le code source de l'API dans le conteneur
COPY student_age.py /student_age.py

# Exposer le port 5000 pour l'API (interne au conteneur)
EXPOSE 5000

# Commande pour démarrer l'API
CMD ["python3", "./student_age.py"]