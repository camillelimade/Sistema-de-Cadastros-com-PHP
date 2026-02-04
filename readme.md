# CadSys - Sistema WEB de Cadastros 

Sistema de cadastros web desenvolvido em **PHP** com **MySQL**, focado na aplicação prática das operações **CRUD (Create, Read, Update e Delete)**.  
O projeto tem caráter **empírico e educacional**, sendo ideal para estudos de desenvolvimento web, integração com banco de dados e organização de código em camadas.

## Resumo

Este sistema permite o gerenciamento de registros por meio de uma interface web simples, intuitiva e responsiva.  
As funcionalidades incluem cadastro, edição, exclusão, listagem, pesquisa e filtragem de dados por nome, simulando cenários comuns de sistemas administrativos.

O projeto foi estruturado seguindo um **padrão MVC simples**, promovendo melhor organização do código, separação de responsabilidades e facilidade de manutenção.

## Objetivo do Projeto
Este projeto tem como objetivo:
- Consolidar conhecimentos em PHP e MySQL
- Praticar operações CRUD
- Compreender a integração entre frontend e backend
- Aplicar conceitos básicos de arquitetura MVC
- Servir como base para projetos maiores e sistemas administrativos

## Status do Projeto
- Segunda versão aplicada, com organização dos arquivos por meio do padrão MVC e uso de arquivos de configuração como `.env`, buscando o aperfeiçoamento do programa.

## Funções da Aplicação

- Cadastro de registros no banco de dados
- Edição de registros existentes
- Exclusão de registros
- Listagem de dados cadastrados
- Pesquisa de registros
- Filtro de dados por nome
- Interface responsiva com Bootstrap
- Integração completa entre frontend e backend usando PHP


## Estrutura do Projeto (MVC Simples)

- **Models**: responsáveis pela comunicação com o banco de dados  
- **Views**: interface do usuário (HTML + Bootstrap)  
- **Controllers**: regras de negócio e controle das requisições  

Essa estrutura facilita a leitura do código e o crescimento futuro da aplicação.

## Requisitos para rodar a aplicação

- PHP 8 ou superior
- MySQL
- Servidor local (XAMPP, WAMP ou similar)
- Navegador web atualizado

## Como executar o Projeto

1. Clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/<nome>.git
   Mova o projeto para a pasta htdocs do XAMPP```
- Crie um arquivo .env na raiz do projeto
- Configure as credenciais do banco de dados no arquivo .env
- Inicie os serviços Apache e MySQL pelo XAMPP
- Crie o banco de dados no phpMyAdmin e importe o script SQL (se houver)
- Acesse o sistema pelo navegador:

```
http://localhost/
```
