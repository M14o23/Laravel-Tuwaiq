@extends('layouts.base')

@section('content')
<!-- <span class="text-dark">{{Session::get('data')}}</span>
<span class="text-dark">{{Cookie::get('data')}}</span>-->


<div class="container">
    <div class="row mt-5">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add New Product
            </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-success" id="staticBackdropLabel">Add New Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productDetailsForm" action="{{ route('create-product-details') }}" method="post">
                    @csrf 
                    
                    <div class="row">
                        <div class="col">
                            
                            <label for="product" class="text-dark">Select Product</label>
                            <select name="product" class="form-select" id="product">
                                @foreach($products as $item)
                                    <option class="text-dark" value="{{ $item->id }}">{{ $item->Productname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="color" class="text-dark">color</label>
                            <input type="text" id="color" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color') }}">
                            
                            
                        </div>
                        <div class="col">
                            <label for="price" class="text-dark">price</label>
                            <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                            
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="qty" class="text-dark">qty</label>
                            <input type="text" id="qty" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') }}">
                            <span class="text-danger" id="qtyerror"></span>
                             
                        </div>
                        <div class="col">
                            <label for="description" class="text-dark">description</label>
                            <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
                            <span class="text-danger" id="descriptionerror"></span>
                             
                        </div>
                    </div>
                    <button type="submit"  class="btn btn-info mt-2">save</button>
                    <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
        <div class="row mt-3">
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-dark">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

        </div>
        <div class="row mt-5">
            <div class="col d-flex justify-content-center">

                <form action="{{route('search-details')}}" method="post">
                  @csrf
                  <div class="input-group mb-3">
                    
                    <button class="btn btn-success" type="submit" >Search</button>
                    <input type="text" class="form-control" name="name" value="{{ $productName ?? '' }}">
                 
                    <button type="submit" formaction="{{route('product-details')}}" formmethod="get" class="btn btn-outline-secondary " >Show All</button>
                  </div>
                </form>
                </div>
        </div>
        
        <div class="row mt-5 text-dark">
            <div class="col">
                <div class="card bg-white">
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <th>ID</th>
                                <th>Products Name</th>
                                <th>color</th>
                                <th>price</th>
                                <th>Quantity</th>
                                <th>Descreition</th>
                                <th colspan="2">Action</th>
                            </thead>
                            <tbody>
                                 @foreach($productdetails as $items)
                                    <tr>
                                        <td>{{$items->id}}</td>
                                        <td>{{$items->Productname}}</td>
                                        <td>{{$items->color}}</td>
                                        <td>{{$items->price}} SAR</td>
                                        <td>{{$items->qty}}</td>
                                        <td>{{$items->description}}</td>
                                        <td><a href="{{ route('del-details', ['id' => $items->id]) }}"><i class="bi bi-trash text-danger"></i></a></td>
                                <td><a href="{{ route('edit-details', ['name' => $items->id]) }}" ><i class="bi bi-pencil-square text-success"></i></a></td>
                                    </tr>
                                @endforeach
                                

                            </tbody>
                        </table>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      let collapseElements = document.querySelectorAll('.collapse');
      collapseElements.forEach(function(collapseElement) {
        collapseElement.addEventListener('show.bs.collapse', function() {
          collapseElements.forEach(function(otherCollapseElement) {
            if (otherCollapseElement !== collapseElement && otherCollapseElement.classList.contains('show')) {
              otherCollapseElement.classList.remove('show');
            }
          });
        });
      });
    });
  </script>
  
@endsection

