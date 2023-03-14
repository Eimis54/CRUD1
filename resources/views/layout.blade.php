<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('jp.Insurance')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

    body{
        margin: 0;
        font-size: .9rem;
        font-weight: 400;
        line-height: 1.6;
        color: #212529;
        text-align: left;
        background-color: #f5f8fa;
    }
.navbar-laravel
{
    box-shadow: 0 2px 4px rgba(0,0,0,.04);
}
.navbar-brand, .navbar-link, .my-form, .login-form
{
    font-family: Raleway, sans-serif;
}
.my-form{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}
.my-form .row{
    margin-left: 0;
    margin-right: 0;
}
.login-form .row{
    margin-left: 0;
    margin-right: 0;
}
li{
    list-style-type: none;
}
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">{{__('jp.Cars')}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="toggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/owner-list">{{__('jp.Owner List')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/car-list">{{__('jp.Car List')}}</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">{{__('jp.Login')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">{{__('jp.Register')}}</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">{{__('jp.Logout')}}</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
        <div class="nav-item d-flex justify-content-center">{{__('jp.Contact Us')}}: Phone_Number</div>

        <div class="nav-item d-flex justify-content-end">
            <a href="{{route('setLanguage','jp')}}" class="nav-link"><img src="https://cdn.countryflags.com/thumbs/japan/flag-400.png" style="width:50px;height=50px"></a>
        </div>
        <div class="nav-item d-flex justify-content-end">
            <a href="{{route('setLanguage','en')}}" class="nav-link"><img src="https://img.freepik.com/free-vector/illustration-uk-flag_53876-18166.jpg?w=1800&t=st=1678802484~exp=1678803084~hmac=829cb58a685625a5b0a36bdd81f2ebd84e7dc6c35b3564267753768b9fba57ed" style="width:50px;height=50px"></a>
        </div>
    </nav>
    @yield('content')
</body>
</html>