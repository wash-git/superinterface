<!DOCTYPE html>
<html lang='pt-br'>
<head>
<title>Referência Técnica da Superinterface</title>
<meta charset="utf-8">
<meta name="keywords"  content="Superinterface,Giramundonics,portlet">
<meta name="author"    content="Antonio Albuquerque,Vitor Mammana">
<link rel='stylesheet' href='../su_css/super_documentacao.css' type='text/css'>
</head>
<body onload="lista_h2()">
<div id="menu">
<span class="indice"><< Conteúdo >></span>
</div>

<div id="conteudo">
<h1>Superinterface - Referência Técnica</h1>
<table>
<tr><td>
<img src="./super_wash.jpg" width="300"></td>
<td><div class="comentario">
<b>Bem vind@ a Superinterface!</b>
<p></p><p></p>
A  Superinterface visa proporcionar o suporte tecnológico necessário para se criar um acervo documental na internet sobre uma determinada temática, podendo realizar buscas textuais e permitir à equipe envolvida com este acervo a possibilidade da entrada de metadados e outras informações sobre cada documento, de forma fácil e ágil. <br /><br />

Se destina a ser um sistema fácil de ser utilizado e mantido, com poucas formalidades arquivísticas, rapidez na recuperação da informação e que proporcione aos usuários da solução uma experiência diferenciada de visibilidade dos conteúdos dos documentos.
<p></p>
Este projeto é mais uma iniciativa do <a href="http://wash.net.br" target="_blank">Programa Wash</a> - Workshop Aficionados em Software e Hardware.

<br \><br \>Seja muito Bem Vind@, e aproveite!!
</div>
</td></tr></table>
<!--  ******************************************* -->
<h2 id="apresentacao">Apresentação</h2>
A Superinterface é destinada a dar o suporte tecnológico para criação de acervos documentais digitais, agrupando todos e quaisquer documentos que estão relacionados a uma determinada questão específica de interesse de uma coletividade. O significado tomado aqui para "acervo" é de uma coleção de documentos. Assim, a Superinterface se presta a disponibilizar uma coleção de documentos na internet para consultas.<br /><br />

Essa reunião de documentos apoiada pela Superinterface deveria ter por base alguma característica comum definida por seus usuários, embora a solução exija poucos formalismos de classificação e proveniência dos documentos. Isso tudo para possibilitar o máximo de fluidez na gestão dos documentos por parte dos curadores.
<br /><br />
A recuperação da informação sempre foi uma questão delicada para a ciência da informação. Neste sentido, a Superinterface oferece facilidades de indexação e busca de termos na coleção de documentos, permitindo a criação de arquiteturas de acordo com as necessidades da aplicação. São muito amplas as possibilidades de indexação dos conteúdos dos arquivos presentes no acervo. No momento da instalação deste pacote, as seguintes informações estarão automaticamente disponíveis para serem buscadas nos conteúdos dos arquivos:
<dl>
<dd>- instituições citadas;</dd>
<dd>- autoridades citadas;</dd>
<dd>- cidades citadas;</dd>
<dd>- nomes de pessoas citadas.</dd>
</dl>

Os dados estão organizados por documento. Ferramentas de automatização estão continuamente sendo avaliadas e utilizadas para que a Superinterface consiga fazer essa coleta de dados, inclusive:
<dl>
<dd>- ferramentas de tratamento de texto convencionais (sed, regexp, grep, awk, head, tail, cat, entre outras);</dd>
<dd>- ferramentas de análise de linguagem natural (Unitex);</dd>
<dd>- ferramentas baseadas em algoritmo genético (desenvolvimento próprio).</dd>
</dl>

Destas 3 abordagens, a mais madura é a primeira e já vem sendo utilizada amplamente para gerar parte dos metadados da plataforma Superinterface.<p></p>
<!--  ******************************************* -->
<h2 id="instalacao">Manual Instalação</h2>
Para realizar a instalação da Superinterface, considere as informações e procedimentos descritos a seguir.
<ol>
<!-- ...................... -->
<li><h3 id="arquitetura">Arquitetura</h3>
A figura abaixo representa os blocos que compõem a Superinterface: <br /><br />
<img src="./super_superinterfacediagrama.png" alt="Blocos que compõem a Superinterface" class="centerimage"></td>
<br /><br />
Origem dos códigos da Superinterface e das informações necessárias ao funcionamento da solução:
<ul>
<li><span class="spelling-sublinhado">Módulo Shell:</span> os códigos dos scripts são construídos previamente e responsáveis pela instalação da solução e inserção de novos arquivos no acervo da solução;</li>
<li><span class="spelling-sublinhado">Potlatch:</span> código gerado automaticamente no momento da instalação da solução. É um sistema CRUD (Create, Retrieve, Update & Delete), voltado para a entrada de dados de forma estruturada no banco de dados, em especial dos metadados. A Potlatch não é destinada ao usuário final, mas aos curadores do acervo;</li>
<li><span class="spelling-sublinhado">Giramundonics:</span> código construído previamente e fornecido no pacote da solução. É o código do motor de busca que faz a recuperação de informações dentro do acervo. É destinado ao usuário final, permitindo a visualização do acervo. Não possui facilidades de entrada de dados. Não é um CRUD;</li>
<li><span class="spelling-sublinhado">Painel de Administração:</span> código construído previamente e fornecido no pacote da solução. Possibilita acesso as funções administrativas da Superinterface;</li>
<li><span class="spelling-sublinhado">Base de Dados:</span> arquivo com códigos SQL para criação das tabelas estão fornecidos no pacote da solução;</li>
<li><span class="spelling-sublinhado">Base de Informações:</span> arquivos com um repertório de termos utilizados para indexação do acervo e, de forma complementar, informações para popular tabelas auxiliares da solução.</li>
</ul>
<p></p>
<!-- ...................... -->
<li><h3 id="preparacao_ambiente">Ambiente</h3>
<ol style="list-style-type:lower-alpha">
<li>Sistema Operacional, linguagens e outros aspectos gerais:</li>
GNU/LINUX-Debian 9 ou superior<br />
Interpretador de comandos Bash (#!/bin/bash)<br />
LAMP (LINUX-APACHE-MYSQL-PHP)<br /> 
Obs:PHP 7.0 ou superior)<br />
<p></p>
<li>Módulos Apache necessários:</li>
Módulo rewrite<br />
Módulo mpm-itk<br />
Módulo php-mysql<br />
<p></p>
<li>Virtual Host:</li>
Um bom exemplo de uma configuração de Virtual Host para esta aplicação da Superinterface está mostrado abaixo, o qual o criaremos este arquivo na pasta /etc/apache2/sites-available com nome super.conf:
<pre>
&lt;VirtualHost *:80&gt;
   ServerName     exemplo.br
   ServerAlias    www.exemplo.br
   ServerAdmin    webmaster@exemplo.br
   DocumentRoot   "/var/www/html/host1"
   &lt;Directory "/var/www/html/host1"&gt;
      &lt;IfModule mpm_itk_module&gt;
         # to run each of your vhost under a separate uid and gid 
         AssignUserId   web1  web1
      &lt;/IfModule&gt;
      # proibir retornar listagem do diretório
      Options	-Indexes
      # controle de acesso das requisições aos arquivos:
      Require all granted
      Options   -SymLinksIfOwnerMatch
      AllowOverride All
      &lt;IfModule mod_rewrite.c&gt;
         RewriteEngine on
         RewriteBase /
         RewriteRule ^su_install/(.*)$ http://exemplo.br/index.php [R=301,L]
         RewriteRule ^su_admin/(.*)$ http://exemplo.br/index.php [R=301,L]
      &lt;/IfModule&gt;
   &lt;/Directory&gt;
   ErrorLog /var/log/apache2/error.log
   LogLevel warn
   CustomLog /var/log/apache2/access.log combined
&lt;/VirtualHost&gt;
</pre>
Observações:
<ul><li> "web1" se refere ao usuário/grupo que você irá adotar como proprietário dos arquivos da aplicação.  Substitua "web1" pela identificação do usuário/grupo real da sua instalação.</li>
<li> "exemplo.br" se refere a URL da instalação da Superinteface.  Substitua esta referência pela URL verdadeira da sua instalação.</li>
<li>Para que o novo virtual host tenha efeito, não esquecer os dois comandos básicos para o apache:</li>
<pre>
   # a2ensite super.conf
   # /etc/init.d/apache2 reload
</pre>
</ul>
<p></p>
<li>Cron job:<br />
A solução tem um "vigilante" que monitora de tempos em tempos se existem arquivos para serem incorporados ao acervo da Superinterface. A pasta que este vigilante verifica é /su_uploads.  Se existirem arquivos nesta pasta, o vigilante inicia o tratamento destes arquivos.<br />
Para isto funcionar, crie uma entrada no crontab do usuário da aplicação, por exemplo, da seguinte forma:
<pre>
MAILTO=""
*/1  *  *  *  *  cd /var/www/html/host1/su_install/; ./super_novospdf.sh cron
</pre>
Dicas e observações:
<ul><li> no caso exemplificado, o vigilante está sendo ativado a cada 1 minuto.</li>
<li>deve haver um equilíbrio entre a quantidade máxima de arquivos a serem tratados a cada ativação do vigilante (lote de arquivos: parâmetro ajustável no arquivo de configuração da Superinterface) e o intervalo de tempo entre cada ativação do vigilante programado no Cron.  Além disso, o tamanho dos arquivos e a capacidade de processamento da máquina também são fatores críticos.  Para arquivos de tamanho pequenos (até 5 laudas), e ativação do vigilante a cada minuto, trabalhe com um lote máximo de 4 arquivos para serem tratados a cada ativação.</li>
<li>a quantidade deste lote de arquivos, bem como o intervalo de tempo de ativação do vigilante, podem ser alterados a qualquer instante do funcionamento da Superinterface.  Observe na prática o tempo de processamento que estão sendo necessários para proessamento dos arquivos através do arquivo de log.</li> 
<li>comandos úteis para listar e editar a crontab referente a aplicação:</li>
<pre>
    $ crontab -l
    $ crontab -e
</pre>
</ul></li>
<p></p>
<li>Instalar Mariadb</li>
#apt-get install mariadb-server php-mysql
<p></p>
Criar o banco de dados, usuário e permissões:<br />
MariaDB [(none)]&gt; CREATE DATABASE nome_bd CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci;<br />
MariaDB [(none)]&gt; CREATE USER usuario_bd@localhost IDENTIFIED BY 'senha_usuario_bd';<br />
MariaDB [(none)]&gt; GRANT ALL PRIVILEGES ON nome_bd.* TO 'usuario_bd'@'localhost';<br />
MariaDB [(none)]&gt; flush privileges;<br />
<p></p>
Obs: limite os privilégios do usuário do banco conforme exemplificado nestes comandos.<p></p>
<li>Instalar unoconv</li>
# apt-get install unoconv python3-uno libreoffice-core libreoffice-common libreoffice-calc- libreoffice-draw- libreoffice-math- libreoffice-impress- x11-xserver-utils- xdg-utils-
<p></p>
Obs: no comando acima, algumas bibliotecas tiveram inibidas suas instalações por não se fazer necessárias a esta aplicação, já que mão utilizaremos o LibreOffice no módulo gráfico.  Para uma instalação numa máquina com interface gráfica e uso do LibreOffice, instalar o unoconv sem a necessidade de inibições (apt-get install unoconv).
<p></p>
<li>Instalar aha</li>
# apt-get install aha<br /><p></p>
<li>Instalar também:</li>
# apt-get install figlet cowsay detox imagemagick php-imagick php-common poppler-utils qpdf<br />
No ambiente Debian/linux, pode ainda se fazer necessário a criação de um link simbólico:
<pre># ln -s /usr/games/cowsay  /usr/bin/cowsay</pre>
<li>Configurar ImageMagick</li>
Inserir no arquivo  /etc/ImageMagick-6/policy.xml, se ainda não existir esta linha de configuração, a seguinte permissão:
<pre>
&lt;policy domain="coder" rights="read | write" pattern="PDF" /&gt;</pre>
</ol></li>
<p></p><br />
<!-- ...................... -->
<li><h3 id="preparacao_scripts">Scripts</h3>
<ol style="list-style-type:lower-alpha">
<li>Todo código está disponível no GitHub, bastando baixar a <a href="https://github.com/wash-git/Superinterface">última release da aplicação Superinterface</a></li>.
<li>Evite fazer a instalação da aplicação como usuário root. Deve-se realizar todas instalação do código da aplicação Superinterface como um usuário normal, sem prerrogativas de administrador.</li>
<li> Desempacote a aplicação na raiz (document root) do virtual host.  Para isto, utilize um dos seguintes comandos dependendo do pacote baixado (tar.gz
ou zip):</li><br />
<pre>
..../host1$  tar -xvf Superinterface-1.0.tar.gz
..../host1$  unzip Superinterface-1.0.zip
</pre>
Obs:  no exemplo acima, 1.0 se refere a versão da aplicação.  Verifique a versão baixada para fazer a indicação do comando de forma correta.
<li>Após desempacotar a aplicação, as seguintes pastas e arquivos deverão estar presentes na raiz do virtual host:</li>
<p></p><pre>
.../host1/
	su_admin/
	su_css/
	su_docs/
	su_exemplos/
	su_icons/
	su_install/
	su_js/
	su_php/
	index.php
	LICENSE
	README.md
