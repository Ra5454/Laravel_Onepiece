@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('Habilidades')}}" method="post" enctype="multipart/form-data">
@csrf
@include('Habilidades.form',['modo'=>'Crear']);



</form>
</div>
@endsection