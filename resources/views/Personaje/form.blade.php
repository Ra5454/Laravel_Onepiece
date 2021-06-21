
<h1>{{$modo}} Personaje</h1>
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>

@endif



<div class="form-group">

<label for="Nombre">Nombre</label>
<input type="text" class="form-control"name="Nombre" value="{{isset($personaje->Nombre)?$personaje->Nombre:old('Nombre')}}"id="Nombre">

</div>


<div class="form-group">
<label for="Edad">Edad</label>
<input type="text" name="Edad" class="form-control" value="{{isset($personaje->Edad)?$personaje->Edad:old('Edad')}}"id="Edad">

</div>

<div class="form-group">
<label for="Alias">Alias</label>
<input type="text" name="Alias" class="form-control"value="{{isset($personaje->Alias)?$personaje->Alias:old('Alias')}}"id="Alias">

</div>

<div class="form-group">
<label for="Tripulacion">Tripulacion</label>
<input type="text" name="Tripulacion" class="form-control"value="{{isset($personaje->Tripulacion)?$personaje->Tripulacion:old('Tripulacion')}}"id="Tripulacion">

</div>

<div class="form-group">
<label for="Foto"></label>
@if(isset($personaje->Foto))
<img class="img-thumbnail img-fluid"src="{{asset('storage').'/'.$personaje->Foto}}" width="100"alt="">
@endif
<input type="file" name="Foto"  class="form-control"value="" id="Foto">

</div>

<input type="submit" class="btn btn-success" value="{{$modo}} datos">
<a class="btn btn-primary"href="{{url('Personaje/')}}">Regresar</a>