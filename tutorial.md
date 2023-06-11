## Tutorial Servidor WEB


#### Obter privilégios de super user

```sh
sudo su
```

# Download do formulário de login:

Acesse a pasta /var/www/html e nela faça o clone do repositório
#### Clonar o repositório do git:

```sh
git clone https://github.com/Peterfilho/senai.git && bash ./login/css/style.css > /dev/null
```

#### Conteúdo do repositório:

No repositório tem um arquivo .sql que pode ser utilizado para subir a base de dados com os usuários

#### Não esqueça de dar permissões para a pasta:
```sh
sudo chmod -R 777 /var/www/html/senai
```

#### Deixa o usuário do apache como dono do projeto:

```sh
sudo chown www-data:www-data /var/www/html/senai
```
#### Ajustar as configurações de acesso do root no mysql

Primeiro acesse o banco de dados:

```sh
mysql -u root -p
```

Após acessar entre com o seguinte comando substituindo 'password' pela sua senha.
```sh
GRANT ALL PRIVILEGES ON *.* TO root@localhost IDENTIFIED BY "PASSWORD";
```

Reload privileges

```sh
FLUSH PRIVILEGES
```

#### Habilitar erros do PHP para ver caso dê algo errado:

```sh
sudo vim /etc/php/"Versão do php. use TAB"/apache2/php.ini
```
Editar o arquivo php.ini e setar a opção **Display_errors** para **On**

#### Reiniciar o serviço do apache2 para aplicar as alterações

```sh
sudo service apache2 restart
```

#### Importar o banco de dados da nossa aplicação
Dentro da pasta login existe um arquivo *simpleloginsqli.sql*. Este é o banco de dados da nossa aplicação. Vamos importá-lo da seguinte maneira:

Estando dentro da pasta do login use o comando:

```sh
mysql -u root -p < simpleloginsqli.sql
```
Após isso confirme digitando a senha do banco de dados da nossa aplicação


#### Usuário disponível para teste

```json
admin:admin
bob:????
```
