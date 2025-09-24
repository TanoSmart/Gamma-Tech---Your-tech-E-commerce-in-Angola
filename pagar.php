<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['pagamento'] = $_POST;
    header("Location: sucesso.php");
    exit();
}
?>
<head>
    <title>Efectuar Pagamento</title>
</head>

<body>
    <div class="row">
        <div class="col-75">
            <div class="container">
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
                                    <option>Transferência</option>
                                </select>
                            </label>
                            <label for="cname">Nome no Cartão</label>
                            <input type="hidden" name="amount" value="2100">

                            <label for="ccnum">Numéro do cartão de credito</label>
                            <input type="hidden" name="currency_code" value="KZ">
                        </div>
                </form>

            </div>
            <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
            </label>
            <input type="submit" value="Pagar com PayPal" class="btn">
            </form>
        </div>
    </div>

    <div class="col-25">
        <div class="container">
            <h4>Carrinho
                <span class="price" style="color:black">
                    <i class="fa fa-shopping-cart"></i>
                    <b>4</b>
                </span>
            </h4>
            <p><a href="#">Produto 1</a> <span class="price">Kz 600</span></p>
            <p><a href="#">Produto 2</a> <span class="price">Kz 500</span></p>
            <p><a href="#">Produto 3</a> <span class="price">Kz 800</span></p>
            <p><a href="#">Produto 4</a> <span class="price">Kz 200</span></p>
            <hr>
            <p>Total <span class="price" style="color:black"><b>Kz 2100</b></span></p>
        </div>
    </div>
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=SEU_CLIENT_ID"></script>

    <div id="paypal-button-container"></div>

    <script>
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

    <style>
        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
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

        .btn:hover {
            background-color: #45a049;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
</body>