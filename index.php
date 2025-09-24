<?php
// Inicia a sessão (opcional, para casos onde se queira usar session)
session_start();
if (isset($_SESSION["usuario"])) {
    $nome = $_SESSION["usuario"];
    $logo = "public/images/profile.png";
}

$nome = $_SESSION['pagamento']['cliente'] ?? 'Cliente';
$metodo = $_SESSION['pagamento']['pagamento'] ?? 'N/D';

// Verifica se já existe o cookie 'aceitou_cookies'
$aceitou_cookies = isset($_COOKIE['aceitou_cookies']) ? true : false;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="Admin/css/w3.css">
    <style>
        * {
            font-family: sans-serif;
        }

        header {
            width: 100%;
            display: flex;
            flex-direction: column;
            position: fixed;
            z-index: 1;
        }

        button {
            display: flex;
            border-radius: 10px;
            height: 2.5rem;
            border: none;
            text-transform: none;
            overflow: visible;
            font: inherit;
            margin: 0;
            cursor: pointer;
        }

        a:hover {
            color: #2196f3;
            transition-duration: 2s;
        }

        .cabecalho {
            padding-inline: 16px;
            background-color: #0a0d14;
            height: auto;
            margin: 0px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .cabecalho>div {
            display: flex;
            justify-content: space-around;
        }

        li {
            list-style: none;
            margin: 20px;
        }

        .ul1 {
            display: flex;
            justify-content: center;
        }

        h1 {
            color: #2196f3;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .caption-1 {
            left: 0;
            width: 100%;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
        }

        .caption-1 {
            margin-top: 1px;
            border-top: 1px solid #444;
        }

        .rodape-1 {
            background-color: #0a0d14;
            color: #fff;
            text-align: center;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            bottom: 0px;
            min-height: 300px;
            padding: 40px 20px;
        }

        .rodape-container-1 {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1000px;
            margin: 0 auto;
        }

        .rodape-coluna-1 {
            flex: 1;
            padding: 10px;
        }

        .rodape-coluna-1 h4 {
            margin-bottom: 10px;
            font-size: 16pt;
        }

        .rodape-coluna-1 ul {
            list-style: none;
            padding: 0;
        }

        .rodape-coluna-1 li {
            margin-bottom: 5px;
        }

        .rodape-coluna-1 a {
            color: #fff;
            text-decoration: none;
        }

        .rodape-coluna-1 p,
        .rodape-coluna-1 li {
            font-size: 14px;
            line-height: 1.6;
        }

        .redes-sociais-1 a {
            margin-right: 10px;
            font-size: 20px;
            transition: color 0.3s;
        }

        .redes-sociais-1 a:hover {
            color: #ff0000;
        }

        .rodape-copyright-1 {
            width: 100%;
            margin: 20px 0 0 0;
            text-align: center;
            font-size: 12px;
            color: #aaa;
        }

        #confirm-overlay {
            background-color: #000;
            cursor: wait;
        }

        #confirm-container {
            background: none repeat scroll 0 0 #fff;
            border: 2px solid #dddddd;
            /* border-radius: 6px; */
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            text-align: left;
            width: 420px;
        }

        #confirm,
        #popupSettingWindow {
            display: none;
        }

        #confirm-container .header {
            height: 30px;
            line-height: 30px;
            width: 100%;
            color: #000;
            font-weight: bold;
            background-color: #eaeaea;
            border-bottom: 1px solid #cbcbcb;
        }

        #confirm-container .header span {
            padding-left: 8px;
        }

        #confirm-container .buttons {
            padding: 10px 8px;
            text-align: right;
        }

        #pagamento-overlay {
            background-color: #000;
            cursor: wait;
        }

        #pagamento-container {
            background: none repeat scroll 0 0 #fff;
            border: 2px solid #dddddd;
            /* border-radius: 6px; */
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            text-align: left;
            width: 420px;
        }

        #pagamento-container {
            display: none;
            position: fixed;
            z-index: 3002;
            min-height: 240px;
            min-width: 100px;
            width: 630px;
            left: 403px;
            top: 0;
        }

        #pagamento,
        #popupSettingWindow {
            display: none;
        }

        #pagamento-container .header {
            height: 30px;
            line-height: 30px;
            width: 100%;
            color: #000;
            font-weight: bold;
            background-color: #eaeaea;
            border-bottom: 1px solid #cbcbcb;
        }

        #pagamento-container .header span {
            padding-left: 8px;
        }

        #pagamento-container .buttons {
            padding: 10px 8px;
            text-align: right;
        }

        button,
        html input[type="button"],
        input[type="reset"],
        input[type="submit"] {
            -webkit-appearance: button;
            cursor: pointer;
        }

        .btn-default {
            color: #333333;
            background-color: #ffffff;
            border-color: #cccccc;
        }

        .btn {
            display: inline-block;
            margin-bottom: 0;
            font-weight: normal;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            white-space: nowrap;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            border-radius: 4px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        input,
        button,
        select,
        textarea {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
        }

        input {
            line-height: normal;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            color: inherit;
            font: inherit;
            margin: 0;
        }

        #confirm-message-container {
            margin: 10px 5px;
        }

        #confirm .confirm-message {
            display: inline-block;
            margin: 10px 10px 10px 0;
            width: 310px;
            vertical-align: top;
        }

        #confirm-container .message {
            color: #000;
            font-size: 14px;
        }

        #confirm .icon {
            display: inline-block;
            margin: 0 0 0 10px;
            width: 50px;
            vertical-align: top;
        }

        img {
            vertical-align: middle;
        }

        img {
            border: 0;
        }

        .colorRed {
            color: #cc0000;
        }

        label {
            font-weight: normal;
        }

        label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: bold;
        }

        #confirm-container {
            display: none;
            position: fixed;
            z-index: 3002;
            min-height: 140px;
            width: 416px;
            left: 403px;
            top: 30%;
        }

        #confirm-overlay {
            display: none;
            opacity: 0.5;
            position: fixed;
            z-index: 3001;
            height: 1511px;
            width: 3500px;
            left: 0px;
            top: 0px;
        }

        #openNav {
            display: none;
        }

        #overlay {
            display: none;
            opacity: 0.5;
            position: fixed;
            z-index: 3001;
            height: 1511px;
            width: 3500px;
            left: 0px;
            top: 0px;
            background-color: #000;
            cursor: wait;
        }

        #container {
            display: none;
            position: fixed;
            z-index: 3002;
            min-height: 140px;
            width: 416px;
            left: 403px;
            top: 30%;
            background: none repeat scroll 0 0 #fff;
            /* border-radius: 6px; */
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            text-align: left;
            width: 420px;
        }

        #confirm,
        #popupSettingWindow {
            display: none;
        }

        .quant {
            width: 35px;
        }

        #lista li {
            margin-top: 0px;
            margin-bottom: 0px;
        }

        @media (max-width: 768px) {
            .cabecalho {
                align-items: baseline;
            }
        }

        @media screen and (max-width: 768px) {
            .caption-1 {
                display: none;
            }

            nav {
                display: none;
            }

            #openNav {
                display: flex;
                align-items: center;
            }

            #menu1 {
                display: flex;
                align-items: center;
            }

            .rodape-container-1 {
                flex-direction: column;
            }

            .rodape-coluna-1 {
                flex: 100%;
            }
        }

        @media (max-width: 768px) {

            .nav-principal,
            .nav-categorias {
                flex-direction: column;
                align-items: flex-start;
            }

            li {
                margin: 10px 0;
            }

            .caption-1 {
                text-align: left;
                padding-left: 16px;
            }
        }
    </style>
