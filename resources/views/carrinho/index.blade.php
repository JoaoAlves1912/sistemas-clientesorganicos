<!DOCTYPE html>
<html>

<head>
    <title>Meu Carrinho</title>
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
        }

        h1 {
            color: #ff9800;
            margin-top: 0;
        }

        /* === NOVAS REGRAS CSS PARA O LAYOUT DE CARDS === */
        .items-list {
            width: 100%;
            margin-bottom: 20px;
        }

        .item-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #eee;
        }

        /* Placeholder para imagem de produto, já que não temos */
        .item-visual {
            margin-right: 15px;
        }

        .item-placeholder-img {
            width: 60px;
            height: 60px;
            background: #eee;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2em;
        }

        .item-details {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            margin-right: 15px;
        }

        .item-name {
            font-weight: bold;
            font-size: 1.1em;
            color: #333;
        }

        /* Placeholder para embalagem, como na imagem de referência */
        .item-description {
            color: #777;
            font-size: 0.9em;
            margin-bottom: 5px;
        }

        .item-price-unit {
            font-weight: bold;
            color: #333;
            font-size: 1.2em;
        }

        /* Controle de quantidade +/- */
        .item-actions {
            display: flex;
            align-items: center;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            background: #f0f0f0;
            border-radius: 20px;
            padding: 5px 10px;
        }

        .btn-qty {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2em;
            color: #dc3545;
            /* Cor vermelha para botões de ação */
            padding: 0 5px;
            font-weight: bold;
        }

        .quantity-value {
            font-weight: bold;
            font-size: 1.1em;
            color: #333;
            margin: 0 10px;
            min-width: 20px;
            text-align: center;
        }

        /* ==================================================== */

        .total {
            font-size: 1.5em;
            font-weight: bold;
            color: #2d5a27;
            text-align: right;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            color: white;
            display: inline-block;
            margin-top: 10px;
        }

        .btn-verde {
            background: #2d5a27;
        }

        .btn-cinza {
            background: #666;
        }
    </style>
</head>

<body>

    <div class="container-card">
        <h1>Meu Carrinho 🛒</h1>

        @if (session('success'))
            <div
                style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        @if (count($carrinho) > 0)
            <div class="items-list">
                @foreach ($carrinho as $id => $detalhes)
                    <div class="item-card">
                        <div class="item-visual">
                            <div class="item-placeholder-img">🌱</div>
                        </div>

                        <div class="item-details">
                            <span class="item-name">{{ $detalhes['nome'] }}</span>
                            <span class="item-description">Colheita Orgânica, 1 unidade</span>
                            <span class="item-price-unit">R$ {{ number_format($detalhes['preco'], 2, ',', '.') }}</span>
                        </div>

                        <div class="item-actions">
                            <div class="quantity-control">
                                <form action="/carrinho/decrementar/{{ $id }}" method="POST"
                                    style="margin: 0;">
                                    @csrf
                                    <button type="submit" class="btn-qty btn-minus">
                                        @if ($detalhes['quantidade'] == 1)
                                            🗑️
                                        @else
                                            -
                                        @endif
                                    </button>
                                </form>

                                <span class="quantity-value">{{ $detalhes['quantidade'] }}</span>

                                <form action="/carrinho/incrementar/{{ $id }}" method="POST"
                                    style="margin: 0;">
                                    @csrf
                                    <button type="submit" class="btn-qty btn-plus">+</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="total">Total: R$ {{ number_format($total, 2, ',', '.') }}</div>
        @else
            <p>Seu carrinho está vazio... por enquanto! 🌱</p>
        @endif

        <hr>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="/produtos" class="btn btn-cinza">Voltar para a Vitrine</a>

            @if (count($carrinho) > 0)
                <form action="/carrinho/finalizar" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-verde" style="border: none; cursor: pointer; font-size: 1em;">
                        Finalizar Pedido 
                    </button>
                </form>
            @endif
        </div>
    </div>

</body>

</html>
