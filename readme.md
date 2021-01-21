This is HR application.
The following are required:

1. Install docker in your local machine. Please visit https://docs.docker.com/desktop/ and read configration and installation instruction
2. Clone the repo from github
3. From root directory Run docker-compose run --rm composer create-project laravel/laravel=5.8 .
4. From root directory Run docker-compose up -d --build
5. From root directory RUN docker-compose run --rm artisan migrate. If it fail, re-run the command and it will works
6. Open browser and write the following address http://localhost:80/
7. The application is reday for use
   #docker exec -it php sh

# To run the test

1.  From root directory Run docker exec -it php sh
2.  Run vendor/bin/phpunit

# Please contect me if the application does not work
