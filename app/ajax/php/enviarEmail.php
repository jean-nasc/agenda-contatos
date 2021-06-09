<?php

if(!empty($_POST['nomeContato']) && !empty($_SESSION['USUARIO'])){
    
    $nomeContato = $_POST['nomeContato'];
    $emailUsuario = $_SESSION['USUARIO']['email'];
    $nomeUsuario = $_SESSION['USUARIO']['nome'];

    $to      = $emailUsuario;
    $subject = "Novo contato cadastrado!";
    $message = "Olá " . $nomeUsuario . ", seu novo contato " .$nomeContato. " foi cadastrado com sucesso!";
    $headers = "From: " . $emailUsuario . "\r\n";
    $headers += "Reply-To: " . $emailUsuario;

    mail($to, $subject, $message, $headers);

    echo "Um e-mail de sucesso ao cadastrar contato foi enviado para você!";

}else{
    echo "Falha ao tentar envia e-mail!";
}
