## Exemplo AWS - PHP SDK
Esses são alguns exemplos de utilização da SKD para acesso aos serviços da Amazon Web Service 
Foi implementado utilizando a v3.18 da API
[AWS SDK](http://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/basic-usage.html)

## Credenciais

Nesse exemplo salvei o arquivo com as chaves de acesso em ~/.aws/credentials
Pode ser usado o exemplo no projeto
```sh
$ cp .aws-credentials.example ~/.aws/credentials
```
e alterando os valores de **aws_access_key_id** e **aws_secret_access_key**
Veja sobre as [credenciais](http://aws.amazon.com/developers/access-keys/)

Ao instanciar um `client` deve ser passada a chave `profile` para utilizar as chaves definidas no `~/.aws/credentials`
