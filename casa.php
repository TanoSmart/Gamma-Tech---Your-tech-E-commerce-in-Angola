<?php
// Inicia a sessão (opcional, para casos onde se queira usar session)
if (isset($_SESSION["usuario"])) {
    $nome = 'Olá, ' . $_SESSION["usuario"] . '!';
} else {
    $nome = "O futuro parece mais confortável com";
}

// Verifica se já existe o cookie 'aceitou_cookies'
$aceitou_cookies = isset($_COOKIE['aceitou_cookies']) ? true : false;
?>

<head>
    <link rel="stylesheet" href="public/css/index.css">

    <style>
        .carousel {
            width: 100%;
            height: 600px;
            overflow: hidden;
            position: relative;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: all 0.5s ease-in-out;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .caption-2 {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            z-index: 1;
        }

        .caption {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
        }

        .carousel.active .slide {
            left: 100%;
        }

        .carousel.next .slide:first-child {
            left: 100%;
        }

        .carousel.next .slide:nth-child(2) {
            left: 0;
        }

        .card-container {
            display: flex;
            overflow: hidden;
            margin: 0 auto;
            margin: 20px;
        }

        .card {
            flex: 0 0 300px;
            margin: 10px;
            background-color: rgb(0, 175, 255);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            position: relative;
            transition: transform 0.5s ease-in-out;
            color: #fff;
        }

        .card.active {
            z-index: 1;
            transform: scale(1.1);
        }

        .card:hover {
            transform: scale(1.1);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            margin-bottom: 10px;
        }

        .rodape {
            background-color: #0A0D14;
            color: #fff;
            padding: 60px;
            text-align: center;
        }

        .rodape-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1000px;
            margin: 0 auto;
        }

        .rodape-coluna {
            flex: 1;
            padding: 10px;
        }

        .rodape-coluna h4 {
            margin-bottom: 10px;
        }

        .rodape-coluna ul {
            list-style: none;
            padding: 0;
        }

        .rodape-coluna li {
            margin-bottom: 5px;
        }

        .rodape-coluna a {
            color: #fff;
            text-decoration: none;
        }

        .rodape-copyright {
            margin-top: 10px;
        }

        /* Style the form element with a border around it */
        form {
            border: 4px solid #f1f1f1;
        }

        /* Add some padding and a grey background color to containers */
        .container {
            padding: 20px;
            background-color: #f1f1f1;
        }

        /* Style the input elements and the submit button */
        input[type=text],
        input[type=submit] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Add margins to the checkbox */
        input[type=checkbox] {
            margin-top: 16px;
        }

        /* Style the submit button */
        input[type=submit] {
            background-color: rgb(0, 175, 255);
            color: white;
            border: none;
        }

        input[type=submit]:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <main id="main">
        <!-- Slide start -->
        <section class="inicio">
            <div class="carousel">
                <div class="slide">
                    <img src="public/images/slide2.jpg" alt="Imagem 1">
                    <p class="caption">Deixe tudo em nossas mãos</p>
                </div>
                <div class="slide">
                    <img src="public/images/modern-stationary-collection-arrangement (1).jpg" alt="Imagem 2">
                    <p class="caption">Enquanto nos todos</p>
                </div>
                <div class="slide">
                    <img src="public/images/modern-stationary-collection-arrangement.jpg" alt="Imagem 3">
                    <p class="caption">Trabalhamos Juntos!</p>
                </div>
            </div>

            <h2><b><?php echo htmlspecialchars($nome); ?></b></h2>

            <div class="qualidades">
                <ul>
                    <li>Confira as Nossas Promoções</li>
                    <li>Navegue em todos os nossos produtos e catálogos</li>
                    <li>Aproveite todos os nossos serviços</li>
                </ul>
                <div class="btn-casa">
                    <a href="?page=produto" aria-current="page" class="btn-1">Comprar</a>
                    <a href="?page=produto" aria-current="page" class="btn-1 btn-2">Promoções</a>
                </div>
            </div>
        </section>
        <!-- Slide end -->

        <!-- Saudações start -->
        <section class="container-4 ct-1 rodape" id="ct-2">
            <h3>Produtos em Promoção</h3>

            <!-- Produtos start -->
            <section class="card-container">
                <div class="card">
                    <img src="public/images/imagem4.png" alt="Imagem 1">
                    <div class="card-content">
                        <h3>Iphone 14 Pro Max</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed magna in libero tincidunt mattis. <br /><a href="?page=produto" aria-current="page" style="color: black;" class="link"> Mais</a></p>
                    </div>
                </div>
                <div class="card">
                    <img src="public/images/imagem3.png" alt="Imagem 2">
                    <div class="card-content">
                        <h3>Iphone 12 Ultra</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed magna in libero tincidunt mattis. <br /><a href="?page=produto" aria-current="page" style="color: black;" class="link btn-1"> Mais</a></p>
                    </div>
                </div>
                <div class="card">
                    <img src="public/images/imagem6.png" alt="Imagem 3">
                    <div class="card-content">
                        <h3>Notebook U6012 I5</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed magna in libero tincidunt mattis. <br /><a href="?page=produto" aria-current="page" style="color: black;" class="link btn-1"> Mais</a></p>
                    </div>
                </div>
                <div class="card">
                    <img src="public/images/imagem2.png" alt="Imagem 3">
                    <div class="card-content">
                        <h3>Sansung ultra</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed magna in libero tincidunt mattis. <br /><a href="?page=produto" aria-current="page" style="color: black;" class="link btn-1"> Mais</a></p>
                    </div>
                </div>
            </section>
            <!-- Produtos end -->

        </section>
        <!-- Saudações end -->

        <!-- Produtos start -->
        <section class="">
            <h3>Produtos mais vendidos</h3>
            <div class="card-container">
                <div class="card">
                    <img src="public/images/imagem4.png" alt="Imagem 1">
                    <div class="card-content">
                        <h3>Iphone 14 Pro Max</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed magna in libero tincidunt mattis. <br /><a href="?page=produto" aria-current="page" style="color: black;" class="link"> Mais</a></p>
                    </div>
                </div>
                <div class="card">
                    <img src="public/images/imagem3.png" alt="Imagem 2">
                    <div class="card-content">
                        <h3>Iphone 12 Ultra</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed magna in libero tincidunt mattis. <br /><a href="?page=produto" aria-current="page" style="color: black;" class="link btn-1"> Mais</a></p>
                    </div>
                </div>
                <div class="card">
                    <img src="public/images/imagem1.jpg" alt="Imagem 3">
                    <div class="card-content">
                        <h3>Notebook dell inspiron 15-5000</h3>
                        <p>notebook dell inspiron 15 5000 series laptop intel laptop netbook dell. <br /><a href="?page=produto" aria-current="page" style="color: black;" class="link btn-1"> Mais</a></p>
                    </div>
                </div>
                <div class="card">
                    <img src="public/images/imagem2.png" alt="Imagem 3">
                    <div class="card-content">
                        <h3>Sansung ultra</h3>
                        <p>iphone 7 plus iphone 6s plus apple iphone se telephone iphone7 gadget mobile phone case. <br /><a href="?page=produto" aria-current="page" style="color: black;" class="link btn-1"> Mais</a></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Produtos end -->

        <!-- Slide start -->
        <section class="inicio set" id="set">
            <div class="carousel">
                <div class="slide">
                    <img src="public/images/modern-stationary-collection-arrangement (1).jpg" alt="Publicidade 1">
                    <p class="caption">As chances não duram para sempre</p>
                </div>
                <div class="slide">
                    <img src="public/images/modern-stationary-collection-arrangement (1).jpg" alt="Publicidade 2">
                    <p class="caption">As chances não duram para sempre</p>
                </div>
                <div class="slide">
                    <img src="public/images/modern-stationary-collection-arrangement (1).jpg" alt="Imagem 3">
                    <p class="caption">As chances não duram para sempre</p>
                </div>
                <p class="caption texto-hover" style="display: none;">As chances não duram para sempre</p>
                <script>
                    // Get the modal
                    var set = document.getElementById("set");

                    // When the user clicks anywhere outside of the modal, close it
                    window.onfocus = function(event) {
                        if (event.target == set) {
                            document.getElementsByClassName("texto-hover")[0].style.display = "flex";
                        }
                    };
                </script>
            </div>
        </section>
        <!-- Slide end -->

        <!-- Sobre Nós start -->
        <section class="container-4 ct-1 rodape" id="ct-2">
            <div class="rodape-container">
                <div class="rodape-coluna">
                    <h3>Sobre Nós</h3>
                    <p>A Gamma Tech Online é a marca de referência no comércio eletrónico em Angola.
                        A loja online da Gamma Tech Angola disponibiliza todos os produtos que se encontram
                        nas suas lojas físicas. <br> É a loja de referência em Angola em equipamentos e acessórios
                        informáticos e electrónicos para uso pessoal, entretenimento e electrodomésticos,
                        de fabricantes mundialmente conhecidos, ao melhor preço do mercado, permitindo
                        que os consumidores angolanos usufruam dos melhores produtos e tecnologias,
                        onde quer que estejam, 24 horas por dia, 365 dias por ano.</p> <br>

                    <p>A nossa plataforma online é bastante versátil e intuitiva, sendo uma opção
                        segura, de confiança, de rápido acesso e interface moderno e intuitivo,
                        existindo também uma aplicação para Android e iOS onde os clientes podem
                        comprar e realizar os pagamentos com total comodidade e segurança, seja
                        através de transferência bancária, referência Multicaixa, Multicaixa Express
                        ou Homebanking.</p>
                </div>
                <a href="?page=sobre" aria-current="page" class="w3-button">Mais</a>
            </div>
        </section>
        <!-- Sobre Nós end -->

        <!-- Nosso newsletter start -->
        <section class="newsletter newsletter-popup">
            <form action="subscribe.php" method="post">
                <div class="container">
                    <h2>Assine no nosso Newsletter</h2>
                    <p>Assinando receberá as nossas mais recentes novidades e promoções</p>
                </div>

                <div class="container" style="background-color:white">
                    <input type="text" placeholder="Nome Completo" name="name" required>
                    <input type="email" placeholder="Endereço de Email" name="email" required>
                    <label>
                        <input type="checkbox" checked="checked" name="subscribe"> Newsletter Diário
                    </label>
                </div>


                <div class="container">
                    <button type="submit">Subscriver</button>
                </div>
                <p class="newsletter-msg"></p>
            </form>
            <script>
                // Get the subscription form
                const newsletterForm = document.querySelector('.newsletter-popup form');
                // On submit event handler (submit button is pressed)
                newsletterForm.onsubmit = event => {
                    event.preventDefault();
                    // Bind the subscription form and execute AJAX request
                    fetch(newsletterForm.action, {
                        method: 'POST',
                        body: new FormData(newsletterForm)
                    }).then(response => response.text()).then(data => {
                        // Output the response
                        document.querySelector('.newsletter-msg').innerHTML = data;
                    });
                };
            </script>
        </section>
        <!-- Nosso newsletter end -->
    </main>

    <?php if (!$aceitou_cookies): ?>
        <div class="caption-2" id="cookie-banner">
            <button onclick="aceitarCookies()">Aceitar Cookies</button>
            <button onclick="recusarCookies()">Nunca</button>
        </div>
    <?php endif; ?>
    <script>
        const carousel = document.querySelector('.carousel');
        const slides = carousel.querySelectorAll('.slide');

        let currentSlide = 0;

        function showNextSlide() {
            currentSlide++;

            if (currentSlide >= slides.length) {
                currentSlide = 0;
            }

            slides.forEach((slide, index) => {
                slide.style.left = `${index - currentSlide}00%`;
            });
        }

        setInterval(showNextSlide, 5000);

        // Executa o código assim que a página for carregada
        window.onload = function() {
            const slides = document.querySelectorAll('.slide'); // Seleciona todos os slides (imagens)
            let current = 0; // Índice do slide atual

            // Atualiza a posição do track com base no slide atual
            function updateSlider() {
                const slideWidth = slides[0].offsetWidth + 10; // Largura do slide + margem lateral (ajuste se necessário)
            }

            // Avança para o próximo slide, reiniciando ao final
            function nextSlide() {
                current = (current + 1) % (slides.length / 2); // Soma 1 ao índice e reinicia após os 5 slides reais
                updateSlider(); // Aplica a nova posição
            }

            setInterval(nextSlide, 3000); // Troca de slide a cada 3 segundos
        };

        function aceitarCookies() {
            // Envia requisição para salvar cookie
            fetch('backend/aceitar_cookie.php')
                .then(response => {
                    if (response.ok) {
                        document.getElementById('cookie-banner').style.display = 'none';
                    }
                });
        }

        function recusarCookies() {
            // Apenas esconde o aviso
            document.getElementById('cookie-banner').style.display = 'none';
        }
    </script>
</body>