@extends('layouts.app')

@section('content')
<div class="container">
	<div class="mb-3 text-center">
		<h1 class="text-center">Pengguna</h1>
	</div>

	<table class="table table-bordered table-hover">
		<thead>
			<tr class="bg-success">
				<th>Nama</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($listpengguna as $x)
			<tr>
				<td>{{ $x->name }}</td>
				<td class="text-center">
					<a class="btn btn-primary" href="{{ url("/pengguna/$x->id") }}">Lihat</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

