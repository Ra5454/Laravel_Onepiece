@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

@endif



<a href="{{url('Personaje/create')}}" class="btn btn-success">Registrar nuevo Personaje</a>
<br>
<br>
<table class="table table-dark">
   
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Alias</th>
            <th>Tripulación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($Personaje as $personaje)
        <tr>
            <td>{{$personaje->id}}</td>
            
            <td>
            <img class="img-thumbnail img-fluid"src="{{asset('storage').'/'.$personaje->Foto}}" width="100"alt="">
            </td>


            <td>{{$personaje->Nombre}}</td>
            <td>{{$personaje->Edad}}</td>
            <td>{{$personaje->Alias}}</td>
            <td>{{$personaje->Tripulacion}}</td>
            <td>
            <a href="{{url('/Personaje/'.$personaje->id.'/edit')}}" class="btn btn-warning">
            
            Editar
            
            </a>
            |
            
            <form action="{{url('/Personaje/'.$personaje->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
            <input class="btn btn-danger"type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
             </form>

        </td>
        </tr>
        @endforeach
    </tbody>

</table>

{!!$Personaje->links()!!}

</div>
@endsection