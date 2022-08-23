## Tabla de Contenido

- [Tabla de Contenido](#tabla-de-contenido)
- [Acerca de MXZIPCODES](#acerca-de-mxzipcodes)
- [Requerimientos](#requerimientos)
- [Instalación](#instalación)
- [API Endpoints](#api-endpoints)
  - [GET /api/zip-codes/{zipcode}](#get-apizip-codeszipcode)
  - [GET /api/{name}](#get-apiname)
  - [GET /api/test](#get-apitest)
## Acerca de MXZIPCODES

**MXZIPCODES** es un **REST API** construido en **Laravel**, el cual importa desde un [Excel](https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/CodigoPostal_Exportar.aspx) todos los datos para popular la Base de Datos y poder generar los endpoints necesarios.

## Requerimientos

Estos son los requerimientos para poder correr el proyecto:

- **PHP** ^8.0.2
- **Node**
- **Composer**


## Instalación

Clonamos el repositorio:

    $ git clone https://github.com/angelleger/mxzipcodes.git

Entramos a la carpeta y instalamos las dependencias: 

    $ cd mxzipcodes && composer install
    
Debemos ejecutar el comando sail: install Artisan. Este comando publicará el archivo docker-compose.yml de Sail en la raíz de su aplicación: 

    $ php artisan sail:install

te aparecera el siguiente prompt, procedemos a elegir mysql y redis son los valores **0,3**: 

    Which services would you like to install? [mysql]:
    [0] mysql
    [1] pgsql
    [2] mariadb
    [3] redis
    [4] memcached
    [5] meilisearch
    [6] minio
    [7] mailhog
    [8] selenium   

Corremos el ambiente:  

    $ ./vendor/bin/sail up


Finalmente, creamos las tablas y agregamos los datos, el valor **sail** debe imperar al principio del comando ya que estaremos creando y populando los datos en el contenedor de sail:  

    $ sail php artisan migrate --seed  

## API Endpoints

points allow you to handle Stripe subscriptions for Publish and Analyze.

### GET /api/zip-codes/{zipcode}
Este endpoint esta diseñado para obetenr toda la información relacionada con un zipcode en especifico.

**Parameters**

|              Name | Required |  Type  | Description                                                                                                                                                                                       |
|------------------:|:--------:|:------:|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|         `zipcode` | required | int | El zipcode de el cual queremos la información.<br>Ejemplo: `47078`                                                                                                 |


**Respuesta**

```
{
   "zip_code":"47078",
   "locality":"SAN JUAN DE LOS LAGOS",
   "federal_entity":{
      "key":14,
      "name":"JALISCO",
      "code":null
   },
   "settlements":[
      {
         "key":1752,
         "name":"SAN NICOLAS",
         "zone_type":"RURAL",
         "settlement_type":{
            "name":"Colonia"
         }
      }
   ],
   "municipality":{
      "key":73,
      "name":"SAN JUAN DE LOS LAGOS"
   }
}
```
___

### GET /api/{name}
Con este endpoint aceleramos la velocidad de respuesta de todos y cada unos de los zipcodes por medios de un cache usando redis, como por igual podemos eliminar el cache ya almacenado.

**Parameters**

|          Name | Required |  Type   | Description                                                                                                                                                           |
| -------------:|:--------:|:-------:| --------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
|     `cache` | required | string  | Con esto haremos que todos los endpoints de zipcodes hagan cache en redis.                                                                     |
|        `uncache` | required | string  | Con esto eliminaremos todos el cache almacenado en redis. |


**Response**

```
// CACHE
{
   "status":"success cached",
   "message":{
      "10000":"CACHED ALREADY",
      "10010":"CACHED ALREADY",
      "10020":"CACHED ALREADY",
      "10130":"CACHED ALREADY",
      "10200":"CACHED ALREADY",
      "10300":"CACHED ALREADY",
      "10320":"CACHED NOW",
      "10330":"CACHED NOW"
   }
}

// UNCACHE

{
   "status":"success",
   "message":"uncached",
   "redis_keys":[
      
   ]
}
```
___
### GET /api/test
Este enpoint esta destinado a hacer una prueba de comparación entre este API y otro similar.

**Response**

```
{
    "success": true
}

or any implemented error from https://buffer.com/developers/api/errors

{
    "code": 1000,
    "error": "An error message"
}
```
___

