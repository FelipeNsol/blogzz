<?php
include_once 'database.class.php';
$db = new Database('localhost', 'postagens', 'root', 'Pudimebom');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Criar novo post - BotCoversa</title>
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
        
        $db->uploadPost($_POST['title'], $_POST['textEditorValue'], 'admin', $_POST['categorias'], $imgPath, $_POST['subtitle']);
        header('Location: ./create-post.php');
        exit;
    }
    ?>
    <form name='postForm' method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Título</span>
            <input type="text" name='title' class="form-control" placeholder="Digite o título da postagem aqui..." aria-label="Título" required />
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Subtítulo</span>
            <input type="text" name='subtitle' class="form-control" placeholder="Digite o subtítulo da postagem aqui..." aria-label="Subtítulo" required />
        </div>
        <select name='categorias' class="form-select" aria-label="Default select example" placeholder='Selecione a categoria'>
            <option value="" disabled selected>Selecione a categoria</option>
            <?php $categorias = $db->getCategorias();
                foreach($categorias as $categoria) {
                echo "<option value=".$categoria['name'].">".$categoria['name']."</option>";    }
            ?>
        </select>
        <div id='imgWrapper'></div>
        <div class="input-group mb-3" placeholder="Escolher imagem de fundo">
            <input type='file' id='image' onchange="displayImage()" name='image' accept="image/png, image/gif, image/jpeg, image/webp">
        </div>
        <div class='editorWrapper'>
            <div id="editor">
                <h1>Olá mundo!</h1>
                <p>Comece <strong>escrevendo</strong> agora</p>
                <p><br></p>
            </div>
        </div>
        <input type='text' style='display: none;' name='textEditorValue' id='textEditorValue' />
        <button type="submit" id='submitBtn' name='submit' class="btn btn-green">Salvar</button>
    </form>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src='js/textEditor.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.17.7/tagify.min.js" integrity="sha512-BO4lu2XUJSxHo+BD3WLBQ9QoYgmtSv/X/4XFsseeCAxK+eILeyEXtGLHFs2UMfzNN9lhtoGy8v8EMFPIl8y+0w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var input = document.querySelector('input[name=tags]')
        tagify = new Tagify(input);
        input.addEventListener('change', console.log(input.value))
    </script>
</body>

</html>