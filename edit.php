<?php
     
if(!empty($_GET['id']))
     
     {
       
      include_once("config.php");

      $id = $_GET['id'];

      $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

      $result = $conexao->query($sqlSelect);

      if($result->num_rows > 0)
      {
        while($user_data = mysqli_fetch_assoc($result))
        {
            $nome = $user_data['nome'];      
            $email = $user_data['email'];
            $senha = $user_data["senha"];
            $telefone = $user_data['telefone'];
            $sexo = $user_data['sexo'];
            $data_nasc= $user_data['data_nasc'];
            $cidade = $user_data['cidade'];
            $estado = $user_data['estado'];
            $endereco = $user_data['endereco'];

        }
          //print_r($nome);
      }
      else {
        header('location: sistema.php');
      }
          
     }
     else{

        header('location: sistema.php');
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórmulario|HV</title>
    <link rel='stylesheet' type='text/css' media='screen' href='editar.css'>
</head>
<body>

     <a href="sistema.php">Voltar</a>
    
     <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Fórmulario de Clientes</b></legend>
                <br>

                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" value="<?php echo $senha ?>" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>

                    <div class="inputBox">
                        <input type="text" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                        <label for="email" class="labelInput">E-mail</label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone ?>" required>
                        <label for="telefone" class="labelInput">Telefone</label>
                    </div>
                    
                                  
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" <?php echo ($sexo == 'feminino') ? 'checked': '' ?> required>
                <label for="feminino">Feminino</label><br>
                <input type="radio"id="masculino" name="genero" value="masculino" <?php echo ($sexo == 'masculino') ? 'checked': '' ?> required>
                <label for="masculino">Masculino</label><br>
                <input type="radio"id="outro" name="genero" value="outro" <?php echo ($sexo == 'outro') ? 'checked': '' ?> required>
                <label for="outro">Outro</label>
                <br><br>

                    <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                    <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nasc ?>"  required>                    
                
                <br><br><br>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade ?>" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo $estado ?>" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">          
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
    </div>
</body>
</html>