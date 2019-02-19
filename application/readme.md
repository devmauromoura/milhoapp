# MilhoAPP
Projeto para desenvolvimento do BACKEND para a festa do milho. 

##### Ferramentas Utilizados
- Laravel
- Laradock
- Docker
- Composer

##### Ultimas atualizações

- 18/02/2019  
Estruturação do ambiente e aplicação ao GIT. 


##### Ambiente

Para o desenvolvimento/manipulação da aplicação, você precisará realizar os seguintes processos:.

- GIT [Download](https://git-scm.com/downloads)


Faça o download do GIT e o instale em sua estação. O GIT será utilizado para o versionamento e compartilhamento do projeto entre os alunos envolvidos. 
Após sua instalação, você deve clonar este repositorio em seu computador, para que tenha acesso aos arquivos/aplicação.  
Já no local aonde irá guardar o projeto, clique com o botão direito do mouse e selecione *GIT BASH HERE*. No terminal que abriu coloque o comando a baixo.
```sh
git clone https://github.com/devmauromoura/milhoapp.git
```

Após esse processo, você ja terá o LARARVEL em seu computador. Em seguida, dentro do respositorio clone o submódulo com o comando:
```sh
git submodule add https://github.com/Laradock/laradock.git
```

 O DOCKER será utilizado para virtualizar nosso ambiente,  que seria o intepretador do PHP, Banco de dados e Gerenciador do Banco de dados.  
- Docker [Download](https://www.docker.com/get-started)

Após fazer o download, realize a instalação do DOCKER. Para os proximos passos, você deve ter certeza que ele está sendo executado.  *Obs.: Durante o processo de instalação, seu computador será reiniciado de 2 a 3 vezes.*


Para instalar o proximo item, precisaremos do PHP.  Recomendo utilizar o tutorial a seguir [Link](https://blog.schoolofnet.com/como-instalar-o-php-no-windows-do-jeito-certo-e-usar-o-servidor-embutido/). Você precisará somente do PHP, o servidor imbutido não será util.

Com isso chegamos ao próximo item. O composer. 

- Composer [download](https://getcomposer.org/download/)

Realize a instalação dele. Para efetuar o teste de funcionamento, em seu terminal execute o comando a seguir:

```sh
composer -v
```

Com o composer instalado,  agora podemos fazer a mágica acontecer.



Em seu terminal navegue até o diretorio onde estão os arquivos foram clonados. Dentro da pasta laradock execute os seguintes comandos:

```sh
cp env-example .env
```
No comando acima estamos fazendo uma copia do env-exemple e colando ele com o nome .env, nele ficam as configurações gerais. Como as portas que as aplicações vão utilizar.

Obs.:*Recomendo que altere a porta do apache, pois o mesmo usa a 80 e ela é utilizada para o SKYPE no windows. Altere por exemplo para 81*.
```sh
docker-compose up -d apache2 mongo pgadmin
```

No segundo, estamos iniciandos as imagens do servidor Apache, o banco de dados PostgreSQL e seu SGBD.


Feito isso, teste o acesso das aplicações através do seu navegador.

Para acessar o SGBD/BD, use as credenciais default.

    Username : pgadmin4@pgadmin.org
    Password : admin
    

Para parar as imagens, basta executar o mesmo comando porem com stop. 
```sh
docker-compose stop apache2 mongo pgadmin
```

Com eles em execução, finalizamos a configuração do ambiente. 


##### Laravel
Para poder ativar o laravel, será necessário realizar alguns procedimentos nesse primeiro "contato".
Com seu terminal,  acesse a pasta APPLICATION. Dentro dela execute os comandos a seguir:

```sh
composer global require laravel/installer
```
Esse comando irá "instalar" o docker e verificar se está tudo correto em relação as suas dependências. 

Para testar o funcionamento, você deve abrir e visualizar o diretorio public da Aplicação.
