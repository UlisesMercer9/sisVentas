<?php

namespace Dulceria\Http\Controllers;

use Illuminate\Http\Request;
use Dulceria\Http\Controllers\Controller;
use Dulceria\Categoria;
use Dulceria\Articulo;
use DB;
use Session;
use Redirect;

use Fpdf;

class ArticuloController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
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
            $articulos=DB::table('articulos as a')
            ->join('categorias as c','a.categorias_id','=','c.id')
            ->select('a.*','c.nombre as categoria')
            ->where('estado','=','Activo')
            ->where('a.nombre','LIKE','%'.$query.'%')
            ->orWhere('a.codigo','LIKE','%'.$query.'%')
            ->orWhere('c.nombre','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->simplePaginate(9);

        return view('articulos.index',["articulos"=>$articulos,'searchText'=>$query]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::where('condicion','=','1')->pluck('nombre','id');
        return view('articulos.create',compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulo = new Articulo;
        $articulo->codigo = $request->get('codigo');
        $articulo->nombre = $request->get('nombre');
        $articulo->stock = $request->get('stock');
        $articulo->categorias_id = $request->get('categorias_id');
        $articulo->estado = 'Activo';
        $articulo->save();

          Session::flash('message','Haz agreado un nuevo articulo satisfactoriamente');
        return redirect::to('/articulos');
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
        $articulo = Articulo::find($id);
        $categoria = Categoria::where('condicion','=','1')->pluck('nombre','id');
        return view('articulos.edit',compact('categoria'),['articulo' => $articulo]);
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
        $articulo = Articulo::find($id);
        $articulo->codigo = $request->get('codigo');
        $articulo->nombre = $request->get('nombre');
        $articulo->stock = $request->get('stock');
        $articulo->categorias_id = $request->get('categorias_id');
        $articulo->estado = 'Activo';
        $articulo->update();

          Session::flash('message','Haz actualizado un nuevo articulo satisfactoriamente');
        return redirect::to('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $articulo->estado ='Inactivo';
        $articulo->update();

         Session::flash('message','Haz eliminado el articulo satisfactoriamente');
        return redirect::to('/articulos');
    }

    public function reporte(){
         //Obtenemos los registros
         $registros=DB::table('articulos as a')
            ->join('categorias as c','a.categorias_id','=','c.id')
            ->select('a.*','c.nombre as categoria')
            ->orderBy('a.nombre','asc')
            ->get();

         $pdf = new Fpdf();
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Artículos"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190        
         $pdf::cell(30,8,utf8_decode("Código"),1,"","L",true);
         $pdf::cell(80,8,utf8_decode("Nombre"),1,"","L",true);
         $pdf::cell(65,8,utf8_decode("Categoría"),1,"","L",true);
         $pdf::cell(15,8,utf8_decode("Stock"),1,"","L",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);
         
         foreach ($registros as $reg)
         {
            $pdf::cell(30,6,utf8_decode($reg->codigo),1,"","L",true);
            $pdf::cell(80,6,utf8_decode($reg->nombre),1,"","L",true);
            $pdf::cell(65,6,utf8_decode($reg->categoria),1,"","L",true);
            $pdf::cell(15,6,utf8_decode($reg->stock),1,"","L",true);
            $pdf::Ln(); 
         }

         $pdf::Output();
         exit;
    }
}
