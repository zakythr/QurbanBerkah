@extends('layouts.app')

@section('content')
<div class="container">
	<h1 class="text-center">Detail pengguna <span class="badge badge-primary">{{ $data["user"]->name }}</span></h1>
	<div class="mb-3">
		<a class="btn btn-primary" href="{{ url("/home") }}">Kembali</a>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr class="bg-success">
				<td>ID transaksi</td>
				<td>Nama hewan</td>
				<td>Harga</td>
				<td>Status</td>
				<td>Aksi</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($data["transaksi"] as $x)
			<tr>
				<td>{{ $x->id }}</td>
				<td>{{ $x->hewan->nama }}</td>
				<td>Rp{{ number_format($x->hewan->harga, 2) }}</td>
				<td>{{ $x->status }}</td>
				<td>
					@if ($x->status == "Terkonfirmasi oleh admin")
					<button class="btn btn-success">Terkonfirmasi</button>
					@else
					{!! Form::open(["action" => ["TransaksiController@konfirmasi", $x->id], "method" => "POST"]) !!}
					{!! Form::submit("Konfirmasi", ["class" => "btn btn-primary"]) !!}
					{!! Form::close() !!}
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection