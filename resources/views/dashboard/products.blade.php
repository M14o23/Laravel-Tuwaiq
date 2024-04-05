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
            <form action="{{route('createproducts')}}" method="post">
                @csrf 
                <label for="Productname" class="text-dark">Product name:  </label>
                <input type="text" id="Productname" class="form-control @error('Productname') is-invalid @enderror" name="Productname">
                <button type="submit" class="btn btn-info mt-2">save</button>
                <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">cancel</button>

            </form>
        </div>
       
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
        <div class="row mt-4">
            
          <div class="col d-flex justify-content-center">

            <form action="{{route('get-product')}}" method="post">
              @csrf
              <div class="input-group mb-3">
                
                <button class="btn btn-success" type="submit" >Search</button>
                <input type="text" class="form-control" name="name" value="{{ $productName ?? '' }}">
             
                <button type="submit" name="show_all" value="true" class="btn btn-outline-secondary">Show All</button>
              </div>
            </form>
            </div>
         
          
                
               
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row mt-2 text-dark">
            <div class="col">
                <div class="card bg-white">
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <th>ID</th>
                                <th>Products Name</th>
                                <th colspan="2">Action</th>
                            </thead>
                            <tbody>
                                @foreach($products as $items)
                                    <tr>
                                        <td>{{$items->id}}</td>
                                        <td>{{$items->Productname}}</td>
                                        <td><a href="{{ route('del', ['id' => $items['id']]) }}"><i class="bi bi-trash text-danger"></i></a></td>
                                        <td><a href="{{ route('edit', ['name' => $items['id']]) }}" onclick="setvalue('{{ $items->id }}', '{{ $items->Productname }}')"><i class="bi bi-pencil-square text-success"></i></a></td>
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