</pre><p></p>
obs:<br \>
a) Em especial, a pasta su_install conterá os arquivos necessários à instalação da Superinterface<br />
b) O arquivo com a documentação técnica da Superinterface (super_documentacao.php) poderá ser acessado via navegador da seguinte forma:<br />
http://exemplo.br/su_docs/super_documentacao.php<br />
<p></p>
<li>Na pasta su_install, alterar as propriedades dos seguintes arquivos conforme mostrado abaixo:</li>
<pre>
$  chmod 600 super_config.cnf
$  chmod 750 super_install.sh
$  chmod 750 super_novospdf.sh
</pre>
<p></p>
<li>Abrir o aquivo super_config.cnf (que está na pasta su_install/) e fornecer as seguintes informações:</li>
<dl>
<dt>Informações:</dt>
<dd>- nome da base de dados</dd>
<dd>- usuário da base de dados</dd>
<dd>- senha do usuário para acessar a base de dados</dd>
<dd>- indicação do dominio onde estará funcionando a Superinterface</dd>
</dl>
Obs: por segurança, não é recomendado que o usuário da aplicação tenha privilégios de criação de base de dados. 
<p></p>
<li>Realizar a instalação da aplicação
<pre>
su_install$ ./super_install.sh
</pre>
Obs: acompanhe o log da instalação através do arquivo super_logshell.log que estará na pasta su_logs/<p></p>
Se a instalação foi realizada com sucesso, ao seu final terá sido gerada pastas adicionais necessárias ao funcionamento da solução. Deverão
existir as seguintes pastas:
<pre>
drwxr-x---  web1 web1  su_admin
drwxr-x---  web1 web1  su_autophp
drwxr-x---  web1 web1  su_css
drwxr-x---  web1 web1  su_docs
drwxr-x---  web1 web1  su_exemplos
drwxr-x---  web1 web1  su_icons
drwxr-x---  web1 web1  su_imagens
drwxr-x---  web1 web1  su_install
drwxr-x---  web1 web1  su_js
drwxr-x---  web1 web1  su_logs
drwxr-x---  web1 web1  su_php
drwxr-x---  web1 web1  su_primitivos
drwxr-x---  web1 web1  su_quarentine
drwxr-x---  web1 web1  su_uploads
drwxr-x---  web1 web1  su_work
</pre>
<dl>
  <dt>Observações</dt>
  <dd><strong>* su_admin:</strong> pasta com os arquivos de controle das funções de administração da Superinterface.</dd>
  <dd><strong>* su_autophp:</strong> pasta que contém os arquivos PHP e HTML gerados automaticamente pela SuperInterface</dd>
  <dd><strong>* su_css:</strong> pasta com os arquivos de estilos da Superinterface.</dd>
  <dd><strong>* su_docs:</strong> pasta com os arquivos relativos a documentação da Superinterface.</dd>
  <dd><strong>* su_exemplos:</strong> pasta com exemplos de arquivos SQL que podem ser instalados em conjunto com as tabelas padrão da Superinterface.</dd>
  <dd><strong>* su_icons:</strong> pasta com imagens utilizadas em páginas da Superinterface.</dd>
  <dd><strong>* su_logs:</strong> pasta com os logs de todas as operações da solução, desde o momento da instalação até o presente momento. A pasta também será utilizada para guardar arquivos temporários necessários ao funcionamento da aplicação.</dd>
  <dd><strong>* su_imagens:</strong> pasta onde estarão guardados os arquivos PDF pertencentes ao acervo da Superinterface, juntamente com sua imagem jpg, versão texto puro e outras versões necessárias.</dd>
  <dd><strong>* su_install:</strong> pasta com os arquivos de configuração, arquivos SQL com informações iniciais de preenchimento de tabelas e outros arquivos necessários à instalação da Superinterface, além dos scripts shell necessários ao seu funcionamento.</dd>
  <dd><strong>* su_js:</strong> pasta com os arquivos javascript.</dd>
  <dd><strong>* su_pdfuploads:</strong> pasta para onde serão direcionados os arquivos PDF após seu upload pelo usuário, com objetivo de fazer incorporações ao acervo da aplicação Superinterface.  A execução deste processo de incorporação de novos documentos PDF ao acervo estará sob responsabilidade do vigilante (ativado pelo cron).</dd>
  <dd><strong>* su_php:</strong> pasta com arquivos PHP referente as funções de administração da Superinterface.</dd>
  <dd><strong>* su_primitivos:</strong> pasta onde serão guardados os arquivos originais que forem submitidos ao acervo, tais como DOCX, DOC, RTF, ODT e TXT.  Os arquivos PDF submetidos ao acervo não são guardados nesta pasta, e sim diretamente na pasta principal do acervo.  Arquivos PDF com problemas na sua estrutura, bem como outros tipos de arquivos, estes serão enviados para pasta da quarentena.</dd> 
  <dd><strong>* su_quarentine:</strong> pasta para onde serão enviados os arquivos PDF que apresentarem problemas para serem incorporados ao acervo, arquivos submetidos em duplicidade ao acervo, bem como tipos de arquivos não aceitos pela Superinterface.</dd>
  <dd><strong>* su_work:</strong> pasta auxiliar para tratamento dos arquivos submetidos ao acervo. É uma pasta que retém os arquivos submetidos ao acervo apenas durante o tempo em que estes estão sendo trabalhados para serem incorporados ao acervo.</dd> 
  <dd>* Neste momento, já se pode verificar as páginas iniciais da aplicação funcionando:
	<ul class="list-circle">
	<li>obs: no momento da instalação, as credenciais "usuário/senha" de acesso ao Portal de Administração é "admin/admin", respectivamente.  É aconselhável, por segurança, trocar estas credenciais logo no primeiro acesso à aplicação Superinterface.</li>
  </ul></dd>
</dl>
<p></p></li>
<li>Reinstalar a Superinterface<br />
A Superinterface pode ser reinstalada a qualquer momento sem maiores burocracias.  Lembrando que toda base de dados será apagada. Para isso, basta executar novamente o comando:
<pre>
su_install$ ./super_install.sh
</pre>
Este procedimento limpa as tabelas existentes na base, recria as tabelas e executa o script de instalação da mesma forma como fora executado na primeira vez.
</li>
</ol>
</li>
<p></p>
<p></p>
<!-- ...................... -->
<li><h3 id="infosibge">Informações IBGE</h3>
Informações oriundas de tabelas do IBGE serão utilizadas pela Superinterface como fonte de informações primárias para preenchimento das suas tabelas.
<ol style="list-style-type:lower-alpha">

