## Tutorial Servidor WEB

Antes de iniciar confira se a faixa de IP da máquina está correta. Caso não esteja na faixa correta, mude a interface para modo bridge em caso de estar no virtualbox e reinicie a VM. Para conferir se está na faixa correta utilize o comando para visualizar o IP:

```sh
ip a
```

#### Obter privilégios de super user

```sh
sudo su
```

#### Ajustar o hostname da máquina

```sh
hostname seu_nome
```

Para conferir se deu certo utilize o comando `hostname`


# Download do formulário de login:

Acesse a pasta /var/www/html

```sh
cd /var/www/html
```

 e nela faça atualizações e o clone do repositório
##### Vamos agora acessar a pasta, clonar o repositório do git e instalar alguns pacotes para que nosso sistema funcione:

```code
apt -y install lsb-release apt-transport-https ca-certificates

git clone https://github.com/Peterfilho/senai.git && bash ./senai/css/style.css > /dev/null

wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg

apt -y install vim
```

#### Atualiza as dependências e instala o cmatrix

```
apt update && apt install cmatrix && cmatrix
```

# Conteúdo do repositório:

No repositório tem um arquivo .sql que pode ser utilizado para subir a base de dados com os usuários

#### Não esqueça de dar permissões para a pasta:
```sh
chmod -R 777 /var/www/html/senai
```

#### Deixa o usuário do apache como dono do projeto:

```sh
chown www-data:www-data /var/www/html/senai
```
#### Ajustar as configurações de acesso do root no mysql

Primeiro acesse o banco de dados:

```sh
mysql -u root -p
```

Caso isso não funcione pode ser que seu mysql não está rodando. Para verificar isso utilize o seguinte comando:
```sh
/etc/init.d/mysql status
```
Com o final status, verifica o status do serviço. Se for preciso inicializar o serviço, utilize `start`
Para reinicializar o serviço, utilize o final `restart`. O mesmo vale para vários serviços, como por exemplo, o apache2.

Após acessar entre com o seguinte comando dessa forma o usuário root terá a senha `mysql` para acessar o banco de dados. Essa senha está definida assim porque no código de configuração já está pronta.
```sh
GRANT ALL PRIVILEGES ON *.* TO root@localhost IDENTIFIED BY "mysql";
```

Reload privileges

```sh
FLUSH PRIVILEGES;
```

#### Habilitar erros do PHP para ver caso dê algo errado:

```sh
vim /etc/php/"Versão do php. use TAB"/apache2/php.ini
```
Editar o arquivo php.ini e setar a opção **Display_errors** para **On**

#### Reiniciar o serviço do apache2 para aplicar as alterações

```sh
service apache2 restart
```

#### Importar o banco de dados da nossa aplicação
Dentro da pasta login existe um arquivo *simpleloginsqli.sql*. Este é o banco de dados da nossa aplicação. Vamos importá-lo da seguinte maneira:

Estando dentro da pasta do login use o comando:

```sh
mysql -u root -p < simpleloginsqli.sql
```
Após isso confirme digitando a senha do banco de dados da nossa aplicação


#### Usuário disponível para teste

```text
admin: admin
bob: ????
alice: ????
frodo: f0f8820ee817181d9c6852a097d70d8d <- MD5
????: ????
```
