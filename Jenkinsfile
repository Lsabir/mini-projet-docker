pipeline {
    agent any

    environment {
        IMAGE_NAME = "tonutilisateurdockerhub/mon-api-student"
    }

    stages {
        stage('Build') {
            steps {
                sh 'docker build -t $IMAGE_NAME .'
            }
        }

        stage('Test') {
            steps {
                sh 'docker run -d -p 5000:5000 $IMAGE_NAME'
                sh 'sleep 5'
                sh 'curl http://localhost:5000 || exit 1'
            }
        }

        stage('Push to Docker Hub') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'dockerhub-creds', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                    sh 'echo $DOCKER_PASS | docker login -u $DOCKER_USER --password-stdin'
                    sh 'docker push $IMAGE_NAME'
                }
            }
        }
    }
}
