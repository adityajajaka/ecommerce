@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h3 class="mt-4">Edit Product</h3 class="mt-4">

           <br/>
            @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <br/>

            <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group mb-3">
                    <input type="hidden" name="id" value="{{ $product->id }}">
                </div>
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="price" class="form-control" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label>Upload Gambar</label>
                    <input type="file" name="image_url" class="form-control" value="{{$product->image_url}}">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" id="ckview" value="{{$product->description}}"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
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