## Passo a Passo para a execução do desafio

1. Abra o git bash em uma pasta dentro de xampp/htdocs/ e execute o git clone

2. Ainda no git bash, após clonar o repositório, execute os seguintes comandos:
    
    <hr>
    
    ```bash
    cd Colaboradores3E
    ```
    
    <hr>
    
    ```bash
    composer install
    ```
    
    - Espere a instalação terminar
    
    <hr>
    
    ```bash
    npm install
    ```
    
    - Espere novamente pela instalação
    
    <hr>
    
    ```bash
    cp .env.example .env
    ```
    
    <hr>
    
    ```bash
    php artisan key:generate
    ```
    
    <hr>

4. Agora abra a pasta do projeto no VisualStudio code

5. Abra o XAMPP e ative o APACHE e o MYSQL

6. Abra o arquivo .env e mude DB_DATABASE para **colaboradores3e** se já não estiver.

7. Aperte CTRL + J para abrir o terminal, execute cd Colaboradores3E e os seguintes comandos no terminal:
<br>
    <hr>
    
    ```bash
    php artisan migrate
    ```
    
    - Provavelmente vai ser detectado que a database não existe na máquina e vai ser dado a sugestão de criar a database, digite **yes** e aperte enter
    
    <hr>
    
    ```bash
	php artisan tinker
	```
	
    \*Aperte enter
    
    <hr>
    
    ```bash
	User::create(['name' => 'Administrador', 'email' => 'adm@example.com', 'password' => bcrypt('senha123')]);
    ```
	
    \*Aperte enter

	*Pode customizar o acesso se quiser, mas esse usuário vai ser sua porta de entrada no login.*
    
    <hr>

8. **Inicie o Servidor**  
    Inicie o servidor local do Laravel:  
    ```bash
    php artisan serve
    ```

9. **Acesse o Projeto**  
    Abra o navegador e acesse `http://localhost:8000`.

    <br>

> Pronto, resta apenas testar o projeto.