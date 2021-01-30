@extends('layouts.app')

@section('content')
<div class="container">
	<div class="mb-3 text-center">
		<h1>Lihat dan Beli Hewan Qurban Anda di Sini</h1>
	</div>
	@include('layouts.messages')
	@if (Auth::user() && Auth::user()->admin == 1)
	<div class="mb-3">
		<a class="btn btn-primary" href="{{ url("/hewan/create") }}">Tambah</a>
	</div>
	@endif

	@if (count($listhewan) > 0)
	@foreach ($listhewan as $hewan)
	@if ($loop->first || $loop->iteration % 4 == 0)
	<div class="row mb-3">
	@endif
		<div class="col-4">
			<div class="card">
			@if (!$hewan->gambarhewan->isEmpty())
				<img class="card-img-top mw-100" src="{{ asset("storage/{$hewan->gambarhewan[0]->path}") }}" alt=":v">
			@else
				<img class="card-img-top mw-100" src="{{ asset("storage/default.png") }}" alt=":v">
			@endif	
				<div class="card-body">
					<h4 class="card-title">{{ $hewan->nama }}</h4>
					<p class="card-text">Rp. {{ $hewan->harga }}</p>
					<a class="card-link btn btn-primary" href="{{ url("/hewan/{$hewan->id}") }}">Lihat</a>
					@if (Auth::user() && Auth::user()->admin == 1)
					<a class="card-link btn btn-primary" href="{{ url("hewan/{$hewan->id}/edit") }}">Edit</a>
					{!! Form::open(["action" => ["HewanController@destroy", $hewan->id], "method" => "DELETE", "class" => "card-link d-inline"]) !!}
					{!! Form::submit("Delete", ["class" => "btn btn-danger"]) !!}
					{!! Form::close() !!}
					@endif
				</div>
			</div>
		</div>
	@if ($loop->last || $loop->iteration % 3 == 0)
	</div>
	@endif
	@endforeach
	@else
	<div class="jumbotron text-center">
		<h1>Tidak ada hewan tersedia :(</h1>
	</div>
	@endif
	
</div>


@endsection