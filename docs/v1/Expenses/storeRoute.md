## Cadastra uma nova despesa

Cadastra uma nova despesa. O USER autenticado só consegue criar despesas com o seu ID de usuário na requisição.

```http
  POST api/v1/expenses
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `userId`      | `int`      | *Obrigatório*. ID do usuário relacionado a despesa. |
| `description` | `string`   | *Obrigatório*. Descrição da despesa. |
| `value`       | `decimal`  | *Obrigatório*. Valor da despesa. |
| `expenseDate` | `date`     | *Obrigatório*. Data da despesa. |


**Exemplo de JSON enviado:**

```json
{
	"userId": 1,
	"description": "Despesa 4",
	"value": 578.10,
	"expenseDate": "2023-06-02"
}
```

Os seguintes requisitos estão sendo validados:
 - Se o userId é de um usuário existente;
 - Se a descrição tem até 191 caracteres;
 - Se a data que será cadastrada não é maior que a data atual;
 - Se o valor cadastrado nẽo é negativo;


**Envio de e-mail:**

Um email é enviado quando a despesa é cadastrada com sucesso para o e-mail do usuário autenticado no sistema.

**Exemplo de retorno JSON:**

```json
{
	"data": {
		"message": "Insert success",
		"statusCode": 200
	}
}
```

