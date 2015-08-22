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


### 3 - Instale o projeto

Na raiz do projeto, coloque o arquivo cria_banco.sh como executável:

```sh
$ chmod +x cria_banco.sh
```

Execute a instalação.

```sh
$ composer install --prefer-dist
```

Em uma outra aba do terminal, você pode acompanhar o processo:
```sh
$ tail -f storage/logs/laravel.log
```

### 4 - Suba o servidor e acesse o sistema

Acesse a pasta assembleia/public e suba o servidor.

```sh
$ php -S localhost:8765
```
Acesse a página inicial em http://localhost:8765
