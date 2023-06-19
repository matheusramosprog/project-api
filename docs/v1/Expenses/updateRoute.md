## Atualizar as informações de uma despesa

Atualiza uma despesa. O USER autenticado só consegue atualizar despesas com o seu ID de usuário no registro.
Nenhum campo é obrigatório, então pode ser atualizado apenas uma ou todas as informações.

```http
  PUT api/v1/expenses{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `userId`      | `int`      | *Não Obrigatório*. ID do usuário relacionado a despesa. |
| `description` | `string`   | *Não Obrigatório*. Descrição da despesa. |
| `value`       | `decimal`  | *Não Obrigatório*. Valor da despesa. |
| `expenseDate` | `date`     | *Não Obrigatório*. Data da despesa. |


**Exemplo de JSON enviado:**

```json
{
	"userId": 1,
	"description": "Despesa Atualizada",
	"value": 999.80,
	"expenseDate": "2022-07-02"
}
```

Os seguintes requisitos estão sendo validados:
 - Se o userId é de um usuário existente;
 - Se a descrição tem até 191 caracteres;
 - Se a data que será cadastrada não é maior que a data atual;
 - Se o valor cadastrado nẽo é negativo;

**Exemplo de retorno JSON:**

```json
{
	"data": {
		"message": "Update success",
		"statusCode": 200
	}
}
```

