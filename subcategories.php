<?php
include_once 'database.class.php';
$db = new Database('localhost', 'postagens', 'root', 'Pudimebom');
$postContent = $db->getPostContent($_GET['date'], $_GET['title']);
$categories = explode(", ", $postContent['categories']);
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
        $formattedCategories = implode(', ', $_POST['category']);
        $db->updatePostCategories($postContent['id'], $formattedCategories);
        header("Refresh: 0");
        exit;
    }
    ?>
    <form name='postForm' method="POST" enctype="multipart/form-data">
        <h1 style='margin: 24px 0px; align-self:flex-start;'>Escolha as Subcategorias</h1>
        <div class="input-group mb-3">
            <input type="text" id='categoryText' class="form-control" placeholder="Nova subcategoria" aria-label="Nova subcategoria" aria-describedby="basic-addon2">
            <span class="input-group-text"><button type='button' class="btn btn-primary" id='addCategory'>Adicionar</button></span>
        </div>
        <div id="listOfCategories">
            <?php foreach ($categories as $category) {
                echo "<div class='itemList'><input type='text' readonly class='itemList' name='category[]' value='$category'/>
                <input type='checkbox'></div>";
            } ?>
        </div>
        <button type="submit" id='submitBtn' name='submit' class="btn btn-green">Salvar</button>

    </form>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src='js/textEditor.js'></script>
    <script src="js/sortable.min.js"></script>
    <script>
        const list = document.getElementById('listOfCategories')
        new Sortable(list, {
            animation: 150,
            ghostClass: 'blue-background-class'
        });

        const addNew = document.getElementById('addCategory');
        addNew.addEventListener('click', () => {
            if (document.getElementById('categoryText').value !== '') {
                document.getElementById('listOfCategories').innerHTML = `<div class="itemList"><input class='itemList' type="text" readonly name="category[]" value="${document.getElementById('categoryText').value}"/><input type='checkbox'></div>` + document.getElementById('listOfCategories').innerHTML
            }
            document.getElementById('categoryText').value = '';
        })

    </script>
</body>

</html>