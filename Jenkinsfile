pipeline {
    agent { label "linux" }
    options {  buildDiscarder( logRotator( numToKeepStr: '5' ) ) }
    stages {
    stage('Notify Github') {
        steps {
            githubNotify account: 'rdok',
               context: 'CI',
               credentialsId: 'github-status-notifier',
               description: 'Jenkins',
               repo: 'spacex-explorer',
               sha: "${env.GIT_COMMIT}",
               status: 'PENDING'
        }
    }
        stage('Test') {
            steps {
               dir('api') {
                  ansiColor('xterm') {
                     sh '''
                        source aliases
                        workspace up -d
                        workbench exec php php artisan migrate --env=testing
                        workbench exec php ./vendor/bin/phpunit
                        workbench down -v --remove-orphans
                     '''
                       } 
                   }
               }
        }
    }
    post {
        failure {
            githubNotify account: 'rdok',
               context: 'CI',
               credentialsId: 'github-status-notifier',
               description: 'Jenkins',
               repo: 'spacex-explorer',
               sha: "${env.GIT_COMMIT}",
               status: 'FAILURE'
        }
        success {
            githubNotify account: 'rdok',
               context: 'CI',
               credentialsId: 'github-status-notifier',
               description: 'Jenkins',
               repo: 'spacex-explorer',
               sha: "${env.GIT_COMMIT}",
               status: 'SUCCESS'
        }
    }
}
