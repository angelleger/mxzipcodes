## Tabla de Contenido

- [Tabla de Contenido](#tabla-de-contenido)
- [Acerca de MXZIPCODES](#acerca-de-mxzipcodes)
- [Requerimientos](#requerimientos)
- [Instalación](#instalación)
- [API Endpoints](#api-endpoints)
  - [GET /api/zip-codes/{zipcode}](#get-apizip-codeszipcode)
  - [GET /api/{name}](#get-apiname)
  - [POST /1/billing/cancel-trial.json](#post-1billingcancel-trialjson)
  - [POST /1/billing/start-or-update-subscription.json](#post-1billingstart-or-update-subscriptionjson)
  - [POST /1/billing/cancel-subscription.json](#post-1billingcancel-subscriptionjson)
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
|     `cache` | required | string  | The product for which to perform the action. <br/><br/> Supported values: `publish` or `analyze`.                                                                     |
|        `uncache` | required | string  | The plan for which to start the trial period. <br/><br/> Supported values for Publish: `pro`, `small`, `business`, `agency`.  <br/>Supported values for Analyze: `early-access-10`, `early-access-25`, `early-access-50`, `early-access-100`. |
| `trialLength` | optional | integer | Length of the trial in days. <br/><br/>Default is `null`. <br/><br/>If value is null, relies on the product hook logic to define the trial length for the given plan and product.                    |
|       `cycle` | optional | string  | Default is `null`. <br/><br/>If value is null, relies on the product hook logic to define the cycle. <br/><br/> Supported values: `null`, `month` or `year`          |
|    `quantity` | optional | integer  | Default is `1`. <br/><br/>This value (either default or passed) will always override the current subscription quantity value.          
      |

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

### POST /1/billing/cancel-trial.json
Cancels a trial for a user. `official client only`

**Parameters**

|          Name | Required |  Type   | Description                                                                                                                                                         |
| -------------:|:--------:|:-------:| ------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
|     `product` | required | string  | The product for which to perform the action. <br/><br/> Supported values: `publish` or `analyze`.                                                                   |
|    `cta` | optional | string  | Can be used for tracking purpose - [Read more](https://github.com/bufferapp/README/tree/master/runbooks/data-tracking)          |

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

### POST /1/billing/start-or-update-subscription.json
Starts a new subscription or updates an existing one. Can (and should) also be used to complete a trial period. `official client only`

**Parameters**

|          Name | Required |   Type  | Description                                                                                                                                                         |
| -------------:|:--------:|:-------:| ------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
|     `product` | required | string  | The product for which to perform the action. <br/><br/> Supported values: `publish` or `analyze`.                                                                   |
|        `plan` | required | string  | The plan for which to start a subscription. <br/><br/> Supported values for Publish: `pro`, `small`, `business`, `agency`.  <br/>Supported values for Analyze: `early-access-10`, `early-access-25`, `early-access-50`, `early-access-100`. |
| `stripeToken` | optional | string | Is `required` only the first time when the Stripe customer has no registered credit card. <br/><br/>Stripe tokens are usually generated on the frontend: see [Stripe doc](https://stripe.com/docs/stripe-js/elements/quickstart#create-token) and as an example [Add credit card form Buffer component](https://github.com/bufferapp/buffer-web/blob/master/app/webroot/js/creditCard/components/addCreditCardForm.jsx).<br/><br/>*Stripe will error if we start/update a subscription for a customer who has no credit card: only trials can be started without a credit card.*  <br/> *Please use [/1/billing/start-trial.json](#post-1billingstart-trialjson) to start a trial.*|
|       `cycle` | optional | string | Default is `null`. <br/><br/>If value is null, relies on the product hook logic to define the cycle. <br/><br/> Support values: `null`, `month` or `year`          |
|    `quantity` | optional | integer  | Default is `1`.  <br/><br/>This value (either default or passed) will always override the current subscription quantity value.         |
|    `cta` | optional | string  | Can be used for tracking purpose - [Read more](https://github.com/bufferapp/README/tree/master/runbooks/data-tracking)          |

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

### POST /1/billing/cancel-subscription.json
Cancels an existing subscription. Will cancel any existing and trialing subscriptions. `official client only`

**Parameters**

|          Name | Required |  Type   | Description                                                                                                                                                         |
| -------------:|:--------:|:-------:| ------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
|     `product` | required | string  | The product for which to perform the action. <br/><br/> Supported values: `publish` or `analyze`.                                                                   |
| `atPeriodEnd` | optional | boolean | Default is `true`. Specifies if the subscription should be deleted now or when the subscription is due to end. <br/><br/> *Common use case is to pass `true` since we want to let the customers use the full period they paid for.* <br/>*Should only pass `false` (i.e. cancel the subscription right now) when a Stripe customer switches to iOS/Android.)* |
|    `cta` | optional | string  | Can be used for tracking purpose - [Read more](https://github.com/bufferapp/README/tree/master/runbooks/data-tracking)          |

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
