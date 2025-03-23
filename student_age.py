import json
from flask import Flask, jsonify
from flask_httpauth import HTTPBasicAuth

app = Flask(__name__)
auth = HTTPBasicAuth()

# Données des étudiants
students = []

@auth.verify_password
def verify_password(username, password):
    if username == 'toto' and password == 'python':
        return True
    return False

@app.route('/SUPMIT/api/v1.0/get_student_ages', methods=['GET'])
@auth.login_required
def get_student_ages():
    return jsonify(students)

if __name__ == '__main__':
    # Charger les données des étudiants depuis le fichier JSON
    try:
        with open('/data/student_age.json', 'r') as f:
            students = json.load(f)
            print("Données des étudiants chargées avec succès :", students)  # Log supplémentaire
    except FileNotFoundError:
        print("Erreur : Le fichier /data/student_age.json n'a pas été trouvé.")
    except json.JSONDecodeError:
        print("Erreur : Le fichier /data/student_age.json est mal formaté.")
    except Exception as e:
        print(f"Erreur inattendue lors du chargement du fichier JSON : {e}")
    
    # Démarrer l'API
    app.run(host='0.0.0.0', port=5000)
