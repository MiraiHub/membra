
# **Membra**

**Membra** é um sistema de código aberto para gerenciamento e facilitação de atividades de igrejas. O sistema permite controle de membros e cargos, geração de carteirinhas para impressão, notificações sobre aniversários e eventos, entre outras funcionalidades.

## **Características**

- **Controle de Membros e Cargos**: Gerencie informações de membros, atribua cargos e mantenha registros atualizados.
- **Geração de Carteirinhas**: Crie carteirinhas personalizadas prontas para impressão.
- **Notificações**: Receba avisos sobre aniversários e eventos importantes.
- **Instalador Intuitivo**: Configuração inicial simples com criação de usuário admin e teste de conexão com o banco de dados.
- **Arquitetura Limpa**: Segue os princípios de Clean Code, Clean Architecture, DDD e Object Calisthenics, aderindo às PSRs do PHP.

## **Tecnologias Utilizadas**

### **Backend**

- **PHP 8.3** (com php-fpm)
- **Slim Framework** (versão 4.x)
- **MySQL** (versão 8.x)
- **Doctrine ORM** (usando Attributes do PHP 8)
- **Nginx**
- **PHP-DI** (para injeção de dependência com autowiring)
- **xdebug** (para depuração)

### **Frontend**

- **Vue.js**
- **Quasar Framework**
- **Yarn**

### **Orquestração**

- **Docker**
- **Docker Compose**

## **Pré-requisitos**

- **Docker** e **Docker Compose** instalados na máquina.
- Portas **8000** (backend via nginx) e **8080** (frontend) disponíveis.
- Conhecimento básico em PHP, Vue.js e gerenciamento de containers Docker.

## **Instalação**

### **1. Clonar o Repositório**

```bash
git clone https://github.com/seu-usuario/membra.git
cd membra
```

### **2. Configurar Variáveis de Ambiente**

Crie um arquivo `.env` na raiz do projeto para definir as variáveis de ambiente necessárias para o Docker Compose e para a aplicação.

**Exemplo de `.env`:**

```env
# Configurações do MySQL
MYSQL_ROOT_PASSWORD=rootpassword
MYSQL_DATABASE=membra_db
MYSQL_USER=membra_user
MYSQL_PASSWORD=membra_pass

# Configurações da Aplicação
APP_ENV=development
DB_HOST=database
DB_PORT=3306
DB_NAME=${MYSQL_DATABASE}
DB_USER=${MYSQL_USER}
DB_PASS=${MYSQL_PASSWORD}
```

### **3. Construir e Iniciar os Containers**

Execute o comando:

```bash
docker-compose up -d --build
```

Isso construirá as imagens e iniciará os containers em segundo plano.

### **4. Instalar Dependências do Frontend**

Entre no container do frontend:

```bash
docker-compose exec app-frontend sh
```

Dentro do container, execute:

```bash
yarn install
```

### **5. Acessar o Instalador**

