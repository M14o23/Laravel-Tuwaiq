@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row ">
            <div class="col">
                @foreach($data as $items)
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="/assest\{{$items->images}}" alt="" width="250" height="250">
                            </div>
                            <div class="col-sm-6">
                                <h4 class="alert alert-success">{{$items->Productname}}</h4>
                                <ul class="list-unstyled">
                                    <li class="badge bg-danger" style="font-size:medium ;">{{$items->description}}</li>
                                    <li class="p-2"><h4>color: {{$items->color}}</h4> </li>
                                    <li class="p-2"><small>Addres Jeddah Khalid ibn alwalid St</small></li>
                                    
                                </ul>
                            </div>
                            <div class="col-sm-3">
                                <ul class="list-unstyled p-2">
                                    <li class="badge bg-success text-black"  style="font-size:medium ;">{{__('message.price')}} : {{$items->price}} SAR</li>
                                    <li class=""><span>{{__('message.tax')}} : {{$items->tax}}%</span> </li>
                                    <li class=""><small>{{__('message.total')}} : {{$items->total}} {{__('message.SAR')}}</small></li>
                                    <li class=""><small class="text-danger"><del >{{__('message.Descount')}} : {{$items->descount}} SAR</del></small></li>
                                    <li class=""><small>{{__('message.net')}} : {{$items->net}} SAR</small></li>

                                    
                                </ul>
                                <div class="row mt-5">
                                    <div class="col">
                                        <a href="{{route('show-items-details',['id'=>$items->id])}}" class="btn btn-success"> {{__('message.details')}} >> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection