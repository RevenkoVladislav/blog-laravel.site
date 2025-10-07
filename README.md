### Блог на Laravel
Мой учебный проект блога на laravel с разделением пользователей, админ панелью с полной CRUD реализацией для постов, пользователей, тэгов и комментариев, и личным кабинетом пользователей. 

### Установка и настройка
1. git clone https://github.com/RevenkoVladislav/blog-laravel.site.git
2. Настраиваем MAMP, Openerver  или другой сервис для локального доступа. Я использую следующие настройки MAMP 
```php
// MAMP/conf/apache/extra/httpd-vhosts.conf
<VirtualHost *:8888>
    ServerAdmin webmaster@blog-laravel.site
    DocumentRoot "/Applications/MAMP/htdocs/blog-laravel.site/public"
    ServerName blog-laravel.site
    ErrorLog "/Applications/MAMP/logs/blog-laravel-error.log"
    CustomLog "/Applications/MAMP/logs/blog-lavarel-access.log" common

    <Directory "/Applications/MAMP/htdocs/blog-laravel.site/public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
3. 

### Реализован следующей функционал:
- Показ постов на главной странице (/posts), пагинация, показ рандомных постов, показ "горячих" постов (по количеству лайков).
- Реализована система лайков и комментариев.
- Просмотр поста (/posts/{id}), вывод комментариев, форма для комментариев.
- Возможность отредактировать или удалить свой комментарий для зарегистрированного пользователя.
- Возможность отредактировать и удалить любой комментарий администратору.
- Предлагаются схожие посты по категориям.
- 2 роли пользователей - читатель и администратор.
- Пользователь может зарегистрироваться самостоятельно через форму регистрации, пароль придумывает самостоятельно, нужно подтвердить почту (будет отправлено письмо на почту)
- Фильтр по категориями и тэгам.
- Личный кабинет пользователя, который содержит список лайков и комментариев с возможностью редактирования и удаления. (/pesronal)
- Панель администратора с полным CRUD для тэгов, категорий, постов, юзеров, а также возможностью снимать лайки у статьи для каждого пользователя и редактировать все комментарии. Администратор пишет посты и публикует. Администратор может вручную создать пользователя через панель управления, пользователю придет 2 письма - сгенерированный пароль и ссылка на подтверждение почты. (/admin)
- Транзакции при CRUD операциях.
- Middleware для админов.
- Requests для операций создания и изменения пользователей, постов, категорий и тэгов.
- Очередь при регистрации/создании пользователя с отправкой email и генерацией пароля.
- Soft и Force delete для каждого поста, пользователя, категории и тэга. При удалении пользователей происходит чистка зависимостей в таблицах с комментариями и лайками. При удалении категории с имеющимися статьями происходит их перенос в неудаляемую категорию "без категории". 
- Восстановление данных после soft deletes для пользователей, категорий, тэгов и постов. 

### Использовано:
- laravel 12
- laravel/ui
- AdminLTE для админки и личного кабинета
- Шаблон Еdica + Bootstrap для фронтенда.
- Mysql
- Queue (database)

### Несколько скриншотов проекта
<img width="1686" height="983" alt="лента" src="https://github.com/user-attachments/assets/bfa3386f-cb64-4859-83fe-1ab606544962" />
<img width="1692" height="984" alt="схожие посты" src="https://github.com/user-attachments/assets/c8d2eab4-8a87-4e25-8484-b63f87ca6eeb" />
<img width="1686" height="857" alt="категории" src="https://github.com/user-attachments/assets/138f5c32-d25f-43c4-aa5b-5c1e0c907dbc" />
<img width="1703" height="970" alt="админ панель" src="https://github.com/user-attachments/assets/8a75d8b6-2f21-40bd-8ff6-64211809289f" />
<img width="1704" height="984" alt="кабинет пользователя" src="https://github.com/user-attachments/assets/900eb7c0-2a78-453c-8d20-ef375b3af852" />
<img width="1179" height="797" alt="письмо на почту при регистрации" src="https://github.com/user-attachments/assets/722d3be1-879e-4123-970b-6eb94aa1ece8" />
<img width="1696" height="981" alt="панель управления 2" src="https://github.com/user-attachments/assets/76b5c46c-57f8-44be-b2a8-c2dc98b85041" />
<img width="1709" height="730" alt="список лайков в админке" src="https://github.com/user-attachments/assets/2f9a98b7-c6fa-4297-b558-43011437f98d" />
<img width="1692" height="977" alt="добавление поста" src="https://github.com/user-attachments/assets/7e3ed672-b979-4a44-b66b-63eb58e67f5a" />
