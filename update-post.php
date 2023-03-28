<?php
include_once 'database.class.php';
$db = new Database('localhost', 'postagens', 'root', 'Pudimebom');
$postContent = $db->getPostContent($_GET['date'], $_GET['title']);
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
    <link rel="stylesheet" href="css/tags.css" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="css/textEditor.css">

    <!--====== Favicon Icon ======-->
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $file = $_FILES['image']['name'];
        $destdir = 'img/';
        //$img = file_get_contents($file);
        $imgPath = $destdir . substr($file, strrpos($file, '/'));
        move_uploaded_file($_FILES['image']['tmp_name'], $imgPath);

        $categories = json_decode($_POST['tags']);
        $arrayOfCategories = [];
        foreach ($categories as $tag => $object) {
            array_push($arrayOfCategories, $object->value);
        }
        $formatted_categories = implode(", ", $arrayOfCategories);
        $db->updatePostContent($_POST['id'], $_POST['title'], $_POST['textEditorValue'], $_POST['subtitle']);
        header('Location: ./create-post.php');
        exit;
    }
    ?>
    <form name='postForm' method="POST" enctype="multipart/form-data">
        <input type='text' style="display: none;" name="id" value="<?php echo $postContent['id']?>">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Título</span>
            <input type="text" name='title' class="form-control" placeholder="Digite o título da postagem aqui..." aria-label="Título" required value="<?php echo $postContent['title']?>" />
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Subtítulo</span>
            <input type="text" name='subtitle' class="form-control" placeholder="Digite o subtítulo da postagem aqui..." aria-label="Subtítulo" required value="<?php echo $postContent['subtitle']?>"/>
        </div>
        <div id='imgWrapper'><img src="./<?php echo $postContent['image']?>"></div>
        <div class='editorWrapper'>
            <div id="editor">
                <?php echo $postContent['content'] ?>
            </div>
        </div>
        <input type='text' style='display: none;' name='textEditorValue' id='textEditorValue' value='<?php echo $postContent['content'] ?>' />
        <button type="submit" id='submitBtn' name='submit' class="btn btn-green">Salvar</button>
    </form>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src='js/textEditor.js'></script>
</body>
</html>