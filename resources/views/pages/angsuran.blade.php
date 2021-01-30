@extends('layouts.app')

@section('content')
<div class="container">
	<h1 class="text-center">Program Angsuran</h1>

	<style>
		.table{
			margin: auto;
		}

		#table_table{
			margin: auto;
			width: 70%;
		}

		#paragraph{
			margin: auto;
			width: 80%;
		}
	</style>

	<br>
	<br>
	<div id="paragraph">
		<p>Program Angsuran QurbanBerkah adalah sebuah program untuk memudahkan pembeli dari golongan
		menengah kebawah untuk membeli hewan qurban. Cara kerja program ini adalah calon pembeli diwajibkan
		melakukan sejumlah angsuran dalam jangka waktu yang telah dipilih. Jika ditengah perjalanan pengangsuran
		terjadi pembatalan angsuran maka uang angsuran akan dikembalikan dengan ketentuan yang telah disepakati.</p>
	</div>
	<div class="row">
		<div class="col-6">
			<div class="card h-75">
				<div class="card-body h-75">
						<img class="card-img-top h-100" src="{{ asset("hewan_cicil/sapi.jpg") }}" alt="sapi">
						<br><br><br>
						<a class="text-white btn btn-primary" href="{{url("angsuran/cicilan4")}}">12x Angsuran</a>
						<a class="text-white btn btn-primary" href="{{url("angsuran/cicilan5")}}">24x Angsuran</a>
						<a class="text-white btn btn-primary" href="{{url("angsuran/cicilan6")}}">48x Angsuran</a>
				</div>
				
			</div>
		</div>
		<div class="col-6">
				<div class="card h-75">
					<div class="card-body h-100">
							<img class="card-img-top h-100" src="{{ asset("hewan_cicil/kambing.jpg") }}" alt="sapi">
							<br><br><br>
							<a class="text-white btn btn-primary" href="{{url("angsuran/cicilan1")}}">6x Angsuran</a>
							<a class="text-white btn btn-primary" href="{{url("angsuran/cicilan2")}}">12x Angsuran</a>
							<a class="text-white btn btn-primary" href="{{url("angsuran/cicilan3")}}">20x Angsuran</a>
					</div>
			</div>
	</div>

</div>

@endsection
