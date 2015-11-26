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
			<div class="row">
				<div class="col-sm-1">
					<div class="cover" style="background-image: url({{ $song->image }})">

					</div>
				</div>

				<div class="col-sm-1">
					<a target="_blank" class="play-wrapper" href="{{ $song->url }}">
						<span class="play"></span>
					</a>
				</div>
				
				<div class="col-sm-8 name">
					{{ $song->name }}
				</div>

				<div class="col-sm-2 vote text-right">
					<a href="#"><i class="ion-plus-round"></i></a>
					<a href="#"><i class="ion-minus-round"></i></a>
				</div>
			</div>
		@endforeach

	</div>

@stop