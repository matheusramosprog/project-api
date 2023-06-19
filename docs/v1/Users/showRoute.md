## Buscar um usuário pelo ID

Busca um usuário pelo ID informado. Não existe autenticação nessa rota.

```http
  GET api/users/{$id}
```

**Exemplo de retorno JSON:**

```json
{
	"id": 1,
	"name": "Matheus",
	"email": "matheus@teste.com"
}
```