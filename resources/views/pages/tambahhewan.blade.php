@extends('layouts.app')

@section('content')
<div class="container">
	<h1 class="text-center">Tambah hewan</h1>
	@include('layouts.messages')
	<a class="btn btn-primary" href="{{ url("/hewan") }}">Kembali</a>

	<div class="my-2">
		{!! Form::open(["action" => "HewanController@store", "method" => "POST", "files" => true]) !!}
		<div class="row">
			<div class="col-4">
				<div class="form-group">
					{!! Form::label("gambarhewan[]", "Upload gambar") !!}
					{!! Form::file("gambarhewan[]", ["multiple" => "multiple"]) !!}
				</div>
			</div>
			<div class="col-8">
				
				<div class="form-group">
					{!! Form::label("nama", "Nama hewan") !!}
					{!! Form::text("nama", "", ["class" => "form-control"]) !!}
				</div>

				<div class="form-group">
					{!! Form::label("deskripsi", "Deskripsi hewan") !!}
					{!! Form::textarea("deskripsi", "", ["class" => "form-control"]) !!}
				</div>

				<div class="form-group">
					{!! Form::label("harga", "Harga hewan") !!}
					{!! Form::text("harga", "", ["class" => "form-control"]) !!}
				</div>
			</div>
		</div>
		{!! Form::submit("Selesai", ["class" => "btn btn-primary"]) !!}
		{!! Form::close() !!}
	</div>
</div>
<script src="{{ asset("js/ckeditor.js") }}"></script>
<script>
	ClassicEditor.create(document.querySelector("#deskripsi")).catch(error => {console.error(error);});
</script>
@endsection