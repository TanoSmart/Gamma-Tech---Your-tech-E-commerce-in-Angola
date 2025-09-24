<head>
    <link rel="stylesheet" href="public/css/contacto.css">
    <title>O futuro está a um taxi de distância ou a ligação!</title>
</head>

<body>
    <main id="main">
        <section class="inicio">
            <div class="carousel">
                <div class="slide">
                    <img src="public/images/contacto-imagem.jpg" alt="">

                    <div class="contacto-container">
                        <h2>Contactos</h2>
                        <div class="contacto-coluna">
                            <div>
                                <p>Na avenida da ENDE, São Paulo</p>
                                <p>Cx. Postal 578 Luanda-Angola</p>
                                <p>Tel: (+244) 948 679 436</p>
                                <p>(+244) 947 013 289</p>
                                <p>(+244) 958 291 126</p>
                                <p>Fax: +244 222 371 887</p>
                            </div>
                            <div>
                                <p>Email: gammatechcontactcenter@gt.ao</p>
                                <p>Recursos humanos</p>
                                <p>vagas@gt.ao</p>
                                <p>Direcção de Contact Center</p>
                                <p>gammatechcontactcenter@gt.ao</p>
                            </div>
                            <div>
                                <p>Em caso de perda, roubo ou extravio do Cartão o utilizador deverá avisar de imediato o GammaTech através dos números:</p>
                                <p>GammaTech através dos números:</p>
                                <p>(+244) 948 679 436</p>
                                <p>(+244) 948 679 436</p>
                                <p>(+244) 958 291 126</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="newsletter">
            <div class="texto">
                <h3>Formulário de Contacto</h3>
                <p>Na GammaTech as suas questões, opiniões, dúvidas, reclamações e sugestões têm sempre resposta e são fundamentais para melhorarmos continuamente os nossos serviços.</p>
            </div>
            <div class="container">
                <form action="action_page.php">

                    <label for="fname">Primeiro Nome</label>
                    <input type="text" id="fname" name="firstname" placeholder="Seu nome..">

                    <label for="lname">Ultimo Name</label>
                    <input type="text" id="lname" name="lastname" placeholder="Seu sobrename..">

                    <label for="country">País</label>
                    <select id="country" name="country">
                        <option value="luanda">Luanda</option>
                        <option value="Bengo">Bengo</option>
                        <option value="cuanza-sul">Cuanza Sul</option>
                    </select>

                    <label for="subject">Assunto</label>
                    <textarea id="subject" name="assunto" placeholder="Escreva algo.." style="height:200px"></textarea>

                    <input type="submit" value="Enviar">

                </form>
            </div>

        </section>
    </main>
    <style>
        /* Style inputs with type="text", select elements and textareas */
        input[type=text],
        select,
        textarea {
            width: 100%;
            /* Full width */
            padding: 12px;
            /* Some padding */
            border: 1px solid #ccc;
            /* Gray border */
            border-radius: 4px;
            /* Rounded borders */
            box-sizing: border-box;
            /* Make sure that padding and width stays in place */
            margin-top: 6px;
            /* Add a top margin */
            margin-bottom: 16px;
            /* Bottom margin */
            resize: vertical
                /* Allow the user to vertically resize the textarea (not horizontally) */
        }

        /* Style the submit button with a specific background color etc */
        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* When moving the mouse over the submit button, add a darker green color */
        input[type=submit]:hover {
            background-color: #45a049;
        }

        /* Add a background color and some padding around the form */
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            align-items: center;
        }

        a:hover {
            color: red;
            transition-duration: 2s;
        }

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

        .carousel.active .slide {
            left: 100%;
        }

        .texto {
            display: flex;
            flex-direction: column;
        }
    </style>
</body>