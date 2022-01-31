@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<div class="row">
				<div class="col mt-4">
					<h4>
						<span class="badge bg-primary">Alamat Pengiriman</span>
					</h4>
					<p>
						{{ $order->shipping_address }}
					</p>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col">
					<h4>
						<span class="badge bg-primary">Kode Pos</span>
					</h4>
					<p>
						{{ $order->zip_code }}
					</p>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col">
					<h4>
						<span class="badge bg-primary">Harga Total</span>
					</h4>
					<p>
						{{ $order->total_price }}
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col">
			<table id="cart" class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width: 50%">Product</th>
						<th style="width: 10%">Price</th>
						<th style="width: 8%">Quantity</th>
						<th style="width: 22%" class="text-center">Subtotal</th>
					</tr>
				</thead>
				<tbody>

					@foreach($order->orderItems as $orderItem)
					<tr>
						<td data-th="Product">
							<div class="row">
								<div class="col-sm-3 hidden-xs">
									<!-- <img src="{{ route('products.image', ['imageName' => $orderItem->product->image_url]) }}" width="100" height="100" class="img-responsive"> -->
									<img src="{{ url('storage/img/'.$orderItem->product['image_url']) }}" width="200" height="200" class="img-responsive">
								</div>
								<div class="col-sm-9">
									<a href="{{ route('products.show', ['id' => $orderItem->product->id]) }}" style="text-decoration: none">
										<h4 class="nomargin">{{ $orderItem->product->name }}</h4>
									</a>
								</div>
							</div>
						</td>
						<td data-th="Price">
							{{ $orderItem->price }}
						</td>
						<td data-th="Quantity">
							{{ $orderItem->quantity }}
						</td>
						<td data-th="Subtotal" class="text-center">
							{{ $orderItem->price * $orderItem->quantity }}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
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