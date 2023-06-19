#  Documentação Projeto - Despesas

## Configurando o projeto 


#### Para rodar o projeto execute os comandos : 

 ```sh
- composer install
- cp .env.example .env
- php artisan migrate
- php artisan optimize
```

>## Recursos autenticados 

>Enviar o access_token durante as requisições através do parâmetro header, juntamente com o prefixo 'Authorization: Bearer '.
Rotas Autenticadoas tem o seguinte icon: :lock:

##### headers
- Accept application/json
- content-type application/json

## Summary

  ### API 1.0

## Base url : <http://localhost:1000/project-api/public/api/v1>

Icones: 
- :lock: Rotas Autenticadas 
- :pirate_flag: Rotas que não são necessárias autenticação
- :coffee: Login - Autenticação
    - [ :pirate_flag: `Realizar o Login e pegar o Token Bearer`](./docs/v1/Auth/login.md)

- :coffee: Usuário
    - [ :pirate_flag: `Listar todos os usuários`](./docs/v1/Users/indexRoute.md)
    - [ :pirate_flag: `Buscar um usuário pelo ID`](./docs/v1/Users/showRoute.md)
    - [ :pirate_flag: `Criar um novo usuário`](./docs/v1/Users/storeRoute.md)
    - [ :pirate_flag: `Atualizar as informações de um usuário`](./docs/v1/Users/updateRoute.md)
    - [ :pirate_flag: `Deletar um usuário pelo ID`](./docs/v1/Users/deleteRoute.md)

- :coffee: Despesas
    - [ :lock: `Listar todas as despesas`](./docs/v1/Expenses/indexRoute.md)
    - [ :lock: `Buscar uma despesa pelo ID`](./docs/v1/Expenses/showRoute.md)
    - [ :lock: `Cadastra uma nova despesa`](./docs/v1/Expenses/storeRoute.md)
    - [ :lock: `Atualizar as informações de uma despesa`](./docs/v1/Expenses/updateRoute.md)
    - [ :lock: `Deletar uma despesa pelo ID`](./docs/v1/Expenses/deleteRoute.md)
