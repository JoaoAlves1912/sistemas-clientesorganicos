<?php

namespace App\Http\Controllers;

use App\Models\Produtor;
use Illuminate\Http\Request;

class ProdutorController extends Controller
{
    public function create()
    {
        return view('produtores.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'fazenda' => 'required',
            'cpf' => 'required|max:14',
            'endereco' => 'required',
        ]);
        Produtor::create($request->all());


        return redirect('/produtos')->with('success', 'Produtor parceiro registrado com sucesso! 👨‍🌾');
    }
}
