# API de Pesquisa ViaCEP

Esta API permite a pesquisa de endereços no Brasil utilizando o serviço ViaCEP. Através dela, é possível obter informações detalhadas de um CEP (Código de Endereçamento Postal), facilitando a integração de funcionalidades de consulta de endereços em suas aplicações.

- Consulta de CEP: Realize buscas rápidas e eficientes de endereços brasileiros através do CEP.

- Resposta em JSON: Receba os dados da consulta em formato JSON, facilitando a integração com outras aplicações.

- Validação de CEP: Verifique se o CEP informado é válido antes de realizar a consulta.

- Cache de Resultados: Utilize caching simples para melhorar a performance e reduzir o número de requisições ao serviço ViaCEP.

## Tecnologias Utilizadas

- Laravel: Framework PHP utilizado para o desenvolvimento da API.

- Guzzle: Cliente HTTP utilizado para realizar requisições ao serviço ViaCEP.

- Cache de Arquivos: Sistema de caching utilizando armazenamento de arquivos nativo do Laravel.

## Instalação 

Siga os passos abaixo para configurar o projeto em seu ambiente local:

1. Clone o repositório:

```bash
git@github.com:rodriguesfas/increazy-api-test.git
cd increazy-api-test
```

2. Instale as dependências do projeto:

```bash
composer install
```

3. Configure as variáveis de ambiente:

Renomeie o arquivo ```.env.example``` para ```.env``` e configure as variáveis de ambiente conforme necessário.

4. Configure o sistema de cache:

Certifique-se de que o driver de cache esteja configurado para file no arquivo ```.env```:

```makefile
CACHE_DRIVER=file
```

5. Gere a chave da aplicação:

```bash
php artisan key:generate
```

## Execução do Servidor

Para iniciar o servidor de desenvolvimento do Laravel, utilize o comando abaixo:

```bash
php artisan serve
```

O comando acima iniciará o servidor de desenvolvimento na porta 8000 por padrão. Acesse a aplicação através do navegador no endereço:

```makefile
http://localhost:8000
```

## Uso

Para realizar uma consulta de CEP, envie uma requisição GET para a rota /search/local/{cep1},{cep2}. Exemplo de uso com curl:

```bash
curl http://localhost:8000/search/local/01001000,17560246
```

A resposta será um objeto JSON contendo as informações do endereço correspondente ao CEP informado.

## Exemplo de Resposta

```json
[
	{
		"cep": "17560246",
		"label": "Avenida Paulista, Vera Cruz",
		"logradouro": "Avenida Paulista",
		"complemento": "de 1600\/1601 a 1698\/1699",
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

## Test Unit

```bash
php artisan test
```

## Contribuição

Contribuições são bem-vindas! 
Sinta-se à vontade para abrir issues e pull requests no repositório.

## Licença

Este projeto está licenciado sob os termos da Licença MIT.