<?php
     session_start();

   // print_r($_REQUEST);

   if (isset($_POST['submit']) && !empty($_POST['senha'])) {

    include_once ('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //print_r('Email:' . $email);
    //print_r('<br>');
   //print_r('Senha: ' . $senha);
   
     $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

     $result = $conexao -> query($sql);

     //print_r($sql);
     //print_r($result);

     if(mysqli_num_rows($result) < 1)
     {
        //print_r('Não Existe!');
        unset ($_SESSION['email']);
        unset ($_SESSION['senha']);
        header('location: login.php');
     } 
     
     else{

        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        //print_r('Existe!');

        header('location: sistema.php');

     }
     
   }
   else{
           header('location: login.php');
   }

?>