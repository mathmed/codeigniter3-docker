# codeigniter3-docker-nginx

Initial configuration for projects using Docker and Codeigniter 3

## What the repository has

* CodeIgniter 3  
* Docker start file
* PHP
* Nginx
* Phpmyadmin
* MySQL
* Reverse Proxy

### New layers in Code Igniter 3

Code igniter 3 is modified to support two new layers, business and DAO.

#### Using the layers

Create a file as `Example_dao.php` or `Example_business.php` and a class with the same name inside its folder.
Use `$this->load->dao(example_dao)` or `$this->load->business(example_business)` to load the file.

## Getting start

First make the clone of this repository
```html
$ git clone https://github.com/mathmed/base-docker-codeigniter3-mysql.git
```

With the repository ready, open the file `.env` located at the root and configure it according to your host.


Go to `codeigniter3-docker-nginx/web/public/app/application/config` and open the file `database.php`. Change the database fields for them used in the `.env` file.

After configuring the files, go to the root of the project and execute  
```html
$ sudo docker-compose up -d
```

done, the application is ready for use.


## Accessing

To access your project, type in your browser  
```html
http://localhost:8000
```

To access the phpmyadmin, type in your browser  
```html
http://localhost:9191
```
### Problems with permissions

If you have file permissions problem, at the root of the project run

```html
$ sudo chmod -R 777 .
```

### Container shell

To access a container shell, type in your terminal

```html
$ sudo docker exec -ti <container_name> /bin/sh/
```
