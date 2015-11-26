@extends('layouts.default')

@section('header')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Christmastop <span class="green">100</span></h1>
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
					{{ $song->name }}
				</div>

				<div class="col-sm-2 vote text-right">
					<span class="counter">
						
					</span>
					<a href="#"><i class="ion-android-add"></i></a>
					<a href="#"><i class="ion-android-remove"></i></a>
				</div>
			</div>
		@endforeach

	</div>

@stop

@section('footer')
	
@stop

@section('scripts')
	<script>
		// (function ($) {
		// 	var element, totalVotes = 100, count, counter, id;

		// 	$('.songs').find('.row').each(function (i, el) {
		// 		element = $(e);
		// 		counter = $('.counter', element);
		// 		count 	= counter.html();
		// 		id 		= element.data('id');

		// 		$('.vote-plus', element).on('click', function (e) {
		// 			e.preventDefault();

		// 			if (totalVotes > 0) {
		// 				count++;
		// 				totalVotes--;

		// 				counter.html(count);
		// 			}
		// 		});

		// 		$('.vote-minus', element).on('click', function (e) {
		// 			e.preventDefault();

		// 			if (count > 0 && totalVotes < 100) {
		// 				count--;
		// 				totalVotes++;

		// 				counter.html(count);
		// 			}
		// 		});
		// 	});
			
		// })(jQuery);
	</script>
@stop