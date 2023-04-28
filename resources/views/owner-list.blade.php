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
                <h2>{{__('jp.Owner List')}}</h2>
                <div style="margin-right:10px;float: right;"> 
                    <a href="{{url('add-owner')}}" class="btn btn-primary">{{__('jp.Add Owner')}}</a>
                </div>
                <form method="post" action="{{route("owner.search")}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{__('jp.Name')}}</label>
                        <input class="form-control" name="name" value="{{$filter->name}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('jp.Surname')}}</label>
                        <input class="form-control" name="surname" value="{{$filter->surname}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('jp.Years')}}</label>
                        <select class="form-select" name="years">
                            <option {{($filter->years)?'':'selected'}} disabled>{{__('jp.Select Years')}}</option>
                        @foreach ($owners as $owner )
                            <option value="{{$owner->years}}"{{($filter->years==$owner->years)?'selected':''}}>{{$owner->years}}</option>
                        @endforeach
                        </select>
                        </div>
                <button class="btn btn-info">{{__('jp.Search')}}</button>
                </form>
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
                </div>
        @endif
                <table class="table">
                    <thead><tr>
                    <th>#</th>
                    <th>{{__('jp.Name')}}</th>
                    <th>{{__('jp.Surname')}}</th> 
                    <th>{{__('jp.Years')}}</th>
                    <th>{{__('jp.Action')}}</th>
                    </tr></thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $ownerD )
                                    @can('view', $ownerD)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$ownerD->name}}</td>
                                <td>{{$ownerD->surname}}</td>
                                <td>{{$ownerD->years}}</td>
                                <td>
                                    @can('update', $ownerD)
                                    <a href="{{url('edit-owner/'.$ownerD->id)}}" class="btn btn-primary">{{__('jp.Edit')}}</a>|
                                    @endcan
                                    @can('delete', $ownerD)
                                    <a href="{{url('delete-owner/'.$ownerD->id)}}" class="btn btn-danger">{{__('jp.Delete')}}</a>
                                    @endcan
                                </td>
                            </tr>
                                    @endcan
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection