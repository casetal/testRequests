<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все заявки</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    @if(isset($error))
        <div class="container-fluid">
            <div class="row vertical-center">
                <form id="useToken" class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-sm-offset-4 col-lg-2 col-lg-offset-5">
                    <h1>Введите токен</h1>
                    <p>
                        <input class="form-control" type="text" id="token" name="token" placeholder="Токен" value="admin" required autofocus>
                    </p>
                    <button class="btn btn-primary btn-block" type="sumbit">Отправить</button>
                </form>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <h1>Новые заявки</h1>
                @foreach($requests as $request)
                    @if($request->status == 'Active')
                    <div class="request col-md-5">
                        <div class="col">
                            <h2>#{{$request->id}}, {{$request->name}} ({{$request->email}})</h2>
                            <p>{{$request->message}}</p>
                            <hr>
                            <p>Прислано: {{$request->created_at}} | {{$request->status}}</p>
                            <hr>
                            <div class="form-answer">
                                <form id="form-answer-{{$request->id}}" class="form-answer">
                                    <label for="comment-{{$request->id}}">Комментарий</label>
                                    <input type="hidden" class="request-id" value="{{$request->id}}">
                                    <textarea id="comment-{{$request->id}}" name="comment" required></textarea>
                                    <button class="btn btn-primary btn-block" type="sumbit">Отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach

                <h1>Прошлые заявки</h1>
                @foreach($requests as $request)
                    @if($request->status == 'Resolved')
                    <div class="request col-md-5">
                        <div class="col">
                            <h2>#{{$request->id}}, {{$request->name}} ({{$request->email}})</h2>
                            <p>{{$request->message}}</p>
                            <hr>
                            <p>Прислано: {{$request->created_at}} | {{$request->status}}</p>
                            <hr>
                            <p>Комментарий: {{$request->comment}}</p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</body>
</html>