<li>Códigos dos Países</li>
O IBGE define os códigos dos países e os disponibiliza através de um aquivo, junto com outras informações como  abreviações de países e territórios. Esse arquivo pode ser baixado de <a href="https://ftp.ibge.gov.br/Registro_Civil/Codigos_dos_paises/paises_e_territorios_codigos_e_abreviacoes.xls">Códigos dos países</a> e será utilizado pela Superinterface.
<li>Códigos dos Estados Brasileiros</li>
O código dos Estados brasileiros está definido pelo IBGE, conforme pode-se verificar em <a href="https://www.ibge.gov.br/explica/codigos-dos-municipios.php" target="_blank">Código dos Estados brasileiros</a>, cujas informações será utilizada pela Superinterface.
<li>Códigos dos Municípios Brasileiros</li>
O IBGE disponibiliza um aquivo com os códigos de identificação dos municípios brasileiros. Esse arquivo pode ser baixado de <a href="https://www.ibge.gov.br/explica/codigos-dos-municipios.php" target="_blank">Tabela de Códigos de Municípios do IBGE</a>, cujas informações serão utilizadas pela Superinterface.
</ol>
</li>
<!-- ...................... -->
<li><h3 id="tabelas">Tabelas</h3>
Para que seja possível gerar a Plataforma Potlatch automaticamente, é necessário que o banco de dados tenha algumas características especiais.  As tabelas têm seus nomes no plural, para indicar o caráter coletivo dos dados de uma tabela (conjunto de registros). Por exemplo, hoje estão presentes na base de dados essas seguintes tabelas (entre outras):<br />
<ul>
<li>su_documentos: quarda os documentos do acervo;</li>
<li>su_registrados: guarda os nomes de todos os stake-holders do acervo (signatários de documentos, destinatários de documentos, autoridades, curadores e outros);</li>
<li>su_tipos_de_Documentos: guarda todos os tipos de documentos;</li>
<li>su_cidades: guarda todas as cidades do Brasil.</li>
</ul><p></p>
Embora o uso de maiúsculas na primeira letra do nome da tabela seja encorajado (exceto para preposições), existem questões associadas à transição dos nomes nas várias versões do MySQL, com diferentes configurações de sensibilidade de case. Portanto, por simplicidade adotou-se a prática de se usar letras minúsculas para todos os nomes, sejam de campos ou de tabelas.<br /><br />

Atenção especial deve-se ter com essas regras de nomeação dos campos das tabelas:
<ul>
<li>id_chave_tal: o campo da chave primária da tabela sempre se inicia com id_chave_, seguido do nome da tabela no singular. Embora o schema do MySQL forneça quais campos são do tipo chave primária, optou-se por usar esse nome especial para os casos de chaves primárias;</li>
<li>nome_tal: o campo que se inicia com nome_ indica qual campo da tabela externa será mostrado em drop boxes na potlatch, quando uma tabela tem uma relação do tipo "1 para N" ou "N para N" com outra tabela, seguido do nome da tabela no singular;</li>
<li>photo_filename_tal: indica o campo que conterá o path do arquivo do acervo relacionado àquele campo, seguido do nome da tabela no singular. São campos da Superinterface que apontam para arquivos de imagens ou PDFs. </li>
</ul>
Obs: a potlatch não guarda campos BLOBS.  
<p></p></li>



<!-- ...................... -->
<li><h3 id="populartabs">Popular Tabelas</h3>
Para possibilitar o perfeito funcionamento da Superinterface, inclusive disponibilizar a facilidade de busca de verbetes nos conteúdos do acervo de arquivos, é necessário alimentar algumas de suas tabelas com informações oriundas de fontes externas. Isso possibilitará a construção do necessário vocabulário controlado da solução.<p></p>

Para facilitar a instalação, essas fontes de dados externas já vêm fornecidas no pacote da Superinterface. Mas devem ser avaliadas pelo usuário instalador se elas estão atualizadas e se são aderentes aos objetivos que se deseja da Superinterface. Essas fontes de informações são as seguintes:<p></p>
<table>
<tr><th>Informação</th><th style="width:70%">Descrição</th></tr>
<tr><td>Países</td><td>Através do arquivo:    su_install/super_csv_ibge_paises.csv</td></tr>
<tr><td>Estados</td><td>Através do arquivo:   su_install/super_csv_ibge_estadosbrasil.csv</td></tr>
<tr><td>Cidades</td><td>Através do arquivo:   su_install/super_csv_ibge_cidadesbrasil.csv</td></tr>
<tr><td>Instituições</td><td>Através do arquivo:         su_install/super_csv_instituicoes.csv</td></tr>
<tr><td>Tipos de Logradouros</td><td>Através do arquivo: su_install/super_csv_logradourosbrasil.csv</td></tr>
<tr><td>Tipos de Documentos</td><td>Através do arquivo: su_install/super_csv_tiposdocumentos.csv</td></tr>
<tr><td>Registrados</td><td>Através do arquivo: su_install/super_csv_registrados.csv</td></tr>
<tr><td>Curadores</td><td>Através do arquivo: su_install/super_csv_curadores.csv</td></tr>
</table><p></p>
Estes arquivos podem ser alterados no momento da instalação da Superinterface, caso o usuário responsável pela sua instalação  avalie como necesário. Em algumas situações, isso possibilitará uma  melhor adequação da solução à realidade em que será utilizada.  Apenas deve-se observar as estruturas desses arquivos de forma a mantê-las. 
<p></p>
<ol style="list-style-type:lower-alpha">
<li>Países</li>
A fonte primária de informação é o IBGE, que fornece uma planilha com a listagem de todos os países do mundo e uma codificação única para cada país. Este arquivo pode ser baixado de <a href="https://ftp.ibge.gov.br/Registro_Civil/Codigos_dos_paises/paises_e_territorios_codigos_e_abreviacoes.xls">Códigos dos países</a>.<p></p>
A Superinterface fará a importação das informações a partir da leitura desta planilha. As figuras abaixo mostram uma planilha csv típica de instituições e a configuração básica deste arquivo:
<div class="img_container">
<img src="./super_csv_pais_tab.png" height="90%" class="img_item"  />
<img src="./super_csv_pais_config.png" height="90%" class="img_item"  />
</div>
<dl>
<dt>Ou seja:</dt>
<dd>- conjunto de caracteres: UTF-8</dd>
<dd>- aspas em todas as células de texto, exceto campos numéricos</dd>
<dd>- separação de campos: por vírgula</dd>
<dd>- delimitador de texto: aspas</dd>
</dl>
Observação: a planilha fornecida pelo IBGE contém algumas linhas de comentários no topo da planilha, bem como no final da planilha.  É necessário retirar estas linhas, deixando apenas as colunas com as informações limpas dos países.
<p></p>
<li>Estados</li>
A fonte primária de informação é o IBGE, que fornece a identificação dos estados brasileiros numa codificação única para cada estado. Esta informação pode ser encontrada em <a href="https://www.ibge.gov.br/explica/codigos-dos-municipios.php">Códigos dos estados brasileiros</a>.<p></p>
A Superinterface fará a importação das informações a partir da leitura de uma planilha contendo estas informações. As figuras abaixo mostram a planilha csv típica dos estados e a configuração básica deste arquivo:
<div class="img_container">
<img src="./super_csv_estadosbrasil_tab.png" height="90%" class="img_item"  />
<img src="./super_csv_estadosbrasil_config.png" height="90%" class="img_item"  />
</div>
<dl>
<dt>Ou seja:</dt>
<dd>- conjunto de caracteres: UTF-8</dd>
<dd>- aspas em todas as células de texto, exceto campos numéricos</dd>
<dd>- separação de campos: por vírgula</dd>
<dd>- delimitador de texto: aspas</dd>
</dl>
Observação: a planilha não deve conter nenhuma linha de comentários no topo da planilha, bem como no final da planilha.  É necessário retirar a linha de cabeçalho caso esta exista (como está mostrado na figura acima), deixando apenas as colunas com as informações limpas dos estados.
<p></p>
<li>Cidades</li>
A fonte primária de informação é o IBGE, que fornece uma planilha com a listagem de todos os municipios brasileiros, como pode-se observar na sessão de <a href="https://www.ibge.gov.br/explica/codigos-dos-municipios.php">Códigos dos municípios</a> desta entidade. As figuras abaixo mostram uma planilha csv típica dos municípios e a configuração básica deste arquivo:<p></p>
<div class="img_container">
<img src="./super_csv_cidadesbrasil_tab.png" height="100%" class="img_item"  />
<img src="./super_csv_cidadesbrasil_config.png" class="img_item"  />
</div>
<dl>
<dt>Ou seja:</dt>
<dd>- conjunto de caracteres: UTF-8</dd>
<dd>- aspas em todas as células de texto</dd>
<dd>- separação de campos: por vírgula</dd>
<dd>- delimitador de texto: aspas</dd>
</dl>
Observação: a planilha não deve conter nenhuma linha de comentários no topo da planilha, bem como no final da planilha. É necessário retirar a linha de cabeçalho caso esta exista, deixando apenas as colunas com as informações limpas dos estados. Outro aspecto, deve-se eliminar algumas colunas desnecessária à aplicação Superinterface que estão presentes no arquivo original do IBGE, deixando apenas as seguintes colunas na planilha: UF, Nome_UF, Nome_Município e Código_Município_Completo. 
<p></p>

