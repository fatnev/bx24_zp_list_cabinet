# bx24_zp_list_cabinet
Вывод документов (pdf), в кабинете пользователя 

### Пояснение
У пользователей авторизация в Б24 происходит через Active Directory.
В каталог /upload/month/ (примонтирован, как отдельный диск), идет ежемесячная выгрузка из 1с документа о начислении премии для каждого пользователя, в формате pdf. 
Внутри системы 1С: название.pdf документа = приравнен к логину пользователя в AD. 

Пара каталогов с месяцами для примера.
