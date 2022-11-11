# Data API YouTube - Search: list

## Seja bem vindo
Retorna um conjunto de resultados de pesquisa que correspondem a parâmetros de consulta especificados na solicitação da API


## Pré requisitos
Antes de iniciar o projeto, certifique-se que você tenha o docker e o Docker Compose instalado em seu ambiente.



### Biblioteca
Para ativar o recurso é necessário ativar a Biblioteca de APIs do youTube. YouTube Data API v3
https://console.cloud.google.com/apis/library



### Credenciais
Para ativar o recurso é necessário obter API Key
https://console.developers.google.com/apis



### Usar uma biblioteca de cliente de API do Google
Para validar um token de ID em PHP, use a biblioteca de cliente de API do 
Google para PHP . Instale a biblioteca (usando o Composer):

```bash
composer require google/apiclient
```


## Criando a imagem do docker
Dentro dos projetos, existe um arquivo Dockerfile
Ele é responsável por definir a composição da camada da construção da imagem que iremos utilizar.

### Criando imagen

```bash
FROM php:7.3-apache
RUN docker-php-ext-install mysqli


# INSTALL PHP EXTENSIONS
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql
#RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# ANABLE APACHE MOD REWRITE
RUN a2enmod rewrite

# ANABLE APACHE MOD HEADER
RUN a2enmod headers

# UPDATE APT-GET AND INSTALL LIBS
RUN apt-get update -y
RUN apt-get install -y openssl zip unzip git libnss3 libpng-dev
```

## docker-compose
O docker-compose.yml está configurado o services.

```bash
version: '3'

services:
  php:
    container_name: PHP7
    build: .
    ports:
    - "80:80"
    - "443:443"
    volumes:
    - ./html:/var/www/html
    - ./customphp.ini:/usr/local/etc/php/php.ini

```

## Terminal
Para iniciar e visualizar o status dos containers
execute os seguintes comandos.


```bash
# Supondo que esteja na raiz do projeto
cd pasta_search_list

# Iniciar os containers
$ docker-compose up -d

# Vizualizar o status dos containers
$ docker-compose ps
```

O site estará disponível em [http://localhost](http://localhost/)







## Vizualização do projeto

Para a visualização deste projeto encontra-se 
hospedados no seguinte link:
https://alessandropassaf1.websiteseguro.com/youtube/


