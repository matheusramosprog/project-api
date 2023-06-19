## Buscar uma despesa pelo ID

Busca uma despesas da tabela pelo ID.
O USER autenticado consegue apenas pesquisar registros que correspondem ao seu ID de usuário.

```http
  GET api/v1/expenses/{id}
```

**Header**
```http
  Authorization: Bearer <token>
```

**Exemplo de retorno JSON:**

```json
{
	"data": {
			"id": 4,
			"userId": 2,
			"description": "Despesa 1",
			"value": "111.33",
			"expenseDate": "2023-06-02"
		}
}
```