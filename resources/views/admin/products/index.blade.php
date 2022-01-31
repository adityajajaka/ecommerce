@extends('layouts.app')

@section('content')
<div class="container col-md-8">
	<div class="row justify-content-center">
		<div class="col">
			<h3 class="mt-4">Product</h3>
			<div>
				<a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah Product</a>
			</div>
			<br/>
			<div class="table-responsive">
				<table class="table table-striped table-sm">
					<thead>
						<tr class="text-center">
							<th>#</th>
							<th>Name</th>
							<th>Price</th>
							<th>Created at</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td>{{ $product['id'] }}</td>
							<td>{{ $product['name'] }}</td>
							<td>{{ $product['price'] }}</td>
							<td>{{ $product['created_at'] }}</td>
							<td>
								<a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-primary">Detail Product</a>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
							</td>
							<td>
								<form action="{{ route('admin.products.destroy', $product->id)}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Style -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
@endsection