<li>Instituições</li>
Para o caso das instituições, a Superinterface fará a importação das informações a partir da leitura de uma planilha. Durante a instalação, já existe uma planilha básica fornecida a título de exemplo e o sistema pode ser instalado utilizando este arquivo. As figuras abaixo mostram uma planilha csv típica de instituições e a configuração básica deste arquivo:<p></p>
<div class="img_container">
<img src="./super_csv_inst_tab.png"  height="82%" class="img_item"  />
<img src="./super_csv_inst_config.png" class="img_item"  />
</div>
<dl>
<dt>Ou seja:</dt>
<dd>- conjunto de caracteres: UTF-8</dd>
<dd>- aspas em todas as células de texto</dd>
<dd>- separação de campos: por vírgula</dd>
<dd>- delimitador de texto: aspas</dd>
</dl><p></p>
<li>Tipos de Logradouros</li>
A Superinterface fará a importação das informações de tipos de logradouros a partir da leitura de uma planilha. Durante a instalação, já existe uma planilha básica fornecida e o sistema pode ser instalado utilizando este arquivo. As figuras abaixo mostram uma planilha csv típica de tipos de logradouros e a configuração básica deste arquivo:<p></p>
<div class="img_container">
<img src="./super_csv_logradourosbrasil_tab.png"  height="90%" class="img_item"  />
<img src="./super_csv_logradourosbrasil_config.png" height="90%" class="img_item"  />
</div>
<dl>
<dt>Ou seja:</dt>
<dd>- conjunto de caracteres: UTF-8</dd>
<dd>- aspas em todas as células de texto</dd>
<dd>- separação de campos: por vírgula</dd>
<dd>- delimitador de texto: aspas</dd>
</dl><p></p>
<li>Tipos de Documentos</li>
A Superinterface fará a importação das informações de tipos de documentos a partir da leitura de uma planilha. Durante a instalação, já existe uma planilha básica fornecida e o sistema pode ser instalado utilizando este arquivo. As figuras abaixo mostram uma planilha csv típica de tipos de documentos e a configuração básica deste arquivo:<p></p>
<div class="img_container">
<img src="./super_csv_tiposdocumentos_tab.png"  height="90%" class="img_item"  />
<img src="./super_csv_tiposdocumentos_config.png" height="90%" class="img_item"  />
</div>
<dl>
<dt>Ou seja:</dt>
<dd>- conjunto de caracteres: UTF-8</dd>
<dd>- aspas em todas as células de texto</dd>
<dd>- separação de campos: por vírgula</dd>
<dd>- delimitador de texto: aspas</dd>
</dl>
<p></p>
<p></p>
<li>Registrados</li>
A Superinterface fará a importação das informações de nomes de pessoas registradas no sistema  a partir da leitura de uma planilha. Durante a instalação, já existe uma planilha básica fornecida e o sistema pode ser instalado utilizando este arquivo ou fazendo a substituição desta planilha. As figuras abaixo mostram uma planilha csv típica de registrados e a configuração básica deste arquivo:<p></p>
<div class="img_container">
<img src="./super_csv_registrados_tab.png"  height="90%" class="img_item"  />
<img src="./super_csv_registrados_config.png" height="90%" class="img_item"  />
</div>
<dl>
<dt>Ou seja:</dt>
<dd>- conjunto de caracteres: UTF-8</dd>
<dd>- aspas em todas as células de texto</dd>
<dd>- separação de campos: por vírgula</dd>
<dd>- delimitador de texto: aspas</dd>
</dl><p></p>
Tal tabela guardará nomes de pessoas para duas finalidades diferentes: nomes de autoridades que possivelmente aparecerão nos documentos do acervo; nomes dos colaboradores da Superinterface que estarão contribuindo com a gestão dos metadados dos documentos.
<p></p>
<p></p>
<li>Curadores</li>
A Superinterface fará a importação das informações de nomes de pessoas curadores dos documentos a partir da leitura de uma planilha. Durante a instalação, já existe uma planilha básica fornecida e o sistema pode ser instalado utilizando este arquivo ou fazendo a substituição da planilha. As figuras abaixo mostram uma planilha csv típica de curadores e a configuração básica deste arquivo:<p></p>
<div class="img_container">
<img src="./super_csv_curadores_tab.png"  height="90%" class="img_item"  />
<img src="./super_csv_curadores_config.png" height="90%" class="img_item"  />
</div>
<dl>
<dt>Ou seja:</dt>
<dd>- conjunto de caracteres: UTF-8</dd>
<dd>- aspas em todas as células de texto</dd>
<dd>- separação de campos: por vírgula</dd>
<dd>- delimitador de texto: aspas</dd>
</dl><p></p>
Esse arquivo csv é utilizado na instalação da Superinterface. Caso não o encontre, inicialmente não serão criados os nomes dos curadores. Mas estes poderão ser acrescentados posteriormente pelo administrador, que deve ainda criar as senhas iniciais de acesso de cada usuário curador e colocá-los em estado "ativo".  Tudo isso realizado pelo através do Painel de Administração da Superinterface. 
</ol>
<p></p>
<!-- ...................... -->
<li><h3 id="tabelasusuarios">Tabelas do Usuário</h3>
Existem duas possibilidades de instalação da Superinterface:<br />
<ol style="list-style-type:lower-alpha">
<li>Situação 1: apenas gerando as tabelas padrão da Superinterface;</li>
<li>Situação 2: além das tabelas padrão da Superinterface, incorporar tabelas necessárias à uma aplicação do usuário.</li>
</ol><br />
O procedimento padrão de instalação da Superinterface é seguir a primeira situação: gerar apenas as tabelas padrão da Superinterface. Isso é feito automaticamente pelo script de instalação caso não seja encontrado o arquivo su_install/super_tab_aplicacao.sql.</li>
<br />
Caso exista este arquivo super_tab_aplicacao.sql, os comandos SQL deste arquivo serão executados logo após a geração das tabelas padrão da Superinterface. Todas as tabelas serão geradas em uma única base de dados.<br /><br />
Dica: na pasta su_exemplos/ existem arquivos SQL exemplos de aplicação de usuários.  Se desejar realizar um teste, copie um dos arquivos para a pasta su_install/, renomeando o arquivo escolhido para super_tab_aplicacao.sql. Para construir seu arquivo SQL de aplicação, observe a estrutura desses arquivos SQL exemplos e faça algo parecido.<br /><br />
A título de um pequeno exemplo, uma certa aplicação tinha a necessidade de ter um arquivo com nomes de jornalistas, e uma referência ao estado de seu trabalho.  Vejamos abaixo como poderia ficar este arquivo super_tab_aplicacao.sql, já considerando a existência das tabelas padrão da Superinterface:<br />
<pre>
CREATE TABLE su_jornalistas (
	id_chave_jor int not null auto_increment,
	nome_jor varchar(50),
	id_estado_jor int,
	primary key (id_chave_jor));

