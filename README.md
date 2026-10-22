# 🌷 Jardim Secreto

### Sistema web para escolha e personalização de buquês de casamento

**Projeto Integrador — SENAI de Americana**  
**Curso:** Técnico em Desenvolvimento de Sistemas  
**Integrante:** Eloá Muniz 

---

## 1. Início do projeto

O Jardim Secreto é um sistema web de floricultura desenvolvido especialmente para ajudar noivas durante a escolha do buquê para o casamento.

A ideia é reunir, em um só lugar, opções de buquês prontos, informações sobre flores e ferramentas para que cada cliente possa montar uma composição de acordo com suas preferências. A noiva também pode informar detalhes do casamento, como data, local, estilo e paleta de cores, para organizar melhor suas escolhas.

Além da parte voltada às clientes, o sistema possui uma área de gerenciamento para a administradora, responsável por manter o catálogo de flores e buquês atualizado.

O projeto foi desenvolvido como parte das atividades do curso Técnico em Desenvolvimento de Sistemas, colocando em prática os conhecimentos de desenvolvimento web e banco de dados.

## 2. Por que o Jardim Secreto foi criado?

Organizar um casamento envolve diversas escolhas, e o buquê é um dos detalhes que precisam combinar com o estilo e as cores da cerimônia.

Pensando nisso, surgiu a proposta de desenvolver um sistema que facilite a consulta de opções e permita que a noiva organize suas preferências sem depender apenas de modelos prontos.

Com o Jardim Secreto, a cliente pode conhecer diferentes buquês, consultar as flores disponíveis e montar uma composição própria. Dessa forma, ela consegue visualizar os itens escolhidos e acompanhar o valor da composição.

## 3. Objetivos do sistema

O principal objetivo é desenvolver um sistema web simples e organizado que auxilie na escolha e na personalização de buquês de casamento.

Para isso, o projeto busca:

- Facilitar a consulta de flores e buquês disponíveis.
- Oferecer modelos prontos como inspiração para as noivas.
- Permitir o cadastro e o acesso das clientes.
- Organizar as informações sobre o casamento.
- Registrar a paleta de cores escolhida para o evento.
- Possibilitar a seleção de flores e suas respectivas quantidades.
- Apresentar os subtotais dos itens e o valor total do buquê personalizado.
- Permitir que a administradora cadastre, consulte, edite e exclua informações do catálogo.
- Armazenar as informações em um banco de dados PostgreSQL.

## 4. Para quem o sistema foi desenvolvido?

O Jardim Secreto possui dois perfis principais de usuários.

**Cliente ou noiva**

É a pessoa que utiliza o site para conhecer as opções e organizar a escolha do buquê. Entre as atividades disponíveis para esse perfil estão:

- Criar uma conta e realizar o login.
- Consultar os buquês prontos.
- Visualizar as flores disponíveis.
- Informar os dados do casamento.
- Escolher uma paleta de cores.
- Selecionar flores e quantidades para personalizar o buquê.
- Consultar os itens escolhidos e o valor total.
- Remover itens da própria composição.

**Administradora ou florista**

É a pessoa responsável por manter as informações do catálogo organizadas. Conforme as permissões do sistema, esse perfil pode:

- Cadastrar novas flores.
- Consultar as flores cadastradas.
- Editar as informações de uma flor.
- Excluir flores do catálogo.
- Cadastrar e manter os buquês prontos disponíveis no site.

## 5. O que é possível fazer no Jardim Secreto?

### Página inicial

É o primeiro contato da visitante com o sistema. Apresenta a proposta do Jardim Secreto e permite conhecer os buquês prontos usados como inspiração.

### Cadastro e login

Permite criar uma conta e acessar as funcionalidades destinadas ao usuário. O sistema utiliza o tipo de usuário para separar o acesso da cliente e da administradora.

### Catálogo de flores

Reúne as flores cadastradas, com informações como nome, tipo, cor, descrição, preço e imagem, de acordo com os campos utilizados no sistema.

### Catálogo de buquês prontos

Apresenta modelos de buquês que podem servir de referência para a escolha da noiva. A administradora pode manter os registros desses modelos atualizados.

### Informações do casamento

A cliente pode registrar características importantes do evento, incluindo:

