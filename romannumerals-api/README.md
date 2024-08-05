## Converter Números Arábicos para Números Romanos
Endpoint: /api/v1/roman-to-arabic/{letter}

Parâmetro obrigatório: {letter} - Numeral Romano

Método: GET

Status: 200
Resposta: 
```
{

	"message": "Dados recuperados com sucesso.",
	"numerals": "Numeral romano",
	"status": 200,
	"data": {
		"roman": "Numeral Romano",
		"number": "Numeral do parametro"
	}

}
```

Parâmetros com valores acima de 50000
Status: 400
Resposta: 
```
{

	"message": "Insira um número menor que 50000.",
	"status": 400

}
```

Status: 500
Resposta: 
```
{

	"message" => "Houve um erro no servidor, favor contatar o suporte",
    "status"  => 500

}
```

## Converter Números Romanos para Números Arábicos

Endpoint: /api/v1/arabic-to-roman/{decimal}

Parâmetro obrigatório: {decimal} - Numeral Arábico

Método: GET
Status: 200
Resposta: 
```
{

	"message": "Dados recuperados com sucesso.",
	"numerals": "Numeral correspondente",
	"status": 200,
	"data": {
		"roman": "Numeral do parâmetro",
		"number": "Numeral correspondente"
	}

}
```

Parâmetros com valores inválidos
Status: 400
Resposta: 
```
{

	"message": "Insira um número em romano válido.",
	"status": 400

}
```

Status: 500
Resposta: 
```
{

	"message" => "Houve um erro no servidor, favor contatar o suporte",
    "status"  => 500

}
```