<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{$title}}</title>
</head>
<body class="bg-primary">
    <div class="container ">
        <div class="row justify-content-between align-items-center vh-100 ">
            <div class="col-lg-6">
                <img class="img-fluid"  src="{{ URL('images/gosatImage.png')}}" alt="">
            </div>
            <div class="col-lg-6">
                <div class="row justify-content-center align-items-center vh-100">
                    <div class="shadow-lg p-4 mb-5 bg-white rounded  w-50 h-50">
                                {{$slot}}
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>