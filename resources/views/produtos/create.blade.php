<!DOCTYPE html>
<html>

<head>
    <title>Cadastrar Orgânico</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 50px;
            background: #f4f4f4;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2d5a27;
            margin-top: 0;
        }

        /* Adicionei o 'select' aqui para seguir o seu padrão */
        input,
        textarea,
        select {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            /* Garante que o padding não quebre a largura */
        }

        button {
            background: #2d5a27;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }

        button:hover {
            background: #1e3d1a;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #777;
            text-decoration: none;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="form-card">
        <h1>Novo Produto 🥬</h1>

        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <form action="/produtos" method="POST">
            @csrf

            <label>Nome do Produto:</label>
            <input type="text" name="nome" placeholder="ex: Cenoura" required>

            <label>Quem produziu?</label>
            <select name="produtor_id" required>
                <option value="">Selecione um Produtor</option>
                @foreach ($produtores as $produtor)
                    <option value="{{ $produtor->id }}">{{ $produtor->nome }} ({{ $produtor->fazenda }})</option>
                @endforeach
            </select>

            <label>Descrição:</label>
            <textarea name="descricao" placeholder="Detalhes do produto..." rows="3"></textarea>

            <label>Preço (R$ - Kg):< /label>
                    <input type="number" name="preco" step="0.01" placeholder="ex: 5.90" required>

                    <label>Quantidade em Estoque:</label>
                    <input type="number" name="estoque" placeholder="ex: 50" required>

                    <button type="submit">Cadastrar Produto</button>
        </form>

        <a href="/produtos">Voltar para a lista</a>
    </div>
</body>

</html>
