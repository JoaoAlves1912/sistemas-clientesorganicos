<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Produtor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function index(Request $request)
    {

        $query = Produto::with('produtor');


        if ($request->filled('produtor_id')) {

            $query->where('produtor_id', $request->produtor_id);
        }


        $produtos = $query->get();


        $produtores = Produtor::all();

        return view('produtos.index', compact('produtos', 'produtores'));
    }

    public function create()
    {
        $produtores = Produtor::all();
        return view('produtos.create', compact('produtores'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'produtor_id' => 'required|exists:produtors,id',
        ]);

        Produto::create($request->all());

        return redirect('/produtos')->with('success', 'Produto cadastrado com sucesso! 🥬');
    }
}
