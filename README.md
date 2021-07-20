## Установка проекта:

```
1. git clone https://github.com/Atar-rr/xsolla_rest_api_test.git
2. cd xsolla_rest_api_test
3. Выполняем make env 
4. Выполняем make init 
5. Выполняем make migrate 
6. Выполняем make db-seed (наполняется таблица с типами товаров)
7. Api будет доступно по адресу http://localhost:8080/api/v1
```

P.S Внимание, в системе не должно быть запущено веб-серверов и сервиса бд mysql

| Метод |	URL | Описание |
| ---  | --- | --- |
| GET |	/api/v1/products |	Получение каталога товаров.
| GET |	/api/v1/products/{sku/id} |	Получение информации о товаре по SKU или id.
| POST |	/api/v1/products |	Создание товара.
| PUT |	/api/v1/products/{sku/id} |	Редактирование товара по SKU или id.
| DELETE | 	/api/v1/products/{sku/id} |	Удаление товара по SKU или id.

## Примеры запросов

### GET /api/v1/products
Доступно частичное получение ответа с помощью limit и offset.
Если указать limit=0, то в ответ придет пустой массив данных и total с указанием общего кол-ва доступных элементов

``
curl --location --request GET 'http://localhost:8080/api/product?limit=10&offset=0' \
--header 'Content-Type: application/json;' \
--header 'Cookie: XDEBUG_SESSION=www-data' \
--data-raw ''
``

### GET /api/v1/products/{sku/id}

``
curl --location --request GET 'http://localhost:8080/api/product/12' \
--header 'Content-Type: application/json;' \
--header 'Cookie: XDEBUG_SESSION=www-data' \
--data-raw ''
``

### DELETE /api/v1/products/{sku/id}

``
curl --location --request DELETE 'http://localhost:8080/api/product/12' \
--header 'Content-Type: application/json;' \
--header 'Cookie: XDEBUG_SESSION=www-data' \
--data-raw ''
``

### POST /api/v1/products

``
curl --location --request POST 'http://localhost:8080/api/product' \
--header 'Content-Type: application/json;' \
--header 'Cookie: XDEBUG_SESSION=www-data' \
--data-raw '{
"name": "first",
"sku": "M0020252",
"price": 1000.00,
"product_type_id": 1
}'
``

### PUT /api/v1/products/{sku/id}
Можно изменять только часть данных, передав только нужные поля

``
curl --location --request PUT 'http://localhost:8080/api/product/13' \
--header 'Content-Type: application/json;' \
--header 'Cookie: XDEBUG_SESSION=www-data' \
--data-raw '{
"name": "first",
"sku": "M0020252",
"price": 1000.00,
"product_type_id": 1
}'
``
