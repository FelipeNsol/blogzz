<?php
include_once 'database.class.php';
$db = new Database('localhost', 'postagens', 'root', 'Pudimebom');
$url = $_SERVER['REQUEST_URI'];
$encoded = urldecode($url);
$parts = parse_url($encoded);
$path = $parts['path'];
$segments = explode('/', $path);
$title = end($segments);
$date = $segments[count($segments) - 2];

$postContent = $db->getPostContent($date, $title);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Logzz blog</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="" />
    <meta name="author" content="Forum" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--====== CSS Files LinkUp ======-->
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/animate.css" />
    <link rel="stylesheet" href="../../css/glightbox.min.css" />
    <link rel="stylesheet" href="../../css/lineIcons.css" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/css.css" />

    <!--====== Favicon Icon ======-->
</head>

<body>
    <header class="header-area">
        <div class="navbar-area">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-expand-sm">
                        <a class="navbar-brand" href="index.html" style="width: 250px; height: auto;">
                            <img width="200" height="50" src="https://logzz.com.br/wp-content/uploads/2022/06/Ativo-1.svg" alt="Logo" />
                        </a>
                        <div class="input-group d-flex justify-content-end" style="margin-right: 100px;">
                            <div class="form-outline d-flex">
                                <span class="input-group-addon">
                                    <button type="button" class="btn" style="height: 38px; color: #5c6975; border-bottom: #5c6975;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                                <input type="search" id="form1" class="form-control" placeholder="Busca">
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main id="tt-pageContent" class="tt-offset-small my-lg-5 my-md-5">
        <div class="container">
            <div class="tt-topic-list">
                <div class="col-12 d-flex">
                    <div class="col-3" style="overflow-y: scroll; margin-right: 10%;">
                        <div class="d-flex" style="margin-bottom: 30px;">
                            <a style="padding-right: 5px;">👋</a>
                            <a href="#">Bem vindo à central de ajuda do BotConversa!</a>
                        </div>
                        <a href="index.html">COMECE POR AQUI! - AULAS SEQUÊNCIAIS</a>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item especific">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Primeiros Passos
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <a href="aula-1.html">
                                            <div class="accordion-body">
                                                <strong>Aula 1</strong> Example.
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="accordion-body">
                                                <strong>Aula 2</strong> Example.
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="accordion-body">
                                                <strong>Aula 3</strong> Example.
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item especific">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Como conectar
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Example.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9" style="margin-left: 20px;">
                        <?php
                        echo '<div><img src="'. $postContent['image'].'"/></div>';
                        echo '<h1 style="color: #3b454e">' . $postContent['title'] . '</h1>';
                        echo '<h6 style="color: #8899a8">' . $postContent['subtitle'] . '</h6>';
                        echo '<p>' . $postContent['content'] . '</p>';
                        ?>
                    </div>
    </main>
    <script src="https://kit.fontawesome.com/2eacbb5535.js" crossorigin="anonymous"></script>
</body>

</html>