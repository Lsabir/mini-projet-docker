<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #f9f9f9;
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des étudiants</h1>
        <?php
        // URL de l'API (utilisez l'adresse IP du conteneur API)
        $url = 'http://172.19.0.2:5000/SUPMIT/api/v1.0/get_student_ages';
        $username = 'toto';
        $password = 'python';

        // Initialisation de cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

        // Exécution de la requête
        $response = curl_exec($ch);

        // Vérifier s'il y a une erreur
        if ($response === false) {
            $error = curl_error($ch);
            echo "<p>Erreur cURL : $error</p>";
        } else {
            // Décodage de la réponse JSON
            $students = json_decode($response, true);

            // Vérifier si la réponse est valide
            if (json_last_error() === JSON_ERROR_NONE) {
                // Affichage de la liste des étudiants
                if ($students) {
                    echo "<ul>";
                    foreach ($students as $student) {
                        echo "<li>" . htmlspecialchars($student['name']) . " - " . htmlspecialchars($student['age']) . " ans</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Aucun étudiant trouvé.</p>";
                }
            } else {
                echo "<p>Erreur lors du décodage de la réponse JSON.</p>";
            }
        }

        // Fermer la session cURL
        curl_close($ch);
        ?>
    </div>
</body>
</html>