ALTER TABLE su_jornalistas
	ADD CONSTRAINT FK_regra_jor FOREIGN KEY (id_estado_jor)
	REFERENCES su_estados(id_chave_estado);

INSERT INTO su_jornalistas (
	nome_jor,
	id_estado_jor)
	values (
		'José de José',
		(select id_chave_estado from su_estados where codigo_estado=25));
ALTER TABLE su_jornalistas comment='Tabela com nome de jornalistas e seu estado de trabalho.';
</pre>
<p></p>
</li>

<!-- ...................... -->
<li><h3 id="logs">Registro de Logs</h3>
Todas as atividades relevantes da Superinterface, inclusive qualquer ação imprópria no tratamento do acervo, são registradas em seu arquivo de log de forma a permitir ao usuário administrador o acompanhamento destes eventos. O principal objetivo do registro de logs da Superinterface está relacionada à sua conformidade, e registrar o histórico de suas atividades. 
<br /> <br />
Na pasta de logs desta aplicação existem dois arquivo de logs:
<ol style="list-style-type:square">
<li> su_logs/super_logshell.log</li>
<li> su_logs/super_logshell.html</li>
</ol><br />
Todo log é registrado no arquivo super_logshell.log.  Já o segundo arquivo, super_logshell.html, é apenas uma cópia do primeiro arquivo destinado a ser visualizado através da interface administrativa da Superinterface.  Mas seu conteúdo é exatamente igual ao do primeiro arquivo.<br /><br />
A Superinterface realiza a rotação de logs através de um processo automatizado, realizando a compactação do arquivo e renomeando-o. Esse processo ocorre quando o tamanho deste arquivo de log atinge um determinado valor parametrizado através do arquivo de configuração. Essa compactação gera um arquivo ".tar", o qual fica guardado na própria pasta de logs, e um novo arquivo de logs é iniciado.
<p></p>
É muito importante verificar periodicamente o arquivo de log, certificando que todas as operações estão sendo realizadas sem ocorrências de exceções.<p></p>
Código de cores: para facilitar a visualização das mensagens, estas obedecem um código de cores: (a) na cor branca estão as mensagens informativas, de forma o usuário acompanhar o que fora realizado pela Superinterface; (b) na cor azul, as operações mais críticas e que foram realizadas com sucesso; (c) e na cor vermelha, as mensagens de exceções, possivelmente alguma ação imprópria da aplicação, e que merecem uma intervenção do administrador do serviço.
<li><h3 id="troubleshoot">Troubleshoot</h3>
Eventuais anormalidades no tratamento do acervo são registradas em seu arquivo de log (su_logs/super_logshell.log) de forma a permitir ao usuário administrador o acompanhamento e as intervenções de correção necessárias. Recomenda-se o acompanhamento continuado deste arquivo de log por parte do usuário administrador desta aplicação.<p></p>
Durante a instalação, caso se verifique alguma dificuldade e o arquivo de log não tenha o registro completo da situação, execute alternativamente o script abaixo via comando do terminal, e acompanhe as mensagens:<br />
$ ./super_scriptinicial.sh<br /> <br />
Após realizar o diagnóstico do problema e ter solucionado a dificuldade, (re)instale a solução via seu comando padrão:<br />
$ ./super_install.sh<br /><br />
</ol>
</ol>
<!--  ******************************************* -->
<h2 id="manual_usuario">Manual do Usuário</h2>
<ol>
<!-- ...................... -->
<li><h3 id="menuprincipal">Menu Principal</h3></li>
Após instalação da solução, existem três possibilidades ao usuário (considerando a instalação na URL www.exemplo.br):<p></p>
<table>
<tr><th>Função</th><th style="width:70%">URL</th></tr>
<tr><td>Giramundonics</td><td>http://www.exemplo.br</td></tr>
<tr><td>Portal de Administração</td><td>http://www.exemplo.br/su_php/super_admin.php</td></tr>
<tr><td>Documentação</td><td>http://www.exemplo.br/su_docs/super_documentacao.php</td></tr>
</table><p></p>
Inicialmente, o visualizador Giramundonics não mostrará nenhum arquivo, já que na instalação da Superinterface nenhum arquivo está incorporado ao acervo.
O acesso ao Portal de Administração se faz inicialmente através das credenciais admin/admin. Recomenda-se trocar estas credenciais logo no primeiro acesso.<p></p>
Ao abrir o portal, o usuário terá um menu com as seguintes opções:
<pre>
    Upload|Giramundonics|BackOffice|Acervo|Quarentena|Originais|Usuários|Tabelas|Logs|Status|Manual
