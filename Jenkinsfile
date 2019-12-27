pipeline {
    agent { label "linux" }
    options {
       buildDiscarder( logRotator( numToKeepStr: '13' ) )
       disableConcurrentBuilds()
    }
    triggers {
       githubPush()
    }
    environment {
       DEV_UID = sh(returnStdout: true, script: "id -u").trim()
    }
    stages {
      stage('Test') {
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
              source ./aliases.sh
              cp .env.testing .env
              docker_compose_local up -d --build db
              docker_compose_local up -d --build php
              composer install
              php artisan migrate --env=testing
              php ./vendor/bin/phpunit --testdox-html testdox/index.html
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
              source ./aliases.sh
              docker_compose_local down -v --remove-orphans
           '''
        }
    }
}
