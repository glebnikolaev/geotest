<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <title>Тестовое задание - Николаев Глеб</title>
    </head>
    <div class="container">
        <div id="app">
            <div class="row">
                <div class="col-md-12">
                    <h2>Просмотр и добавление географических мест</h2>
                   <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
    </body>
</html>
