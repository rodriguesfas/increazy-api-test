# Teste - Desenvolvedor Backend

Nesse teste será proposta a criação de uma API para realizar a consulta de vários CEPs no ViaCEP e fazer o retorno dos dados da maneira proposta. A seguir você poderá ver a descrição detalhada do que deverá ser entregue, não se esqueça de organizar bem o seu código, e tenha um bom teste 🙂

1. Crie um novo projeto de API em Lumen ou Laravel, nele defina uma nova rota GET correspondente a o caminho `/search/local/CEP-1,CEP-2…`.

2. No controlador dessa rota use a API do ViaCEP para realizar e armazenar em array a consulta de cada.

3. Reorganize os dados dos endereços para que quando acessado `/search/local/01001000,17560-246` a API retorne um JSON exatamente assim:

```json
[
  {
    "cep": "17560246",
    "label": "Avenida Paulista, Vera Cruz",
    "logradouro": "Avenida Paulista",
    "complemento": "de 1600/1601 a 1698/1699",
    "bairro": "CECAP",
    "localidade": "Vera Cruz",
    "uf": "SP",
    "ibge": "3556602",
    "gia": "7134",
    "ddd": "14",
    "siafi": "7235"
  },
  {
    "cep": "01001000",
    "label": "Praça da Sé, São Paulo",
    "logradouro": "Praça da Sé",
    "complemento": "lado ímpar",
    "bairro": "Sé",
    "localidade": "São Paulo",
    "uf": "SP",
    "ibge": "3550308",
    "gia": "1004",
    "ddd": "11",
    "siafi": "7107"
  }
]
```

Assim que essa tarefa estiver pronta, envie o projeto para o seu Github e nos mande o link nos e-mails leonardo@increazy.com e mamedio@increazy.com. Com o assunto: Teste Backend - [NOME COMPLETO]

https://increazy.notion.site/Teste-Desenvolvedor-backend-62b7e24e6218412cbf1ab36aef46f603