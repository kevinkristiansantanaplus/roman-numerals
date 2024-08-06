## Pré-Requisitos

Antes de dar segmento aos passos deste documento, certifique-se de que o docker e o docker-compose estão devidamente instalados e verifique se a versão do documento é compátivel com sua versão docker, faça as mudanças necessárias.

## Clone dos Repositório GIT

Clone o repositório dentro do diretório criado

``` 
    git clone https://github.com/kevinkristiansantanaplus/roman-numerals/ 
```

## _Configuração do Docker no Linux_

Abra o terminal e acesse ```cd seu/caminho/romannumerals/romannumerals-docker ```, rode o seguinte comando para poder subir o servidor docker, 
onde está localizada as configurações de ambientes necessária para poder trabalhar no projeto:

```
docker-compose up
```

## _Configuração da API_

Agora, execute esses comandos para poder realizar todas as configurações da API e da Aplicação (APP)

``` 
    docker exec -it -w /var/www/romannumerals-api romannumerals-app composer install \
    && docker exec -it -w /var/www/romannumerals-api cp .env.example .env \
    && docker exec -it -w /var/www/romannumerals-api romannumerals-app php artisan key:gen \
    && docker exec -it -w /var/www/romannumerals-api romannumerals-app php artisan config:cache
```

## _Configuração do APP_

``` 
    docker container exec -it romannumerals-app npm install \
    && docker container exec -it romannumerals-app npm build
```

Caso esses comandos não funcionem diretamente, acesso o container com: 

```
    docker exec -it nome_ou_id_container /bin/bash
```

E execute os comandos invidualmente

## Hosts

Agora que o projeto já está configurado, vamos criar um nome mais amigável para poder acessar a aplicação.

Em seu terminal, digite o seguintes comando

``` 
    sudo nano /etc/hosts 
```

dentro do arquivo crie um alias para o IP de Loopback

``` 
    127.0.0.1	romannumerals-api.local 
    127.0.0.1	romannumerals-app.local
```

Aperte CRTL + O para salvar a alteração e CRTL + X para sair do arquivo.

Feito isso, a api poderá estar disponível no seguinte endereço: http://romannumerals-api.local:8000

## Teste

Em seu browser, acesse http://romannumerals-api.local:8000 para poder verificar se está funcionando tudo corretamente.

Para rodar os testes de integração, basta rodar o seguinte comando

``` 
    php artisan test 
```

Para poder entender os retornos da API, pode acessar a documentação com o link

https://github.com/kevinkristiansantanaplus/roman-numerals/blob/main/romannumerals-api/README.md
