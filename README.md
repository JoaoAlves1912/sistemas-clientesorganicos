# 🌿 Sistemas Clientes Orgânicos

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Status](https://img.shields.io/badge/Status-Em_Desenvolvimento-yellow?style=for-the-badge)

Um sistema web desenvolvido em Laravel para conectar produtores de alimentos orgânicos a clientes interessados. A plataforma permite o gerenciamento completo de fazendas, estoque de produtos e processamento de compras.

## 📋 Sumário

- [Visão Geral](#-visão-geral)
- [Funcionalidades](#-funcionalidades)
- [Tecnologias Utilizadas](#-tecnologias-utilizadas)
- [Modelagem de Dados](#-modelagem-de-dados)
- [Como Executar o Projeto](#-como-executar-o-projeto)
- [Licença](#-licença)

---

## 📖 Visão Geral

O **Sistemas Clientes Orgânicos** visa facilitar o comércio local e sustentável. Através de um painel de controle simples, é possível cadastrar produtores locais, registrar os produtos colhidos em suas fazendas (com controle de preço e estoque) e permitir que os clientes filtrem e adicionem esses produtos a um carrinho de compras.

## ✨ Funcionalidades

- **Gestão de Produtores:** Cadastro contendo nome, CPF, nome da fazenda e endereço.
- **Catálogo de Produtos:** Controle de itens disponíveis, preços, descrição e quantidade em estoque.
- **Filtros de Busca:** Navegação otimizada com filtro de produtos por produtor específico.
- **Carrinho de Compras:** (Em desenvolvimento) Sistema para adicionar produtos e finalizar pedidos.
- **Autenticação Segura:** Sistema de login e registro de usuários integrado nativamente pelo Laravel.

## 💻 Tecnologias Utilizadas

- **Backend:** PHP 8.x, Laravel 11.x
- **Banco de Dados:** MySQL / PostgreSQL (Configurável via Eloquent ORM)
- **Frontend:** Blade Templates, HTML5, CSS3

## 🗄️ Modelagem de Dados

A arquitetura do sistema baseia-se nas seguintes entidades principais:

* `User`: Representa os usuários autenticados no sistema.
* `Produtor`: Responsável pela origem dos produtos (`hasMany` Produtos).
* `Produto`: Representa o item à venda. Pertence a um produtor (`belongsTo` Produtor).
