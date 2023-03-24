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
        $stmt = $this->conn->query("SELECT * FROM posts");
        $posts = $stmt->fetchAll();
        return $posts;
    }

    public function getPostsInRows() {
        $posts = $this->getPosts();

        foreach ($posts as $post) {
            $strDate = strtotime($post['create_time']);
            $date = date('d-m-Y H:i', $strDate);
            echo '<tr><td>'.$post['title'].'</td><td>'.$post['creator'].'</td><td>'.$post['categories'].'</td><td>'.$date.'</td><td><button class="btn btn-green small"><i class="bi bi-pencil-fill"></i></button><button class="btn btn-green small"><i class="bi bi-pencil-fill"></i></button></td></tr>';
        }
    }

    public function uploadPost($title, $content, $author, $categories, $subtitle) {
        $stmt = $this->conn->prepare("INSERT INTO `postagens`.`posts` (`title`, `subtitle`, `content`, `categories`, `creator`, `image`) VALUES (':TITLE', ':SUBTITLE', ':CONTENT', ':CATEGORIES', ':CREATOR', ':IMAGE');");
        $stmt->bindParam(':TITLE', $title);
        $stmt->bindParam(':SUBTITLE', $subtitle);
        $stmt->bindParam(':CONTENT', $content);
        $stmt->bindParam(':CATEGORIES', $categories);
        $stmt->bindParam(':CREATOR', $author);
        $stmt->execute();
    }
}

?>