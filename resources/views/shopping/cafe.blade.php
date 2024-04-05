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
                                <img src="{{$items->image}}" alt="" width="250" height="250">
                            </div>
                            <div class="col-sm-6">
                                <h4 class="alert alert-success">{{$items->title}}</h4>
                                <ul class="list-unstyled">
                                     <li class="" style="font-size:medium ;">{{$items->description}}</li>
                                     @foreach($items->ingredients as $row)
                                     <li class="" style="font-size:medium ;">{{$row}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection