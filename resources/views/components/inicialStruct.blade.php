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
        <div class="row justify-content-center">
            <div class="col-lg-12 row justify-content-center ">
                <div class="w-25 m-4">
                    <img class="img-fluid"  src="{{ URL('images/gosatImage.png')}}" alt="">

                </div>
            </div>
            <div class="col-lg-12">
                <div class="row justify-content-center align-items-center">
                    {{$slot}}
                </div>
            </div>

        </div>
    </div>
</body>
</html>