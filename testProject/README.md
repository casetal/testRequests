# Тестовое задание для .div
Техническое задание: https://docs.google.com/document/d/1vfHYU8E_SPL9h_hGoXWN0b4AyCRsWlIn_cHLyp4P5Z8/edit

Реализовал базовое из технического задания, а также добавил реализацию ответственным лицом через токен.

## Endpointы:
- POST **/api/create_token** - создание токена ответственного лица

`username` имя пользователя, **обязательное поле**
`password` пароль пользователя, **обязательное поле**

- POST **/api/get_token** - обновляет токен для ответственного лица

`username` имя пользователя, **обязательное поле**
`password` пароль пользователя, **обязательное поле**

- GET **/api/requests/{access_token}** - получение заявок ответственным лицом, с получением по токену

- PUT **/api/requests/{id}/{access_token}** - ответ на конкретную задачу ответственным лицом

`comment` текст ответа, **обязательное поле**

- **POST /api/requests/** - отправка заявки пользователями системы

`name` имя пользователя, **обязательное поле**
`email` email пользователя, **обязательное поле**
`message` текст пользователя, **обязательное поле**


------------
Также было сделано ограничение для отправки запросов (10 запросов в минуту) во избежания нагрузки MySQL.
