### Sobre o projeto
O QJobs é uma aplicação simplificada para a divulgação e candidatura em vagas de trabalho

![Tela de login](https://github.com/lftissot2/curso-beta/blob/master/docs/print.png)

### 📝 Principais recursos
- Dois perfis
    - Candidatos, que visualizam vagas e podem aplicar para elas
    - Admins, podem gerenciar os candidatos e vagas
- Os candidatos podem:
    - Ver vagas de trabalhos disponíveis
    - Candidatar-se e remover sua candidatura em cada vaga
- Os admins podem:
    - Cadastrar, editar e remover candidatos
    - Cadastrar, editar (incluindo pausar) e remover vagas
### ⚙️ Stack
- Laravel 8
- JQuery
- VueJS 3
- Materialize
- MySQL
- NGINX

### 🏁 Executando o projeto
Para executar o projeto, execute os seguintes comandos:
```
docker-compose up -d
docker exec -it curso-beta_app_1 composer install
docker exec -it curso-beta_app_1 php artisan key:generate
docker exec -it curso-beta_app_1 php artisan migrate --seed
```
Na sequência, acesse http://localhost:8001

### 🔑 Contas
#### Admin
- Email: adm@qjobs.com
- Senha: 123

#### Candidato
- Email: cand@qjobs.com
- Senha: 123