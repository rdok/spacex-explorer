pipeline {
    agent { label "linux" }
    options {  buildDiscarder( logRotator( numToKeepStr: '5' ) ) }
    triggers { 
       githubPush() 
       cron('H H(18-19) * * *') 
    }
    stages {
      stage('PR Status: Pending') {
        steps {
            githubNotify account: 'rdok',
               context: 'CI',
               credentialsId: 'status-check-github-token',
               description: 'Jenkins',
               repo: 'spacex-explorer',
               sha: "${env.GIT_COMMIT}",
               status: 'PENDING'
        }
      }
      stage('Test') {
         steps {
            ansiColor('xterm') {
               sh '''#!/bin/bash
                  source ./aliases
                  docker-compose-app up -d
                  workbench exec php php artisan migrate --env=testing
                  workbench exec php ./vendor/bin/phpunit
                  docker-compose-app down -v --remove-orphans
               '''
            } 
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
    }
}
