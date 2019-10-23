<?php
    include_once("database/queries.php");
    include_once("utils.php");

    display_header();

    $articles = getAllArticles();
?>
    <section id="news">
        <?php foreach($articles as $article) { ?>
            <article>
                <header>
                    <h1><a href="news_item.php?id=<?=$article['id']?>"><?=$article['title']?></a></h1>
                </header>
                <img src="http://lorempixel.com/600/300/business/" alt="">
                <p><?=$article['introduction']?></p>
                <p><?=$article['fulltext']?></p>
                <p>Mauris tincidunt orci congue turpis viverra pulvinar. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque rhoncus lorem eget.</p>
                <footer>
                    <span class="author"><?=$article['username']?></span>
                    <span class="tags"><a href="index.php">#politics</a> <a href="index.html">#economy</a></span>
                    <span class="date">15m</span>
                    <a class="comments" href="item.html#comments"><?=$article['comments']?></a>
                </footer>
            </article>
        <?php } ?>
    </section>

<?php display_footer(); ?>