<?php
include_once 'database.class.php';
$db = new Database('localhost', 'postagens', 'root', 'Pudimebom');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Primeiros passos - BotCoversa</title>
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
    <link rel="stylesheet" href="css/textEditor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/tags.css" />

    <!--====== Favicon Icon ======-->
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $categories = json_decode($_POST['tags']);
        $arrayOfCategories = [];
        foreach($categories as $tag => $object) {
            array_push($arrayOfCategories, $object->value);
        }
        array_pop($arrayOfCategories);
        $formatted_categories = implode(", ", $arrayOfCategories);
        $db->uploadPost($_POST['title'], $_POST['textEditorValue'], 'admin', $formatted_categories, 'bar', $_POST['subtitle']);
        header('Location: ./create-post.php');
        exit;
    }
    ?>
    <form name='postForm' method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Título</span>
            <input type="text" name='title' class="form-control" placeholder="Digite o título da postagem aqui..." aria-label="Título" required/>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Subtítulo</span>
            <input type="text" name='subtitle' class="form-control" placeholder="Digite o subtítulo da postagem aqui..." aria-label="Subtítulo" required/>
        </div>
        <div class="input-group mb-3">
            <input name="tags" required class="form-control" placeholder="Escreva as categorias separadas por vírgulas">
        </div>
        <div class="input-group mb-3" placeholder="Escolher imagem de fundo">
            <input type='file' accept="image/png, image/gif, image/jpeg, image/webp">
        </div>
        <div class="editor">
            <div class="toolbar">
                <button value='inactive' class="btn btn1" data-command="bold"><b>B</b></button>
                <button value='inactive' class="btn btn1" data-command="italic"><i>I</i></button>
                <button value='inactive' class="btn btn1" data-command="underline"><u>U</u></button>
                <button value='inactive' class="btn btn1" data-command="strikeThrough"><s>S</s></button>
                <button value='inactive' class="btn btn1" data-command="justifyLeft"><i class="fas fa-align-left"></i></button>
                <button value='inactive' class="btn btn1" data-command="justifyCenter"><i class="fas fa-align-center"></i></button>
                <button value='inactive' class="btn btn1" data-command="justifyRight"><i class="fas fa-align-right"></i></button>
                <button value='inactive' class="btn btn1" data-command="insertOrderedList"><i class="fas fa-list-ol"></i></button>
                <button value='inactive' class="btn btn1" data-command="insertUnorderedList"><i class="fas fa-list-ul"></i></button>
                <button value='inactive' class="btn btn1" data-command="undo"><i class="fas fa-undo"></i></button>
                <button value='inactive' class="btn btn1" data-command="redo"><i class="fas fa-redo"></i></button>
                <button value='inactive' class="btn btn1" data-command="createLink"><i class="fas fa-link"></i></button>
                <button value='inactive' class="btn btn1" data-command="unlink"><i class="fas fa-unlink"></i></button>
                <select class="btn" data-command="formatBlock">
                    <option value="p">Paragraph</option>
                    <option value="h1">Heading 1</option>
                    <option value="h2">Heading 2</option>
                    <option value="h3">Heading 3</option>
                    <option value="h4">Heading 4</option>
                    <option value="h5">Heading 5</option>
                    <option value="h6">Heading 6</option>
                </select>
            </div>
            <div contenteditable="true" id='textEditor' class="content"></div>
        </div>
        <input type='text' style='display: none;' name='textEditorValue' id='textEditorValue' />
        <button type="button" id='submitBtn' name='submit' class="btn btn-green">Salvar</button>
    </form>

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