<?php
if (isset($_POST['Email'])) {

    $email_to = "conneelydave@hotmail.com";
    $email_subject = "New form submissions";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact - Dave Conneely Construction</title>
        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>

    <body id="contact">
        <header class="main-header">

            <div class="container grid">

                <div class="logo"> <a href="index.html"> <img src="assets/images/logo.svg" alt="Playhouses logo"></a></div>

                <nav class="main-nav">
                    <ul class="unstyled-list">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>

                <div class="nav-toggle">
                    <div class="hamburger"></div>
                </div>
            </div>
        </header>

    <div class="container grid">
        <div class="contact-main-content">
            <h3>Thank you for contacting us!</h1>
            <p>We will be in touch with you very soon.</p>
        </div>
    </div>


        <!--=======Footer========-->

            <footer>
            <div class="container container-footer">
                <div class="footer-logo"><img src="assets/images/logo.svg" alt="Dave Conneely Construction Logo">
                </div>
                <nav class="footer-nav">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="services.html">Services</a></li>
                        <!-- <li><a href="gallery.html">Gallery</a></li> -->
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <div class="footer-text">
                <p>Copyright © Dave Conneely 2022. All Rights Reserved.</p>
                <p>Created by <a href="https://westatlanticdesign.ie">West Atlantic Design</a> </p>
            </div>
        </footer>


        <!--=======Javascript========-->
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
    </body>

</html>

<?php
}
?>