- Data do casamento.
- Local da cerimônia.
- Estilo do casamento.
- Paleta de cores escolhida.

Essas informações ajudam a reunir as preferências da noiva em um só lugar.

### Personalização do buquê

Nessa parte, a cliente escolhe as flores que deseja utilizar e informa a quantidade de cada uma. O sistema utiliza os preços cadastrados para apresentar os subtotais e calcular o valor total da composição.

### Meu buquê

É a área destinada à consulta da composição personalizada. Nela, a cliente pode conferir as flores selecionadas, as quantidades, os valores correspondentes e remover itens que não deseja mais utilizar.

### Gerenciamento do catálogo

A administradora pode realizar operações de cadastro, consulta, edição e exclusão de flores e manter os registros de buquês prontos organizados.

## 6. Como funciona a utilização do sistema?

O funcionamento do Jardim Secreto segue uma sequência de etapas:

1. A visitante acessa a página inicial e conhece a proposta do site.
2. Ela pode visualizar os modelos de buquês prontos para ter ideias.
3. Para utilizar as funções destinadas à cliente, realiza o cadastro e o login.
4. Depois de acessar sua conta, informa os detalhes do casamento.
5. Registra a data, o local, o estilo do evento e a paleta de cores.
6. Na área de personalização, escolhe as flores disponíveis e define as quantidades.
7. O sistema reúne os itens selecionados e apresenta os valores da composição.
8. Na página “Meu buquê”, a cliente confere o resultado e pode remover itens.
9. A administradora acessa as funções de gerenciamento para manter o catálogo atualizado.

Esse fluxo organiza as principais atividades do projeto e separa as funções de acordo com o perfil de acesso.

## 7. Requisitos do sistema

Os requisitos funcionais descrevem as ações que o Jardim Secreto deve permitir. Os requisitos não funcionais indicam características importantes para sua organização e utilização.

### Requisitos funcionais

**Cadastro de usuários:** permitir que uma cliente crie uma conta no sistema.

**Login e controle de acesso:** permitir a entrada de usuários cadastrados e separar as funcionalidades conforme o perfil.

**Dados do casamento:** permitir o registro e a edição das informações do evento.

**Cadastro de flores:** permitir que a administradora adicione flores ao catálogo.

**Consulta de flores:** exibir as flores cadastradas e suas informações.

**Edição de flores:** permitir a alteração dos dados de uma flor.

**Exclusão de flores:** permitir a remoção de registros do catálogo.

**Consulta de buquês prontos:** apresentar os modelos cadastrados para inspiração.

**Gerenciamento de buquês:** permitir o cadastro e a manutenção dos modelos prontos pela administradora.

**Personalização:** permitir que a cliente selecione flores e quantidades para compor o buquê.

**Consulta da composição:** apresentar os itens escolhidos, seus subtotais e o valor total.

**Remoção de itens:** permitir que a cliente retire flores da composição personalizada.

### Requisitos não funcionais

- **Usabilidade:** as páginas devem apresentar informações de maneira clara e facilitar a navegação.
- **Organização:** os arquivos devem ser separados por suas funcionalidades, facilitando a manutenção do código.
- **Banco de dados:** as informações devem ser armazenadas e consultadas no PostgreSQL.
- **Tecnologias:** o sistema utiliza HTML, CSS, PHP, PDO e SQL.
- **Reutilização de código:** arquivos compartilhados podem reunir funções, cabeçalho, rodapé e formulários utilizados em diferentes páginas.
- **Interface:** os estilos visuais ficam separados do código das páginas, por meio da folha de estilos.
- **Controle de acesso:** as funcionalidades devem respeitar o perfil do usuário autenticado.

## 8. Regras de funcionamento

Para manter as informações organizadas, o sistema considera as seguintes regras de negócio:

- A cliente precisa ter uma conta para acessar as funcionalidades que exigem autenticação.
- As funcionalidades de gerenciamento do catálogo são destinadas à administradora.
- As informações do casamento ficam relacionadas à cliente responsável pelo cadastro.
- A personalização utiliza as flores disponíveis no catálogo.
- A quantidade escolhida influencia o subtotal de cada item.
- O valor total corresponde à soma dos subtotais das flores selecionadas.
- A remoção de um item permite alterar a composição do buquê.
- O banco de dados mantém os registros utilizados pelas funcionalidades do sistema.

Essas regras descrevem o comportamento esperado do projeto e ajudam a orientar o desenvolvimento das páginas e das operações com o banco de dados.

## 9. Banco de dados

O Jardim Secreto utiliza o PostgreSQL para armazenar e organizar os dados necessários ao funcionamento do sistema.

O banco utilizado no projeto se chama `jardim_secreto`. As informações são distribuídas em tabelas relacionadas entre si.

### Tabelas utilizadas

**Usuários (`usuarios`)**

Armazena os dados das pessoas cadastradas. Os campos previstos incluem identificador, nome, e-mail, senha e tipo de usuário.

**Paletas de cores (`paletas`)**

Guarda as opções de paletas disponíveis, incluindo o nome da paleta e suas cores.

**Casamentos (`casamentos`)**

Armazena as informações do evento, como data, local e estilo, além das referências ao usuário e à paleta escolhida.

**Flores (`flores`)**

Contém os dados das flores do catálogo, incluindo nome, tipo, cor, descrição, preço e imagem.

**Buquês (`buques`)**

Guarda os modelos de buquês prontos, com informações como nome, descrição, flores utilizadas, preço e imagem.

**Personalização (`personalizacao`)**

Registra os itens escolhidos para a composição do buquê, relacionando o casamento, a flor e a quantidade selecionada.

### Relacionamento dos dados

As tabelas possuem campos de identificação que permitem relacionar informações entre si. Por exemplo:

- Um usuário pode estar relacionado aos dados de seu casamento.
- Um casamento pode estar associado a uma paleta de cores.
- A personalização relaciona o casamento às flores escolhidas.
- Cada item da personalização registra a quantidade selecionada da flor correspondente.

Esses relacionamentos ajudam a evitar que todas as informações precisem ser armazenadas em uma única tabela e permitem consultar os dados de forma organizada.

## 10. Tecnologias utilizadas

**HTML**

Utilizado para estruturar as páginas, formulários, textos e demais elementos apresentados no navegador.

**CSS**

Responsável pela aparência das páginas, incluindo cores, espaçamentos, fontes, organização dos elementos e adaptação visual.

**PHP**

Utilizado para desenvolver a parte lógica do sistema, receber dados dos formulários, processar informações e executar operações solicitadas pelo usuário.

**PostgreSQL**

Sistema de gerenciamento de banco de dados utilizado para guardar as informações do projeto.

**PDO**

Recurso do PHP utilizado para realizar a conexão com o banco de dados e executar comandos SQL.

**SQL**

Linguagem utilizada para criar tabelas e consultar, inserir, atualizar ou excluir registros no banco de dados.

**Visual Studio Code**

Editor utilizado para desenvolver e organizar os arquivos do projeto.

## 11. Organização dos arquivos

O projeto está separado em pastas para facilitar a localização dos arquivos e a manutenção do código.

- `index.php` — página inicial do sistema.
- `database/` — arquivos relacionados à conexão e à estrutura do banco de dados.
  - `connect.php` — conexão com o PostgreSQL.
  - `banco.sql` — comandos SQL utilizados para preparar o banco de dados.
- `includes/` — arquivos compartilhados entre diferentes páginas.
  - `functions.php` — funções auxiliares.
  - `header.php` — estrutura do cabeçalho.
  - `footer.php` — estrutura do rodapé.
  - `form_flor.php` — formulário de flores.
  - `form_buque.php` — formulário de buquês.
  - `form_casamento.php` — formulário com informações do casamento.
  - `form_usuario.php` — formulário de usuário.
- `login/` — páginas relacionadas ao cadastro, login, encerramento da sessão e verificação de acesso.
- `flores/` — páginas de consulta, cadastro, edição e exclusão de flores.
- `buques/` — páginas relacionadas à consulta e ao gerenciamento dos buquês prontos.
- `casamento/` — páginas para cadastrar e consultar ou editar as informações do casamento, conforme as funcionalidades implementadas.
- `personalizar/` — páginas para escolher flores, consultar a composição e remover itens.
- `style/` — arquivos responsáveis pelos estilos visuais.
- `img/` — imagens utilizadas no site, quando presentes.
- `docs/` — documentação complementar do projeto.

