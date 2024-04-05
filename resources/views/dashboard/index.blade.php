@extends('layouts.base')

@section('content')
<!-- <span class="text-dark">{{Session::get('data')}}</span>
<span class="text-dark">{{Cookie::get('data')}}</span>-->


<div class="container">
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-csnter"><i class="bi bi-receipt-cutoff text-success"></i></h1>
                    <span class="text-dark text-center">Invoices</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-csnter"><i class="bi bi-people-fill text-black"></i></h1>
                    <span class="text-dark text-center">Costumers</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-csnter"><i class="bi bi-receipt-cutoff text-success"></i></h1>
                    <span class="text-dark text-center">Invoices</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-csnter"><i class="bi bi-receipt-cutoff text-success"></i></h1>
                    <span class="text-dark text-center">Invoices</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection