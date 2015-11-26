@extends('layouts.default')

@section('header')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Christmastop 100</h1>
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
				
				<div class="col-sm-10 name">
					{{ $song->name }}
				</div>
			</div>
		@endforeach

	</div>

@stop