A separação por pastas facilita encontrar cada funcionalidade e ajuda a manter o desenvolvimento mais organizado.

## 12. Como executar o projeto localmente

Para executar o Jardim Secreto em um computador, é necessário preparar o ambiente de desenvolvimento e configurar a conexão com o banco de dados.

### O que é necessário

- Visual Studio Code ou outro editor de código.
- PHP instalado e disponível no terminal.
- PostgreSQL instalado e em funcionamento.
- Acesso ao banco de dados utilizado pelo projeto.
- Arquivos do Jardim Secreto.

### Etapas de preparação

**1. Obter os arquivos**

Baixe ou clone o repositório do Jardim Secreto para o computador e abra a pasta do projeto no Visual Studio Code.

**2. Preparar o banco de dados**

Crie o banco `jardim_secreto` no PostgreSQL, caso ainda não exista.

**3. Conferir o arquivo de conexão**

Abra `database/connect.php` e verifique os dados de conexão, como servidor, porta, nome do banco, usuário e senha. Utilize os dados configurados no seu ambiente.

**4. Preparar as tabelas**

Execute os comandos do arquivo `database/banco.sql` no banco correto, seguindo a ordem necessária para criar as tabelas e inserir os dados iniciais.

Atenção: antes de executar o script novamente, confira seu conteúdo. Se houver comandos para apagar ou recriar tabelas, eles podem excluir dados existentes.

**5. Iniciar o servidor PHP**

No terminal, dentro da pasta principal do projeto, execute:

```bash
php -S localhost:8000
```

**6. Abrir o site**

Com o servidor em execução, acesse o endereço abaixo no navegador:

```text
http://localhost:8000
```

Se a página não abrir ou houver erro de conexão, confira se o PHP está instalado, se o PostgreSQL está ativo e se as credenciais do arquivo de conexão estão corretas.

# Como entrar no site: passo a passo

## Os oito passos

1. **Ligue o PostgreSQL.** Confirme que ele está em execução. No Windows, procure o serviço do PostgreSQL ou abra o pgAdmin e conecte no servidor.
2. **Crie o banco (só na primeira vez).** Conectada no banco `postgres`, rode o comando `CREATE DATABASE jardim_secreto;`.
3. **Crie as tabelas e os dados de teste.** Conecte no banco `jardim_secreto` e execute todo o conteúdo do arquivo `database/banco.sql`. Atenção: esse script apaga e recria as tabelas, então rodá-lo de novo devolve os dados ao estado inicial.
4. **Confira a conexão.** Abra `database/connect.php` e confira os quatro dados: `$host` (localhost), `$dbname` (jardim_secreto), `$user` (postgres) e `$pass` (a senha do seu PostgreSQL, no lugar de SUA_SENHA). Salve o arquivo.
5. **Abra o terminal na pasta do projeto.** No VS Code, abra a pasta `jardim_secreto` (File > Open Folder) e use Terminal > New Terminal. A pasta certa é a que contém o `index.php`. Para conferir, digite `dir` (Windows) ou `ls` (Mac e Linux) e veja se o `index.php` aparece na lista.
6. **Inicie o servidor.** Digite `php -S localhost:8000` e aperte Enter. Deve aparecer uma mensagem dizendo que o servidor foi iniciado. Deixe esse terminal aberto: se ele for fechado, o site sai do ar.
7. **Abra o site.** No navegador, digite `http://localhost:8000` e aperte Enter. Deve aparecer a página inicial do Jardim Secreto, com o menu no topo e os buquês de inspiração.
8. **Entre no sistema.** Clique em "Entrar" no menu e use uma das contas de teste abaixo, ou crie a sua em "Cadastre-se".

## Alternativa com XAMPP

Se você usa o XAMPP, copie a pasta `jardim_secreto` para a pasta `htdocs`, ligue o Apache e acesse `http://localhost/jardim_secreto/`. O PostgreSQL continua sendo ligado à parte, e a extensão `pdo_pgsql` precisa estar ativa no `php.ini`.

## Se algo der errado

