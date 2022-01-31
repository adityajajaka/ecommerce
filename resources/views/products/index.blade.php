@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">	
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>	

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://www.tissotwatches.com/media/catalog/category/banner_category_sport_seastar.jpg" class="d-block w-100 centered-and-cropped" alt="..." style="object-fit: cover;height: 300px">
    </div>
    <div class="carousel-item">
      <img src="https://www.tissotwatches.com/media/home/hp_our_categories_pocket.jpg?im=Resize=(1212,1212),aspect=fill;Crop=(0,0,1212,1212),gravity=Center" class="d-block w-100" alt="..." style="object-fit: cover;height: 300px">
    </div>
    <div class="carousel-item">
      <img src="https://www.tissotwatches.com/media/home/hp_our_categories_sport.jpg?im=Resize=(1212,1212),aspect=fill;Crop=(0,0,1212,1212),gravity=Center" class="d-block w-100" alt="..." style="object-fit: cover;height: 300px">
    </div>
  </div>
 <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>
<div class="mt-4 container col-md-8">
	<div class="row mt-4">
		<div class="col-md-4 offset-md-8">
			<div class="form-group">
				<select id="order_field" class="form-control">
					<option value="" disabled selected>Urutkan</option>
					<option value="best_seller">Best Seller</option>
					<option value="terbaik">Terbaik (Berdasarkan Rating)</option>
					<option value="termurah">Termurah</option>
					<option value="termahal">Termahal</option>
					<option value="terbaru">Terbaru</option>
				</select>
			</div>
		</div>
	</div>
	<div id="product-list">
		@foreach($products as $idx => $product)

			@if ($idx == 0 || $idx % 4 == 0)
				<div class="row mt-4">
			@endif

			<div class="col">
				<div class="card">
					<img src="{{ url('storage/img/'.$product->image_url) }}" class="img-thumbnail">
					<div class="card-body">
						
						<h5 class="card-title">
							<a href="{{ route('products.show', ['id' => $product->id]) }}" style="text-decoration: none;">
								{{ $product->name }}
							</a>
						</h5>
						<p class="card-text">
							Rp. {{ $product->price }}
						</p>
						<a href="{{ route('carts.add', ['id' => $product->id]) }}" class="btn btn-primary">Beli Sekarang</a>
					</div>
				</div>
			</div>

			@if ($idx > 0 && $idx % 4 == 3)
				</div>
			@endif
		@endforeach
	</div>
</div>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
		$('#order_field').change(function(){
			// window.location.href = '/products?order_by=' + $(this).val();
			$.ajax({
				type: 'GET',
				url: '/products',
				data: {
					order_by: $(this).val(),
				},
				dataType:'json',
				success: function(data) {
					var products = '';
					$.each(data, function(idx, product) {
						if(idx == 0 || idx % 4 == 0) {
							products += '<div class="row mt-4">';
						}

						products +=
							'<div class="col">' +
								'<div class="card">' +
								  '<img src="/storage/img/' + product.image_url + '" class="img-thumbnail" alt="...">' +
								   '<div class="card-body">' +
								     '<h5 class="card-title text-center">' +
								       '<a href="/products/' + product.id + '" style="text-decoration: none">' +
								         product.name +
								        '</a>' +
								     '</h5>' +
								     '<p class="card-text text-center">' +
								     	product.price +
								     '</p>' +
								     '<a href="/carts/add/' + product.id + '"class="btn btn-primary d-grid gap-2">Beli</a>' +
								    '</div>' +
								'</div>' +
							'</div>';

						if(idx > 0 && idx % 4 == 3) {
							products += '</div>';
						}
					});

					//update element
					$('#product-list').html(products);
				},
				error: function(data) {
					alert('Unable to handle request');
				}
			});
		});
	});
</script>
@endsection