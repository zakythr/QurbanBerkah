@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="mb-3">
				<a class="btn btn-primary" href="{{ url("/angsuran/cicilan/finishcicilan") }}">Kembali</a>
			</div>
			<div class="card">
				<div class="card-header">
					Cicilan dengan ID <span class="badge badge-primary">{{ $data["cicilan"]->id }}</span>
				</div>

				<div class="card-body">
					@include('layouts.messages')

					<div id="paragraph">
						<p>Silahkan Transfer ke nomer rekening 0756327645785624 (Bank Mandiri)
							atas nama Yanto dan kirim bukti transfer ke nomer 082140849666</p>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Periode ke</th>
								<th>Jumlah Bayar</th>
								<th>Bulan Bayar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@for ($i = 1; $i <= $data["cicilan"]->status; $i++)
								<tr class="bg-success">
									<td>{{ $i }}</td>
									<td>Rp{{ number_format($data["perbulan"], 2) }}</td>
									<td>-</td>
									<td class="text-center">
										<button class="btn btn-outline-success">Cicilan Berhasil!</button>
									</td>
								</tr>
							@endfor
							@for ($i = $data["cicilan"]->status; $i < $data["cicilan"]->durasi; $i++)
								<tr>
									<td>{{ $i + 1 }}</td>
									<td>Rp{{ number_format($data["perbulan"], 2) }}</td>
									<td>{{ strftime("%B %Y", strtotime("{$data["cicilan"]->created_at} + $i month")) }}</td>
									<td class="text-center">
										<button class="btn btn-warning">Menunggu konfirmasi admin. . .</button>
									</td>
								</tr>
							@endfor
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection