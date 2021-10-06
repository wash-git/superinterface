#!/bin/bash
#
# --------------------------------------------------------------------------------------------------------------------------+
# 																															|
#			                    						CONFIGURAÇÕES														|
#																															|
# --------------------------------------------------------------------------------------------------------------------------+
CPCONFIG="super_config.cnf"	# arquivo de configuração
CPROOT_UID=0				# root ID
CPPINSTALL="su_install"		# nome da pasta de instalação
# --------------------------------------------------------------------------------------------------------------------------+
# 																															|
#			                  						  MENSAGENS DO SCRIPT													|
#																															|
# --------------------------------------------------------------------------------------------------------------------------+
MErr01="Erro! Não foi possível preparar pasta para servir de acervo dos arquivos PDF"
MErr02="Interrompendo a execução do script"
MErr03="Erro! Não foi possível criar pasta de imagens de arquivos PDF"
#MErr04="Erro! Não foi possível criar os usuários administrativos da Superinterface"
MErr05="Erro! Não é permitido executar este script como usuário root"
MErr06="Erro! Não foi possível gerar arquivo auxiliar de nomes de cidades do Brasil"
MErr07="Erro! Não foi possível criar arquivo para guardar índice de numeração dos nomes dos arquivos PDF"
MErr08="Erro! Não foi possível se conectar com o banco de dados"
MErr09="Erro! Base de dados não existe. Faça primeiro a criação do banco de dados e de seu usuário de acesso"
MErr10="Erro! Houve problemas no script de geração automática de código PHP" 
MErr11="Erro! Não foi possível criar usuário/senha do administrador" 
MErr12="Erro! Não foi possível limpar as tabelas do banco de dados"
MErr13="Erro! Não foi possível criar tabelas no banco de dados"
MErr14="Erro! Não foi possível inserir informações na tabela 'su_cidades'"
MErr15="Erro! Não foi possível apagar alguns arquivos antigos"
MErr16="Erro! Não foi possível se conectar com a base de dados legada"
MErr17="Erro! Não foi possível criar as tabelas da aplicação e inserir seus dados"
#MErr18=""
MErr19="Erro! Não foi possível preparar pasta de temporários: a pasta não pode ser criada"
MErr20="Erro! Pasta Administrativa não foi encontrada"
MErr21="Erro! Não foi possível inserir conjunto inicial de nomes próprios de brasileiros na base de dados"
MErr22="Erro! Não foi possível inserir conjunto inicial de nomes de cidades do Brasil na base de dados"
MErr23="Erro! Não foi encontrado o arquivo de configuração"
MErr24="Erro! Não foi encontrado o arquivo com comandos SQL para popular tabela de 'su_cidades'"
MErr25="Erro! Não foi encontrado o arquivo com comandos SQL para criação das tabelas da Superinterface"
MErr26="Erro! Não foi possível preparar as pastas necessárias à aplicação Superinterface"
MErr27="Erro! Não foi possível preparar pasta de logs: a pasta não pode ser criada"
#MErr28=""
MErr29="Erro! Não foi possível preparar pasta de quarentena: a pasta não pode ser criada"
MErr30="Erro! Não foi possível preparar pasta de upload para novos arquivos PDF"
MErr31="Erro! Não foi possível criar pasta de uploads para novos arquivos PDF"
MErr32="Erro! É necessário ter instalado o aplicativo 'detox' (apt-get install detox)"
MErr33="Erro! Não foi possível gerar o arquivo de configuração para as rotinas PHP"
#MErr34=""
MErr35="Erro! Não foi possível criar pasta para arquivos PHP que viriam a ser automaticamente gerados"
MErr36="Erro! Para instalar a Superinterface é obrigatório estar na pasta 'su_install'"
#
MInfo01="Preparando as pastas"
MInfo02="Sucesso! Criada pasta do acervo de arquivos PDF da Superinterface"
MInfo03="Sucesso! Pasta administrativa preparada"
MInfo04="Geração automática de código PHP:"
MInfo05="Verifique os códigos PHP gerados automaticamente na pasta: "
MInfo06="Sucesso! Criada pasta de uploads para novos arquivos PDF"
#MInfo07=""
MInfo08="Iniciando a instalação"
MInfo09="Sucesso! Conexão com o banco de dados foi realizada corretamente"
MInfo10="Verifique o log da instalação da Superinterface através do arquivo: "
MInfo11="Verifique as estruturas das tabelas criadas através da opção 'Tabelas' da interface administrativa"
MInfo12="Sucesso! Criado usuário/senha da interface de administração da Superinterface"
#MInfo13=""
MInfo14="Sucesso! Tabelas adicionais da aplicação do usuário foram criadas, e informações fornecidas foram inseridas"
MInfo15="Atenção: não foi encontrado arquivo para criação tabelas da aplicação do usuário. Continuando a instalar a Superinterface"
MInfo16="Sucesso! Possíveis tabelas remanescentes no banco de dados foram eliminadas"
MInfo17="Sucesso! Tabelas do banco de dados (re)criadas, e informações inseridas corretamente"
MInfo18="Quantidade de tabelas geradas= "
MInfo19="Sucesso! Informações inseridas corretamente na tabela 'su_cidades'"
MInfo20="Quantidade de registros na tabela 'su_cidades'= "
#MInfo21=""
MInfo22="Quantidade de registros na tabela 'su_documents'= "
#MInfo23=""
MInfo24="Quantidade de registros na tabela 'su_docs_signatários'= "
MInfo25="Quantidade de registros na tabela 'su_docs_instituicoes'= "
MInfo26="super_install.sh"
#MInfo27=""
MInfo28="Sucesso! Conjunto inicial de nomes de instituições, nomes de pessoas e de cidades inseridas na base de dados"
MInfo29="Quantidade de registros na tabela 'su_instituicoes'= "
MInfo30="Quantidade de registros na tabela 'su_nomes_cidades'= "
MInfo31="Quantidade de registros na tabela 'su_names_brasil'= "
MInfo32="Sucesso! Criada pasta de quarentena"
MInfo33="Sucesso! Criada pasta de arquivos temporários"
#MInfo34=""
#MInfo35=""
#MInfo36=""
#MInfo37=""
#MInfo38=""
#MInfo39=""
MInfo40="Quantidade de registros na tabela 'su_docs_cidades'= "
MInfo41="Bem vind@ ao script de instalação da Superinterface em:   "
#MInfo42=""
MInfo43="Parabéns!!!   A instalação da Superinterface foi um sucesso!"
MInfo44="Sucesso! Criada pasta de arquivos de logs"
MInfo45="Data:"
MInfo46="Script terminado em"
MInfo47="Alerta: notamos a falta do aplicativo cowsay. Ele não é obrigatório. Dica: assim que possível, instalar o cowsay  (apt-get install cowsay)"
MInfo48="Alerta: notamos a falta do aplicativo figlet. Ele não é obrigatório. Dica: assim que possível, instalar o figlet  (apt-get install figlet)"
#MInfo49=""
MInfo50="Nenhum arquivo PDF será tratado nesta instalação. A incorporação dos arquivos PDF ao acervo da Superinterface estará a cargo do script ativado via cron"
MInfo51="Sucesso! Criada pasta para guardar os arquivos PHP gerados automaticamente nesta instalação"
#
FInfor=0	# saída normal: new line ao final, sem tratamento de cor
FInfo1=1	# saída normal: new line ao final, sem tratamento de cor e sem ..... (sem pontinhos ilustrativos)
FInfo2=2	# saída sem new line ao final, sem tratamento de cor
FSucss=3	# saída para indicação de sucesso: new line ao final da mensagem. na cor azul. No final, muda para cor branca
FSucs2=4	# saída para indicação de sucesso: new line antes e depois da mensagem, cor azul. No final, muda para cor branca
FInsuc=5	# saída para indicação de erro, na cor vermelha
FInsu1=6	# saída para indicação de erro, na cor vermelha (apenas no screen, não enviado para arquivo de log)
FCowsa=7	# saída para aplicativo cowsay
FFighl=8	# saída para aplicativo fighlet
#
MCor01="\e[97m"		# cor default (branca), quando for enviar mensagens
MCor02="\e[33m"		# cor amarela, quando for enviar mensagens
#
# --------------------------------------------------------------------------------------------------------------------------+
#											 																				|
#			   				   	          FUNÇÃO PARA ENVIO DE MENSAGENS AO USUÁRIO											|
#																															|
# --------------------------------------------------------------------------------------------------------------------------+
function fMens () {
	case $1 in
		$FInfor)
			echo -e ".....$2" | tee -a "$CPLOG_DIR"/"$CPLOGSFILE"
			;;
		$FInfo1)
			echo -e "$2" | tee -a "$CPLOG_DIR"/"$CPLOGSFILE"
			;;
		$FInfo2)
			echo -n ".....$2" | tee -a "$CPLOG_DIR"/"$CPLOGSFILE"
			;;
		$FSucss)
			echo -e "\e[34m.....$2\e[97m" | tee -aa "$CPLOG_DIR"/"$CPLOGSFILE"
			;;
		$FSucs2)
			echo -e "\n\e[34m.....$2\e[97m" | tee -aa "$CPLOG_DIR"/"$CPLOGSFILE"
			;;	
		$FInsuc)
			echo -e  "\n\e[31m.....$2" | tee -a "$CPLOG_DIR"/"$CPLOGSFILE"
			echo -e ".....$MErr02\e[97m" | tee -a "$CPLOG_DIR"/"$CPLOGSFILE"
			;;
		$FInsu1)
			echo -e  "\n\e[31m.....$2"
			echo -e ".....$MErr02\e[97m"
			;;
		$FCowsa)
			shuf -n 1 $2 | cowsay -p -W 50 | tee -aa "$CPLOG_DIR"/"$CPLOGSFILE"
			;;
		$FFighl)
			figlet -f standard -k -t -c -p -w 120  "
