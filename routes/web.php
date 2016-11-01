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

Route::get('/', 'ChamadosController@index');

Route::get('usuarios','UsuariosController@index' );

Route::get('clientes/','ClientesController@index' );
Route::get('clientes/{cliente}/editar','ClientesController@editar' );
Route::patch('clientes/{cliente}','ClientesController@atualizar' );
Route::delete('clientes/{cliente}','ClientesController@deletar' );

Route::get('pedidos','PedidosController@index' );
Route::delete('pedidos/{pedido}','PedidosController@deletar' );


Route::get('chamados/','ChamadosController@index' );
Route::get('chamados/{chamado}/ver','ChamadosController@ver' );
Route::get('chamados/criar','ChamadosController@criar' );

Route::post('chamados/salvar','ChamadosController@salvar' );
Route::delete('chamados/{chamado}','ChamadosController@deletar' );


Auth::routes();

Route::get('/home', 'ChamadosController@index');
