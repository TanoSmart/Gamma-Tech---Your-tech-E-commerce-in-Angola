<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<head>
    <link rel="stylesheet" href="admin/css/w3.css">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Volte as suas Compras!</title>
</head>

<body>
    <?php if (isset($_SESSION["usuario_id"])): ?>
        <a href="index.php">Sair</a>
    <?php endif; ?>

    <div class="card-container ">
        <div class="card">
            <div class="div-btn">
                <button id="btn-login" onclick="login_form()">Login</button>
                <button id="btn-cadastro" onclick="cadastrar_form()">Cadastrar</button>
            </div>
            <form method="POST" action="backend/login.php" id="login">
                <div class="row card-content">
                    <h2 style="text-align: center; color: #3066ff;">Entre em sua Conta</h2>
                    <div class="col">
                        <input type="email" name="email" placeholder="E-mail" required>
                        <input type="password" name="senha" placeholder="Palavra-Passe" required>
                    <p class="login-msg"></p>
                        <input type="submit" value="Login">
                    </div>
                    <div style="display: flex;">
                        <a href="#" class="btn">Ainda não tens uma Conta?</a>
                        <a href="#" class="btn">Esqueceu a senha?</a>
                    </div>
                    <a href="index.php" class="btn btn-default simplemodal-close" id="okbtn" data-trans="ok">Voltar à loja</a>
                </div>
            </form>

            <form method="post" action="backend/cadastro.php" id="cadastro" style="display: none;">
                <div class="row card-content">
                    <h2 style="text-align: center; color: #3066ff;">Cadastre sua Conta</h2>
                    <div class="col">
                        <input type="text" name="nome" placeholder="Nome de Completo" required>
                        <input type="email" name="email" placeholder="E-mail" required>
                        <input type="password" name="senha" placeholder="Senha" id="senha" required>
                        <input type="password" name="repitaSenha" placeholder="Repeta a senha" id="Resenha" required>
                        <p class="cadastro-msg"></p>
                        <input type="submit" value="Cadastrar-se">
                    </div>
                    <div style="display: flex;">
                        <a href="#" class="btn">Já tens uma conta?</a>

                        <a href="index.php" class="btn btn-default simplemodal-close" id="okbtn" data-trans="ok">Voltar à loja</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <style>
        * {
            box-sizing: border-box
        }

        .card a {
            color: #80807a;
            transition: all .2s ease-in-out;
        }

        .card a:hover {
            color: rgb(0, 140, 255);
        }

        
        .login-msg {
            padding: 5px 0;
            color: red;
        }

        .cadastro-msg {
            padding: 5px 0;
            color: red;
        }

        /* style the container */
        #btn-login,
        #btn-cadastro,
        form {
            transition: all 2s ease-in-out;
        }

        /* style inputs and link buttons */
        input,
        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            margin: 5px 0;
            opacity: 0.85;
            display: inline-block;
            font-size: 17px;
            line-height: 20px;
            text-decoration: none;
            /* remove underline from anchors */
        }

        input:hover,
        .btn:hover {
            opacity: 1;
        }

        input {
            color: black;
        }

        /* style the submit button */
        input[type=submit] {
            background-color: #5596ff;
            color: white;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #3066ff;
        }

        /* Two-column layout */
        .col {
            float: left;
            width: 100%;
            margin: auto;
            margin-top: 6px;
        }

        .row {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* vertical line */
        .vl {
            position: absolute;
            left: 50%;
            transform: translate(-50%);
            border: 2px solid #ddd;
            height: 175px;
        }

        /* text inside the vertical line */
        .inner {
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 50%;
            padding: 8px 10px;
        }

        /* hide some text on medium and large screens */
        .hide-md-lg {
            display: none;
        }

        /* bottom container */
        .bottom-container {
            text-align: center;
            background-color: #666;
            border-radius: 0px 0px 4px 4px;
        }

        .div-btn {
            display: flex;
            justify-content: space-around;
        }

        /* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 650px) {
            .col {
                width: 100%;
                margin-top: 0;
            }

            /* hide the vertical line */
            .vl {
                display: none;
            }

            /* show the hidden text on small screens */
            .hide-md-lg {
                display: block;
                text-align: center;
            }
        }

        @media screen and (max-width: 824px) {
            header {
                display: none;
                color: white;
            }

            footer,
            .rodape-1 {
                display: none;
            }
        }
    </style>
    <script>
        document.getElementsByTagName("header")[0].style.display = "none";
        document.getElementsByTagName("footer")[0].style.display = "none";
        
        login = document.getElementById("login");
        cadastro = document.getElementById("cadastro");

        btnCadastro = document.getElementById("btn-cadastro");
        btnLogin = document.getElementById("btn-login");

        senha = document.getElementById("Resenha")

        function login_form() {
            btnCadastro.style.color = "rgb(0, 140, 255)";
            btnCadastro.style.backgroundColor = "rgba(0,0,0,0.3)";

            btnLogin.style.color = "white";
            btnLogin.style.backgroundColor = "rgb(0, 140, 255)";

            cadastro.style.display = "none";
            login.style.display = "block";
        }

        function cadastrar_form() {
            btnLogin.style.color = "rgb(0, 140, 255)";
            btnLogin.style.backgroundColor = "rgba(0,0,0,0.3)";

            btnCadastro.style.color = "white";
            btnCadastro.style.backgroundColor = "rgb(0, 140, 255)";

            login.style.display = "none";
            cadastro.style.display = "block";
        }

        // Get the subscription form
        const loginForm = document.querySelector('.card #login');
        // On submit event handler (submit button is pressed)
        loginForm.onsubmit = event => {
            event.preventDefault();
            // Bind the subscription form and execute AJAX request
            fetch(loginForm.action, {
                method: 'POST',
                body: new FormData(loginForm)
            }).then(response => response.text()).then(data => {
                // Output the response
                document.querySelector('.login-msg').innerHTML = data;
            });
        };

        // Get the subscription form
        const cadastroForm = document.querySelector('.card #cadastro');
        // On submit event handler (submit button is pressed)
        cadastroForm.onsubmit = event => {
            event.preventDefault();
            // Bind the subscription form and execute AJAX request
            fetch(cadastroForm.action, {
                method: 'POST',
                body: new FormData(cadastroForm)
            }).then(response => response.text()).then(data => {
                // Output the response
                document.querySelector('.cadastro-msg').innerHTML = data;
            });
        };
    </script>
</body>