<?php

    include_once('database/queries.php');
    include_once("templates/common/header.php");
    include_once("templates/common/footer.php");
    include_once("templates/news/view_news.php");

    $news_id = $_GET['id'];

    if (!$news_id) {
        die(header('Location: index.php'));
    }

    display_header();
    view_news($news_id);
    display_footer();
?>