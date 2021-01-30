@extends('layouts.app')

@section("content")
<div class="container">
	<h1 class="text-center">Jadwal pakan ternak</h1>

	<style>
		.table{
			margin: auto;
		}

		#table_table{
			margin: auto;
			width: 50%;
		}

		#paragraph{
			margin: auto;
			width: 70%;
		}
	</style>

	<br>
	<br>
	<div id="paragraph">
		<p>Untuk memastikan hewan-hewan yang dijual disini terawat, kami memberikan jadwal
		untuk memberi pakan hewan ternak kami. Kami memastikan bahwa hewan ternak kami
		memiliki variasi pakan yang dapat memenuhi pertumbuhan dan perkembangan hewan kami.</p>
	</div>
	<br>
	<br>
	<br>
	<div class="table">
		<table id="table_table">
			<tr>
				<th>Waktu</th>
				<th>Pakan</th>
			</tr>
			<tr>
				<td>Pagi</td>
				<td>Campuran Rumput Gajah, sisa Kacang-kacangan dan Konsentrat Tepung Ikan</td>
			</tr>
			<tr>
				<td>Siang</td>
				<td>Campuran Rami, Tepung daging, Tepung bulu dan pakan Fermentasi</td>
			</tr>
			<tr>
				<td>Malam</td>
				<td>Campuran Rumput Kolonjono, Rumput Raja, Konsentrat pengolahan susu dan Konsentrat Kedelai</td>
			</tr>
		</table>
	</div>
</div>
@endsection