1° clone o repositório (git clone git@github.com:paulohjesus1982/gsafe_atualizado.git)

2° abra o terminal e instale as seguintes dependencias 

OBS IMPORTANTISSIMO: TODAS AS OPÇÕES DE REPLACE QUE APARECEREM VC COLOCA "NO", mas pq? pq se não vai dar replace em todas as pastas com fontes que mexemos e da bosta

composer require jeroennoten/laravel-adminlte:*
php artisan adminlte:install
composer require laravel/ui
php artisan storage:link -> tem que rodar isso para o upload de img funcionar

3° crie uma base de dados com o nome gsafe (estou estabelecendo um padrão, mas como vai ser local e a gente que configura o banco no .env, pode fazer como quiser, mas por precaução, vamos fazer tudo igual)

4° configure o .env
	alguns detalhes:
	não sei porque, mas se não colocar um APP_KEY na config da linha 3 (APP_KEY) do .env da alguns erros, eu to usando esse se quiserem : base64:pd70ls68jpWbfgeSbfu4icqGiLVHtoEzDmqG4wPTPhs= , mas pelo que entendi até agora pode ser um qualquer, mas fica a dica e o aviso
	configure o banco para os padrões que estão na sua máquina:
	DB_CONNECTION=pgsql
	DB_HOST=127.0.0.1
	DB_PORT=5432
	DB_DATABASE=
	DB_USERNAME=
	DB_PASSWORD=
	
5° faça o php artisan migrate para criar todas as tabelas certinho, por garantia vai la no banco da um refresh na base que vc criou e ve se ta tudo lá 

*Detalhe:
como começamos o banco do 0, existe uma ordem de cadastro das coisas no sistema para começar a funcionar, vou deixar o passo a passo:

6° crie seu login:
vá em "Registrar um novo membro" na tela de login mesmo que já vai ser possivel estar criando um

obs.: como eu ainda não consegui fazer a autenticação ele acessa as pags sem logar, mas só passa da parte de login se vc criar um 

agora explicando com base no menu:

incialmente: basicamente/quase todas as telas seguem o mesmo padrão, até mesmo as que se relacionam por tabela associativa, então:
- toda tela de listar tem a visualização dos cadastrados
- no canto superior direito da tela de listar existe um botão cadastrar
- na coluna opção da tela de listagem tem um botão editar
- toda tela que vc entrar tem que cadastrar (pra nao repetir isso em todo passo)
- se um passo não tiver nada a comentar, é só criar e brincar com o que quiser na tela

7° Usuario
- a principio ja criamos o primeiro para o login, mas vc pode criar mais, editar e etc

8° Equipe
- na equipe só cuidado na edição, pois se voce tentar fazer com que a equipe fique sem nenhum usuario vinculado, não ira existir alteração (preciso melhorar isso hehe, mas faz sentido vai)
- lembra que para selecionar mais de um usuario para a equipe tem que segurar o ctrl e ir clicando

9° empresa

10° contrato
- depois do contrato criado, ao olhar o listar perceberá que tem algumas opções nele
	* opções de adicional de contrato
		vc pode adicionar os adicionais de contrato a um contrato listado (contratos adicionais não aparecem no listar principal, só no listar adicional de contrato)
		vc nesse momento ainda não pode adicionar serviços pq nenhum foi criado

11° serviço

12° contrato (agora adicionando serviços)
- mesmo esquema do adicional de contratos, tem uma opção para cadastrar e listar no listar dos contratos principal
- dentro do visualizar adicional de contrato também tem o adicionar serviço, então vc também adiciona serviço a contratos adicionais, mas cada um em uma tela própria
obs.: percebi que se vc tentar cadastrar de novo o mesmo serviço, ele ta duplicando vou arrumar ainda!

13° premissas

14° permissoes

15° paralizacoes
- também é parecida com o contrato, na pagina de listar, na coluna opções, terão as colunas para voce selecionar
- ai fica o fluxo: criar paralizacao, depois adicionar na paralizacao criada a permissao (que ja vai ter sido criada e feito os vinculos)
- para fechar a paralizacao voce: fecha todas as premissas colocando a foto (pra acessar isso tem que clicar no listar permissão na tela de listar paralizacoes para abrir as premissas de acordo com a permissão)
/\ to terminando a parte de subir imagem, ela ta funcionando certinho, só preciso deixar a tela bonita e no padrão
/\ a parte de mostrar imagem eu descobri como fazer, só preciso montar a tela tmb, ta subindo ela puxando uma img fixa, por isso o btn ta bloqueado por enquanto pra n dar bo


---------------------------------

se for usar o docker, faça:

docker-compose build
docker-compose up -d
docker exec -it laravel app bash (para acessar o servidor do docker e usar comandos linux) -> eai rodar o php artisan migrate no servidor
ou
docker-compose exec app php artisan migrate
docker-compose exec app php artisan serve


docker-compose exec app php artisan serve --host=0.0.0.0 --port=8000 -> rodar o laravel
docker-compose exec app php artisan migrate -> rodar as migrates do db

