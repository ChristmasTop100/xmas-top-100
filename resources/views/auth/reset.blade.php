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
  <div class="container form">
    <form method="POST" action="/auth/otl">
        {!! csrf_field() !!}
        <input type="hidden" name="token" value="{{ $token }}">

        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <input type="hidden"  name="email" value="{{ $mail }}" class="form-control">

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Set Password
            </button>
        </div>
    </form>
  </div>
@stop
