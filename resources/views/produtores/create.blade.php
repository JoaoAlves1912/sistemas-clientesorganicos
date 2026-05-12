<!DOCTYPE html>
<html>

<head>
    <title>Cadastrar Produtor</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 50px;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2d5a27;
            margin-top: 0;
            font-size: 1.5em;
        }

        input {
            width: 100%;
            margin-bottom: 15px;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background: #2d5a27;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
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
    <div class="card">
        <h1>Novo Produtor 👨‍🌾</h1>
        <form action="/produtores" method="POST">
            @csrf <input type="text" name="nome" placeholder="Nome do Produtor (ex: Zé da Horta)" required>
            <input type="text" name="fazenda" placeholder="Nome da Fazenda (ex: Sítio Esperança)" required>
            <input type="text" name="cidade" placeholder="Cidade (ex: Curitiba)">
            <input type="text" name="cpf" placeholder="CPF (ex: 123.456.789-00)" required>
            <input type="text" name="endereco" placeholder="Endereço (ex: Estrada da Pedreira, Km 2)" required>

            <button type="submit">Cadastrar Produtor</button>
        </form>
        <a href="/produtos">Voltar para a vitrine</a>
    </div>
</body>

</html>
