<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('jp.Add Owner')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
    <h2>{{__('jp.Add Owner')}}</h2>    
    @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
            </div>
    @endif
    <form method="post" action="{{url('save-owner')}}">
            @csrf
            <div class="md-3">
                <label class="form-label">{{__('jp.Name')}}</label>
                <input type="text" class="form-control" name="name" placeholder="{{__('jp.Enter Name')}}" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>
                @enderror
            </div>
            <div class="md-3">
                <label class="form-label">{{__('jp.Surname')}}</label>
                <input type="text" class="form-control" name="surname" placeholder="{{__('jp.Enter Surname')}}" value="{{old('surname')}}">
                @error('surname')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>
                @enderror
            </div>
            <div class="md-3">
                <label class="form-label">{{__('jp.Years')}}</label>
                <input type="text" class="form-control" name="years" placeholder="{{__('jp.Enter Years')}}" value="{{old('years')}}">
                @error('years')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>
                @enderror
            </div><br>
            <button type="submit" class="btn btn-primary">{{__('jp.Submit')}}</button>
            <a href="{{url('owner-list')}}" class="btn btn-danger">{{__('jp.Back')}}</a>
    </form>
            </div>
        </div>
    </div>
</body>
</html>