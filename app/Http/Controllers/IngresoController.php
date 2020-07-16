<?php

namespace Dulceria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Dulceria\Http\Controllers\Controller;
use Dulceria\Persona;
use Dulceria\Ingresos;
use Dulceria\Articulo;
use Dulceria\DetalleIngresos;
use Carbon\Carbon;
use DB;
use Response;
use Session;
use Redirect;
use Exception;

use Fpdf;

class IngresoController extends Controller
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
            $ingresos=DB::table('ingresos as i')
            ->join('personas as p','i.proveedor_id','=','p.id')
            ->join('detalle_ingresos as di','i.id','=','di.ingreso_id')
            ->select('i.id','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->where('i.num_comprobante','LIKE','%'.$query.'%')
            ->orderBY('i.id','desc')
            ->groupBy('i.id','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.estado')
            ->simplePaginate(9);
            return view('ingreso.index',["ingresos"=>$ingresos,"searchText"=>$query]);
        }
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas= Persona::where('tipo_persona','=','Proveedor')->pluck('nombre','id');
        //$personas=DB::table('personas')->where('tipo_persona','=','Proveedor')->get();
                //->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) AS articulo'),'art.id')
              
        $articulos = Articulo::where('estado','=','Activo')->pluck('nombre','id');

        return view('ingreso.create',["personas"=>$personas, "articulos"=>$articulos]);   
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
            $ingreso = new Ingresos;
            $ingreso->proveedor_id = $request->get('proveedor_id');
            $ingreso->tipo_comprobante = $request->get('tipo_comprobante');
            $ingreso->serie_comprobante = $request->get('serie_comprobante');
            $ingreso->num_comprobante = $request->get('num_comprobante');

            $mytime = Carbon::now('America/Mexico_City');
            $ingreso->fecha_hora = $mytime->toDateTimeString();
            $ingreso->estado='A';
            $ingreso->save();

            $articulo_id = $request->get('articulo_id');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compra');
            $precio_venta = $request->get('precio_venta');

            $cont = 0;

            while($cont < count($articulo_id)){
                
                $detalle = new DetalleIngresos();
                $detalle->ingreso_id = $ingreso->id;
                $detalle->articulo_id = $articulo_id[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio_compra = $precio_compra[$cont];
                $detalle->precio_venta = $precio_venta[$cont];
                $detalle->save();
                $cont = $cont + 1; 
            }

            DB::commit();

        }catch(\Exception $e)
        {
          DB::rollback();
        }
        
        Session::flash('message','Haz registrado la compra satisfactoriamente');
        return redirect::to('/ingreso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingreso=DB::table('ingresos as i')
            ->join('personas as p','i.proveedor_id','=','p.id')
            ->join('detalle_ingresos as di','i.id','=','di.ingreso_id')
            //->select('i.id','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->select('i.id','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->groupBy('i.id','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.estado')
            ->where('i.id','=',$id)
            ->first();

        $detalles = DB::table('detalle_ingresos as d')
             ->join('articulos as a','d.articulo_id','=','a.id')
             ->select('a.nombre as articulo','d.*')
             ->where('d.ingreso_id','=',$id)
             ->get();    
       
        return view("ingreso.show",["ingreso"=>$ingreso, "detalles"=>$detalles]);
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
        $ingreso = Ingresos::find($id);
        $ingreso->Estado='C';
        $ingreso->update();
        return redirect::to('ingreso');
    }

      public function reporte(){
         //Obtenemos los registros
         $registros=DB::table('ingresos as i')
            ->join('personas as p','i.proveedor_id','=','p.id')
            ->join('detalle_ingresos as di','i.id','=','di.ingreso_id')
            ->select('i.id','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->groupBy('i.id','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.estado')
            ->get();

         //Ponemos la hoja Horizontal (L)
         $pdf = new Fpdf('L','mm','A4');
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Compras"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190        
         $pdf::cell(35,8,utf8_decode("Fecha"),1,"","L",true);
         $pdf::cell(60,8,utf8_decode("Proveedor"),1,"","L",true);
         $pdf::cell(45,8,utf8_decode("Comprobante"),1,"","L",true);
         $pdf::cell(25,8,utf8_decode("Total"),1,"","R",true);
         $pdf::cell(20,8,utf8_decode("Estado"),1,"","R",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);
         
         foreach ($registros as $reg)
         {
            $pdf::cell(35,8,utf8_decode($reg->fecha_hora),1,"","L",true);
            $pdf::cell(60,8,utf8_decode($reg->nombre),1,"","L",true);
            $pdf::cell(45,8,utf8_decode($reg->tipo_comprobante.': '.$reg->serie_comprobante.'-'.$reg->num_comprobante),1,"","L",true);
            $pdf::cell(25,8,utf8_decode($reg->total),1,"","R",true);
            $pdf::cell(20,8,utf8_decode($reg->estado),1,"","R",true);
            $pdf::Ln(); 
         }

         $pdf::Output();
         exit;
    }

     public function reportec($id){
         //Obtengo los datos
        
     $ingreso=DB::table('ingresos as i')
            ->join('personas as p','i.proveedor_id','=','p.id')
            ->join('detalle_ingresos as di','i.id','=','di.ingreso_id')
            //->select('i.id','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->select('i.id','i.fecha_hora','p.nombre','p.direccion','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->groupBy('i.id','i.fecha_hora','p.nombre','p.direccion','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.estado')
            ->where('i.id','=',$id)
            ->first();

        $detalles = DB::table('detalle_ingresos as d')
             ->join('articulos as a','d.articulo_id','=','a.id')
             ->select('a.nombre as articulo','d.*')
             ->where('d.ingreso_id','=',$id)
             ->get();   


        $pdf = new Fpdf();
        $pdf::AddPage();
        $pdf::SetFont('Arial','B',14);
        //Inicio con el reporte
        $pdf::SetXY(170,20);
        $pdf::Cell(0,0,utf8_decode($ingreso->tipo_comprobante));

        $pdf::SetFont('Arial','B',14);
        //Inicio con el reporte
        $pdf::SetXY(170,40);
        $pdf::Cell(0,0,utf8_decode($ingreso->serie_comprobante."-".$ingreso->num_comprobante));

        $pdf::SetFont('Arial','B',10);
        $pdf::SetXY(35,60);
        $pdf::Cell(0,0,utf8_decode($ingreso->nombre));
        $pdf::SetXY(35,69);
        $pdf::Cell(0,0,utf8_decode($ingreso->direccion));
        //***Parte de la derecha
        $pdf::SetXY(180,60);
        $pdf::SetXY(180,69);
        $pdf::Cell(0,0,substr($ingreso->fecha_hora,0,10));
        $total=0;

        //Mostramos los detalles
        $y=89;
        foreach($detalles as $det){
            $pdf::SetXY(20,$y);
            $pdf::MultiCell(10,0,$det->cantidad);

            $pdf::SetXY(32,$y);
            $pdf::MultiCell(120,0,utf8_decode($det->articulo));

            $pdf::SetXY(162,$y);
            $pdf::MultiCell(25,0,$det->precio_compra);

            $pdf::SetXY(187,$y);
            $pdf::MultiCell(25,0,sprintf("%0.2F",($det->precio_compra*$det->cantidad)));

            $total=$total+($det->precio_compra*$det->cantidad);
            $y=$y+7;
        }

        $pdf::SetXY(187,153);
      
        $pdf::MultiCell(20,0,"".sprintf("%0.2F", $ingreso->total));

        $pdf::Output();
        exit;
    }
}
