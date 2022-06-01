<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Mail\ContactNotification;

// Controllers

Route::get('/contactar', [ContactController::class, 'create']);

Route::get('/contactos', [ContactController::class, 'index']);

Route::post('/contactar', [ContactController::class, 'store']);

//Route::get('/contactar', 'ContactController@index');

Route::get('/acerca', [AboutController::class, 'index']);

Route::get('/', [ArticleController::class, 'index'])->name ('index');
Route::get('/articulo', [ArticleController::class, 'index'])->name ('index');

Route::get('/articulo/{id}', [ArticleController::class, 'show']);


Route::get('/previoemail', function () {
    return new ContactNotification("Motivo", "david@aulab.com");
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/// Con blade
/*
Route::get('/', function () {

    $arts =  array (); /// cambiar a un array de corchetes, no con push
    array_push ($arts, array (1, 'Titulo artículo 1', 'Este sería el contenido de artículo 1 que no es muy largo'));
    array_push ($arts, array (2, 'Titulo artículo 2', 'Este sería el contenido de artículo 2 que es el siguiente'));
    array_push ($arts, array (3, 'Titulo artículo 3', 'Este sería el contenido de artículo 3 que es la suma de los dos anteriores'));
    array_push ($arts, array (5, 'Titulo artículo 5', 'Este sería el contenido de artículo 5 que sigue la numeración de Fibonacci'));
    array_push ($arts, array (8, 'Titulo artículo 8', 'Este sería el contenido de artículo 8 que ya es el último'));


    return view('plt.index', ['arts' => $arts] );
});
Route::get('/inicio', function () {
    $arts =  array ();
    array_push ($arts, array (1, 'Titulo artículo 1', 'Este sería el contenido de artículo 1 que no es muy largo'));
    array_push ($arts, array (2, 'Titulo artículo 2', 'Este sería el contenido de artículo 2 que es el siguiente'));
    array_push ($arts, array (3, 'Titulo artículo 3', 'Este sería el contenido de artículo 3 que es la suma de los dos anteriores'));
    array_push ($arts, array (5, 'Titulo artículo 5', 'Este sería el contenido de artículo 5 que sigue la numeración de Fibonacci'));
    array_push ($arts, array (8, 'Titulo artículo 8', 'Este sería el contenido de artículo 8 que ya es el último'));

    return view('plt.index', compact('arts'));
})->name ('listado');

Route::get('/articulo/{id}', function ($id) {
    return view('plt.article',
     ['id' => $id]);
});
Route::get('/contacto', function () {
    return view('plt.contact');
});

Route::get('/acerca', function () {
    return view('plt.about');
});

*/
