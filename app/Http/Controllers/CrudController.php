<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::paginate(15);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required|image',
        ]);
        $imagenes = $request->image->store('/public/img/product');
        $url = Storage::url($imagenes);
        $producto = Product::create($request->all());
        $producto->image = $url;
        $producto->save();
        
        session()->flash('message', 'Producto agregado exitosamente.');

        return redirect()->route('productos.show', $producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $producto)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'image'
        ]);
        
        $img = $producto->image;

        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->category = $request->category;

        if($request->image) {
            $imagenes = $request->image->store('/public/img/product');
            $url = Storage::url($imagenes);
            $producto->image = $url;
        }

        else {
            $producto->image = $img;
        }

        $producto->save();
        session()->flash('message', 'Producto editado exitosamente.');
        return redirect()->route('productos.show', $producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $producto)
    {
        $producto->delete();
        session()->flash('message');
        return redirect()->route('productos.index');
    }

    public function restore(Request $id)
    {
        Product::onlyTrashed()->whereIn('id', $id)->restore();
  
        return redirect()->back();
    }

    public function downloadPdf()
    {
        $productos = Product::all();

        view()->share('productos.download',$productos);

        $pdf = PDF::setOptions(['isHtmlSparserEnabled' => true, 'isRemoteEnabled' => true])->loadView('productos.download', ['users' => $productos]);

        return $pdf->download('Lista de productos.pdf');
    }
}
