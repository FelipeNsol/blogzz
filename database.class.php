<?php

class Database {

    protected $conn;
    protected $dbHost;
    protected $dbName;
    protected $dbUser;
    protected $dbUserPass;

    public function __construct($host, $name, $user, $pass)
    {
        $this->dbHost = $host;
        $this->dbName = $name;
        $this->dbUser = $user;
        $this->dbUserPass = $pass;
        $this->conn = new PDO( 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUser, $this->dbUserPass );
    }

    protected function getPosts()
    {
        $stmt = $this->conn->query("SELECT * FROM posts ORDER BY create_time DESC");
        $posts = $stmt->fetchAll();
        return $posts;
    }

    public function getPostsInRows() {
        $posts = $this->getPosts();

        foreach ($posts as $post) {
            $strDate = strtotime($post['create_time']);
            $date = date('d-m-Y H:i', $strDate);
            $dateUrl = date('d-m-Y', $strDate);
            echo '<tr><td>'.$post['title'].'</td><td>'.$post['creator'].'</td><td>'.$post['categories'].'</td><td>'.$date.'</td><td><a target="blank" href="post-page.php/'.$dateUrl.'/'.urlencode($post['title']).'"><button class="btn btn-green small"><i class="bi bi-box-arrow-up-right"></i></button></a><a target="blank" href="update-post.php?date='.$dateUrl.'&title='.urlencode($post['title']).'"><button class="btn btn-green small"><i class="bi bi-pencil-fill"></i></button></a></td></tr>';
        }
    }

    public function uploadPost($title, $content, $author, $categories, $imgPath, $subtitle) {
        $stmt = $this->conn->prepare("INSERT INTO `posts` (`id`, `title`, `subtitle`, `content`, `categories`, `creator`, `image`, `create_time`) VALUES (UNIX_TIMESTAMP(NOW()), :TITLE, :SUBTITLE, :CONTENT, :CATEGORIES, :CREATOR, :IMAGE, NOW());");
        $stmt->bindParam(':TITLE', $title);
        $stmt->bindParam(':SUBTITLE', $subtitle);
        $stmt->bindParam(':CONTENT', $content);
        $stmt->bindParam(':CATEGORIES', $categories);
        $stmt->bindParam(':CREATOR', $author);
        $stmt->bindParam(':IMAGE', $imgPath);
        $stmt->execute();
    }

    public function getPostContent($date, $title) {
        $stmt = $this->conn->prepare("SELECT * FROM `posts` WHERE create_time LIKE CONCAT('%', STR_TO_DATE(:DATE,'%d-%m-%Y'), '%') AND title = :TITULO;");
        $stmt->bindParam(':DATE', $date);
        $stmt->bindParam(':TITULO', $title);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function updatePostContent($id, $title, $content, $subtitle) {
        $stmt = $this->conn->prepare("UPDATE `posts`
        SET title = :TITLE, subtitle = :SUBTITLE, content = :CONTENT
        WHERE id = :ID;");
        $stmt->bindParam(":ID", $id);
        $stmt->bindParam(":TITLE", $title);
        $stmt->bindParam(":SUBTITLE", $subtitle);
        $stmt->bindParam(":CONTENT", $content);
        $stmt->execute();
    }
}

?>