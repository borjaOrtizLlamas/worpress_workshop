def variablesDef = null


pipeline {
    agent any     
   	stages {

        stage('build docker') {
            steps {
                script {
                    variablesDef = env.BUILD_NUMBER 
                    sh "docker build . -t 015955254045.dkr.ecr.eu-west-1.amazonaws.com/wordpress_official_image_copy:${variablesDef}"
                }
            }
        }
        stage('login and push') {
            steps {
                sh 	"aws ecr get-login-password --region eu-west-1 | docker login --username AWS --password-stdin 015955254045.dkr.ecr.eu-west-1.amazonaws.com/wordpress_official_image_copy"
                sh 	"docker push 015955254045.dkr.ecr.eu-west-1.amazonaws.com/wordpress_official_image_copy:${variablesDef}"
            }
        }
        stage('deploy') {
            steps {
                dir('envs') {
                    git credentialsId: 'github_credential', url: 'https://github.com/borjaOrtizLlamas/shop_infraestucture_generator_vars.git'
                }
                sh "export TF_LOG=DEBUG && sed '1,35 s/CONTAINER_API_VAR_REPLACE/${variablesDef}/g' ecs-change > ECS.tf"
                sh "terraform init && terraform apply -input=false -auto-approve -var-file=\"envs/variables_develop.tfvars\""
            }
        }

        stage('rolling update') {
            steps {
                sh "aws ecs update-service --cluster WorkshopCluster --service worpress_workshop_service --task-definition WordPress"                
            }
        }
    }
}


