<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Weekly Dev Task Sync</title>

        <style>
        body {
            background-color: white;
            margin-top: 0;
            padding-top: 0;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 50px;
        }
        #contentArea {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="btn-group" role="group">
            <a href="/providers" class="btn btn-primary">Providers</a>
            <a href="/developers" class="btn btn-secondary">Developers</a>
            <a href="/tasks" class="btn btn-success">Tasks</a>
        </div>
        <div id="contentArea">
            @yield('content')
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
