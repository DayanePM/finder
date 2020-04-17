## Pré requisito

```
Certifique-se de ter a última versão do Git instaldo

https://git-scm.com/
```

## Como instalar

Clone o projeto na pasta do seu servidor local: 

```
git clone https://github.com/DayanePM/finder.git finder
```

## Crie o banco de dados

```
Renomeie o arquivo database.default.php para database.php localizado na pasta /finder/app/Config/

Execute o script do arquivo metadata.sql localizado na pasta finder/app/Config/Schema/metadata.sql

Configurações do banco:

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
