# Menu App

**Host**<br />
Udacity

**Course**<br />
Full Stack Foundations

**Exercise**<br />
Final project

**Description**<br />
Menu app created with PHP and Symfony. Lists out restaurants and allows to view the menu for each restaurant. Users need to authenticate before they can view the data. Administrators are able to edit and delete data as well.

**Required features**
* Implement CRUD operations on a database;
* Use an ORM as an alternative to SQL;
* Use the Symfony framework to build a web application;
* Add JSON endpoints.

**Extra features**
* Authentication & Roles;
* Flash messages;
* Entity Validation: Validation of form fields;
* Fixtures: Load data from command line;

**Installation**
* clone project
* install dependencies: composer install
* create empty database: php bin/console doctrine:database:create
* create tables and relations: php bin/console doctrine:schema:update --force 
* create restaurants & menu items (fake data): php app/console doctrine:fixtures:load 
* run server: php bin/console server:run
* visit url: localhost:8000
* log in as admin: username: admin, password: admin
* log in as user: username: user, password: user
