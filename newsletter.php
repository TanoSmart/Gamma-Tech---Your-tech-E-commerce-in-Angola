<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <title>Newsletter</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
</head>

<body>

    <h1>Newsletter</h1>

    <p>Hello world!</p>

    <div class="newsletter-popup">
        <div class="newsletter-popup-container">

            <a href="#" class="newsletter-popup-close-btn">&times;</a>

            <h3><i class="fa-regular fa-envelope"></i>Subscribe To Our Newsletter</h3>

            <p>Join our subscribers list to get the latest news, updates, and special offers directly in your inbox.</p>

            <form action="subscribe.php" method="post">
                <input type="email" name="email" placeholder="Your Email" required>
                <button type="submit">Subscribe</button>
            </form>

            <p class="newsletter-msg"></p>

        </div>
    </div>
    <script>
        // Will prevent the popup from reopening when the close button is clicked
        let keepClosed = false;
        // Open the newsletter subscription popup
        const openNewsletterPopup = () => {
            // Update the style and element properties
            document.querySelector('.newsletter-popup').style.display = 'flex';
            document.querySelector('.newsletter-popup').getBoundingClientRect();
            document.querySelector('.newsletter-popup').classList.add('open');
            document.querySelector('.newsletter-popup-container').getBoundingClientRect();
            document.querySelector('.newsletter-popup-container').classList.add('open');
        };
        const closeNewsletterPopup = () => {
            // Revert the element properties
            document.querySelector('.newsletter-popup').style.display = 'none';
            document.querySelector('.newsletter-popup').classList.remove('open');
            document.querySelector('.newsletter-popup-container').classList.remove('open');
            // Keep it closed!
            keepClosed = true;
        };
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
        // Close button onclick event handler
        document.querySelector('.newsletter-popup-close-btn').onclick = event => {
            event.preventDefault();
            // CLose the popup widget
            closeNewsletterPopup();
        };
        // Open the popup widget when the user reaches a specific point while scrolling down
        document.addEventListener('scroll', () => {
            // If you want to open the widget further down the page, increase the 400 value
            if (window.scrollY >= 400 && !keepClosed) {
                // Open the widget
                openNewsletterPopup();
            }
        });
    </script>
    <style>
        * {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
            font-size: 16px;
        }

        body {
            margin: 0;
            padding: 15px;
            height: 3000px;
        }

        .newsletter-popup {
            display: none;
            justify-content: center;
            align-items: center;
            background-color: transparent;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999999;
            transition: all .3s ease;
        }

        .newsletter-popup .newsletter-popup-container {
            position: relative;
            display: flex;
            flex-flow: column;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
            width: 500px;
            transform: scale(0.3);
            transition: all .3s ease;
        }

        .newsletter-popup .newsletter-popup-container.open {
            transform: scale(1);
        }

        .newsletter-popup .newsletter-popup-container h3 {
            font-size: 20px;
            font-weight: 500;
            margin: 0;
            padding: 10px 0 10px;
            color: #4d5561;
        }

        .newsletter-popup .newsletter-popup-container h3 i {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #4d5561;
            color: #fff;
            margin-right: 10px;
        }

        .newsletter-popup .newsletter-popup-container p {
            margin: 0;
            padding: 15px 0;
            color: #8d9092;
        }

        .newsletter-popup .newsletter-popup-container form {
            display: flex;
            padding: 15px 0 10px;
        }

        .newsletter-popup .newsletter-popup-container form input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            outline: none;
        }

        .newsletter-popup .newsletter-popup-container form input::placeholder {
            color: #8d9092;
        }

        .newsletter-popup .newsletter-popup-container form button {
            width: 200px;
            appearance: none;
            background-color: #4d5561;
            font-weight: 500;
            font-size: 14px;
            color: #fff;
            border: 0;
            cursor: pointer;
        }

        .newsletter-popup .newsletter-popup-container form button:hover {
            background-color: #424953;
        }

        .newsletter-popup .newsletter-popup-container .newsletter-popup-close-btn {
            position: absolute;
            right: 20px;
            top: 20px;
            text-decoration: none;
            color: #ddd;
            font-size: 30px;
            line-height: 20px;
        }

        .newsletter-popup .newsletter-popup-container .newsletter-popup-close-btn:hover {
            color: #c4c4c4;
        }

        .newsletter-popup .newsletter-popup-container .newsletter-msg {
            padding: 5px 0;
        }

        .newsletter-popup.open {
            display: flex;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .send-newsletter-form {
            background-color: #fff;
            width: 500px;
            margin: 0 auto;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
        }

        .send-newsletter-form h1 {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 25px;
            font-size: 20px;
            text-align: center;
            border-bottom: 1px solid #eceff2;
            color: #6a737f;
            font-weight: 600;
            background-color: #f9fbfc;
        }

        .send-newsletter-form h1 i {
            padding-right: 10px;
            font-size: 24px;
        }

        .send-newsletter-form .fields {
            position: relative;
            padding: 20px;
        }

        .send-newsletter-form input[type="text"] {
            margin-top: 15px;
            padding: 15px;
            border: 1px solid #dfe0e0;
            width: 100%;
            outline: 0;
            font-size: 14px;
        }

        .send-newsletter-form input[type="text"]:focus {
            border: 1px solid #c6c7c7;
        }

        .send-newsletter-form textarea {
            resize: none;
            margin-top: 15px;
            padding: 15px;
            border: 1px solid #dfe0e0;
            width: 100%;
            height: 150px;
            outline: 0;
            font-size: 14px;
        }

        .send-newsletter-form textarea:focus {
            border: 1px solid #c6c7c7;
        }

        .send-newsletter-form input[type="submit"] {
            display: block;
            margin-top: 15px;
            padding: 15px;
            border: 0;
            background-color: #cb5f51;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
            width: 100%;
        }

        .send-newsletter-form input[type="submit"]:hover {
            background-color: #c15b4d;
        }

        .send-newsletter-form input[type="submit"]:disabled {
            background-color: #999999;
        }

        .send-newsletter-form .field {
            display: inline-flex;
            position: relative;
            width: 100%;
            padding-bottom: 20px;
        }

        .send-newsletter-form label {
            font-size: 14px;
            font-weight: 600;
            color: #8e939b;
        }

        .send-newsletter-form .responses {
            padding: 0;
            margin: 0;
        }

        .send-newsletter-form .multi-select-list {
            border: 1px solid #dfe0e0;
            margin: 15px 0;
            overflow-y: auto;
            max-height: 150px;
        }

        .send-newsletter-form .multi-select-list label {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #f3f3f3;
        }

        .send-newsletter-form .multi-select-list label input {
            margin-right: 15px;
        }

        .send-newsletter-form .multi-select-list label:last-child {
            border-bottom: 0;
        }
    </style>

</body>

</html>
