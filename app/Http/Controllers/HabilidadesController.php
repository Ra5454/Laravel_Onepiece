<?php

namespace App\Http\Controllers;

use App\Models\Habilidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class HabilidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['Habilidades']=Habilidades::paginate(5);
        return view('Habilidades.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Habilidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Personaje'=>'required|string|max:100',
            'Fruta'=>'required|string|max:100',
            'TipoDeFruta'=>'required|string|max:100',
            'Haki'=>'required|string|max:100',
            'Foto'=>'required|max:10000|mimes:jpeg.png,jpg',
        ];
        $mensaje=['required'=>'El :attribute es requerido',
                  'Foto.required'=>'La foto requerida'  
    
    ];
    $this->validate($request, $campos, $mensaje);


     $datosHabilidades= request()->except('_token');

     if($request->hasFile('Foto')){
         $datosHabilidades['Foto']=$request->file('Foto')->store('uploads','public');
     }
     Habilidades::insert($datosHabilidades);
     //return response()->json($datosPersonaje);
     return redirect('Habilidades')->with('mensaje','Habilidad agregado con éxito');

        //
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Habilidades  $habilidades
     * @return \Illuminate\Http\Response
     */
    public function show($datosHabilidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Habilidades  $habilidades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Habilidades=Habilidades::findOrFail($id);
        return view('Habilidades.edit',compact('Habilidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Habilidades  $habilidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Personaje'=>'required|string|max:100',
            'Fruta'=>'required|string|max:100',
            'TipoDeFruta'=>'required|string|max:100',
            'Haki'=>'required|string|max:100',
         
        ];
        $mensaje=['required'=>'El :attribute es requerido',
                  
    
    ];
    if($request->hasFile('Foto')){

        $campos=['Foto'=>'required|max:10000|mimes:jpeg.png,jpg'];
        $mensaje=[ 'Foto.required'=>'La foto requerida' ];

    }
    $this->validate($request, $campos, $mensaje);

        //
        $datosHabilidades= request()->except(['_token','_method']);

        $Habilidades=Habilidades::findOrFail($id);
        Storage::delete(['public/'.$Habilidades->Foto]);
        if($request->hasFile('Foto')){
            $datosHabilidades['Foto']=$request->file('Foto')->store('uploads','public');

        }

        Habilidades::where('id','=',$id)->update($datosHabilidades);
        
        $Habilidades=Habilidades::findOrFail($id);
        //return view('Personaje.edit',compact('personaje'));
        return redirect('Habilidades')->with('mensaje','Habilidad Modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Habilidades  $habilidades
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Habilidades=Habilidades::findOrFail($id);
        
        if(Storage::delete('public/'.$Habilidades->Foto)){
            Habilidades::destroy($id);

        }


      
        return redirect('Habilidades')->with('mensaje','Habilidad Borrado');
        //
    }
}
