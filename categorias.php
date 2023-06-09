<?php
include_once 'database.class.php';
$db = new Database('localhost', 'postagens', 'root', 'Pudimebom');
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
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <form class="modal-content" method='POST'>
                <?php
                if (isset($_POST['excluir'])) {
                    $db->deleteCategory($_POST['excludeId']);
                    header('location: ./categorias.php');
                    exit;
                }
                ?>
                <div class="modal-body">
                    <span class='icon'>
                        <i class="bi bi-trash-fill"></i>
                    </span>
                    <input type='text' name='excludeId' id='excludeId' class='d-none' />
                    <h4 class="modal-title">Excluir categoria</h4>
                    <p>Tem certeza que deseja excluir?</p>
                    <span>
                        <button type='button' class="btn bg-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn bg-success" name='excluir'>Excluir</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <header>
        <h3>Listagem de categorias</h3>
        <span>
            <a href="./criar-categoria.php"><button class='btn btn-green'><i class="bi bi-plus-circle-fill"></i>Adicionar novo</button></a>
            <button class='btn btn-green'><i class="bi bi-funnel-fill"></i> Filtros</button>
        </span>
    </header>
    <table>
        <tr id="tableTitles">
            <th>Categoria</th>
            <th>Departamento</th>
            <th>Situação</th>
            <th>Ações</th>
        </tr>
        <?php $departamentos = $db->getCategorias();
        foreach ($departamentos as $departamento) {
            $strDate = strtotime($departamento['create_time']);
            $date = date('d-m-Y H:i', $strDate);
            if ($departamento['situacao'] === 0) {
                $situacao = 'inativo';
            } else {
                $situacao = 'ativo';
            }
            echo "<tr><td>" . $departamento['name'] . "</td><td>" . $departamento['departamento'] . "</td><td>$situacao</td><td><a href='./editar-categoria.php?id=".$departamento['id']."'><button class='btn btn-green small'><i class='bi bi-pencil-fill'></i></button></a><button data-bs-toggle='modal' data-bs-target='#deleteModal' onClick='setExclusion(" . $departamento['id'] . ")' class='btn btn-green small'><i class='bi bi-trash-fill'></i></button></td></tr>";
        } ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script>
        function setExclusion(id) {
            document.getElementById('excludeId').value = id
        }

    </script>

</html>