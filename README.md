# lepetitmessager

Mais um sistema de mensagens em RESTful

Utiliza Yii2 + Redis

## CONFIGURANDO O AMBIENTE DE DESENVOLVIMENTO

1) Clone o projeto

2) Instale o [Composer](http://getcomposer.org/) se não tiver.

2.1) Rode `composer install` dentro da pasta do projeto.

3) Dê permissão de escrita nas pastas `runtime` e `web/assets`:

```bash
chmod 777 runtime
chmod 777 web/assets
```

4) Instale o Redis e o cliente PHP do redis

5) Crie o arquivo .env para definir as variáveis de ambiente da aplicação. Um exemplo está na pasta raiz do projeto.

6) Ative a reescrita de URL em seu apache

7) Adicione um novo virtual host ao Apache. As configurações do apache geralmente se encontram no arquivo `/etc/apache2/httpd.conf` ou `/etc/apache2/sites-(enabled|avaliable)/*.conf`

```apache
<VirtualHost *:80>
        ServerName lepetitmessager.dev
        DocumentRoot /seu/servidor/web/lepetitmessager/web

        <Directory /seu/servidor/web/lepetitmessager/web>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
                Require all granted
        </Directory>

</VirtualHost>

<VirtualHost *:80>
        ServerName lepetitmessager.test
        DocumentRoot /seu/servidor/web/lepetitmessager/web
        SetEnv ENVIRONMENT test

        <Directory /seu/servidor/web/lepetitmessager/web>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
                Require all granted
        </Directory>

</VirtualHost>
```

8) Para que os hosts `lepetitmessager.dev` e `lepetitmessager.test` funcionem, adicione a seguinte linha ao seu
arquivo `/etc/hosts`:

```
127.0.0.1 lepetitmessager.dev lepetitmessager.test
```

Enfim pronto para executar o sistema!

##USANDO A FERRAMENTA

E.G http://lepetitmessager.dev/messages

As API's incluídas são:

- GET /messages: listar todas as mensagens
- HEAD /messages: mostra os cabeçalhos da listagem de mensagens
- POST /messages: cria uma nova mensagem
- GET /messages/123: retorna detalhes da mensagem 123;
- HEAD /messages/123: mostra os cabeçalhos dos detalhes da mensagem 123;
- DELETE /messages/123: remove a mensagem 123;
- OPTIONS /messages: mostra os verbos suportados sobre o endpoint /messages;
- OPTIONS /messages/123: mostra os verbos suportados sobre o endpoint /messages/123.

##TESTES

Para rodar os testes, faça:
```bash
./vendor/bin/codecept run
```

Os testes estão separados por testes de [API](https://github.com/jsopra/lepetitmessager/tree/master/tests/api/message) e testes [unitários](https://github.com/jsopra/lepetitmessager/tree/master/tests/unit/models)

Consulte o [tutorial do Codeception](http://codeception.com/docs/01-Introduction)
para mais detalhes.
