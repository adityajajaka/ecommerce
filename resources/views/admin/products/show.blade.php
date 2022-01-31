@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h3 class="mt-3">Detail Produk</h3>
            <div class="card" style="width: 20rem;">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group mb-3">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $product->price }}</li>
                </ul>
                <div class="card-body">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Style -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({ selector:'#ckview' });</script>
@endsection