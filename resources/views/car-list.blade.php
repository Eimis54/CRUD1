@extends('layout')
@section('content')
@if (Session::has('noRole'))
<div class="alert alert-danger" role="alert">
{{Session::get('noRole')}}
</div>
@endif
    <div class="container" style="margin-top:20px">
        <div class="row">   
            <div class="col-md-12">
                <h2>{{__('jp.Car List')}}</h2>
                <div>
                <div style="margin-right:10px;float: right;"> 
                    <a href="{{url('add-car')}}" class="btn btn-primary">{{__('jp.Add Car')}}</a>
                </div>
                <form method="post" action="{{route("car.search")}}">
                    @csrf
                    <div class="mb-3"><br>
                        {{__('jp.Registration Number')}}<br>
                    <select class="form-select" name="reg_number">
                        <option {{($filter->reg_number)?'':'selected'}} disabled>{{__('jp.Registration Number')}}</option>
                        @foreach ($cars as $car)
                        <option value="{{$car->reg_number}}"{{($filter->reg_number==$car->reg_number)?'selected':''}}>{{$car->reg_number}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('jp.Brand')}}</label>
                        <input class="form-control" name="brand" value="{{$filter->brand}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('jp.Model')}}</label>
                        <input class="form-control" name="model" value="{{$filter->model}}">
                    </div>
                <button class="btn btn-info">{{__('jp.Search')}}</button>
                </form>
                    </div>
                @if (Session::has('success','noRole'))
                <div class="alert alert-success" role="alert">
                {{Session::get('success','noRole')}}
                </div>
        @endif
                <table class="table">
                    <thead><tr>
                    <th>#</th>
                    <th>{{__('jp.Image')}}</th>
                    <th>{{__('jp.Owner')}}</th>
                    <th>{{__('jp.Registration Number')}}</th>
                    <th>{{__('jp.Brand')}}</th> 
                    <th>{{__('jp.Model')}}</th>   
                    <th>{{__('jp.Action')}}</th>
                    </tr></thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $carD )
                        @can('view', $carD)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>    
                                    @foreach ($carD->Images as $carImages)
                                        <img src="{{asset("/storage/cars/".$carImages->image)}}" style="width:100px">
                                    @endforeach
                                </td>
                                <td>{{$carD->owner->name}}</td>
                                <td>{{$carD->reg_number}}</td>
                                <td>{{$carD->brand}}</td>
                                <td>{{$carD->model}}</td>
                                <td>
                                    @can('update', $carD)
                                    <a href="{{url('edit-car/'.$carD->id)}}" class="btn btn-primary">{{__('jp.Edit')}}</a>|
                                    @endcan
                                    @can('delete', $carD)
                                    <a href="{{url('delete-car/'.$carD->id)}}" class="btn btn-danger">{{__('jp.Delete')}}</a></td>      
                                    @endcan                             
                            </tr>
                            @endcan
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection