## Pré requisito

```
Certifique-se de ter a última versão do Git instaldo
/n
https://git-scm.com/
```

## Como instalar

Clone o projeto na pasta do seu servicor local: 

```
git clone https://github.com/DayanePM/finder.git finder
```

## Crie o banco de dados

```
Renomeie o arquivo 
\n
/finder/app/Config/database.default.php para

/finder/app/Config/database.php

Execute o script do arquivo metadata.sql

finder/app/Config/Schema/metadata.sql

host: localhost
database: finder
user: root
senha: 1234
```

## API

```
Utilize o link abaixo para testar a api

localhost/finder/animals/lista.json
```
