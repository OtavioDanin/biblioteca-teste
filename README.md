# Sistema de Gerenciamento de Livros (Biblioteca)

## 📚 Propósito da Aplicação

Este projeto é um sistema web simples para gerenciar informações de livros em uma biblioteca. Ele permite cadastrar, visualizar, editar e excluir livros, associando-os a múltiplos autores e assuntos. Além disso, oferece um relatório agrupado por autor, que pode ser exportado em formato PDF.

## ✨ Funcionalidades

* **Gestão de Livros (CRUD):**
    * Visualizar uma lista de todos os livros cadastrados.
    * Adicionar novos livros (com título, editora, edição, ano de publicação e valor).
    * Associar múltiplos autores e assuntos a cada livro.
    * Visualizar detalhes de um livro específico.
    * Editar informações de livros existentes.
    * Excluir livros.
* **Relatórios:**
    * Visualizar um relatório consolidado que agrupa livros e seus respectivos assuntos por autor.
    * Exportar este relatório para um arquivo PDF.

## 🚀 Como Instalar e Rodar

Siga os passos abaixo para configurar e executar a aplicação em seu ambiente local.

### Passos de Instalação do Projeto com Docker

Certifique-se de ter instalado em sua máquina:

* Docker
* Docker Composer

1.  **Faça o build das imagens e start dos caontainer, executando:**
    ```bash
    docker network create biblioteca_network
    docker compose up -d
    ```
3.  **Gere a Chave da Aplicação:**
    ```bash
    php artisan key:generate

2.  **Instale as Dependências do Composer:**
    ```bash
    composer install # ou composer install --no-dev -o -a para produção
    ```
3.  **Execute as Migrações e Seeds:**
    Isso criará as tabelas no banco de dados eulará com dados de exemplo (se você tiver seeders).
    ```bash
    php artisan migrate:fresh --seed
    ```
A aplicação estará disponível em `http://localhost`(porta 80), ou a porta que estiver definina docker-compose.yaml

### Passos de Instalação do Projeto manualmente (sem Docker)

Siga os passos abaixo para configurar e executar a aplicação em seu ambiente local.

### Pré-requisitos

Certifique-se de ter instalado em sua máquina:

* PHP (>= 8.2)
* Composer
* Um servidor web (Nginx ou Apache)
* Banco de dados PostgreSQL (configurado para a aplicação)

1.  **Clone o Repositório:**
    ```bash
    git clone <URL_DO_SEU_REPOSITORIO>
    cd nome-do-seu-projeto
    ```
2.  **Instale as Dependências do Composer:**
    ```bash
    composer install # ou composer install --no-dev -o -a para produção
    ```
3.  **Copie o Arquivo de Variáveis de Ambiente:**
    ```bash
    cp .env.example .env
    ```
4.  **Gere a Chave da Aplicação:**
    ```bash
    php artisan key:generate
    ```
5.  **Configure o Banco de Dados:**
    Abra o arquivo `.env` e configure suas credenciais de banco de dados PostgreSQL. Exemplo:
    ```dotenv
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=sua_base_de_dados
    DB_USERNAME=seu_usuario_db
    DB_PASSWORD=sua_senha_db
    ```
6.  **Execute as Migrações e Seeds (Opcional):**
    Isso criará as tabelas no banco de dados eulará com dados de exemplo (se você tiver seeders).
    ```bash
    php artisan migrate:fresh --seed
    ```
7.  **Instale as dependências NPM (para o frontend):**
    ```bash
    npm install
    npm run dev # ou npm run build para produção
    ```
8.  **Inicie o Servidor de Desenvolvimento:**
    ```bash
    php artisan serve
    ```

A aplicação estará disponível em `http://127.0.0.1:8000`.

## 📍 Rotas da Aplicação

Aqui estão as principais rotas disponíveis no sistema:

### Rotas de Livros (`/livros`)

| Método | URI | Nome da Rota | Descrição |
| :----- | :------------------ | :------------------- | :------------------------------ |
| `GET` | `/livros` | `livros.index` | Lista todos os livros. |
| `GET` | `/livros/create` | `livros.create` | Exibe o formulário para criar um novo livro. |
| `POST` | `/livros` | `livros.store` | Armazena um novo livro no banco de dados. |
| `GET` | `/livros/{id}` | `livros.show` | Exibe os detalhes de um livro específico. |
| `GET` | `/livros/{id}/edit` | `livros.edit` | Exibe o formulário para editar um livro existente. |
| `PUT` | `/livros/{id}` | `livros.update` | Atualiza um livro no banco de dados. |
| `DELETE`| `/livros/{id}` | `livros.destroy` | Exclui um livro do banco de dados. |

### Rotas de Relatórios (`/autores-livros`)

| Método | URI | Nome da Rota | Descrição |
| :----- | :------------------------------- | :-------------------------------- | :---------------------------------------- |
| `GET` | `/exportar` | `exportar` | Exporta o relatório para PDF. |

## ⚙️ Tecnologias Utilizadas

* **Laravel 12:** Framework PHP
* **PostgreSQL 17:** Banco de dados
* **Bootstrap 5:** Framework CSS para estilização
* **barryvdh/laravel-dompdf (com Dompdf):** Para geração de relatórios PDF
* **Blade:** Motor de templates do Laravel

## 📄 Licença

Este projeto é de código aberto e está licenciado sob a [Licença MIT](https://opensource.org/licenses/MIT) (se aplicável).