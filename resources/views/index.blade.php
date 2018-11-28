<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="buttonA" type="button" class="btn btn-primary">Znajdują się na stanie w magazynie A</button>
                <button id="buttonNotB" type="button" class="btn btn-primary">Nie znajdują się stanie w magazynie B</button>
                <button id="buttonQuantity" type="button" class="btn btn-primary">Znajdują się na stanie w ilości większej niż 5</button>
                <button id="buttonPrice" type="button" class="btn btn-primary">Wartość produktu jest większa od 10.00 PLN</button>
            </div>
        </div>
        <br>
        <div class="row justify-content-md-center form-inline">
            <form method="post" action={{route('itemShow')}}>
                <label for="item">{{ __('Wprowadź ID') }}</label>
                <input id="item" type="number" min="1" class="form-control" name="item" required autofocus>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">{{ __('Go') }}</button>
            </form>
        </div>
        <br>
        <div class="row justify-content-md-center">
            <table id="tableItems" class="table table-sm table-hover table-bordered table-row text-center ">
                <thead class="thead-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<script>
    $(function() {
        $('#buttonA').on('click', function() {
            ajaxQuery('warehouseA');
        });

        $('#buttonNotB').on('click', function() {
            ajaxQuery('warehouseB');
        });

        $('#buttonQuantity').on('click', function() {
            ajaxQuery('warehouseQuantity');
        });

        $('#buttonPrice').on('click', function() {
            ajaxQuery('warehousePrice');
        });

        function ajaxQuery(url) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                dataType: "json",
                method: 'post',
                url: url,
                success: function(result) {
                    $("#tableItems tbody tr").remove();
                    if (result.length > 0) {
                        $.each( result, function( key, value ){
                            let tr = $('<tr></tr>').appendTo('#tableItems tbody');
                            $.each( value, function( k, v ){
                                $('<td>' + v + '</td>').appendTo(tr);
                            });
                        });
                    } else {
                        $('<tr><td>nie znaleziono</td><td>nie znaleziono</td><td>nie znaleziono</td></tr>').appendTo('#tableItems tbody');
                    }
                }
            });
        }
    });
</script>
</body>
</html>


