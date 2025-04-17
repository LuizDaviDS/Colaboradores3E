## Passo a Passo para a execução do desafio

1. **Crie um Novo Projeto Laravel**  **(dentro de htdocs no xampp)**
    Execute o comando abaixo no terminal para criar um novo projeto Laravel:  
    ```bash
    laravel new Colaboradores3E
    ```

2. **Instale os templates seguindo a ordem abaixo:**  
    
    - Starter Kit  
    ```bash
    None
    ```
    - Which database will your application use?
    ```bash
    mysql
    ```
    - Default database updated. Would you like to run the default database migrations?  
    ```bash
    yes
    ```
    - Would you like to run npm install and npm run build?  
    ```bash
    yes
    ```

3. **Configure o Ambiente**  

    - Configure o banco de dados no arquivo .env
    ```
    // código acima...

    // Minha configuração:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=colaboradores3e
    DB_USERNAME=root
    DB_PASSWORD=

    // código abaixo...
    ```

4. **Execute as Migrações**  

    **Rode no console "php artisan migrate" e faça o mencionado a seguir**

    - The database 'colaboradores3e' does not exist on the 'mysql' connection.
        **Would you like to create it?**
    ```
    yes
    ```

5. Abra o XAMPP e ative o APACHE e o MYSQL

6. execute cd Colaboradores3E e execute no terminal os seguintes comandos:
	php artisan tinker
	
	Aperte enter
	
	User::create(['name' => 'Administrador', 'email' => 'adm@example.com', 'password' => bcrypt('senha123')]);

	Aperte enter

	*Pode customizar o acesso se quiser, mas esse usuário vai ser sua porta de entrada no login.*

7. **Inicie o Servidor**  
    Inicie o servidor local do Laravel:  
    ```bash
    php artisan serve
    ```

8. **Acesse o Projeto**  
    Abra o navegador e acesse `http://localhost:8000`.

> Pronto, resta apenas testar o projeto.