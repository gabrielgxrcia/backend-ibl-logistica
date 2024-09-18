# Projeto Backend - Gerenciamento de Livros

Este projeto é parte de um desafio Fullstack da empresa IBL Logística. O backend foi desenvolvido utilizando PHP e Laravel, com foco em funcionalidades para o gerenciamento de livros, como criar, editar, excluir e listar.

# Requisitos Funcionais (RF)

### Cadastro de Livro
- [x] Deve ser possível cadastrar um novo livro com as seguintes informações:
  - [x] Título
  - [x] Autor
  - [x] ISBN
  - [x] Quantidade de Páginas
  - [x] Edição
  - [x] Editora

### Atualização de Livro
- [x] Deve ser possível atualizar as informações de um livro cadastrado.

### Exclusão de Livro
- [x] Deve ser possível excluir um livro cadastrado.

### Listagem de Livros
- [x] Deve ser possível listar todos os livros cadastrados.

### Visualização de Livro Individual
- [x] Deve ser possível visualizar os detalhes de um livro específico.

## Regras de Negócio (RN)

### Restrição de Acesso a Livros
- [x] O usuário só pode visualizar, editar e apagar os livros que ele criou.

# Regras de Negócio (RN)

### Restrição de Acesso a Livros
- [x] O usuário só pode visualizar, editar e apagar os livros que ele criou.

## Instalação

```bash
# Clone o repositório
git clone git@github.com:gabrielgxrcia/backend-ibl-logistica.git

# Instale as dependências do projeto
composer install

# Crie o arquivo .env a partir do exemplo
cp .env.example .env

# Gera a chave da aplicação Laravel
php artisan key:generate

# Execute as migrations para criar o banco de dados
php artisan migrate

# Execute o servidor de desenvolvimento
php artisan serve
```

## Documentação e rotas
- Criar novo livro

```http
  POST api/books
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `titulo` | `Body - String` | **Obrigatório**. Título do livro. |
| `autor` | `Body - String` | **Obrigatório**. Autor do livro. |
| `isbn` | `Body - String` | **Obrigatório**. ISBN do livro. |
| `quantidade_paginas` | `Body - Integer` | **Obrigatório**. Quantidade de páginas do livro. |
| `edicao` | `Body - String` | **Obrigatório**. Edição do livro. |
| `editora` | `Body - String` | **Obrigatório**. Editora do livro. |

- Listar todos os livros

```http
  GET api/books
```

 - Visualizar um livro específico

 ```http
  GET api/books/{id}
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `id` | `Path Parameter` | **Obrigatório**. ID do livro a ser consultado. |

- Atualizar um livro

```http
  PUT api/books/{id}
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `id` | `Path Parameter` | **Obrigatório**. ID do livro a ser editado. |
| `titulo` | `Body - String` | **Opcional**. Novo título do livro. |
| `autor` | `Body - String` | **Opcional**. Novo autor do livro. |
| `isbn` | `Body - String` | **Opcional**. Novo ISBN do livro. |
| `quantidade_paginas` | `Body - Integer` | **Opcional**. Nova quantidade de páginas do livro. |
| `edicao` | `Body - String` | **Opcional**. Nova edição do livro. |
| `editora` | `Body - String` | **Opcional**. Nova editora do livro. |


- Excluir um livro

```http
  DELETE api/books/{id}
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `id` | `Path Parameter` | **Obrigatório**. ID do livro a ser excluído. |

- Pesquisar livros por parâmetros

```http
  GET /api/search?query=
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `query` | `Query Param` | **Opcional**. Termo de busca (título, autor, ISBN). |

## Testes 
  - [x] Deve ser possível criar um novo livro.
  - [x] Deve ser possível visualizar se falhou ao criar um novo livro.
  - [x] Deve ser possível listar um livro.

- Executar testes
```bash
# Após a instalação do projeto e suas depêndencias:
  vendor/bin/phpunit
```