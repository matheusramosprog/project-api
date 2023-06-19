## Deletar uma despesa pelo ID

Deleta uma despesas da tabela pelo ID.
O USER autenticado consegue apenas deletar registros que correspondem ao seu ID de usuário.

```http
  DELETE api/v1/expenses/{id}
```

**Header**
```http
  Authorization: Bearer <token>
```

**Exemplo de retorno JSON:**

```json
{
	"data": {
		"message": "Delete success",
		"statusCode": 200
	}
}
```