| O que aparece | O que fazer |
| --- | --- |
| `php` não é reconhecido | O PHP não está instalado ou não está no PATH. Instale ou ajuste e abra um terminal novo |
| could not find driver | No `php.ini`, tire o `;` de `extension=pdo_pgsql` e `extension=pgsql` e reinicie o servidor |
| password authentication failed | Usuário ou senha errados no `connect.php` |
| database "jardim_secreto" does not exist | Crie o banco (passo 2) |
| relation ... does not exist | Rode o `banco.sql` no banco `jardim_secreto` (passo 3) |
| Connection refused | O PostgreSQL está desligado (passo 1) ou usa outra porta |
| O site abre sem cores nem estilo | O servidor foi iniciado em outra pasta. Pressione Ctrl + C, entre na pasta que tem o `index.php` e inicie de novo |
| Porta 8000 em uso | Use `php -S localhost:8080` e abra `http://localhost:8080` |
| E-mail ou senha incorretos ao entrar | As contas de teste só existem depois do `banco.sql`; ou crie uma conta em "Cadastre-se" |

## 13. Testes e verificações

Durante a utilização do sistema, é importante verificar se as principais funcionalidades estão funcionando corretamente.

Alguns testes que podem ser realizados são:

- Criar uma conta de cliente.
- Verificar o acesso por meio do login.
- Conferir se cada perfil acessa somente as funções permitidas.
- Consultar os buquês prontos e as flores cadastradas.
- Cadastrar uma flor e verificar se ela aparece no catálogo.
- Editar os dados de uma flor e conferir a alteração.
- Excluir um registro e verificar se a remoção foi realizada.
- Cadastrar ou alterar as informações do casamento.
- Selecionar flores e quantidades para personalizar o buquê.
- Conferir os subtotais e o valor total.
- Remover um item e verificar a atualização da composição.
- Conferir se os dados foram registrados corretamente no PostgreSQL.

Esses testes ajudam a identificar problemas nos formulários, nas permissões, nas operações de cadastro e na comunicação com o banco de dados.

## 14. Segurança e cuidados com os dados

Como o sistema trabalha com contas de usuários e informações cadastradas, alguns cuidados são importantes:

- Restringir as páginas administrativas ao perfil autorizado.
- Validar os dados recebidos pelos formulários.
- Utilizar consultas preparadas com PDO para executar comandos SQL com dados informados pelo usuário.
- Manter as credenciais de conexão protegidas.
- Evitar publicar senhas reais ou informações privadas no repositório.
- Armazenar senhas de forma segura, utilizando recursos apropriados de hash, como `password_hash()` e `password_verify()` no PHP.

Esses cuidados devem ser conferidos na implementação do projeto. A presença de uma funcionalidade no planejamento não significa, por si só, que todas as medidas de segurança já estejam aplicadas.

## 15. Limites e possibilidades de melhoria

O Jardim Secreto foi desenvolvido como um projeto educacional, com foco na aplicação dos conteúdos estudados durante o curso.

Entre as possibilidades de melhoria para versões futuras estão:

- Aprimorar a validação dos formulários.
- Melhorar a proteção das contas e das sessões.
- Tornar a interface mais adaptável a diferentes tamanhos de tela.
- Ampliar as opções de flores, cores e modelos de buquês.
- Melhorar a apresentação visual dos valores da composição.
- Adicionar filtros para facilitar a busca de flores e buquês.
- Aperfeiçoar as mensagens exibidas quando ocorre algum erro.
- Realizar novos testes de funcionamento e segurança.

Essas melhorias podem ser implementadas conforme as necessidades identificadas durante o uso do sistema.

## 16. Considerações finais

O desenvolvimento do Jardim Secreto permitiu reunir diferentes conhecimentos trabalhados no curso Técnico em Desenvolvimento de Sistemas, principalmente na criação de páginas web, na utilização do PHP e na integração com um banco de dados PostgreSQL.

O projeto busca oferecer uma forma mais organizada de consultar opções de buquês e personalizar uma composição de acordo com as preferências da noiva. Ao mesmo tempo, trabalha conceitos importantes para o desenvolvimento de sistemas, como formulários, autenticação, controle de acesso, operações CRUD e relacionamento entre tabelas.
