<?php
include "backend/conexao.php";
$id = isset($_GET['id']) ? $_GET['id'] : null;
$url = $_SERVER['REQUEST_URI'];
$partes = explode("/", $url);
$pagina = $partes[1]; // Exemplo: "produto"
$parametro = isset($partes[2]) ? $partes[2] : null;

$sql = "SELECT nome, preco, imagem, descricao FROM produtos";

if (@$_REQUEST['q']) {
    include "search.php";
    $sql = $pesquisa;
}

$res = $conn->query($sql);
?>

<head>
    <link rel="stylesheet" href="public/css/produto.css">
    <title>Tudo o que precisa na GammaTech sua loja online e rápida!</title>
</head>

<body>
    <section>
        <div class="caption" class="hidden-xs">
            <form action="//localhost/gammatech/search.php" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <button type="submit" class="nav-search-btn"><i class="fa fa-search"></i></button>
                    <input type="text" class="input form-control nav-search-input basicAutoComplete" placeholder="Pesquisar" value="" name="q" autocomplete="off">
                </div>
            </form>
        </div>
        <!-- Todas as nossas promoções de produtos -->
        <section>
            <div class='card-container produto'>
                <?php while ($row = $res->fetchObject()): ?>
                    <div class='card'>
                        <img src='public/images/<?php echo $row->imagem; ?>' alt='<?php echo $row->descricao; ?>'>
                        <div class='card-content'>
                            <h3><?php echo $row->nome; ?></h3>
                            <p><?php echo $row->descricao; ?></p>
                            <p><?= number_format($row->preco, 2, ',', '.') ?></p>
                            <input type="hidden" name="produto_id[]" value="<?= $row->id ?>">
                            <input type="hidden" name="quantidade[<?= $row->id ?>]" class="form-control text-center" value="1" min="0">
                            <button type='button' class='w3-button w3-blue'
                                onclick='adicionarAoCarrinho("<?php echo addslashes($row->nome); ?>", <?php echo $row->preco; ?>)'>
                                Adicionar ao Carrinho
                            </button>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
        </section>
    </section>

    <style>
        body {
            font-family: sans-serif;
            background: #f5f5f5;
        }

        h2 {
            color: #333;
        }

        .produto {
            background: white;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        card button,
        input,
        select {
            padding: 8px 12px;
            margin-top: 8px;
        }

        .input {
            padding: 8px;
            display: block;
            border: none;
            border-bottom: 1px solid #ccc;
            width: 100%;
            color: #2196f3;
        }

        .nav-search-input {
            transition: all .3s ease-in-out;
        }

        .nav-search-input:focus {
            z-index: 2;
            transform: translateY(-20px);
        }
    </style>
    <script src="public/js/scripts.js"></script>
    <script>
        // public/js/carrinho.js

        carro = JSON.parse(localStorage.getItem("carrinho")) || [];

        function adicionarAoCarrinho(nome, preco) {
            const existente = carro.find(p => p.nome === nome);
            if (existente) {
                existente.quantidade += 1;
            } else {
                carro.push({
                    nome,
                    preco,
                    quantidade: 1
                });
            }

            localStorage.setItem("carrinho", JSON.stringify(carro));
            total += preco;
            document.getElementById("total").innerText = total;
            alert(`${nome} foi adicionado ao carrinho.`);
            //console.log(carro); // Para testes
            atualizarCarrinho();
            abrirCarrinho();
        }


        function enviarCarrinhoParaServidor() {
            fetch("Cliente/salvar_carrinho.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(carrinho)
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = "Cliente/ver_carrinho.php"; // Redireciona para página do carrinho
                    } else {
                        alert("Erro ao enviar carrinho");
                    }
                })
                .catch(error => {
                    console.error("Erro ao enviar carrinho:", error);
                    alert("Erro de conexão ao enviar o carrinho.");
                });
        }

        // Esta função seria chamada quando quiseres ir ao carrinho
        function enviarCarrinhoParaServidor() {
            fetch('Cliente/ver_carrinho.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(carro)
                })
                .then(res => res.text())
                .then(data => {
                    console.log('Resposta:', data);
                    window.location.href = 'Cliente/ver_carrinho.php'; // Redireciona para a página
                })
                .catch(err => {
                    console.error('Erro ao enviar carrinho:', err);
                });
        }

        
        function comprar(nome, preco) {
            let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
            carrinho.push({
                    nome,
                    preco,
                    quantidade: 1
                });
            localStorage.setItem("carrinho", JSON.stringify(carrinho));
            total = preco;
            document.getElementById("totalCompra").innerText = total;
            PopupPagamento();
            alert("A processar Produto!");
        }
    </script>
</body>

</html>