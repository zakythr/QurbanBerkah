@extends('layouts.app')

@section('content')

<div class="container">
<table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Cicilan Ke</th>
            <th scope="col">Jumlah Angsuran</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>1</td>
            <td>1250000</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>2</td>
            <td>1250000</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>3</td>
            <td>1250000</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>4</td>
            <td>1250000</td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>5</td>
            <td>1250000</td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>6</td>
            <td>1250000</td>
          </tr>
          <tr>
            <th scope="row">7</th>
            <td>7</td>
            <td>1250000</td>
          </tr>
          <tr>
            <th scope="row">8</th>
            <td>8</td>
            <td>1250000</td>
          </tr>
          <tr>
            <th scope="row">9</th>
            <td>9</td>
            <td>1250000</td>
          </tr>
          <tr>
            <th scope="row">10</th>
            <td>10</td>
            <td>1250000</td>
          </tr>
          <tr>
            <th scope="row">11</th>
            <td>11</td>
            <td>1250000</td>
          </tr>
          <tr>
            <th scope="row">12</th>
            <td>12</td>
            <td>1250000</td>
          </tr>
        </tbody>
      </table>
      @if (Auth::user() && Auth::user()->admin!=1)
			{!! Form::open(["action" => ["cicilanController@beli", "sapi", 4], "method" => "GET"]) !!}
			{!! Form::submit("Beli", ["class" => "btn btn-primary"]) !!}
			{!! Form::close() !!}
      @endif
</div>
@endsection