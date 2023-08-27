<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оставить заявку</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row vertical-center">
            <form id="sendRequest" class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-sm-offset-4 col-lg-2 col-lg-offset-5">
                <h1>Оставить заявку</h1>
                <p>
                    <label class="sr-only" for="name">Имя</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Имя" required autofocus>
                </p>
                <p>
                    <label class="sr-only" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Email" required autofocus>
                </p>
                <p>
                    <label class="sr-only" for="message">Сообщение</label>
                    <textarea class="form-control" id="message" name="message" placeholder="Сообщение" required></textarea>
                </p>
                <button class="btn btn-primary btn-block" type="sumbit">Отправить</button>
            </form>
        </div>
    </div>
</body>
</html>