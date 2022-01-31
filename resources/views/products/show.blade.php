@extends('layouts.app')

@section('content')
<style type="text/css">
	.rating div{
		color: #ffe400;
		font-size: 30px;
		font-family: sans-serif;
		font-weight: 500;
		text-transform: uppercase;
	}
	.rating input{
		display: none;
	}
	.rating input + label{
		font-size: 30px;
		text-shadow: 1px 1px 0 #8f8420;
		cursor: pointer;
	}
	.rating input:checked + label ~ label {
		color: #b4afaf;
	}
	.rating label:active{
		transform: scale(0.8);
		transition: 0.3s ease;
	}
</style>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-3">
			<img src="{{ url('storage/img/'.$product-> image_url) }} " class="img-thumbnail">
		</div>

		<div class="col-md-9">
			<h3>
				{{ $product->name }}
			</h3>

			<p>Total Rating: <strong>{{ $star }}</strong></p>
			<div class="rating" style="font-size: 30px; text-shadow: 1px 1px 0 #8f8420; color: #ffe400;">
				@for($stars = 0; $stars < $star; $stars++)
				<i class="bi bi-star-fill" value="$star" id="star1"></i><label for="star1"></label>
				@endfor
			</div></br>

			<h4>
				{{ $product->price }}
			</h4>
			<div class="mt-4">
				<a href="{{ route('carts.add', ['id' => $product['id']]) }}" class="btn btn-primary">Beli</a>
			</div>

			<div class="mt-2">
				<a href="https://www.facebook.com/sharer.php?u={{ route('products.show', ['id' => $product['id']]) }}" class="social-button" target="_blank">Share Facebook</a> |
				<a href="https://www.twitter.com/intent/tweet?text=my share text&amp;url={{ route('products.show', ['id' => $product['id']]) }}" class="social-button" target="_blank">Share Twitter</a> |
				<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('products.show', ['id' => $product['id']]) }}&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button" target="_blank">Share Linkedin</a> |
				<a href="https://wa.me/?text={{ route('products.show', ['id' => $product['id']]) }}" class="social-button" target="_blank">Share WhatsApp</a> 
			</div>
			
			<div class="mt-4">
				<ul class=" nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Deskripsi</button>
						<!-- <a href="#description" class="nav-link active" role="tab" data-toggle="tab">Deskripsi</a> -->
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Review</button>
						<!-- <a href="#review" class="nav-link" role="tab" data-toggle="tab">Review</a> -->
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content mt-2">
					<div role="tabpanel" class="tab-pane fede in active show" id="description" aria-labelledby="description-tab">
						<p>{!! $product->description !!}</p>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="review" aria-labelledby="review-tab">
						<!-- Content untuk review disini -->
							<form action="{{ route('products.store', $product->id) }}" method="POST">
								@csrf
								<h5>Rating :</h5>
								<div class="rating">
									<div class="star-icon">
										<input type="radio" value="1" name="rating" checked id="star1">
										<label for="star1" class="bi bi-star-fill"></label>
										<input type="radio" value="2" name="rating" id="star2">
										<label for="star2" class="bi bi-star-fill"></label>
										<input type="radio" value="3" name="rating" id="star3">
										<label for="star3" class="bi bi-star-fill"></label>
										<input type="radio" value="4" name="rating" id="star4">
										<label for="star4" class="bi bi-star-fill"></label>
										<input type="radio" value="5" name="rating" id="star5">
										<label for="star5" class="bi bi-star-fill"></label>
									</div>
								</div><br>
								<h5>Deskripsi :</h5>
								<div class="form-group">
									<textarea name="description" id="ckview" placeholder="Deskripsi"></textarea>
								</div>
								<button type="submit" class="btn btn-primary mt-3">Submit</button>
							</form>
							@foreach ($reviews as $review)
							<div class="card mt-2">
								<div class="card-body">
									<div class="row">
										<div class="text-center col-2">
											<img src="{{ url('storage/img/User.png') }}">
											<p class="mt-3">
												<div style="color: #ffe400;">
													@for ($star = 0; $star < $review->rating; $star++)
													<i class="bi bi-star-fill" value="$star" id="star1"></i>
													@endfor
												</div>
												<hr>
												{{ $review->created_at->diffForHumans() }}
											</p>
										</div>
										<div class="col">
											<h2 class="card-title">
												<strong>{{ Auth::user()->name }}</strong>
											</h2>
											<p>{!! $review->description !!}</p>
										</div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({ selector:'#ckview' });</script>
@endsection	