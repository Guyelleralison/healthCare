# healthCare
this application use Symfony 5.2, API_Platform and Postgres as database
its dependencies are installed via npm and yarn, you can do either npm install or yarn install
the npm version require PHP version > 7.4
modify the php.ini to enable the extension of driver pdo_pgsql and pgsql
change the value of the environment variable of the DATABASE_URL into yours in the .env file on the root of the project
To get the database schema, after getting the project, run php bin/console database:schema:update --dump-sql and then php bin/console database:schema:update --force
<<<< the login form does not work yet >>>>
The registration of Patient and Doctor are working
RUN the project : symfony server:start or php bin/console server run
API >>> yourlocalhost/api
Link working : REGISTRATION PATIENT /patient
                REGISTRATION DOCTOR /doctor

