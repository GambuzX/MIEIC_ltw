<?php
    include_once('database/queries.php');
    include_once('templates/comments/list_comments.php');

    function view_news($news_id) {        

        $article = getItemInfo($news_id);
        $comments = getItemComments($news_id);
?>
        <section id="news">
            <article>
                <header>
                    <h1><a href="item.html"><?=$article['title']?></a></h1>
                </header>
                <img src="http://lorempixel.com/600/300/business/" alt="">
                <p><?=$article['introduction']?></p>
                <p><?=$article['fulltext']?></p>

                <?php list_comments($comments); ?>
                
                <footer>
                    <span class="author"><?=$article['username']?></span>
                    <span class="tags"><a href="index.html">#politics</a> <a href="index.html">#economy</a></span>
                    <span class="date">15m</span>
                    <a class="comments" href="item.html#comments"><?=count($comments)?></a>
                </footer>
            </article>
        </section>

<?php } ?>