# Api Event

Api de gerenciamento de eventos

Ambiente:

- [PHP 7.2.19](https://www.php.net/)
- [Apache 2.4.35](https://httpd.apache.org/)
- [MySQL 5.7.24](https://www.mysql.com)

#### Instalação:

1) Clonar repositório:
```
$ git clone https://github.com/anisotton/api-events.git api-events
```

2) Criar base de dados para aplicação
```
$ mysql>> CREATE DATABASE api-events;
```
3) Renomeie o arquivo *.env.example* para *.env*

4) Instalar dependências via *composer*
```
composer install;
```
5) Gerar a *key* para o Laravel
```
php artisan key:generate
```

6) Configurar o arquivo: *.env*
```
APP_URL={urlapp}
DB_DATABASE={dbname}
DB_USERNAME={dbuser}
DB_PASSWORD={dbpass}
```
6) Executar o comando migrate para inserir as tabelas necessárias
```
 php artisan migrate --seed
```

# Tecnologias

### Back end

Open source:
- [PHP](http://php.net/)
- [MySQL](https://www.mysql.com/)
- [Laravel](https://www.docker.com/)
- [Apache](https://www.apache.org/)
- [Composer](https://getcomposer.org/)