</pre>
<ol style="list-style-type:square;">
<li>Upload: disponibilizar arquivos para compor o acervo de documentos da Superinterface.</li>
<li>Giramundonics: visualizador gráfico dos arquivos pertencentes ao acervo de documentos da Superinterface</li>
<li>BackOffice: interface para edição de metadados dos arquivos pertencente ao acervo da Superinterface. Um CRUD.</li>
<li>Acervo: lista dos arquivos já pertencentes ao acervo da Superinterface.</li>
<li>Quarentena: lista dos arquivos em quarentena (arquivos inconsistentes, em duplicidade ou tipo não aceito)</li>
<li>Originais: lista de arquivos originais que forem submitidos ao acervo, de tipos aceitos pelo Superintrface, mas não PDF (tais como DOCX, DOC, RTF, ODT e TXT).</li>
<li>Usuários: administração de usuários da Superinterface.</li>
<li>Tabelas: lista de tabelas geradas automaticamente pela Superinterface.</li>
<li>Logs: logs de funcionamento da Superinterface.</li>
<li>Status: conjunto de informações sobre a configuração do ambiente de funcionamento da Superinterface.</li>
<li>Manual: este documento.</li>
</ol>
<!-- ...................... -->
<li><h3 id="uploads">Upload de Arquivos</h3></li>
Os arquivos podem ser incorporados ao acervo da Superinterface a qualquer tempo. Estes devem pertencer a um certo conjunto de tipos de arquivos predeterminados.  Os tipos aceitos estão definidos no arquivo de configuração da Superinterface, onde para cada tipo existe um tratamento específico. Para submeter arquivos ao acervo, existem duas maneiras básicas:
<ol style="list-style-type:square;">
<li>Grande quantidade de arquivos: se você tem acesso direto as pastas da aplicação via ftp ou ssh, copie os arquivos a serem submetidos ao acervo para a pasta /su_uploads.</li>
<li>Alguns poucos arquivos: utilize a interface gráfica da Superinterface, atravé das opção "Uploads" do menu principal.</li>
</ol><p></p>Alguns comportamentos devem ser observados:
<ol style="list-style-type:square;">
<li>Utilizando a opção "Uploads" da interface gráfica da Superinterface, haverá duas limitações referente ao tamanho dos arquivos: pela configuração php.ini do PHP (que pode ser visualizada através da opção "Status" do menu); por limitação da prórpia Superintrface, programada através do arquivo de configuração da aplicação.  As duas limitações podem ser visualizadas através da opção "Status" do menu principal.</li>
<li>Utilizando a opção "Uploads" da interface gráfica da Superinterface, haverá a verificação do tipo de arquivo que está sendo submetido. Somente alguns tipos de arquivos são aceitos pela Superinterface, conforme estabelecido através de seu arquivo de configuração.</li>
<li>Utilizando o acesso via ftp ou ssh diretamente à pasta /su_uploads, as verificações de segurança quanto ao tamanho limite de cada arquivo e quanto ao tipo de arquivo não serão realizadas.  Use esta opção com parcimônia.</li>
</ol>
<!-- ...................... -->
<li><h3 id="visibilidade">Visibilidade do Acervo</h3></li>
A visibilidade dos arquivos que estão no acervo da Superinterface é disponibilizada através da interface gráfica Giramundonics. O Giramundonics possibilita se ter a visualização de uma miniatura da apresentação original de cada arquivo e, se desejar, o usuário poderá abrir os arquivos de interesse. Além disso, o Giramundonics disponibiliza ao usuário facilidades de busca de termos nos conteúdos dos arquivos, de forma que se localize com rapidez e facilidade quais os arquivos que trazem os verbetes de interesse. 
<!-- ...................... -->
<li><h3 id="crescimento">Crescimento do Acervo</h3></li>
O acervo do Giramundonics vai se constituindo cumulativamente ao longo do tempo. Após uploads de arquivos, estes serão incorporados gradativamente ao acervo a partir de cada ativação do "vigilante", que deve ser programado através da facilidade do Cron do sistema operacional.  A cada ativação, um lote de arquivos é tratado e incorporado ao acervo.  Assim, é normal que imediatamente após o upload de arquivos estes ainda não apareçam no acervo. Espere o tratamento gradativo dos lotes de arquivos.<br \>

O tratamento em lotes dos arquivos possibilita um uso mais racional da capacidade de processamento da máquina.
<!-- ...................... -->
<li><h3 id="buscas">Buscas no Acervo</h3></li>
As buscas de conteúdos no acervo da Superinterface estão disponíveis na interface gráfica disponibilizada pelo Giramundonics, e pode ser realizada de três formas:
<ul>
<li>Pelo nome do arquivo: a busca se inicia pelo primeiro caractere do nome do arquivo.</li>
<li>Pelo nome da cidade.</li>
<li>Pelo nome da instituição.</li>
</ul>
A medida que se inicia a digitação do termo a ser buscado, as buscas já são iniciadas. Os termos que estão indexados pertencem a um vocabulário controlado, constituindo um conjunto normalizado de termos que serve à indexação e à recuperação da informação. Esses termos são predefinidos através de arquivos de configuração, os quais o administrador da Superinterface pode alterar.
<br /><br />
A figura abaixo mostra a caixa que possibilita ao internauta realizar seus processos de busca de termos no acervo:
<br /><br />
<img src="./super_giramundonics_buscas.png" alt="Tela de busca de conteúdos pelo Giramundonics" class="centerimage"></td>
<p></p>
<!-- ...................... -->
<li><h3 id="potlatch">Potlatch</h3></li>
A plataforma Potlatch é um Sistema CRUD, voltado para a entrada de dados de forma estruturada no banco de dados. A Potlatch não é voltada para o usuário final,  mas sim para um conjunto de atores os quais chamamos de curadores de informações.  A missão principal destes curadores é alimentar de metadados descritivos sobre os arquivos que chegam ao acervo da Superinterface, o que permitirá qualificar melhor este conteúdo, bem como complementar ou atualizar os conteúdos das tabelas da base de dados.<br /><br />

O acesso à Potlatch se dá pelo Portal de Administração da solução, através de um processo de autenticação usuário/senha. Sua utilização é bastante simples: ao estar na página inicial da Potlatch, tem-se a visualização da lista de tabelas existentese. Para cada tabela são dadas duas opções ao curador: a visualização/edição de seu conteúdo ou a visualização da descrição da tabela.<br /><br />

