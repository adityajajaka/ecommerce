@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<h3 class="mt-4">Form CheckOut</h3>
		
				<form>
					@csrf
					<div class="form-group">
						<label>Nama Penerima</label>
						<input type="text" name="name" class="form-control" placeholder="Nama Anda">
					</div>
					<div class="form-group">
						<label>Alamat Penerima</label>
						<input type="text" name="alamat" class="form-control" placeholder="Alamat Anda">
					</div>
					<div class="form-group">
						<label class="form-label">Opsi Pengiriman</label>
						<select class="form-control">
						   <option value="pil1">JNE</option>
						   <option value="pil2">J&T</option>
						   <option value="pil3">POST</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label">Metode Pembayaran</label>
						<select class="form-control">
						   <option value="pil1">COD</option>
						   <option value="pil2">Transfer Bank</option>
						   <option value="pil3">Alfamart</option>
						   <option value="pil4">Indomart</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label">Catatan</label>
						<textarea class="form-control" id="ckview" name="catatan"></textarea> 
					</div>
					<div class="form-group">
						<label class="form-label">Upload Bukti TF</label><br>
						<input type="file" name="image_url" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary mt-3">Buat Pesanan</button>
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