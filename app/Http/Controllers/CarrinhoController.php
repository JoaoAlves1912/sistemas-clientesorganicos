<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        $total = 0;

        foreach ($carrinho as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

        return view('carrinho.index', compact('carrinho', 'total'));
    }

   
    public function adicionar($id)
    {
        $produto = Produto::findOrFail($id);
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$id])) {
            $carrinho[$id]['quantidade']++;
        } else {
            $carrinho[$id] = [
                "nome" => $produto->nome,
                "quantidade" => 1,
                "preco" => $produto->preco
            ];
        }

        session()->put('carrinho', $carrinho);

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho! 🛒');
    }


    public function incrementar($id)
    {
        $carrinho = session()->get('carrinho', []);
        if (isset($carrinho[$id])) {
            $carrinho[$id]['quantidade']++;
            session()->put('carrinho', $carrinho);
        }
        return redirect()->back();
    }


    public function decrementar($id)
    {
        $carrinho = session()->get('carrinho', []);
        if (isset($carrinho[$id])) {
            if ($carrinho[$id]['quantidade'] > 1) {
                $carrinho[$id]['quantidade']--;
            } else {

                unset($carrinho[$id]);
            }
            session()->put('carrinho', $carrinho);
        }
        return redirect()->back();
    }

    public function remover($id)
    {
        $carrinho = session()->get('carrinho', []);
        if (isset($carrinho[$id])) {
            unset($carrinho[$id]);
            session()->put('carrinho', $carrinho);
        }
        return redirect()->back()->with('success', 'Item removido do carrinho! 🗑️');
    }

    
    public function finalizar()
    {
    
        session()->forget('carrinho');

        return redirect('/produtos')->with('success', 'Pedido finalizado com sucesso! 🎉 Seus orgânicos já estão sendo separados para entrega.');
    }
}
