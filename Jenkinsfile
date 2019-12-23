pipeline {
    agent { label "linux" }
    options {  
       buildDiscarder( logRotator( numToKeepStr: '13' ) ) 
       disableConcurrentBuilds()
    }
    triggers { 
       githubPush() 
       cron('H H(18-19) * * *') 
    }
    environment { 
       DB_DATABASE = 'test'
       DB_HOST = 'db'
       DB_PASSWORD = 'secret'
    }
    stages {
      stage('Build') {
         steps {
            githubNotify account: 'rdok',
               context: 'CI',
               credentialsId: 'status-check-github-token',
               description: 'Jenkins',
               repo: 'spacex-explorer',
               sha: "${env.GIT_COMMIT}",
               status: 'PENDING'

            sh '''#!/bin/bash
               set -e
               source aliases
               docker-compose-app up -d
               docker-compose-app exec -u `id -u`:`id -g` -T php sh -c '
                  composer install
                  ./docker/wait-for-it.sh "db:3306"
                  php artisan migrate --env=testing
               '
            '''
         }
      }
      stage('Test') {
         steps {
            sh '''#!/bin/bash
               set -e
               source aliases

               docker-compose-app exec -u `id -u`:`id -g` -T php \
                  ./vendor/bin/phpunit --testdox-html testdox/index.html
            '''
         }
      }
    }
    post {
        failure {
            githubNotify account: 'rdok',
               context: 'CI',
               credentialsId: 'status-check-github-token',
               description: 'Jenkins',
               repo: 'spacex-explorer',
               sha: "${env.GIT_COMMIT}",
               status: 'FAILURE'
        }
        success {
            githubNotify account: 'rdok',
               context: 'CI',
               credentialsId: 'status-check-github-token',
               description: 'Jenkins',
               repo: 'spacex-explorer',
               sha: "${env.GIT_COMMIT}",
               status: 'SUCCESS'
        }
        always {
           publishHTML([
               allowMissing: false,
               alwaysLinkToLastBuild: true,
               keepAll: false,
               reportDir: 'testdox',
               reportFiles: 'index.html',
               reportName: 'Test',
               reportTitles: ''
           ])
           sh '''#!/bin/bash
              set -e
              source aliases
              docker-compose-app down -v
           '''
        }
    }
}
