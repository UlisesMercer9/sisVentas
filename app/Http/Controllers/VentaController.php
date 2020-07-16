<?php

namespace Dulceria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Dulceria\Http\Controllers\Controller;
use Dulceria\Persona;
use Dulceria\Venta;
use Dulceria\Articulo;
use Dulceria\DetalleVenta;
use Carbon\Carbon;
use DB;
use Response;
use Session;
use Redirect;
use Exception;

use Fpdf;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $ventas=DB::table('ventas as v')
            ->join('personas as p','v.cliente_id','=','p.id')
            ->join('detalle_ventas as dv','v.id','=','dv.venta_id')
            ->select('v.id','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado','v.total_venta')
            ->where('v.num_comprobante','LIKE','%'.$query.'%')
            ->orderBY('v.id','desc')
            ->groupBy('v.id','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado','v.total_venta')
            ->simplePaginate(9);
            return view('venta.index',["ventas"=>$ventas,"searchText"=>$query]);
        }

     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas= Persona::where('tipo_persona','=','Cliente')->pluck('nombre','id');
              
        $articulos = DB::table('articulos as art')
            ->join('detalle_ingresos as di','art.id','=','di.articulo_id')
            ->select(DB::raw('CONCAT(art.nombre) AS articulo'),'art.id','art.stock',DB::raw('avg(di.precio_venta) as precio_promedio'))
            ->where('art.estado','=','Activo')
            ->where('art.stock','>','0')
            ->groupBy('articulo','art.id','art.stock')
            ->get();

        return view('venta.create',["personas"=>$personas, "articulos"=>$articulos]);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $venta = new Venta;
            $venta->cliente_id = $request->get('cliente_id');
            $venta->tipo_comprobante = $request->get('tipo_comprobante');
            $venta->serie_comprobante = $request->get('serie_comprobante');
            $venta->num_comprobante = $request->get('num_comprobante');
            $venta->total_venta = $request->get('total_venta');

            $mytime = Carbon::now('America/Mexico_City');
            $venta->fecha_hora = $mytime->toDateTimeString();
            $venta->estado='A';
            $venta->save();

            $articulo_id = $request->get('articulo_id');
            $cantidad = $request->get('cantidad');
            $descuento = $request->get('descuento');
            $precio_venta = $request->get('precio_venta');

            $cont = 0;

            while($cont < count($articulo_id)){
                
                $detalle = new DetalleVenta();
                $detalle->venta_id = $venta->id;
                $detalle->articulo_id = $articulo_id[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->descuento = $descuento[$cont];
                $detalle->precio_venta = $precio_venta[$cont];
                $detalle->save();
                $cont = $cont + 1; 
            }

            DB::commit();

        }catch(\Exception $e)
        {
          DB::rollback();
        }
        
        Session::flash('message','Haz registrado la venta satisfactoriamente');
        return redirect::to('/venta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta=DB::table('ventas as v')
            ->join('personas as p','v.cliente_id','=','p.id')
            ->join('detalle_ventas as dv','v.id','=','dv.venta_id')
            ->select('v.id','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado','v.total_venta')
            ->groupBy('v.id','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado','v.total_venta')
            ->where('v.id','=',$id)
            ->first();

        $detalles = DB::table('detalle_ventas as d')
             ->join('articulos as a','d.articulo_id','=','a.id')
             ->select('a.nombre as articulo','d.*')
             ->where('d.venta_id','=',$id)
             ->get();    
       
        return view("venta.show",["venta"=>$venta, "detalles"=>$detalles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Venta::find($id);
        $venta->Estado='C';
        $venta->update();
        return redirect::to('venta');
    }

    public function reporte(){
         //Obtenemos los registros
         $registros=DB::table('ventas as v')
            ->join('personas as p','v.cliente_id','=','p.id')
            ->join('detalle_ventas as dv','v.id','=','dv.venta_id')
            ->select('v.id','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado','v.total_venta')
            ->orderBy('v.id','desc')
            ->groupBy('v.id','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado','v.total_venta')
            ->get();

         //Ponemos la hoja Horizontal (L)
         $pdf = new Fpdf('L','mm','A4');
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Ventas"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190        
         $pdf::cell(35,8,utf8_decode("Fecha"),1,"","L",true);
         $pdf::cell(80,8,utf8_decode("Cliente"),1,"","L",true);
         $pdf::cell(45,8,utf8_decode("Comprobante"),1,"","L",true);
         $pdf::cell(25,8,utf8_decode("Total"),1,"","R",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);
         
         foreach ($registros as $reg)
         {
            $pdf::cell(35,8,utf8_decode($reg->fecha_hora),1,"","L",true);
            $pdf::cell(80,8,utf8_decode($reg->nombre),1,"","L",true);
            $pdf::cell(45,8,utf8_decode($reg->tipo_comprobante.': '.$reg->serie_comprobante.'-'.$reg->num_comprobante),1,"","L",true);
            $pdf::cell(25,8,utf8_decode($reg->total_venta),1,"","R",true);
            $pdf::Ln(); 
         }

         $pdf::Output();
         exit;
    }

     public function reportec($id){
         //Obtengo los datos
        $venta=DB::table('ventas as v')
            ->join('personas as p','v.cliente_id','=','p.id')
            ->join('detalle_ventas as dv','v.id','=','dv.venta_id')
            ->select('v.id','v.fecha_hora','p.nombre','p.direccion','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado','v.total_venta')
            ->groupBy('v.id','v.fecha_hora','p.nombre','p.direccion','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.estado','v.total_venta')
            ->where('v.id','=',$id)
            ->first();

        $detalles = DB::table('detalle_ventas as d')
             ->join('articulos as a','d.articulo_id','=','a.id')
             ->select('a.nombre as articulo','d.*')
             ->where('d.venta_id','=',$id)
             ->get(); 


        $pdf = new Fpdf();
        $pdf::AddPage();
        $pdf::SetFont('Arial','B',14);
        //Inicio con el reporte
        $pdf::SetXY(170,20);
        $pdf::Cell(0,0,utf8_decode($venta->tipo_comprobante));

        $pdf::SetFont('Arial','B',14);
        //Inicio con el reporte
        $pdf::SetXY(170,40);
        $pdf::Cell(0,0,utf8_decode($venta->serie_comprobante."-".$venta->num_comprobante));

        $pdf::SetFont('Arial','B',10);
        $pdf::SetXY(35,60);
        $pdf::Cell(0,0,utf8_decode($venta->nombre));
        $pdf::SetXY(35,69);
        $pdf::Cell(0,0,utf8_decode($venta->direccion));
        //***Parte de la derecha
        $pdf::SetXY(180,60);
        $pdf::SetXY(180,69);
        $pdf::Cell(0,0,substr($venta->fecha_hora,0,10));
        $total=0;

        //Mostramos los detalles
        $y=89;
        foreach($detalles as $det){
            $pdf::SetXY(20,$y);
            $pdf::MultiCell(10,0,$det->cantidad);

            $pdf::SetXY(32,$y);
            $pdf::MultiCell(120,0,utf8_decode($det->articulo));

            $pdf::SetXY(162,$y);
            $pdf::MultiCell(25,0,$det->precio_venta-$det->descuento);

            $pdf::SetXY(187,$y);
            $pdf::MultiCell(25,0,sprintf("%0.2F",(($det->precio_venta-$det->descuento)*$det->cantidad)));

            $total=$total+($det->precio_venta*$det->cantidad);
            $y=$y+7;
        }

        $pdf::SetXY(187,130);
        $pdf::MultiCell(20,0,"".sprintf("%0.2F", $venta->total_venta));

        $pdf::Output();
        exit;
    }
}
