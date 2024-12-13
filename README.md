# NewsApp - Sistema de Gerenciamento de Notícias

## 📋 Sobre o Projeto

Sistema de gerenciamento de notícias desenvolvido com Laravel e Swoole, oferecendo uma interface moderna e responsiva para cadastro e visualização de notícias.

## 🚀 Tecnologias Utilizadas

* Laravel 10.x
* Laravel Octane com Swoole
* Docker e Docker Compose
* MySQL
* TailwindCSS

## 🔧 Requisitos

* Docker e Docker Compose instalados
* Git

## ⚙️ Configuração e Instalação

### Clonando o Repositório

    ```bash
    https://github.com/sargrbs/news-management
    cd news-management
    
## Configurando o ambiente
    1- Copie o arquivo de ambiente:
        cp .env.example .env

    2- Configure as variáveis de ambiente no arquivo .env:
        DB_CONNECTION=mysql
        DB_HOST=db
        DB_PORT=3306
        DB_DATABASE=news_db
        DB_USERNAME=news_user
        DB_PASSWORD=your_password
## Iniciando com Docker
    1-Construa e inicie os containers:
        docker-compose up -d --build

    2- Instale as dependências:
        docker-compose exec app composer install

    3- Gere a chave da aplicação:
        docker-compose exec app php artisan key:generate

    4- Execute as migrations:
        docker-compose exec app php artisan migrate


##🌟 Funcionalidades
    Notícias

        Listagem de notícias com paginação
        Cadastro de novas notícias
        Edição de notícias existentes
        Visualização detalhada
        Busca por título
        Filtro por categorias

    Categorias

        Cadastro de categorias
        Associação com notícias



