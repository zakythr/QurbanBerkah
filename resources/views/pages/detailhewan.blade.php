@extends("layouts.app")

@section("content")
<div class="container">
	<h1 class="text-center">Detail hewan</h1>
	<div class="mb-3">
		<a class="btn btn-primary" href="{{ url("/hewan") }}">Kembali</a>
	</div>
	<div class="row">
		<div class="col-4">
			<div id="gambarhewan" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					@if (!$hewan->gambarhewan->isEmpty())
					@foreach ($hewan->gambarhewan as $gambar)
					@if ($loop->index == 0)
					<div class="carousel-item active">
					@else
					<div class="carousel-item">
					@endif
						<img class="d-block w-100" src="{{ asset("storage/{$gambar->path}") }}" alt=":v">
					</div>
					@endforeach
					@else
					<div class="carousel-item active">
						<img class="d-block w-100" src="{{ asset("storage/default.png") }}" alt=":v">
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="col-8">
			@if (Auth::user() && Auth::user()->admin == 1)
			<div class="card mb-3">
				<div class="card-body">
					<h6 class="card-title border-bottom pb-1">ID Hewan</h6>
					<h5 class="card-text">{{ $hewan->id }}</h5>
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-body">
					<h6 class="card-title border-bottom pb-1">Status</h6>
					<h5 class="card-text">{{ $hewan->status }}</h5>
				</div>
			</div>
			@endif
			<div class="card mb-3">
				<div class="card-body">
					<h6 class="card-title border-bottom pb-1">Nama Hewan</h6>
					<h5 class="card-text">{{ $hewan->nama }}</h5>
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-body">
					<h6 class="card-title border-bottom pb-1">Deskripsi</h6>
					<h5 class="card-text">{!! $hewan->deskripsi !!}</h5>
				</div>
			</div>
			@if (Auth::user() && Auth::user()->admin != 1)
			{!! Form::open(["action" => ["TransaksiController@beli", $hewan->id], "method" => "POST"]) !!}
			{!! Form::submit("Beli", ["class" => "btn btn-primary"]) !!}
			{!! Form::close() !!}
			@endif
		</div>
	</div>
</div>
@endsection