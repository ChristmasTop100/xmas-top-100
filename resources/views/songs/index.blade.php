@extends('layouts.default')

@section('header')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Christmastop <span class="green">100</span></h1>

				<p class="text-center">
					<a data-toggle="modal" data-target="#login-modal">Login</a> with your e-mail adres to vote!
				</p>
			</div>
		</div>
	</div>
@stop

@section('content')
	<div class="container songs">
		@foreach ($songs as $song)
			<div class="row" data-id="{{ $song->id }}">
				<div class="col-sm-1">
					<div class="cover" style="background-image: url({{ $song->image }})">
						<div class="overlay"></div>
					</div>
				</div>

				<div class="col-sm-1 text-center">
					<a target="_blank" class="play-wrapper" href="{{ $song->url }}">
						<span class="play"></span>
					</a>
				</div>
				
				<div class="col-sm-8 name">
					{{ $song->name }} - <span class="artist">{{ $song->artist }}</span>
				</div>

				<div class="col-sm-2 vote text-right">
					@if (Auth::check())
						<span class="counter">
							
						</span>
						<a href="#"><i class="ion-android-add"></i></a>
						<a href="#"><i class="ion-android-remove"></i></a>
					@endif
				</div>
			</div>
		@endforeach

	</div>

@stop

@section('footer')
	<!-- Modal -->
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Login</h4>
	      </div>
	      <div class="modal-body">
	        <form action="">
	        	<div class="form-group">
				    <label for="email">Email address</label>
				    <input type="email" class="form-control" id="email" placeholder="Email">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password">
				</div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary">Login</button>
	      </div>
	    </div>
	  </div>
	</div>
@stop

@section('scripts')
	<script>
		(function ($) {
			var element, totalVotes = 100, count, counter, id;

			$('.songs').find('.row').each(function (i, el) {
				element = $(e);
				counter = $('.counter', element);
				count 	= counter.html();
				id 		= element.data('id');

				$('.vote-plus', element).on('click', function (e) {
					e.preventDefault();

					if (totalVotes > 0) {
						count++;
						totalVotes--;

						counter.html(count);
					}
				});

				$('.vote-minus', element).on('click', function (e) {
					e.preventDefault();

					if (count > 0 && totalVotes < 100) {
						count--;
						totalVotes++;

						counter.html(count);
					}
				});
			});
			
		})(jQuery);
	</script>
@stop