## Realizar o Login e pegar o Token Bearer

Realizar o login a partir de um email e senha de usuário cadastrado no banco.

```http
  POST api/login
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `email`     | `string`   | *Obrigatório*. Email do usuário para realizar a autenticação. |
| `password`  | `string`   | *Obrigatório*. Senha do usuário para realizar a autenticação. |



**Exemplo de JSON enviado:**

```json
{
	"email": "matheus@matheus.com",
	"password": "password"
}
```

**Exemplo de retorno JSON:**

```json
{
	"data": {
		"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3",
		"token_type": "bearer",
		"expires_in": 18000000
	}
}
```

