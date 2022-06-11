<?php

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

use App\Product;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route as FacadesRoute;

Route::get('/', function () {
    $helloWorld = "Hello World";
    // return view('welcome',["helloWorld"=>$helloWorld]); usa qualquer umas das formas
    return view('welcome', compact("helloWorld"));
})->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
        // Route::prefix('stores')->name('stores.')->group(function(){
        //     Route::get('/', 'StoreController@index')->name('index');
        //     Route::get('/create', 'StoreController@create')->name('create');
        //     Route::post('/store', 'StoreController@store')->name('store');
        //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        //     Route::post('/update/{store}', 'StoreController@update')->name('update');
        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
        // });
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');
        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
    });
});

//Route:get:
//Route:post:
//Route:put:
//Route:patch:
//Route:delete:
//Route:options:

Route::get("/model", function () {
    //$products = \App\Product::all(); //select * from products
    // $user = new \App\User();
    //Active Record
    // $user = \App\User::find(1);
    // $user->name = 'teste2';
    // $user->email = 'teste@gmail.com';
    // $user->password = bcrypt('12345678');
    // $user->save();

    // return \App\User::all(); //->retorna todos os usuários
    // return \App\User::find(3); // ->retorna o usuário com base no id
    // return \App\User::where('name', 'Maude Wunsch')->get();// -> retorna todos os resultados que satisfaça a condição
    // return \App\User::where('name', 'Maude Wunsch')->first(); // -> pega o primeiro resultado que satisfaça a condição
    // return \App\User::paginate(10); // -> Paginação de dados.

    //Mass Assignment - Atribuição em Massa.
    // $user = \App\User::create([
    //     'name' => 'Wiltter Freitas',
    //     'email' => 'wiltterfreitasw@gmail.com',
    //     'password' => bcrypt('wiltter123#')
    // ]);
    // dd($user);
    //Mass Update
    // $user = \App\User::find(25);
    // $user->update([
    //     'name' => 'nome atualizado com sucesso'
    // ]); //True ou False
    // dd($user);
    // return \App\User::all(); //->retorna todos os usuários;

    ### como faria para pegar a loja de um usuário. ###
    // $user = \App\User::find(4);
    // return $user->store; // Retorna o objeto único, se for Collection de dados(objetos)
    // return $user->store()->count();

    ### Pegar os produtos de uma loja ###
    // $loja = \App\Store::find(1);
    // return $loja->products;
    // return $loja->products()->count();
    // return $loja->products()->where('id', 1)->get();

    ### Pegar as Lojas de uma categoria ###
    // $categoria = \App\Category::find(1);
    // $categoria->products;

    ### Criar uma loja para um usuário ###
    // $user = \App\User::find(10);
    // $store = $user->store()->create([
    //     'name' => 'Loja teste',
    //     'description' => 'Loja Teste de produtos de informática',
    //     'mobile_phone' => 'xx-xxxxx-xxxx',
    //     'phone' => 'xx-xxxxx-xxxx',
    //     'slug' => 'loja-teste'
    // ]);

    ### Criar uma produto para uma loja ###
    // $store = \App\Store::find(41);
    // $product = $store->products()->create(
    //     [
    //         'name' => 'Notebook dell',
    //         'description' => 'CORE I5 10GB',
    //         'body' => 'Eu sou o corpo do texto',
    //         'price' => 2999.90,
    //         'slug' => 'notebook-dell',
    //     ]
    //     );
    ### Criar uma categoria ###
    // \App\Category::create([
    //     'name' => 'Games',
    //     'description' => null,
    //     'slug' => 'games',
    // ]);

    // \App\Category::create([
    //     'name' => 'Notebooks',
    //     'description' => null,
    //     'slug' => 'notebooks',
    // ]);

    // return \App\Category::all();
    ### Adicionar um produto para uma categoria ou vice-versa ###
    $product = \App\Product::find(40);
    // dd($product->categories()->attach([1]));
    // dd($product->categories()->detach([1]));
    // dd($product->categories()->sync([2]));
    return $product->categories;
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
