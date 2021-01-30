@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">Daftar pembelian</div>

				<div class="card-body">
					@include('layouts.messages')
					
					<div id="paragraph">
						<p>Silahkan Transfer ke nomer rekening 0756327645785624 (Bank Mandiri) 
							atas nama Yanto dan kirim bukti transfer ke nomer 082140849666</p>
					</div>
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Nama hewan</th>
								<th>Harga</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($listtransaksi as $x)
							<tr>
								<td>{{ $x->hewan->nama }}</td>
								<td>Rp{{ number_format($x->hewan->harga, 2) }}</td>
								<td>{{ $x->status }}</td>
								<td class="text-center">
									@if ($x->status != "Terkonfirmasi oleh admin")
									{!! Form::open(["url" => "/transaksi/{$x->id}/batal", "method" => "POST"]) !!}
									{!! Form::submit("Batalkan pemesanan", ["class" => "btn btn-danger"]) !!}
									{!! Form::close() !!}
									@else
									<button class="btn btn-success">Transaksi berhasil, hewan sudah menjadi milik anda</button>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection