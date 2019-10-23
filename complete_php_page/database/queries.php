<?php
include_once('database/connection.php');

function getAllArticles() {
    global $dbh;

    $stmt = $dbh->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments
                                FROM news JOIN
                                    users USING (username) LEFT JOIN
                                    comments ON comments.news_id = news.id
                                GROUP BY news.id, users.username
                                ORDER BY published DESC');
    $stmt->execute();

    return $stmt->fetchAll();
}


function getItemInfo($id) {
    global $dbh;

    $stmt = $dbh->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

function getItemComments($id) {
    global $dbh;

    $stmt = $dbh->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

?>