- Abra o navegador e acesse o frontend em: [http://localhost:8080](http://localhost:8080)
- Você será direcionado para a página de instalação inicial.
- Siga as instruções para configurar o usuário admin e testar a conexão com o banco de dados.

## **Uso**

Após a instalação:

- **Aplicação Backend** (via nginx): [http://localhost:8000](http://localhost:8000)
- **Frontend**: [http://localhost:8080](http://localhost:8080)

Use as credenciais criadas durante a instalação para fazer login e começar a utilizar o sistema.

## **Estrutura do Projeto**

```plaintext
membra/
├── backend/
│   ├── src/
│   │   ├── Application/
│   │   ├── Domain/
│   │   ├── Infrastructure/
│   │   ├── Presentation/
│   │   └── Routes/
│   ├── config/
│   │   ├── settings.php
│   │   └── dependencies.php
│   ├── bootstrap/
│   │   └── app.php
│   ├── public/
│   │   └── index.php
│   ├── composer.json
│   ├── Dockerfile
│   └── ...
├── frontend/
│   ├── src/
│   ├── public/
│   ├── package.json
│   ├── yarn.lock
│   ├── Dockerfile
│   └── ...
├── nginx/
│   └── default.conf
├── docker-compose.yml
├── .env
└── README.md
```

## **Configurações e Dependências**

### **Backend**

- **config/settings.php**: Contém as configurações da aplicação, como detalhes do banco de dados e opções gerais.
- **config/dependencies.php**: Registra as dependências que não podem ser resolvidas automaticamente pelo container. Com o autowiring habilitado, a maioria das dependências é resolvida automaticamente com base nos tipos definidos nos construtores.

### **Injeção de Dependências**

- Utiliza o **PHP-DI** com **autowiring** habilitado, permitindo que as dependências sejam injetadas automaticamente com base nos tipos definidos nos construtores das classes.
- Dependências que não podem ser resolvidas automaticamente (como interfaces com múltiplas implementações ou que requerem configurações específicas) são registradas manualmente no arquivo `config/dependencies.php`.

### **xdebug**

- O **xdebug** está habilitado para permitir a depuração do código PHP dentro do container Docker.
- Configurações específicas podem ser encontradas em `backend/config/php/xdebug.ini`.

## **Contribuindo**

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues e pull requests.

Para contribuir:

1. Fork o projeto.
2. Crie uma nova branch: `git checkout -b feature/nova-funcionalidade`
3. Faça suas alterações e commit: `git commit -m 'Adiciona nova funcionalidade'`
4. Envie para o branch principal: `git push origin feature/nova-funcionalidade`
5. Abra um Pull Request.

## **Licença**

Este projeto está licenciado sob a **MIT License** - veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## **Contato**

- **Autor**: Miraihub
- **Email**: contato@miraihub.com.br
- **Website**: [www.miraihub.com.br](http://www.miraihub.com.br)

---

## **Passos Futuros**

- **Implementar Testes Automatizados**: Adicionar testes unitários e de integração usando o PHPUnit.
- **Documentação da API**: Utilizar ferramentas como OpenAPI/Swagger para documentar os endpoints.
- **Internacionalização (i18n)**: Adicionar suporte a múltiplos idiomas.
- **Deploy em Nuvem**: Preparar o ambiente para deploy em serviços como AWS, Heroku ou DigitalOcean.
- **Implementar Autenticação e Autorização**: Utilizar tokens JWT para autenticar usuários e gerenciar perfis de acesso.

---

## **Dicas Adicionais**

- **Manter o Código Limpo**: Seguir as boas práticas de Clean Code e Clean Architecture.
- **Seguir as PSRs do PHP**: Especialmente PSR-12, PSR-4 e PSR-1.
- **Minimizar Dependências**: Utilizar o mínimo de bibliotecas externas necessárias.
- **Segurança**: Valide e sanitize todas as entradas de usuário para prevenir ataques como SQL Injection e XSS.
- **Boas Práticas de Desenvolvimento**: Use ferramentas como o PHP_CodeSniffer para garantir a conformidade com os padrões de código.

---

## **Comandos Úteis**

### **Docker e Docker Compose**

- **Iniciar os Containers:**

  ```bash
  docker-compose up -d
  ```

- **Parar e Remover os Containers:**

  ```bash
  docker-compose down
  ```

- **Reconstruir as Imagens:**

  ```bash
  docker-compose build
  ```

- **Verificar Logs dos Containers:**

  ```bash
  docker-compose logs -f
  ```

### **Composer e PHP**

- **Instalar Dependências do Backend:**

  ```bash
  docker-compose exec app-backend composer install
  ```

- **Executar Migrations:**

  ```bash
  docker-compose exec app-backend php vendor/bin/doctrine migrations:migrate
  ```

- **Executar Tests:**

  ```bash
  docker-compose exec app-backend php vendor/bin/phpunit
  ```

### **Yarn e Node.js**

- **Instalar Dependências do Frontend:**

  ```bash
  docker-compose exec app-frontend yarn install
  ```

- **Iniciar o Frontend em Modo de Desenvolvimento:**

  ```bash
  docker-compose exec app-frontend quasar dev
  ```

---

## **Resolução de Problemas**

- **Porta em Uso:**
    - Se receber um erro de que a porta está em uso, verifique se não há outros serviços utilizando as portas **8000** ou **8080**.
- **Conexão com o Banco de Dados:**
    - Certifique-se de que as credenciais no `.env` correspondem às configuradas no `docker-compose.yml`.
- **Dependências:**
    - Se tiver problemas com dependências, execute `composer install` no backend e `yarn install` no frontend dentro dos containers correspondentes.
- **Permissões de Arquivos:**
    - Certifique-se de que os arquivos e diretórios têm as permissões corretas para serem acessados pelo nginx e php-fpm.
- **Depuração com xdebug:**
    - Configure seu IDE (como VSCode ou PHPStorm) para escutar na porta **9003** e inicie a depuração.
