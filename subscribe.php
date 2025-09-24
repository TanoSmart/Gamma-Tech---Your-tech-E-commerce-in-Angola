<?php
include 'backend/conexao.php';
// Ensure post variable exists
if (isset($_POST['email'])) {
    // Validate email address
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit('Por favor use um email válido!');
    }
    // Check if email exists in the database
    $stmt = $conn->prepare('SELECT * FROM subscritos WHERE email = ?');
    $stmt->execute([ $_POST['email'] ]);
    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        exit('Já és um subscritor!');
    }
    // Insert email address into the database
    $stmt = $conn->prepare('INSERT INTO subscritos (email,data_subscrivido) VALUES (?,?)');
    $stmt->execute([ $_POST['email'], date('Y-m-d\TH:i:s') ]);
    // Output success response
    exit('Obrigado por ti subscreveres!');
} else {
    // No post data specified
    exit('Por favor use um email válido!');
}
?>