<x-mail::message>
# Пароль для входа в систему на сайте http://blog-laravel.site

Уважаемый,  {{ $userName }}, <br>
Ваш персональный пароль: {{ $password }}
<br>
Вы можете поменять его в любой момент в панели администратора. <br>
С уважением, <br>
    {{ config('app.name') }}
</x-mail::message>
