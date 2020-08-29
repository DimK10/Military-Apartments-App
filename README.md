# Military-Apartments-App
The purpose of this Web App, is to help in the management of the Military Apartments. More specifically, it will help in creating reports, receipts for the tenants and with managing which people are supposed to enter in an apartment, acconding to specific criteria (points system). It will be a full Building Management System. Currently in development.


# To run the project:
In order to run this project, you need to have Composer Nodejs and npm installed. You also need MySql Server.

https://getcomposer.org/download/
<br/>
https://nodejs.org/en/download/
<br/>
https://dev.mysql.com/downloads/installer/


Commands to install dependencies (in the root of project):

<b>npm install</b>

<b> composer install </b>

<b> php bin/console doctrine:database:create </b> (the root password for MySql is in the .env file to set, in the DATABASE_URL after root:)

<b> php bin/console doctrine:migrations:migrate </b>

<b> php bin/console doctrine:fixtures:load </b>


# Commands to run the project using the built-in server:

<b> npm run watch </b>

<b> php bin/console server:run </b>


# Passwords to enter as a user:
Building Manager: user2@gmail.com password: 123456 <br/>
Apartments Manager: user1@gmail.com password: 123456 (The apartments manager in Army is responsible for generating the points each officer has, in order to be decided which one is going to become a tenant) 

# Technologies used:
 - Symfony Framework 4 <br/>
 - MySQL Database <br/>
 - React JS <br/>
 - Redux <br/>
 - Redux Thunk <br/>
 - React-Router<br/>
 
 
 # CSS Theme:
  - coreui (Basic, not the React coreui)
