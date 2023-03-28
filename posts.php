<?php
include_once 'database.class.php';
$db = new Database('localhost', 'postagens', 'root', 'Pudimebom')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Todas as postagens - BotCoversa</title>
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
    <link rel="stylesheet" href="css/postspage.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!--====== Favicon Icon ======-->
</head>

<body>
    <header>
        <h3>Todos as postagens</h3>
        <span>
            <a href="./create-post.php"><button class='btn btn-green'><i class="bi bi-plus-circle-fill"></i> Novo Post</button></a>
            <button class='btn btn-green'><i class="bi bi-funnel-fill"></i> Filtros</button>
        </span>
    </header>
    <table>
        <tr id="tableTitles">
            <th>Título</th>
            <th>Autor</th>
            <th>Categorias</th>
            <th>Data de criação</th>
            <th>Opções</th>
        </tr>
        <?php $db->getPostsInRows() ?>
    </table>
</body>

</html>