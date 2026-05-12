<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutorController;
use App\Http\Controllers\CarrinhoController;

// Rota para finalizar o pedido e limpar o carrinho
Route::post('/carrinho/finalizar', [CarrinhoController::class, 'finalizar']);

// Rota para ver a página do carrinho
Route::get('/carrinho', [CarrinhoController::class, 'index']);

// Rota para adicionar (Vitrine -> Carrinho)
Route::post('/carrinho/adicionar/{id}', [CarrinhoController::class, 'adicionar']);

// Rota para remover o item inteiro (Para garantir)
Route::post('/carrinho/remover/{id}', [CarrinhoController::class, 'remover']);

// Rotas extras para os botões +/- do novo layout
Route::post('/carrinho/incrementar/{id}', [CarrinhoController::class, 'incrementar']);
Route::post('/carrinho/decrementar/{id}', [CarrinhoController::class, 'decrementar']);

// Rotas de Produtores
Route::get('/produtores/novo', [ProdutorController::class, 'create']);
Route::post('/produtores', [ProdutorController::class, 'store']);

// Rotas de Produtos (Cuidado: aqui é ProdutoController no singular)
Route::get('/produtos/novo', [ProdutoController::class, 'create']);
Route::post('/produtos', [ProdutoController::class, 'store']);

Route::get('/produtos', [ProdutoController::class, 'index']);
