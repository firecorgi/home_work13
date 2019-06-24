<?php
namespace DataBase;

class DataBase
{
    /**
     * @return false|mysqli
     */
    public function getDBConnection() {
        global $config;
        $link = mysqli_connect($config["host"], $config["user"], $config["password"], $config["database"]);

        // did we connect?
        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        mysqli_select_db($link, 'home_work7') or die ('Wrong db selected!');
        return $link;
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getById(int $id)
    {
        $db = $this->getDBConnection();

        $query = "SELECT * FROM articles WHERE id = $id";
        $result = mysqli_query($db, $query) or die ('Failed!');

        $response = [];
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $response = $line;
        }
        return $response;
    }

    /**
     * @param $id
     * @param $title
     * @param $text
     */
    public function insertNewArticle($id, $title, $text) {
        $this->getDBConnection();

        $query = 'SELECT * FROM articles';
        $sql = "INSERT INTO articles (id, title, text) VALUES ('$id', '$title', '$text')";
        if (mysqli_query($this->getDBConnection(), $sql)) {
            echo "New record created successfully";
        } else {
            echo "Sorry";
        }
        mysqli_close($this->getDBConnection());
    }

    /**
     * @param $id
     * @param $title
     * @param $text
     */
    public function addArticleById($id, $title, $text) {
        $this->getDBConnection();
        $query = "UPDATE articles
              SET title = '$title', text = '$text'
              WHERE id = '$id' ";

        if (mysqli_query($this->getDBConnection(),  $query)) {
            echo "Your article was changed successfully";
        } else {
            echo "Sorry, something went wrong";
        }
        mysqli_close($this->getDBConnection());

    }
}