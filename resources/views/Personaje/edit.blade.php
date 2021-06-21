@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{url('/Personaje/'.$personaje->id)}}" method="post"enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
@include('Personaje.form',['modo'=>'Editar']);
</form>
</div>
@endsection