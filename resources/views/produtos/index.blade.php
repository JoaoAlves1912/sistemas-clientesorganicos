<!DOCTYPE html>
<html>

<head>
    <title>Vitrine de Orgânicos</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 50px;
            background: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h1,
        h2 {
            color: #2d5a27;
            margin-top: 0;
        }

        .btn-group {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            color: white;
            display: inline-block;
        }

        .btn-verde {
            background: #2d5a27;
        }

        .btn-laranja {
            background: #ff9800;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .prod-info {
            display: flex;
            flex-direction: column;
        }

        .prod-nome {
            font-weight: bold;
            color: #333;
        }

        .prod-meta {
            font-size: 0.85em;
            color: #2d5a27;
            font-weight: bold;
            margin-top: 5px;
        }

        .prod-preco {
            color: #2d5a27;
            font-weight: bold;
            font-size: 1.1em;
        }

        .alerta-sucesso {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100%;
            max-width: 600px;
            text-align: center;
            font-weight: bold;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    @if (session('success'))
        <div class="alerta-sucesso">
            {{ session('success') }}
        </div>
    @endif

    <div class="btn-group">
        <a href="/produtos/novo" class="btn btn-verde">+ Novo Produto</a>
        <a href="/produtores/novo" class="btn btn-verde">+ Novo Produtor</a>
        <a href="/carrinho" class="btn btn-laranja">🛒 Ver Carrinho</a>
    </div>

    <div class="container-card">
        <h1>Vitrine de Orgânicos 🧺</h1>

        @if (request('produtor_id'))
            <div style="margin-bottom: 15px;">
                <a href="/produtos"
                    style="color: #dc3545; text-decoration: none; font-weight: bold; border: 1px solid #dc3545; padding: 5px 10px; border-radius: 5px;">
                    ❌ Limpar Filtro
                </a>
            </div>
        @endif

        <ul>
            @foreach ($produtos as $produto)
                <li>
                    <div class="prod-info">
                        <span class="prod-nome">{{ $produto->nome }}</span>
                        <span style="color: #777; font-size: 0.9em;">{{ $produto->descricao }}</span>
                        <span class="prod-meta">👨‍🌾
                            {{ $produto->produtor ? $produto->produtor->nome : 'Produção Própria' }}</span>
                    </div>

                    <div style="text-align: right;">
                        <div class="prod-preco" style="margin-bottom: 8px;">R$
                            {{ number_format($produto->preco, 2, ',', '.') }}</div>

                        <form action="/carrinho/adicionar/{{ $produto->id }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="btn btn-verde"
                                style="padding: 5px 10px; font-size: 0.8em; border: none; cursor: pointer;">
                                + Carrinho
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="container-card">
        <h2>Nossos Produtores 👨‍🌾</h2>
        <ul>
            @foreach ($produtores as $produtor)
                <li>
                    <div class="prod-info">
                        <a href="/produtos?produtor_id={{ $produtor->id }}" class="prod-nome"
                            style="text-decoration: none; color: #2d5a27; font-size: 1.1em;">
                            {{ $produtor->nome }} 🔍
                        </a>
                        <span style="color: #777; font-size: 0.9em;">🏡 {{ $produtor->fazenda }}</span>
                    </div>
                    <span style="color: #999; font-size: 0.8em;">{{ $produtor->cidade }}</span>
                </li>
            @endforeach
        </ul>
    </div>
<script>
        // Procura se tem algum alerta na tela
        const alerta = document.querySelector('.alerta-sucesso');
        
        if (alerta) {
            // Espera 4 segundos (4000 milissegundos)
            setTimeout(() => {
                alerta.style.transition = 'opacity 0.5s ease'; // Efeito suave
                alerta.style.opacity = '0'; // Deixa transparente
                
                // Espera terminar o efeito e remove o espaço dele na tela
                setTimeout(() => alerta.remove(), 500); 
            }, 4000);
        }
    </script>
</body>

</html>
