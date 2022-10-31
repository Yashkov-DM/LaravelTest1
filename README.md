# LARAVEL RestAPI

1) Реализовать закрытое API через JWT.   
   - login который отдает нам JWT токен
   - externalapi который работает и отдает данные текущего пользователя
   (но только с валидным JWT токеном)   
2) Реализовать команды, которые должна разбирать файл по API     
   - вставлять данные если записи новые  
   - удалять записи из БД если таковых не существует в файле
   - Обновлять, если данные были изменены в исходном файле   

## Описание endpoints

### GET /api/externalapi?restformat=json

Принимает json. Далее если status - success, обрабатываем данные.  

**Responses**:

**_status 200_**

```
{
    "status": "success",
    "data": [
        {
            "id": 1,
            "domain_id": 116,
            "subject": "test1.2",
            "unisender_send_date_at": "2022-10-29 22:11:32",
            "created": "sdfsdf"
        }        
    ]
}
```
### POST /api/login?email=ivan@mail.ru&password=12345678!

Принимаем парамеетры email/password, если пользователь авторизован,
возвращает JWT token. 

**Request**:

post запрос с параметрами:

```
email/password
```

**Responses**:

**_status 200_**

---


