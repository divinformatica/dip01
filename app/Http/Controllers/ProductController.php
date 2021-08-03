<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller

/**
 * * Controlador encargado del crud y retorno de consultas en la BD sobre la entidad elemento
 * como asi tambien sus entidades relacionadas

 *@method Products store(Request $id)
 *@method Products update(Request $product, int $id)
 *@method Products void destroy (int $id)
 */

{
    /**
     * Mostrar una lista del recurso.
     * Metodo llamado a traves de una peticion que retorna la vista products.index

     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();

        return view('products.index', compact('products'));
    }

    /**
     * Metodo llamado a traves de una peticion que retorna la vista products.create 
     * 
     *  @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Metodo llamado a traves de una peticion que persiste la entidad (Modelo) Product y la retorna 
     * 
     *  @return response()-> con msj de "Producto guardado!"
     */


    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return redirect()->route('products.edit', $product->id)
            ->with('info', 'Producto guardado!!');
    }

    /**
     * Metodo llamado a traves de una peticion que retorna la vista show  
     *
     * @param  \App\Product  $product
     *  @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Metodo llamado a traves de una peticion que retorna la vista show  
     *
     * @param  \App\Product  $product
     *  @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */


    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Actualizar el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('products.edit', $product->id)
            ->with('info', 'Producto actualizado!!');
    }


    /**
     * Eliminar el recurso especificado del almacenamiento.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('info', 'Producto eliminado');
    }
}
