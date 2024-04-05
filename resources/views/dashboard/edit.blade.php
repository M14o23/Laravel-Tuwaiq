@extends('layouts.base')

@section('content')

<div class="container">
   
    <div class="card mt-5">
        <div class="card-body bg-white">
            <form action="{{route('update-product')}}" method="post">
                @csrf
                <div class="row mt-3 text-center" >
                    <input type="hidden" name="id" value="{{$products['id']}}">
                    <div class="col p-2 " >
                        <label for="prname">اسم المنتج</label>
                        <input type="text" name="productname" class="form-control @error('Productname') is-invalid @enderror " id="prname" value="{{$products['Productname']}}">
                        @error('Productname')
                            <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                   
                </div>
                
                <div class="row mt-3">
                    <div class="col text-center">
                        <button class="btn btn-success" type="submit">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
