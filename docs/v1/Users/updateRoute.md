## Atualizar as informações de um usuário

Atualiza um usuário.

```http
  PUT api/users/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `name`      | `string`   | *Obrigatório*. Nome do usuário. |
| `email`     | `string`   | *Obrigatório*. Email do usuário. |
| `password`  | `string`   | *Obrigatório*. Senha do usuário ( Enviar já no padrẽo de Hash do Laravel -> no exemplo o Hash de senha se referencia ao secret "password"). |


**Exemplo de JSON enviado:**

```json
{
	"name": "Matheus",
	"email": "matheus@teste.com",
	"password": "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi"
}
```

**Exemplo de retorno:**

```json
  200 OK
  No body returned for response
```

