# HR application.

The followings are required:

1. Install docker in your local machine. Please visit https://docs.docker.com/desktop/ and read configuration and installation instructions
2. Clone the repo from github
3. From root directory RUN docker-compose run --rm composer install
4. From root directory RUN docker-compose up -d --build
5. From root directory RUN docker-compose run --rm artisan key:generate
6. From root directory RUN docker-compose run --rm artisan migrate. If it fail, re-run the command and it will works
7. Open new browser and write the following on the address bar http://localhost:80/
8. The application is reday for use

# To run the test

1.  From root directory RUN docker exec -it php sh
2.  RUN vendor/bin/phpunit

Please contact me if the application does not work

The application written in docker-compose/laravel

The basic level of docker and laravel understanding are important, but it is not must
