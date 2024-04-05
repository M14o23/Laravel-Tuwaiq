@extends('layouts.base')

@section('content')

<div class="container">
   
    <div class="card mt-5">
        <div class="card-body bg-white">
            <form action="{{route('update-product-details')}}" method="post">
                @csrf 
               
                <div class="row ">
                    <div class="col">
                        <input type="hidden" name="id" value="{{$productDetails['id']}}">
                        <label for="color" class="text-dark">color</label>
                        <input type="text" id="color" name="color" class="form-control @error('color') is-invalid @enderror"  value="{{$productDetails['color']}}" >
                        @error('color')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>"
                        @enderror
                    </div>
                    
                    <div class="col">
                    <label for="price" class="text-dark">price</label>
                        <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror"  value="{{$productDetails['price']}} ">
                        @error('price')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="qty" class="text-dark">qty</label>
                        <input type="text" id="qty" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{$productDetails['qty']}} " >
                        @error('qty')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col">
                    <label for="description" class="text-dark">description</label>
                        <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror"  value="{{$productDetails['description']}} ">
                        @error('description')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>
               
                <button type="submit" class="btn btn-info mt-2">save</button>
                <button type="submit" class="btn btn-secondary mt-2" formaction="{{route('product-details')}}" formmethod="get" data-bs-dismiss="modal">cancel</button>
                
    
            </form>
        </div>
    </div>

</div>
@endsection
