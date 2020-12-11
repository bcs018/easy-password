# easy-password
Software web destinado a geração fácil de senhas de 1 até 30 caracteres, com opção de se cadastrar e guardar senha em um banco de dados MySQL por usuário, podendo criar grupos, por exemplo senhas do Facebook da pessoa X, senhas do Instagram da pessoa Y.

## Instalação

* Instalar o programa XAMPP

* Após fazer o clone do projeto na pasta do xampp que é a htdocs, geralmente fica em C:\xampp\htdocs, criar um banco de dados MySQL com o nome de easy-password, por enquanto com uma tabela de usuarios como no exemplo abaixo:

```sh
create table usuarios(
    usuario_id int not null auto_increment,
    nickname varchar(100),
    login varchar(100) not null unique,
    senha varchar(100) not null,
    
    primary key(usuario_id)
)default char set utf8; 
```

* Instalar o programa composer caso não tenha instalado e rodar o comando pelo CMD ``` composer install``` dentro da pasta do projeto C:\xampp\htdocs\easy-password

* Rodar no localhost/easy-password
