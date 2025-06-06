<?php
date_default_timezone_set('America/Sao_Paulo');

require 'header.php'
?>

<div class="inicio">
    <div class="bg-light p-4 mb-4 rounded">
        <h1 class="text-center">Formulário para contato</h1>
    </div>

    <div class="row">
        <?php
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS); //trocar input_get por input_post erro 3
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL); //trocar input_get por input_post erro 4
        $msg = filter_input(INPUT_POST, "msg", FILTER_SANITIZE_SPECIAL_CHARS); //trocar input_get por input_post erro 5

        echo "<p>Nome informado: $nome</p>";
        echo "<p>Email: $email</p>";
        echo "<p>mensagem: $msg</p>";
        echo "<p>Data: " . date("d/m/Y - H:i:s") . "</p>";

        require "conexao.php";

        $sql = "insert into contato (nome, email, mensagem) values (?, ?, ?)"; //adicionar campo mensagem erro 6

        try {
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([$nome, $email, $msg]); //remover campo senha e adicionar a mensagem no stmt erro 7
        } catch (Exception $e) {
            $result = false;
            $error = $e->getMessage();
        }

        if ($result == true) { //Erro de lógica deve ser == true e não !== erro 8
        ?>
            <div class="alert alert-success" role="alert">
                <h4>Dados gravados com sucesso!</h4>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger" role="alert">
                <h4>Falha ao efetuar gravação.</h4>
                <p><?php echo $error; ?></p>
            </div>            
        <?php
        }
        ?>

    </div>
    <a href="contato.php" class="btn btn-info ms-5" role="button">Voltar</a>
</div>

<?php
require 'footer.php'
?>