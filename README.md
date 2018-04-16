# Installation Steps
1. composer install
2. create database [database]
3. cp .env.example .env
4. edit .env and change DB_DATABASE, DB_USERNAME, DB_PASSWORD, APP_URL, APP_NAME fields
5. put base64:7GagsesFvv+brPwIRh4R19EjonAOuGystps7dwiBXXM= to APP_KEY in .env
6. change MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION (this is for the email feature to work properly and configure this to your oen mail smtp credential, it can be gmail)
7. php artisan migrate
8. composer dumpautoload
9. php artisan db:seed (make sure you run only once as this is to create admin user credential)