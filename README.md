# Web Crawler

## Sobre
Crawler desenvolvido como teste técnico para processo seletivo

## Dependências
- Docker;
- PHP 8;
- Nginx;

## Iniciando o projeto
```
// Inicia os containers
$ docker compose up -d

// Instala as Dependências
$ docker exec -it php_crawly composer install
```

## Executando o código
A resposta pode ser verificada de duas maneiras:
 - Acessando: http://localhost:8080/
 - Rodando o comando:
```
$ docker compose run php_crawly php index.php
```

## Testes unitários
```
$ docker exec -it php_crawly vendor/bin/phpunit
```