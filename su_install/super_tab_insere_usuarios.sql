INSERT INTO su_registrados (nome_registrado, name_of_war, id_cidade, id_estado, id_pais) values ('Rafael Procópio','Rafael',(select id_chave_cidade from su_cidades where cidade_sem_acentuacao like 'GUARULHOS'),(select id_chave_estado from su_estados where sigla_estado like 'SP'),(select id_chave_pais from su_paises where nome_pais like 'BRASIL'));
INSERT INTO su_registrados (nome_registrado, name_of_war, id_cidade, id_estado, id_pais) values ('Jacqueline Arruda','Jacke',(select id_chave_cidade from su_cidades where cidade_sem_acentuacao like 'SAO JOSE DOS CAMPOS'),(select id_chave_estado from su_estados where sigla_estado like 'SP'),(select id_chave_pais from su_paises where nome_pais like 'BRASIL'));
INSERT INTO su_registrados (nome_registrado, name_of_war, id_cidade, id_estado, id_pais) values ('Celso de Melo','Celso',(select id_chave_cidade from su_cidades where cidade_sem_acentuacao like 'SAO JOSE DOS CAMPOS'),(select id_chave_estado from su_estados where sigla_estado like 'SP'),(select id_chave_pais from su_paises where nome_pais like 'BRASIL'));
INSERT INTO su_registrados (nome_registrado, name_of_war, id_cidade, id_estado, id_pais) values ('Wagner Souza','Wagner',(select id_chave_cidade from su_cidades where cidade_sem_acentuacao like 'JACAREI'),(select id_chave_estado from su_estados where sigla_estado like 'SP'),(select id_chave_pais from su_paises where nome_pais like 'BRASIL'));