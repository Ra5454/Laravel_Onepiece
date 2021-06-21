
<h1>{{$modo}} Habilidades</h1>
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
<input type="text" class="form-control"name="Nombre" value="{{isset($Habilidades->Nombre)?$Habilidades->Nombre:old('Nombre')}}"id="Nombre">

</div>


<div class="form-group">
<label for="Edad">Personaje</label>
<input type="text" name="Personaje" class="form-control" value="{{isset($Habilidades->Personaje)?$Habilidades->Personaje:old('Personaje')}}"id="Personaje">

</div>

<div class="form-group">
<label for="Alias">Fruta</label>
<input type="text" name="Fruta" class="form-control"value="{{isset($Habilidades->Fruta)?$Habilidades->Fruta:old('Fruta')}}"id="Fruta">

</div>

<div class="form-group">
<label for="Tripulacion">TipoDeFruta</label>
<input type="text" name="TipoDeFruta" class="form-control"value="{{isset($Habilidades->TipoDeFruta)?$Habilidades->TipoDeFruta:old('TipoDeFruta')}}"id="TipoDeFruta">

</div>
<div class="form-group">
<label for="Tripulacion">Haki</label>
<input type="text" name="Haki" class="form-control"value="{{isset($Habilidades->Haki)?$Habilidades->Haki:old('Haki')}}"id="Haki">

</div>

<div class="form-group">
<label for="Foto"></label>
@if(isset($Habilidades->Foto))
<img class="img-thumbnail img-fluid"src="{{asset('storage').'/'.$Habilidades->Foto}}" width="100"alt="">
@endif
<input type="file" name="Foto"  class="form-control"value="" id="Foto">

</div>

<input type="submit" class="btn btn-success" value="{{$modo}} datos">
<a class="btn btn-primary"href="{{url('Habilidades/')}}">Regresar</a>