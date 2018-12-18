# base-docker-codeigniter3-mysql
Configuração de projetos que utilizam CodeIgniter3, MySQL, Docker e Nginx

## Como usar

Primeiro faça o clone deste repositório
```html
$ git clone https://github.com/mathmed/base-docker-codeigniter3-mysql.git
```

Com o repositório em sua máquina, abra o arquivo `.env` localizado na raíz e configure-o de acordo com o seu host.


Navegue até `base-docker-codeigniter3-mysql/web/public/app/application/config` e abre o arquivo `database.php`. Altere os campos do banco de dados para os mesmos que utilizou em `.env`.

Após configurados o arquivo, va até a raiz do projeto e execute  
```html
$ sudo docker-compose up -d
```

Feito isso, a aplicação está pronta para uso.

## Acessando

Para acessar seu projeto digite em seu navegador  
```html
http://localhost:8000
```

Para acessar o phpmyadmin digite em seu navegador  
```html
http://localhost:9191
```
### Problemas com permissões

Caso tenha problema de permissões de arquivos, na raíz do projeto execute

```html
$ sudo chmod -R 777 .
```

### Terminal

Para acessar o terminal de algum container digite no terminal

```html
$ sudo docker exec -ti <nome_containert> /bin/sh/
```