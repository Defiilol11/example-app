<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrimerController;
use App\Http\Controllers\ContactoController;
Route::get('/contacto', [ContactoController::class, 'index']);
Route::post('/contacto', [ContactoController::class, 'send']);
Route::get('/contactado', [ContactoController::class, 'contacted'])->name('contactado');
Route::get('/ver-contactos', [ContactController::class, 'index'])->name('contactos.index');

Route::get('/mi-primer-controller/{texto}', [PrimerController::class, 'mostrarTexto']);
Route::get('/', function () {
    return view('welcomeshop');
});
use App\Models\Marca;
Route::get('/ejemplo-relaciones', function(){
    echo '<pre>';
    
    echo '############# Marca ########################################'.PHP_EOL;
    $marca = Marca::find(1);
    print_r($marca->toArray());


    echo '############# Modelos a partir de una Marca ################'.PHP_EOL;
    $modelos = $marca->modelos;
    print_r($modelos->toArray());


    echo '############# Un Modelo especifico a partir de una marca ################'.PHP_EOL;
    $corola = $marca->modelos()->where('nombre','Corolla')->first(); //get para obtener varios
    print_r($corola->toArray());


    echo '############# La marca a partir de un modelo ###############'.PHP_EOL;
    $marca2 = $modelos[0]->marca; //tambien $corola->marca   funciona
    print_r($marca2->toArray());


    echo '############# Una marca que traiga embebidos los modelos ###############'.PHP_EOL;
    $marca3 = Marca::where('id',1)->with('modelos')->first();
    print_r($marca3->toArray());


    echo '</pre>';
});

Route::get('/carrito/{id}', function ($id) {

    // simulo algunos precios para que se vea mejor el ejemplo 
    $precios = [
        1 => 100.50, 
        2 => 59.99,  
        3 => 25.75  
    ];

    // se busca el carrito activo del usuario por id
    $carrito = DB::table('detalle_carrito')
        ->join('producto', 'detalle_carrito.id_producto', '=', 'producto.id_producto')
        ->where('detalle_carrito.id_carrito', '=', $id)
        ->get();

    // calculo de el total del carrito con los precios simulados para algunos productos
    $total = $carrito->sum(function($detalle) use ($precios) {
        $precio = $precios[$detalle->id_producto] ?? 0;  // 0 si no se encuentra el producto en el array
        return $detalle->cantidad * $precio;
    });

    // mostrar los productos en el carrito
    $productos = $carrito->map(function($detalle) use ($precios) {
        return [
            'id_producto' => $detalle->id_producto,
            'nombre' => $detalle->nombre_producto,
            'cantidad' => $detalle->cantidad,
            'precio_unitario' => $precios[$detalle->id_producto] ?? 0,
            'subtotal' => $detalle->cantidad * ($precios[$detalle->id_producto] ?? 0)
        ];
    });

    // se muestra en formato de json para que se vea un poco ordenado
    return response()->json([
        'carrito_id' => $id,
        'productos' => $productos,
        'total' => $total
    ]);
});