Quando da opção visualização/edição da tabela é a escolhida, será mostrado todo o conteúdo da tabela, ao mesmo tempo que se possibilita fazer alterações no seu conteúdo: removendo, alterando ou adicionando conteúdos.  Os campos mostrados em verde sinaliza a existência de uma chave externa daquele campo para um outro de outra tabela. As opções de preenchimento destes campos são visualizadas através de um dropbox utilizando-se das setas "CIMA" e "BAIXO" do teclado.<br /><br />
A página abaixo mostra a página inicial da Potlatch:<br /><br />
<img src="./super_potlatch_primeirapagina.png" alt="Página inicial do Potlatch" class="centerimage">
<p></p>
A principal tabela da Superinterface chama-se su_documentos.   Ao editar esta tabela, o curador pode alterar os seguintes campos:
<table>
<tr><th>Nome do Campo</th><th>Descrição</th></tr>
<tr><td>sigla</td><td>Campo de digitação livre.  Trata-se de um mnemônico, sintético, para ajudar o usuário a identificar o documento. Procure deixar cada documento com siglas diferentes</td></tr>
<tr><td>id_tipo_documento</td><td>Campo dropbox, o qual usando a seta para "BAIXO" serão mostradas as opções possíveis. Com a tecla ENTER realiza-se a seleção da opção. Campos dropbox só permitem o preenchimento com as informações já existentes na base de dados</td></tr>
<tr><td>id_curador</td><td>Campo dropbox, o qual usando a seta para "BAIXO" serão mostrados os curadores cadastrados. Com a tecla ENTER realiza-se a seleção da opção. Campos dropbox só permitem o preenchimento com as informações já existentes na base de dados</td></tr>
<tr><td>originalfilename</td><td>Reservado para uso futuro</td></tr>
<tr><td>titulo</td><td>Campo de digitação livre. Escolha um nome significativo para o documentoi.  Digite normalmente, inclusive podendo usar caracteres acentuados</td></tr>
<tr><td>descricao</td><td>Campo de digitação livre. Faça uma descrição sucinta do conteúdo do documento a partir da leitura do documento.  Algo como 1 parágrafo curto, trazendo informações sobre as características, os objetivos e destinação do documento</td></tr>
<tr><td>relevancia</td><td>Campo de digitação livre. Algo como 1 parágrafo explicando porque o documento é relevante para constar no acervo</td></tr>
<tr><td>data_doc</td><td>Campo para digitação da data do documento (aaaa-mm-dd)</td></tr>
</table><br />
Sempre que um campo for alterado, ele ficará na cor vermelha indicando que aquela informação ainda não foi gravada na base de dados. Na extremidade direita desta linha da tabela encontra-se o botão ATUALIZA para salvar na base de dados as alterações realizadas.
<p></p>
Abaixo temos um recorte da tela do Giramundonics mostrando como são visualizados os campos editados pelo curador (data_doc, sigla, descricao, relevancia), e já com duas buscas realizadas automaticamente pela Superinterface (busca por instituições citadas no documento e busca de signatário do documento):<br /><br />
<img src="./super_giramundonics_metadados.png" alt="Página do Giramundonics com os metadados" class="centerimage">
<p></p>
<!-- ...................... -->
<li><h3 id="perguntas">Perguntas Frequentes</h3></li>
<ol style="list-style-type:square;">
<li>Por que após fazer o upload de arquivo ele não aprece imediatamente no acervo?</li>
Antes de tudo, isso é normal e pode estar acontecendo devido algumas razões:
<ol style="list-style-type:circle;">
<li>o "vigilante" ainda não foi acionado. Neste caso, espere um pouco mais para o arquivo ser tratado.</li>
<li>o "vigilante" foi acionado, mas pode  existir uma fila de arquivos para serem tratados. Espere o tratamento gradativo dos arquivos, o qual é realizados em lotes.</li>
<li>pode ser que o tratamento do arquivo já foi realizado e alguma inconsistência na estrutura do documento foi detectada. Neste caso utilize a opção "Quarentena" da interface administrativa da Superintrface e verifique se o arquivo foi enviado para lá.</li>
</ol>
<li>Como alterar o tamanho limite para uploads de arquivos?</li>
Para fazer isto é necessário ter conhecimento técnico para alterar um dos arquivos de configuração descritos abaixo.  Três situações:
<ol style="list-style-type:circle;">
<li>Se a limitição se refere ao PHP, o parâmetro referente a uploads de arquivos na configuração do PHP deve ser alterado.</li>
<li>Se a limitação se refere a configuração da Superinterface, e a Superinterface ainda não foi instalada, altere o parâmetro de uploads de arquivos em /su_install/super_config.cnf.</li>
<li>Se a limitação se refere a configuração da Superinterface, e a Superinterface já está em funcionamento, altere o parâmetro de uploads de arquivos /su_admin/em super_config_php.cnf</li>
</ol>
<li>Como posso saber qual o tamanho máximo permitido para upload de arquivos?</li>
Essas informações estão disponíveis através da opção "Status" do Portal de Administração da Superinterface. Observe que o controle está sendo realizado tanto pela configuração do PHP (php.ini) como através de parâmetro da Superinterface.  Vale o menor valor.
<li>Como outras pessoas podem ter acesso ao Painel de Administração?</li>
Para isso cadastre essas pessoas através da opção "Usuários" do Painel de Administração. Cada usuário pode ser cadastrado com o perfil de "Administrador" ou "Conteudista".
<li>Que tabelas existem na base de dados da Superinterface?</li>
Essa informação está disponível através da opção "Tabelas" do Portal de Administração.  Inclusive se a instalação fora feita com tabelas externas, estas também aparecerão quando se usar esta facilidade do portal.
<li>Como posso acompanhar as operações da Superinterface?</li>
Através da opção "Logs" do Painel de Administração se tem acesso as informações em tempo real a respeito das operações que os scripts da Superinterface estão realizando. 
</ol>
</ol>
</div>
<script type="text/javascript">
function lista_h2(){
var i;
$x=document.querySelectorAll('h2,h3');
menuzinho=document.getElementById("menu");
menuzinho.innerHTML=menuzinho.innerHTML+"<br><br>";
for (i=0; i<$x.length; i++){
	if ($x[i].tagName == "H2" ) {
		menuzinho.innerHTML=menuzinho.innerHTML+"<br>* <a class='lista_de_conteudo2' href='#"+$x[i].id+"'>"+$x[i].innerHTML+"</a><br>";
	}
	else {    /*  será H3 */
		menuzinho.innerHTML=menuzinho.innerHTML+"&ensp;<a class='lista_de_conteudo3' href='#"+$x[i].id+"'>"+$x[i].innerHTML+"</a><br>";
	}
}
}
</script>
</body>
</html>

