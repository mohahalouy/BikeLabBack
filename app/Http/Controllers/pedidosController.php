<?php

namespace App\Http\Controllers;

use App\Models\equipamientos;
use App\Models\modelos;
use App\Models\pedidos;
use Illuminate\Http\Request;

class pedidosController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savePurchase(Request $request)
    {
        $pedido = new pedidos();
        $pedido->idUser = $request->input('idUser');
        $pedido->order = $request->input('order');
        $pedido->order_status = $request->input('order_status');
        $pedido->order_date = $request->input('order_date');
        $pedido->order_shipping_type = $request->input('order_shipping_type');
        $pedido->nombre = $request->input('nombre');
        $pedido->direccion = $request->input('direccion');
        $pedido->ciudad = $request->input('ciudad');
        $pedido->totalCesta = $request->input('totalCesta');

        $pedido->save();

        return response($request);
    }

    public function FindOrders(Request $request)
    {
        $pedidos = pedidos::where('idUser', $request->input('idUser'))->get();

        return $pedidos;
    }

    public function index()
    {
        $pedidos = new pedidos();

        return $pedidos->all();
    }

    public function FindOrder(Request $request)
    {
        $pedidos = pedidos::where('id', $request->input('id'))->get();

        return $pedidos->all();
    }

    public function FindItems(Request $request)
    {
        $arrayGeneral=[];

        foreach ($request->all() as $valor) {
            if ($valor['tipoArticulo'] === 'equipamiento') {
                $equipamiento = equipamientos::find($valor['id']);
                $equipamiento["tipoCesta"] = $valor['tipoArticulo'];
                array_push($arrayGeneral, $equipamiento);
            }else if ($valor['tipoArticulo'] === 'modelos') {
                $modelo = modelos::find($valor['id']);
                $modelo["tipoCesta"] = $valor['tipoArticulo'];
                array_push($arrayGeneral, $modelo);
            }
        }

        return $arrayGeneral;
    }

    public function actualizarPedido(Request $request){
        pedidos::where('id', $request->input('id'))->update([
            'order' => $request->input('order'),
            'order_status' => $request->input('order_status'),
            'order_date' => $request->input('order_date'),
            'order_shipping_type' => $request->input('order_shipping_type'),
            'nombre' => $request->input('nombre'),
            'direccion' => $request->input('direccion'),
            'ciudad' => $request->input('ciudad'),
            'totalCesta' => $request->input('totalCesta'),
        ]);
    }
}
