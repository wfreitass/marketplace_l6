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

Route::get('/', function () {
    $helloWorld = "Hello World";
    // return view('welcome',["helloWorld"=>$helloWorld]); usa qualquer umas das formas
    return view('welcome',compact("helloWorld"));
});

Route::get("/model", function(){
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
    $user = \App\User::find(42);
    $user->update([
        'name'=>'nome atualizado com sucesso'
    ]); //True ou False
    // dd($user);

    return \App\User::all(); //->retorna todos os usuários;
});
