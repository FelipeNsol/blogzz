<?php
include_once 'database.class.php';
$db = new Database('localhost', 'postagens', 'root', 'Pudimebom');
$info = $db->getCategoria($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Editar post - BotCoversa</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="" />
    <meta name="author" content="Forum" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--====== CSS Files LinkUp ======-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/glightbox.min.css" />
    <link rel="stylesheet" href="css/lineIcons.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/css.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/postspage.css" />

    <!--====== Favicon Icon ======-->
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $situation = intval($_POST['situation']);
        $db->updateCategory($_GET['id'], $_POST['category'], $_POST['department'], $situation);
        header('location: ./categorias.php');
        exit;
    }

    ?>
    <header>
        <h3>Editar categoria</h3>
    </header>
    <form name='postForm' method="POST">
        <main>
            <h6>Título da categoria</h6>
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="<?php echo $info['name'] ?>" aria-label="Categoria" name='category' aria-describedby="basic-addon1">
            </div>
            <div class='contained'>
                <span>
                    <h6>Departamento principal</h6>
                    <select class="form-select form-select-lg mb-3 bs-success" name='department' aria-label=".form-select-lg example">
                        <option value='nenhum'>Nenhum</option>
                        <?php
                        $departamentos = $db->getDepartamentos();
                        foreach ($departamentos as $departamento) {
                            if ($departamento['name'] === $info['departamento']) {
                                echo '<option selected value="' . $departamento['name'] . '">' . $departamento['name'] . '</option>';
                            } else {
                                echo '<option value="' . $departamento['name'] . '">' . $departamento['name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </span>
                <span>
                    <h6>Situação</h6>
                    <select class="form-select form-select-lg mb-3 bs-success" name='situation' aria-label=".form-select-lg example">
                        <option value="1" selected>Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </span>
            </div>
            <span>
                <a href='./categorias.php'>
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </a>
                <button type="submit" id='submitBtn' name='submit' class="btn btn-success">Salvar</button>
            </span>
        </main>
    </form>
</body>
</html>