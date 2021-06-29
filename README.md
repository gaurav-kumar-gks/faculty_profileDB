## University Faculty Profile

### Tech Stack Used

* [bootstrap](https://getbootstrap.com/) 
* [mysql](https://www.mysql.com/) 
* [php](https://www.php.net/) 
* [phpmyadmin](https://www.phpmyadmin.net/) 
* [html](https://developer.mozilla.org/en-US/docs/Web/HTML)
* [css](https://developer.mozilla.org/en-US/docs/Web/CSS)
* [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

### Requirements

- LAMP stack installed
- MySql db - faculty_profile_db (sample_queries.sql provided)
 

### Changes you need to do 
Change the following

1.  init.php 
	```
	'user' => 'insert your faculty_user_db's user's name',
	'password' => 'insert your faculty_user_db's password',
	// with single quotes
	```
2. in other php files
   change mysqli_connect command
	```
	$conn = mysqli_connect("localhost", "insert your db user name here", "insert your db password here", "faculty_profile_db");
	```


### To get project up and running (in Ubuntu)

** Make sure you've done required changes first **

- Go to this directory ```cd /var/www/html```
- Make sure you have read/write permission in this directory
- Pull the repository files in this directory (index.php should be in /var/www/html)

### To access the website

- Opening the landing page
[http://localhost/index.php](http://localhost/index.php)    

- Opening the phpmyadmin
[http://localhost/phpmyadmin](http://localhost/phpmyadmin)







