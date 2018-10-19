# base-docker-codeigniter3-mysql
Containers configurados para projetos que utilizam Code Igniter 3 , MYSQL e phpmyadmin

## Como usar

Primeiro faça o clone deste repositório
```html
$ git clone https://github.com/mathmed/base-docker-codeigniter3-mysql.git
```

Com o repositório em sua máquina, abra o arquivo ```html .env ``` localizado na raíz.
O arquivo tem a seguinte forma:

`APP_NAME=base-docker-codeigniter3-mysql`  
`MYSQL_PORT=3306`  
`HTTP_PORT=8080`  
`HTTPS_PORT=443`  
`MYSQL_ROOT_PASSWORD=root`  
`MYSQL_DATABASE=your_database_here`  
`MYSQL_USER=your_user_here`  
`MYSQL_PASSWORD=your_password_here`  
`MYSQL_ROOT_HOST=%`

Altere os campos `MYSQL_DATABASE`, `MYSQL_USER` e `MYSQL_PASSWORD` para as de seu banco de dados.

Navegue até `base-docker-codeigniter3-mysql/src/application/config` e abre o arquivo `database.php`. Altere os campos do banco de dados para os mesmos que utilizou em `.env`.

Após configurados o arquivo, va até a raiz do projeto e execute  
`$ sudo docker-compose up -d`

Feito isso, os container de CodeIgniter3, MYSQL e phpmyadmin serão criados.

## Acessando

Para acessar seu projeto digite em seu navegador  
`http://localhost:8080`

Para acessar o phpmyadmin digite em seu navegador  
`http://localhost:9191`

