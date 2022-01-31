@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<h3 class="mt-4">Tambah Product</h3>
			
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

			<form action="{{ route('admin.products.store') }}" method="POST">
				@csrf
				<div class="form-group">
					<label>Nama Product</label>
					<input type="text" name="name" class="form-control" placeholder="Nama Product">
				</div>
				<div class="form-group">
					<label>Harga</label>
					<input type="number" name="price" class="form-control" placeholder="Harga">
				</div>
				<div class="mb-3 form-group">
					<label class="form-label">Upload Gambar</label><br>
					<input type="file" name="image_url" class="form-control">
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="description" id="ckview" placeholder="Deskripsi"></textarea>
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

