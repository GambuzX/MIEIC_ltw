<?php

    include_once('database/queries.php');
    include_once('utils.php');

    $news_id = $_GET['id'];

    if (!$news_id) {
        die(header('Location: index.php'));
    }

    $article = getItemInfo($news_id);
    $comments = getItemComments($news_id);

    display_header();
?>

<section id="news">
    <article>
    <header>
        <h1><a href="item.html"><?=$article['title']?></a></h1>
    </header>
    <img src="http://lorempixel.com/600/300/business/" alt="">
    <p><?=$article['introduction']?></p>
        <p><?=$article['fulltext']?></p>
    <section id="comments">
        <h1><?=count($comments)?> Comments</h1>

        <?php foreach($comments as $comment) { ?>
            <article class="comment">
                <span class="user"><?=$comment['username']?></span>
                <span class="date"><?=$comment['published']?></span>
                <p><?=$comment['text']?></p>
            </article>
        <?php } ?>
        <form>
            <h2>Add your voice...</h2>
            <label>Username 
                <input type="text" name="username">
            </label>
            <label>E-mail
                <input type="email" name="email">
            </label>
            <label>Comment
                <textarea name="comment"></textarea>            
            </label>
            <input type="submit" value="Reply">
        </form>
    </section>
    <footer>
        <span class="author"><?=$article['username']?></span>
        <span class="tags"><a href="index.html">#politics</a> <a href="index.html">#economy</a></span>
        <span class="date">15m</span>
        <a class="comments" href="item.html#comments"><?=count($comments)?></a>
    </footer>
    </article>
</section>

<?php
    display_footer();
?>