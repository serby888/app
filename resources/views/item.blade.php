<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">{{$item->name}}</h1>
        <p class="lead">ID: {{$item->id}}</p>
        <p class="lead">Price: {{$item->price}} PLN</p>
        @foreach($states as $state)
            <p class="lead">{{$state->warehouse->name}}</p>
            <p class="lead">Quantity: {{$state->quantity}}</p>
        @endforeach
        <form method="post" action="/item/delete/{{$item->id}}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button id="buttonDelete" type="submit" class="btn btn-danger">Usunąć</button>
        </form>
    </div>
</div>
</body>
</html>


