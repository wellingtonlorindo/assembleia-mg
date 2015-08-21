# Dados da Assembléia Legislativa MG 

Consume os dados abertos da Assembléia Legislativa do Estado de Minas
Gerais e armazena em um banco de dados SQLite.

## Instalação

O projeto está configurado para rodar em ambiente Linux. Após clonar o projeto, siga os passos abaixo.

### 1 - Instale as bibliotecas necessárias. 

- PHP >= 5.5.9
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- SQLITE 3

Veja mais detalhes em http://laravel.com/docs/5.1#installation

### 2 - Instale o composer

```sh
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```
Veja mais detalhes em https://getcomposer.org/download/


### 3 - Configure a conexão com o banco de dados

Renomeie o arquivo webapp/config/app.sample.php para webapp/config/app.php


### 4 - Instale todas as dependências do projeto:
```sh
$ cd webapp
$ composer install --prefer-dist
```
Crie as pastas tmp e logs dentro de webapp.
```sh
$ mkdir tmp logs
$ chmod 777 tmp logs
```
Veja mais detalhes em http://book.cakephp.org/3.0/pt/installation.html

### 5 - Suba o servidor 
Em outra aba do terminal, execute o seguinte comando dentro da pasta webapp e deixe o servidor rodando.
```sh
$ bin/cake server
```
O projeto ficara disponível em http://localhost:8765


### 6 - Popule o banco de dados

Entre na pasta webapp/database e coloque o arquivo cria_banco.sh como executável:
```sh
$ chmod +x cria_banco.sh
```
Depois execute:
```sh
$ sh cria_banco.sh
```

Em uma outra aba do terminal, você pode acompanhar o processo:
```sh
$ tail -f webapp/logs/access.log
```

### 7 - Acesse o sistema
Acesse a página inicial em http://localhost:8765
