## Listar todas as despesas

Lista todas as despesas da tabela do banco de dados para o USER autenticado.

```http
  GET api/v1/expenses
```

**Header**
```http
  Authorization: Bearer <token>
```

**Exemplo de retorno JSON:**

```json
{
	"data": [
		{
			"id": 4,
			"userId": 2,
			"description": "Despesa 1",
			"value": "111.33",
			"expenseDate": "2023-06-02"
		},
		{
			"id": 5,
			"userId": 2,
			"description": "Despesa 2",
			"value": "222.33",
			"expenseDate": "2023-06-02"
		},
		{
			"id": 6,
			"userId": 2,
			"description": "Despesa 3",
			"value": "333.33",
			"expenseDate": "2023-06-02"
		}
	]
}
```