--------------
Superinterface
--------------" | tee -aa "$CPLOG_DIR"/"$CPLOGSFILE"
			;;
		*)
			echo "\e[31m.....OOOooops!\e[97m" | tee -a "$CPLOG_DIR"/"$CPLOGSFILE"
			echo $1 | tee -a "$CPLOG_DIR"/"$CPLOGSFILE"
			exit
			;;
	esac
}
#
# --------------------------------------------------------------------------------------------------------------------------+
#											 																				|
#			   			FUNÇÃO PARA VERIFICAÇÃO DO AMBIENTE E PREPARAÇÃO DOS ARQUIVOS PDF, TXT E JPG						|
#																															|
# --------------------------------------------------------------------------------------------------------------------------+
function fInit () { 
	clear
	#										verificar se é usuário root
	if [ "$EUID" -eq $CPROOT_UID ];  then 
		fMens "$FInsu1" "$MErr05"
		exit
	fi
	#										verificar se pasta corrente é a de instalação
	if [ "${PWD##*/}" != "$CPPINSTALL" ]; then
		fMens "$FInsu1" "$MErr36"
		exit
	fi
	#										verificar se arquivo de configuração está disponível
	if [ ! -f $CPCONFIG ]; then
		fMens "$FInsu1" "$MErr23"
		exit
	fi
	#										limpeza do ambiente de instalação
	#find ../ -type d -not -name su* -not -name .. -exec rm -r {} \
	source  $CPCONFIG						# inserir arquivo de configuração
	chmod $CPPERMCONFIG $CPCONFIG			# definir permissão para arquivo de configuração
	chmod $CPPERMSHELL ./*.sh				# definir permissão para os scripts shell da pasta de instalação
	#										apagar possíveis arquivos anteriores para gerar novas versões:
	# 										configuração do PHP,bloqueio do script ativado pelo cron
	rm	-f	{$CPPADMIN/$CPPHPFILE,$CPPADMIN/$CPNOMENOVOS".lock"}
	if [ $? -ne 0 ]; then
 		fMens "$FInsu1" "$MErr15"
 		exit
	fi
#
	# limpar pastas: logs, arquivos do acervo, uploads PDF, temporários, quarentena, autoPHP
	rm -rf {$CPLOG_DIR,$CPIMAGEM,$CPUPLOADS,$CPTEMP,$CPQUARENTINE,$CPAUTOPHP}  2>/dev/null
	if [ $? -ne 0 ]; then
 		fMens "$FInsu1" "$MErr26"
 		exit
	fi
	mkdir $CPLOG_DIR						# criar pasta de logs
	if [ $? -ne 0 ]; then
 		fMens "$FInsu1" "$MErr27"
 		exit
	fi
	chmod $CPPERMPADRAO $CPLOG_DIR			# definir permissão para pasta de logs
	#										verificar se aplicativo detox está instalado
	if [ -n "$(dpkg --get-selections | grep detox | sed '/deinstall/d')" ]; then
		:
	else
		fMens "$FInsuc" "$MErr32"
		exit
	fi
	#										verificar se aplicativo figlet está instalado
	if [ -n "$(dpkg --get-selections | grep figlet | sed '/deinstall/d')" ]; then
		fMens "$FInfo1" "$MCor02"			# saída na cor amarela 
		fMens "$FFighl"
	else
		fMens "$FInfor" "$MInfo48"	
	fi
	fMens "$FInfo1" "$MCor02"				# saída na cor amarela 
	fMens "$FInfo2"	"$MInfo41"				# enviar mensagem de boas vindas
	fMens "$FInfo1"	"$MInfo26"				# $0
	fMens "$FInfor" "$MInfo45:  $(date '+%d-%m-%Y as  %H:%M:%S') --- $MInfo08"
	fMens "$FInfo1" "$MCor01"
	#										# verificar se aplicativo cowsay está instalado
	if [ -n  "$(dpkg --get-selections | grep cowsay | sed '/deinstall/d')" ]; then
		fMens "$FCowsa"  "$CPNOMECOWSAY1"
	else
		fMens "$FInfor" "$MInfo47"
	fi
	chmod $CPPERMFIXOS 	super_cowsay1.txt	# definir permissão para o arquivo de mensagens cowsay
	fMens "$FSucss" "$MInfo44"				# sucesso na criação de pasta de logs
	#										criar arquivo de configuração para o PHP
	echo -e "<?php\n\$banco_de_dados = \"$CPBASE\";\n\$username = \"$CPBASEUSER\";" > $CPPADMIN/$CPPHPFILE
	echo -e "\$pass = \"$CPBASEPASSW\";"		>> $CPPADMIN/$CPPHPFILE
	echo -e "\$httphost = \"$CPHTTPHOST\";"		>> $CPPADMIN/$CPPHPFILE
	echo -e "\$httpdominio = \"$CPHTTPDOM\";"   >> $CPPADMIN/$CPPHPFILE
	echo -e "\$banco = \"$CPBASE\";"			>> $CPPADMIN/$CPPHPFILE
	echo -e "\$pastaimagens = \"$CPIMAGEM\";"	>> $CPPADMIN/$CPPHPFILE
	echo -e "\$pastalogs = \"$CPLOG_DIR\";"		>> $CPPADMIN/$CPPHPFILE
	echo -e "\$pastaquarentine = \"$CPQUARENTINE\";"  >> $CPPADMIN/$CPPHPFILE
	echo -e "\$pastaadmin = \"$CPPADMIN\";"            >> $CPPADMIN/$CPPHPFILE
	echo -e "\$arqlogs   = \"$CPLOGSFILE\";"	      >> $CPPADMIN/$CPPHPFILE
	echo -e "\$listatabelas = \"$CPTABELASCRIADAS\";" >> $CPPADMIN/$CPPHPFILE
	echo -e "\$valorcookie = \""$(echo -n "$(date +%s)" | sha1sum | awk '{print $1}')"\";" >> $CPPADMIN/$CPPHPFILE
	echo -e "\$sess_nome = \"superinter$RANDOM\";" >> $CPPADMIN/$CPPHPFILE
	echo -e "\$pag_backoffice1 = 1;"		>> $CPPADMIN/$CPPHPFILE
	echo -e "\$pag_admin = 2;"				>> $CPPADMIN/$CPPHPFILE
	echo -e "\$pag_upload = 3;"				>> $CPPADMIN/$CPPHPFILE
	echo -e "\$pag_login = 4;"				>> $CPPADMIN/$CPPHPFILE
	echo -e "?>\n" >> $CPPADMIN/$CPPHPFILE
	if [ $? -ne 0 ]; then
		fMens "$FInsuc" "$MErr33"
		exit
	fi
	chmod $CPPERMCONFIG $CPPADMIN/$CPPHPFILE			# definir permissão para arquivo de configuração do PHP
	#										verificar existência de arquivo com comandos SQL de criação de 
	#										tabelas e inserts iniciais
	if [ ! -f $CPCRIATABELAS ]; then
		fMens "$FInsuc" "$MErr25"
		exit
	fi
	#										definir permissão para os arquivos SQL
	# chmod $CPPERMFIXOS	$CPCRIAUSERS		
	chmod $CPPERMFIXOS	$CPCRIATABELAS		
	#										verificar existência de arquivo com comandos SQL para inserção de dados 
	#										na tabela 'su_cidades'
	if [ ! -f $CPINSERECIDADES ]; then
		fMens "$FInsuc" "$MErr24"
		exit
	fi
	chmod $CPPERMFIXOS 	$CPINSERECIDADES	# definir permissão para o arquivo SQL
	#										preparar pasta de imagens de arquivos PDF
	fMens "$FInfor" "$MInfo01" 
	rm -rf $CPIMAGEM 2>/dev/null
	if [ $? -ne 0 ]; then
 		fMens "$FInsuc" "$MErr01"
 		exit
	fi
	mkdir $CPIMAGEM							# criar pasta para repositório de arquivos da aplicação
	if [ $? -ne 0 ]; then
 		fMens "$FInsuc" "$MErr03"
 		exit
	else
		fMens "$FSucss" "$MInfo02"
	fi
	chmod $CPPERMPADRAO $CPIMAGEM			# definir permissão para pasta de arquivos da aplicação
	#										preparar pasta para novos arquivos PDF
	rm -rf $CPUPLOADS 2>/dev/null
	if [ $? -ne 0 ]; then
 		fMens "$FInsuc" "$MErr30"
 		exit
	fi
	mkdir $CPUPLOADS						# criar pasta para colocação de novos arquivos PDF
	if [ $? -ne 0 ]; then
 		fMens "$FInsuc" "$MErr31"
 		exit
	else
		fMens "$FSucss" "$MInfo06"
	fi
	chmod $CPPERMPADRAO $CPUPLOADS			# definir permissão para pasta de novos arqivos PDF
	#										preparar pasta de temporários
	mkdir $CPTEMP							# criar pasta de trabalho (arquivos temporários)
	if [ $? -ne 0 ]; then
 		fMens "$FInsuc" "$MErr19"
 		exit
	else
		fMens "$FSucss" "$MInfo33"
	fi
	chmod $CPPERMPADRAO $CPTEMP				# definir permissão para pasta de trabalho 
	#										preparar pasta de quarentena
	mkdir $CPQUARENTINE						# criar pasta de quarentena
	if [ $? -ne 0 ]; then
 		fMens "$FInsuc" "$MErr29"
 		exit
	else
		fMens "$FSucss" "$MInfo32"
	fi
	chmod $CPPERMPADRAO $CPQUARENTINE		# definir permissão para pasta de quarentena
	mkdir $CPAUTOPHP						# criar pasta para colocação arquivos PHP a serem gerados
	if [ $? -ne 0 ]; then
 		fMens "$FInsuc" "$MErr35"
 		exit
	else
		fMens "$FSucss" "$MInfo51"
	fi
	chmod $CPPERMPADRAO $CPAUTOPHP			# definir permissão para pasta de arquivos PHP a serem gerados
	# 										verificar existência de pasta administrativa da Superinterface
	if [ ! -d $CPPADMIN ]; then
		fMens "$FInsuc" "$MErr20"
		exit
	fi
	chmod $CPPERMPADRAO $CPPADMIN			# definir permissão para pasta administrativa da Superinterface
											#criar arquivo para guardar índice de numeração nos nomes dos arquivos PDF
	echo 0 > $CPPADMIN/$CPINDICEPDF
	if [ $? -ne 0 ]; then
		fMens "$FInsuc" "$MErr07"
		exit
	fi
#	rm	-f $CPPADMIN/$CPNOMENOVOS".lock"	# remover arquivo de bloqueio do script ativado pelo cron
	fMens "$FSucss" "$MInfo03"				# pasta administrativa preparada
	#										testar conexão com o banco de dados
	mysql -u $CPBASEUSER -b $CPBASE -p$CPBASEPASSW -e "quit" 2>/dev/null
	if [ $? -ne 0 ]; then
		fMens "$FInsuc" "$MErr08"
		exit
	else
		fMens "$FSucss" "$MInfo09"
	fi
}
#
# --------------------------------------------------------------------------------------------------------------------------+
#											 																				|
#			   				   	    FUNÇÃO DE PREPARAÇÃO DOS ARQUIVOS PDF DO REPOSITÓRIO									|
#																															|
# --------------------------------------------------------------------------------------------------------------------------+
#					os arquivos PDF para o repositório serão preparados pelo script ativado pelo cron
function fArquivos () {
	fMens	"$FInfor"	"$MInfo50"
	return
}
#
# --------------------------------------------------------------------------------------------------------------------------+
#											 																				|
#			   				   			FUNÇÃO DE PREPARAÇÃO DAS TABELAS													|
#																															|
# --------------------------------------------------------------------------------------------------------------------------+
function fTabelas () { 
	#				apagando as tabelas da base de dados, se é que elas existem
	TABLES=$(mysql -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e 'show tables' | awk '{ print $1}' | grep -v '^Tables' );
	for t in $TABLES
	do
		mysql -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e "SET FOREIGN_KEY_CHECKS = 0 ; drop table $t"
		if [ $? -ne 0 ]; then
			fMens "$FInsuc" "$MErr12"
			exit
		fi
	done
	fMens "$FSucss" "$MInfo16"
	mysql  -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e "SET FOREIGN_KEY_CHECKS = 1"
	#				criar as tabelas da base de dados
	#mysql -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE < "$CPCRIAUSERS"
	#if [ $? -eq 0 ]; then
	#	fMens "$FSucss" "$MInfo13"
	#else
	#	fMens "$FInsuc" "$MErr04"
 	#	exit
	#fi
	#				criar tabelas da Superinterface e inserir dados
	mysql -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE < "$CPCRIATABELAS"
	if [ $? -eq 0 ]; then
		fMens "$FSucss" "$MInfo17"
	else
		fMens "$FInsuc" "$MErr13"
 		exit
	fi
	#				verificar se existe arquivo SQL da aplicação
	if [ -f $CPTABAPLICACAO ]; then
		#			criar tabelas da aplicação e inserir seus dados
		mysql -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE < "$CPTABAPLICACAO"
		if [ $? -eq 0 ]; then
			fMens "$FSucss" "$MInfo14"
		else
			fMens "$FInsuc" "$MErr17"
 			exit
		fi
	else
		fMens "$FInfor" "$MInfo15"
	fi
	#				inserir dados na tabela 'su_cidades'
	mysql -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE < "$CPINSERECIDADES"
	if [ $? -eq 0 ]; then
		fMens "$FSucss" "$MInfo19"
	else
		fMens "$FInsuc" "$MErr14"
 		exit
	fi
	#				resumo
	fMens "$FInfo2" "$MInfo18"
	fMens "$FInfo1" "$(mysql -N -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e "SELECT count(*) FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$CPBASE'")"
	fMens "$FInfo2" "$MInfo22"
	fMens "$FInfo1" "$(mysql -N -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e "SELECT count(*) FROM su_documents")"
	fMens "$FInfo2" "$MInfo24"
	fMens "$FInfo1" "$(mysql -N -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e "SELECT count(*) FROM su_docs_signatarios") "
	fMens "$FInfo2" "$MInfo25"
	fMens "$FInfo1" "$(mysql -N -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e "SELECT count(*) FROM su_docs_instituicoes")"
	fMens "$FInfo2" "$MInfo20"
	fMens "$FInfo1" "$(mysql -N -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e "SELECT count(*) FROM su_cidades") "
	fMens "$FInfo2" "$MInfo40"
	fMens "$FInfo1" "$(mysql -N -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e "SELECT count(*) FROM su_docs_cidades") "
	#
	mysql -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE < "super_insere_names_do_brasil.sql"
	if [ $? -ne 0 ]; then
		fMens "$FInsuc" "$MErr21"
 		exit
	fi
	mysql  -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e "INSERT INTO su_nomes_cidades(nome_cidade) SELECT nome_cidade FROM su_cidades"
	if [ $? -ne 0 ]; then
		fMens "$FInsuc" "$MErr22"
 		exit
	fi
	rm -rf  $CPPADMIN/$CPNOMECIDADES
	mysql --skip-column-names --raw -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e 'select * from su_nomes_cidades' |  sed 'y/áÁàÀãÃâÂéÉêÊíÍóÓõÕôÔúÚçÇ/aAaAaAaAeEeEiIoOoOoOuUcC/' |  tr [:lower:] [:upper:] > $CPPADMIN/$CPNOMECIDADES
	if [ $? -ne 0 ]; then
		fMens "$FInsuc" "$MErr06"
 		exit
	fi
	#				resumo
	fMens "$FSucss" "$MInfo28"
	fMens "$FInfo2" "$MInfo29"
	fMens "$FInfo1" "$(mysql -N -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e 'SELECT count(*) FROM su_instituicoes')" 
	fMens "$FInfo2" "$MInfo31"
	fMens "$FInfo1" "$(mysql -N -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e 'SELECT count(*) FROM su_names_brasil')"
	fMens "$FInfo2" "$MInfo30"
	fMens "$FInfo1" "$(mysql -N -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e 'SELECT count(*) FROM su_nomes_cidades')"
}	# fim da rotina de preparação de tabelas
#
# --------------------------------------------------------------------------------------------------------------------------+
#											 																				|
#			   				   	                FUNÇÃO PARA CRIAR USUÁRIO ADMIN												|
#																															|
# --------------------------------------------------------------------------------------------------------------------------+
function fUseradmin () { 
	#
	var="admin"
	hash="$(echo -n "$var" | sha1sum | awk '{print $1}')"
	sql="INSERT INTO su_usuarios (username, senha , nome , email , cidade , estado, privilegio , ativo ) VALUES ('admin','${hash}','Administrador','admin@exemplo.com','Campinas','SP',0,TRUE)";  # Administrador tem privilégio = 0 (máximo privilégio)
	mysql  -u $CPBASEUSER -p$CPBASEPASSW -b $CPBASE -e "$sql"
	if [ $? -eq 0 ]; then
		fMens "$FSucss" "$MInfo12"
	else
		fMens "$FInsuc" "$MErr11"
 		exit
	fi
}
#
#
fInit				# verificação e preparação do ambiente de instalação
fArquivos			# preparar os arquivos PDF
fTabelas			# gerar as tabelas e os inserts de dados
fUseradmin			# criar usuário admin
#					Deixar os diretorios com permissão padrão
find ../ -type d -exec chmod $CPPERMPADRAO {} \;
#					Deixar arquivos com permissões apropriadas
find ../ -type f -exec chmod $CPPERMARQUI {} \;
chmod $CPPERMCONFIG ./*.cnf
chmod $CPPERMSHELL ./*.sh
#
fMens	"$FInfor"	"$MInfo04"
#					Chama script php para fazer a geração de código PHP da Superinterface
php super_cria_interfaces.php &
PID=$!				# captura o PID do último comando anterior lançado em background.
wait $PID			# wait é um comando built-in do Linux que espera completar um process em execução.
if [ $? -ne 0 ]; then
	fMens "$FInsuc" "$MErr10"	# Erro na geração de código PHP
	exit
fi
fMens	"$FSucs2"	"$MInfo43"
fMens	"$FInfo2"	"$MInfo10" ; fMens	"$FInfo1"	"$CPLOG_DIR/$CPLOGSFILE"
fMens	"$FInfo2"	"$MInfo05" ; fMens	"$FInfo1"	"$CPAUTOPHP"
fMens	"$FInfor"	"$MInfo11"

fMens	"$FInfor"	"$MInfo46:  $(date '+%d-%m-%Y as  %H:%M:%S')"
exit	0