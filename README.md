# Menu App

**Host**<br />
Udacity

**Course**<br />
Full Stack Foundations

**Exercise**<br />
I have built this app in Python & Flask as a final project for this course. This instance of the application in built in PHP on the Symfony framework. I rebuilt the app to show that the knowledge can be applied to another language and framework as well.

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
* clone project: git clone https://github.com/stijnblommerde/lots_of_menus.git
* install dependencies: composer install
* create empty database: php bin/console doctrine:database:create
* create tables and relations: php bin/console doctrine:schema:update --force 
* create restaurants & menu items (fake data): php app/console doctrine:fixtures:load 
* run server: php bin/console server:run
* visit url: localhost:8000
* log in as admin: username: admin, password: admin
* log in as user: username: stijn, password: test
