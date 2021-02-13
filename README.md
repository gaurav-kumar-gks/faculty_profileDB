
## University Faculty Profile

### Tech

* [bootstrap](https://getbootstrap.com/) 
* [mysql](https://www.mysql.com/) 
* [php](https://www.php.net/) 
* [docker](https://www.docker.com/)
* [phpmyadmin](https://www.phpmyadmin.net/) 
* [html](https://developer.mozilla.org/en-US/docs/Web/HTML)
* [css](https://developer.mozilla.org/en-US/docs/Web/CSS)

### Requirements

- LAMP stack installed
- Docker installed 
- MySql db - faculty_profile_db (sample_queries.sql provided)
 

### Changes you need to do 
In following files change the following

1. docker-compose.yml 
	```   
	MYSQL_USER:"insert your faculty_profile_db's user name"
	MYSQL_PASSWORD:"insert your db faculty_profile_db's password"
	MYSQL_ROOT_PASSWORD:"insert your mysql root password"
	// without quotes
	```
2. DB.php 
	```
	$user  =  'insert your faculty_profile_db's user name';
	$password  =  'insert your faculty_profile_db's password';
	// with single quotes
	```
3.  init.php 
	```
	'user' => 'insert your faculty_user_db's user's name',
	'password' => 'insert your faculty_user_db's password',
	// with single quotes
	```
Prefer user - 'root', password - (rootpassword) due to various docker issues



### To get project up and running
**Simply use the Dockerfile to build the image.
Make sure you've done required changes first**

- Open the terminal from forked project directory
- To start the docker    
``` docker-compose up -d```
- To stop the docker
``` docker-compose down```
- To rebuild the docker-image 
- ``` docker-compose build```
- To see currently running containers ``` docker ps -a ```
- You need to rebuild the image or stop the docker and restarting for changes to reflect

### To access the website

- Opening the landing page
[http://localhost:8001/](http://localhost:8002/)    

- Opening the phpmyadmin
[http://localhost:8000/](http://localhost:8000/)







