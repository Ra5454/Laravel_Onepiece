<?php

namespace App\Http\Controllers;

use App\Models\personaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['Personaje']=personaje::paginate(5);
        return view('Personaje.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Personaje.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Edad'=>'required|string|max:100',
            'Alias'=>'required|string|max:100',
            'Tripulacion'=>'required|string|max:100',
            'Foto'=>'required|max:10000|mimes:jpeg.png,jpg',
        ];
        $mensaje=['required'=>'El :attribute es requerido',
                  'Foto.required'=>'La foto requerida'  
    
    ];
    $this->validate($request, $campos, $mensaje);


     $datosPersonaje= request()->except('_token');

     if($request->hasFile('Foto')){
         $datosPersonaje['Foto']=$request->file('Foto')->store('uploads','public');
     }




     personaje::insert($datosPersonaje);
     //return response()->json($datosPersonaje);
     return redirect('Personaje')->with('mensaje','Personaje agregado con éxito');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\personaje  $personaje
     * @return \Illuminate\Http\Response
     */
    public function show(personaje $personaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\personaje  $personaje
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $personaje=personaje::findOrFail($id);
        return view('Personaje.edit',compact('personaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\personaje  $personaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Edad'=>'required|string|max:100',
            'Alias'=>'required|string|max:100',
            'Tripulacion'=>'required|string|max:100',
         
        ];
        $mensaje=['required'=>'El :attribute es requerido',
                  
    
    ];
    if($request->hasFile('Foto')){

        $campos=['Foto'=>'required|max:10000|mimes:jpeg.png,jpg'];
        $mensaje=[ 'Foto.required'=>'La foto requerida' ];

    }
    $this->validate($request, $campos, $mensaje);

        //
        $datosPersonaje= request()->except(['_token','_method']);

        $personaje=personaje::findOrFail($id);
        Storage::delete(['public/'.$personaje->Foto]);
        if($request->hasFile('Foto')){
            $datosPersonaje['Foto']=$request->file('Foto')->store('uploads','public');

        }

        personaje::where('id','=',$id)->update($datosPersonaje);
        
        $personaje=personaje::findOrFail($id);
        //return view('Personaje.edit',compact('personaje'));
        return redirect('Personaje')->with('mensaje','Personaje Modificado');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\personaje  $personaje
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $personaje=personaje::findOrFail($id);
        
        if(Storage::delete('public/'.$personaje->Foto)){
            personaje::destroy($id);

        }


      
        return redirect('Personaje')->with('mensaje','Personaje Borrado');
    }
}
