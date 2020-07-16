<?php

namespace Dulceria\Http\Controllers;

use Illuminate\Http\Request;
use Dulceria\Http\Controllers\Controller;
use Dulceria\Persona;
use DB;
use Session;
use Redirect;


use Fpdf;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if($request)
        {
            $query=trim($request->get('searchText'));
            $personas=DB::table('personas')
            ->where('nombre','LIKE','%'.$query.'%')
            ->where('tipo_persona','=','Cliente')
            ->orderBy('id','desc')
            ->simplePaginate(9);

        return view('clientes.index',["personas"=>$personas,'searchText'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona;
        $persona->tipo_persona = 'Cliente';
        $persona->nombre = $request->get('nombre');
        $persona->direccion = $request->get('direccion');
        $persona->telefono = $request->get('telefono');
        $persona->email = $request->get('email');
        $persona->save();

        Session::flash('message','Haz agreado un nuevo cliente satisfactoriamente');
        return redirect::to('/clientes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::find($id);
        return view('clientes.edit',['persona' => $persona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);
        $persona->nombre = $request->get('nombre');
        $persona->direccion = $request->get('direccion');
        $persona->telefono = $request->get('telefono');
        $persona->email = $request->get('email');
        $persona->update();

        Session::flash('message','Haz actualizado los datos del cliente satisfactoriamente');
        return redirect::to('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->tipo_persona = 'Inactivo';
        $persona->update();

        Session::flash('message','Haz eliminado los datos del cliente satisfactoriamente');
        return redirect::to('/clientes');
    }

     public function reporte(){
         //Obtenemos los registros
         $registros=DB::table('personas')
            ->where ('tipo_persona','=','Cliente')
            ->orderBy('id','desc')
            ->get();

         $pdf = new Fpdf();
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Clientes"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190        
         $pdf::cell(80,8,utf8_decode("Nombre"),1,"","L",true);
         $pdf::cell(35,8,utf8_decode("Dirección"),1,"","L",true);
         $pdf::cell(50,8,utf8_decode("Email"),1,"","L",true);
         $pdf::cell(25,8,utf8_decode("Teléfono"),1,"","L",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);
         
         foreach ($registros as $reg)
         {
            $pdf::cell(80,6,utf8_decode($reg->nombre),1,"","L",true);
            $pdf::cell(35,6,utf8_decode($reg->direccion),1,"","L",true);
            $pdf::cell(50,6,utf8_decode($reg->email),1,"","L",true);
            $pdf::cell(25,6,utf8_decode($reg->telefono),1,"","L",true);
            $pdf::Ln(); 
         }

         $pdf::Output();
         exit;
    }
}
