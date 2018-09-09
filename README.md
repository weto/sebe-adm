# sebe-adm

As an important part of evaluation for Colleges and Universities in Brazil it is important that we have a platform where the evaluations will be managed in Enade by Institution, Course and Student.

Installation:
Go to https://github.com/weto/sebe-adm and download the latest version.

Dependencies:
PHP minimum version 5.4.16
CakePHP
Mysql

Configuring database connection:
Install the Mysql database.
Create the database and run the script located in the file $PATH\app\Config\Script\somos_educacao.sql.

Building the application:
Go into the $PATH\app\Config\database.php file and put the data from the database connection created.

Accessing the project:
Enter http://localhost/sebe-adm/admin/instituitions.

Accessing the project production:
Enter https://sebe-adm.herokuapp.com/admin/instituitions
