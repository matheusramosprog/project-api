## Listar todos os usuários

Lista todos os usuários. Não existe autenticação nessa rota.

```http
  GET api/users
```

**Exemplo de retorno JSON:**

```json
[
	{
		"id": 1,
		"name": "Matheus",
		"email": "matheus@teste.com"
	},
	{
		"id": 2,
		"name": "teste",
		"email": "teste@matheus.com"
	}
]
```