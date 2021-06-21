@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{url('/Habilidades/'.$Habilidades->id)}}" method="post"enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
@include('Habilidades.form',['modo'=>'Editar']);
</form>
</div>
@endsection