</head>

<body>
    <header>

        <div class="cabecalho">
            <div>
                <h1><span style="color: white;">Gamma</span>Tech</h1>
            </div>
            <nav aria-label="Navegação principal">
                <ul class="nav-principal ul1">
                    <li><a href="?page=home" aria-current="page">Home</a></li>
                    <li><a href="?page=produto" aria-current="page">Produtos</a></li>
                    <li><a href="?page=contacto" aria-current="page">Contacto</a></li>
                    <li><a href="?page=sobre" aria-current="page">Sobre</a></li>
                </ul>
            </nav>

            <div id="menu1">
                <?php if (isset($_SESSION["usuario"])): ?>
                    <button style="background: transparent;" aria-expanded="false" data-state="closed" onclick="myDropFunc()" aria-controls="radix-«rpt»">
                        <img src='<?php echo $logo; ?>' alt=''>
                    </button>
                    <button class="w3-button w3-block w3-left-align w3-white" onclick="abriCarrinho();">
                        Carrinho <i class="fa fa-caret-down"></i>
                    </button>
                <?php else: ?>
                    <p style="color: white;"><a href="?page=cadastrar" onclick="cadastrar_form()" aria-current="page">Registrar</a> | <a href="?page=entrar" aria-current="page">Login</a></p>
                <?php endif; ?>
            </div>

            <button id="openNav" style="background-color: transparent !important;" class="w3-button w3-teal .w3-tanos w3-xlarge" onclick="w3_open()">&#9776;</button>
        </div>
        <!--produtos?categoria=-->
        <div class="caption-1">
            <nav aria-label="Categorias de produtos">
                <ul class="nav-categorias ul1">
                    <li><a href="?page=all" aria-current="page">Todos os Produtos</a></li>
                    <li><a href="?page=computadores" aria-current="page">Computadores</a></li>
                    <li><a href="?page=impressoras" aria-current="page">impressoras e scanners</a></li>
                    <li><a href="?page=produtos?categoria=redes" aria-current="page">Redes</a></li>
                    <li><a href="?page=produtos?categoria=phone" aria-current="page">Smartphones e Tablets</a></li>
                    <li><a href="?page=produtos?categoria=acessorios" aria-current="page">Acessórios</a></li>
                    <li><a href="?page=produtos?categoria=books" aria-current="page">Livros</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main id="main">
        <?php
        include('backend/conexao.php');
        switch (@$_REQUEST["page"]) {
            case "home":
                include("casa.php");
                break;
            case "produto":
                include "produtos.php";
                break;
            case "contacto":
                include "contacto.php";
                break;
            case "sobre":
                include "sobre.php";
                break;

            case "entrar":
                include "login.php";
                break;
            case "cadastrar":
                include "login.php";
                break;

            case "all":
                include("produtos.php");
                $_Get[] = "\\produto";
                break;
            case "produto.computadores":
                include "produtos.php";
                break;
            case "produtos?categoria=impressoras":
                include "produtos.php";
                break;
            case "produtos?categoria=redes":
                include "produtos.php";
                break;
            case "produtos?categoria=phone":
                include "produtos.php";
                break;
            case "produtos?categoria=acessorios":
                include "produtos.php";
                break;
            case "produtos?categoria=books":
                include "produtos.php";
                break;
            case "produtos?categoria=electro":
                include "produtos.php";
                break;

            case "exit":
                include "logout.php";
                break;
            default:
                include("casa.php");
        }
        ?>
    </main>

    <div id="confirm-overlay" class="simplemodal-overlay" style="display: none;" onclick="fecharCarrinho();"></div>
    <div id="confirm-container" class="simplemodal-container" style="display: none;">
        <div tabindex="-1" class="simplemodal-wrap">
            <div id="confirm" class="simplemodal-data" style="display: block;">
                <div class="header"><span id="popTitle"> Carrinho com seus produtos </span></div>
                <form action="\\gammatech/pagar.php" id="confirm-message-container">
                    <p><?php echo htmlspecialchars($nome); ?> <span id="total"></span>!</p>
                    <div class="confirm-message">
                        <ul id="lista" class="message"></ul>
                    </div>
                </form>
                <div class="buttons">
                    <input type="button" class="btn btn-default simplemodal-close" id="okbtn" data-trans="ok" value="Comprar" onclick="PopupPagamento()">
                    <input type="button" class="btn btn-default simplemodal-close" id="nobtn" data-trans="no" value="Fechar" onclick="closePopup()">
                </div>
            </div>
        </div>
    </div>
    <div id="pagamento-container" class="simplemodalpagamento-container" style="display: none;">
        <div tabindex="-1" class="simplemodalpagamento-wrap">
            <div id="pagamento" class="simplemodal-data" style="display: block;">
                <div class="header"><span id="popTitle"><a href="#" class="newsletter-popup-close-btn" onclick="">&times;</a></a>Pague Seus Produtos</span> <span id="totalCompra"></span></div>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_xclick">

                    <div class="row">
                        <div class="col-50">
                            <h3>Informações Pessoais</h3>
                            <label for="fname"><i class="fa fa-user"></i> Nome Completo</label>
                            <input type="text" id="fname" name="firstname" placeholder="Manasses T. Madiata">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="tanos@example.com">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Endereço</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Rua">
                            <label for="city"><i class="fa fa-institution"></i> Cidade</label>
                            <input type="text" id="city" name="city" placeholder="Luanda">

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">Estado</label>
                                    <input type="hidden" name="business" value="seu-email-paypal@example.com">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="hidden" name="item_name" value="Compra no site">
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Pagamento</h3>
                            <label for="fname">Cartões Aceites</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label>Método de Pagamento:
                                <select name="pagamento">
                                    <option>Cartão</option>
                                    <option>Multicaixa</option>
                                    <option>Paypal</option>
                                </select>
                            </label>
                            <label for="cname">Nome no Cartão</label>
                            <input type="hidden" name="amount" value="2100">

                            <label for="ccnum">Numéro do cartão de credito</label>
                            <input type="hidden" name="currency_code" value="KZ">
                        </div>
                </form>

            </div>
            <input type="submit" onclick="sucesso()" value="Pagar com PayPal" class="btn">
            </form>
        </div>
        <script src="https://www.paypal.com/sdk/js?client-id=SEU_CLIENT_ID"></script>

        <div id="paypal-button-container"></div>

    </div>
    </div>
    <div id="confirm-container" class="simplemodal-container" style="display: none;"><a class="modalCloseImg simplemodal-close" title="Close"></a>
        <div tabindex="-1" class="simplemodal-wrap">
            <div id="confirm" class="simplemodal-data" style="display: block;">
                <div class="header"><span id="popTitle"> Pagamento Efetuado </span></div>
                <div id="confirm-message-container">
                    <div class="icon">✅</div>
                    <div class="confirm-message">
                        <div class="message">
                            <p>Obrigado, <?php echo htmlspecialchars($nome); ?>!</p>
                            <p>Pagamento por <?php echo htmlspecialchars($metodo); ?> confirmado com sucesso.</p>
                        </div>
                        <div class="promptDiv" style="display: none;">
                            <input name="promptInput" id="promptInput" type="text" maxlength="25" class="width190 focusIn"><br>
                            <label class="promptErrorLabel colorRed"></label>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <a href="index.html" class="btn btn-default simplemodal-close" id="okbtn" data-trans="ok">Voltar à loja</a>
                    <input type="button" class="btn btn-default " id="yesbtn" data-trans="yes" value="Sim">
                    <input type="button" class="btn btn-default simplemodal-close" id="nobtn" data-trans="no" value="Não" onclick="closeForm()">
                </div>
            </div>
        </div>
    </div>

    <div id="overlay" class="simplemodal-overlay" style="display: none;"></div>
    <div id="container" class="simplemodal-container" style="display: none;">
        <div tabindex="-1" class="simplemodal-wrap">
            <div id="confirm" class="simplemodal-data" style="display: flex; flex-direction: column;">
                <a href='?page=perfil' class="w3-bar-item w3-button" aria-current='page' style="background: rgb(0, 175, 255); color: white;">Perfil</a>
                <a href='backend/logout.php' class="w3-bar-item w3-button"> Sair</a>
            </div>
        </div>
    </div>
    <footer class="rodape-1">
        <div class="rodape-container-1">
            <div class="rodape-coluna-1">
                <h4>Sobre</h4>
                <p>Somos a GammaTech, loja de referência em tecnologia, inovação e qualidade em Angola.</p>
            </div>
            <div class="rodape-coluna-1">
                <h4>Contato</h4>
                <address>
                    <ul>
                        <li>Av. da ENDE, São Paulo - Luanda</li>
                        <li>Tel: 948 679 436 | 947 013 289</li>
                        <li>Email: <a href="mailto:gammatech@gmail.com">gammatech@gmail.com</a></li>
                    </ul>
                </address>
            </div>
            <div class="rodape-coluna-1">
                <h4>Redes Sociais</h4>
                <ul class="redes-sociais-1">
                    <li><a href="https://facebook.com/GammaTech" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://instagram.com/GammaTech" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://twitter.com/GammaTech" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                </ul>
            </div>
            <p class="rodape-copyright-1">
                &copy; 2025 GammaTech - Todos os direitos reservados. Desenhado por GammaTech.
            </p>
        </div>
    </footer>
    <script src="public/js/scripts.js"></script>
    <script>
        // Get the modal
        var modal = document.getElementById("confirm-overlay");

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                document.getElementById("confirm-container").style.display = "none";
            }
        };

        function w3_open() {
            const nav = document.getElementsByTagName("nav")[0];
            const isVisible = nav.style.display === "block";

            if (isVisible) {
                nav.style.display = "none";
            } else {
                nav.style.width = "25%";
                nav.style.display = "block";
            }
        }

        function PopupPagamento() {
            alert("A pagar os produtos...");
            document.getElementById("pagamento-container").style.display = "block";

            document.getElementsByClassName("simplemodalpagamento-wrap")[0].style.height = "100%";
            document.getElementsByClassName("simplemodalpagamento-wrap")[0].style.outline = "0px";
            document.getElementsByClassName("simplemodalpagamento-wrap")[0].style.width = "100%";

            document.getElementById("pagamento").style.display = "block";
            closePopup();
            document.getElementById("confirm-overlay").style.display = "block";
        }

        // Close button onclick event handler
        document.querySelector('.newsletter-popup-close-btn').onclick = event => {
            event.preventDefault();
            // CLose the popup widget
            closeNewsletterPopup();
        };

        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '2100' // Valor total do carrinho
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Pagamento concluído por ' + details.payer.name.given_name);
                    window.location.href = '../backend/sucesso.php'; // Redireciona após pagamento
                });
            }
        }).render('#paypal-button-container');
    </script>
    <script>
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("openNav").style.display = "inline-block";
            document.getElementById("openNav").textContent = "Close &times;";
        }

        function showPopup() {
            document.getElementById("confirm-overlay").style.display = "block";

            document.getElementById("confirm-container").style.display = "block";

            document.getElementsByClassName("simplemodal-wrap")[0].style.height = "100%";
            document.getElementsByClassName("simplemodal-wrap")[0].style.outline = "0px";
            document.getElementsByClassName("simplemodal-wrap")[0].style.width = "100%";

            document.getElementById("confirm").style.display = "block";

            document.getElementById("okbtn").style.display = "block";
        }

        function closePopup() {
            document.getElementById("confirm-overlay").style.display = "none";
            document.getElementById("confirm-container").style.display = "none";
        }

        function myDropFunc() {
            closePopup();
            w3_close();
            const container = document.getElementById("container");
            const isVisible = container.style.display === "block";
            if (isVisible) {
                container.style.display = "none";

                document.getElementById("overlay").style.display = "block";


                document.getElementsByClassName("simplemodal-wrap")[0].style.height =
                    "100%";
                document.getElementsByClassName("simplemodal-wrap")[0].style.outline =
                    "0px";
                document.getElementsByClassName("simplemodal-wrap")[0].style.width = "100%";
            } else {
                document.getElementById("overlay").style.display = "none";
                container.style.width = "25%";
                container.style.display = "block";
            }
        }

        function atualizarCarrinho() {
            const lista = document.querySelector(".confirm-message .message");
            lista.innerHTML = "";

            carro.forEach((produto) => {
                const item = document.createElement("li");
                item.innerHTML = `
                ${produto.nome}, Preço: ${produto.preco.toFixed(2)} Kz,
                <input type="number" class="quant" value="${produto.quantidade}" min="1"
                       onchange="atualizarQuantidade('${
                         produto.nome
                       }', this.value)">
            `;
                lista.appendChild(item);
            });
        }

        function atualizarQuantidade(nome, novaQtd) {
            const produto = carrinho.find((p) => p.nome === nome);
            if (produto) {
                produto.quantidade = parseInt(novaQtd);
            }
        }

        function abrirCarrinho() {
            document.getElementById("confirm-overlay").style.display = "block";
            document.getElementById("confirm-container").style.display = "block";
        }

        function fecharCarrinho() {
            document.getElementById("confirm-overlay").style.display = "none";
            document.getElementById("confirm-container").style.display = "none";
        }

        function fecharPagamento() {
            // Aqui podes enviar o carrinho para o backend usando fetch/AJAX se quiseres.
            console.log(carrinho);
            document.getElementById("pagamento-container").style.display = "none";

            document.getElementsByClassName("simplemodalpagamento-wrap")[0].style.height =
                "100%";
            document.getElementsByClassName(
                "simplemodalpagamento-wrap"
            )[0].style.outline = "0px";
            document.getElementsByClassName("simplemodalpagamento-wrap")[0].style.width =
                "100%";

            document.getElementById("pagamento").style.display = "none";
            closePopup();
            document.getElementById("confirm-overlay").style.display = "none";
        }
    </script>
    <script>
        const lista = document.getElementById("lista");
        const totalDOM = document.getElementById("total");
        const carrenho = JSON.parse(localStorage.getItem("carrinho")) || [];
        total = 0;

        carrenho.forEach((p) => {
            const li = document.createElement("li");
            li.className = "w3-bar-item w3-button";
            li.textContent = `${p.nome} — ${p.preco} KZ`;
            lista.appendChild(li);
            total += p.preco;
        });

        totalDOM.textContent = total;
        localStorage.clear(); // Limpa após o envio
    </script>
    <style>
        .newsletter-popup-close-btn {
            position: absolute;
            right: 20px;
            top: 20px;
            text-decoration: none;
            color: #ddd;
            font-size: 30px;
            line-height: 20px;
        }

        .newsletter-popup-close-btn:hover {
            color: #c4c4c4;
        }

        #pagamento .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -1px;
        }

        #pagamento .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        #pagamento .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        #pagamento .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }

        #pagamento .col-25,
        #pagamento .col-50,
        #pagamento .col-75 {
            padding: 0 16px;
        }

        #pagamento .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        #pagamento input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #pagamento label {
            margin-bottom: 10px;
            display: block;
        }

        #pagamento .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        #pagamento .btn {
            background-color: #04AA6D;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        #pagamento .btn:hover {
            background-color: #45a049;
        }

        #pagamento span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            #pagamento .row {
                flex-direction: column-reverse;
            }

            #pagamento .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
</body>

</html>

<!-- Carrinho, clicar em comprar mostra um formulário de compra onde selecionará o metódo e de acordo ao metódo escolhido aparecerá um formulário pedindo informações para satisfazer as necessidades ou requisitos de cada metódo,
 depois de preenchido e clicado em comprar irá processar tudo e resultar eu popup com pedido efectuado com sucesso ou falhado-->