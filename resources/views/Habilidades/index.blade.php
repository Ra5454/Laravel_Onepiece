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

<a href="{{url('Habilidades/create')}}" class="btn btn-success">Registrar nueva Habilidad</a>
<br>
<br>
<table  class="table table-dark" >

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Personaje</th>
            <th>Fruta</th>
            <th>Tipo De Fruta</th>
            <th>Haki</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $Habilidades as $Habilidades )
        <tr>
            <td>{{ $Habilidades->id }}</td>
            <td>
            <img class= "img-fluid rounded" src="{{ asset('storage').'/'.$Habilidades->Foto }}" width="100" alt="">
            </td>
            <td>{{ $Habilidades->Nombre }}</td>
            <td>{{ $Habilidades->Personaje }}</td>
            <td>{{ $Habilidades->Fruta }}</td>
            <td>{{ $Habilidades->TipoDeFruta }}</td>
            <td>{{ $Habilidades->Haki }}</td>
            <td> 
            
            <a href="{{url('/Habilidades/'.$Habilidades->id.'/edit')}}" class="btn btn-warning">
            
            Editar
            
            </a>
            |
            
            <form action="{{url('/Habilidades/'.$Habilidades->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
            <input class="btn btn-danger"type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
             </form>

        </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection