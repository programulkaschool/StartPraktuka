<div class="block">
    <h3>Ми тут</h3>
    <div class="block__content">
        <script type="text/javascript" src="//ra.revolvermaps.com/0/0/6.js?i=02op3nb0crr&amp;m=7&amp;s=320&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80" async="async"></script>
    </div>
</div>

<div class="block">
    <h3>Топ читаємих постів</h3>
    <div class="block__content">
        <div class="articles articles__vertical">

            <?php
            $articles_select = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `articles`.`views` DESC LIMIT 5");
            while($articles = mysqli_fetch_assoc($articles_select)) {
                ?>
                <article class="article">
                    <div class="article__image" style="background-image: url('media/images/<?php echo $articles['image']; ?>');"></div>
                    <div class="article__info">
                        <a href="article.php?id=<?php echo $articles['id']; ?>"><?php echo mb_substr(strip_tags($articles['title']), 0, 40, 'UTF-8'); ?>...</a>
                        <div class="article__info__meta">
                            <?php
                            foreach ($categories_array as $value) {
                                if ($value ["id"] == $articles['categorie_id']){
                                    echo '<small>Категория: <a href="categories.php?id='.$value ["id"].'">';
                                    echo $value ["title"];
                                    echo '</a></small>';
                                    break;
                                }
                            }
                            ?>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($articles['text']), 0, 50, 'UTF-8'); ?>...</div>
                    </div>
                </article>
                <?php
            }
            ?>

        </div>
    </div>
</div>

<div class="block">
    <h3>Коментарі</h3>
    <div class="block__content">
        <div class="articles articles__vertical">
            <?php
            $comment_select = mysqli_query($connection, "SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 5");
            while($comment = mysqli_fetch_assoc($comment_select)) {
                ?>
                <article class="article">
                    <div class="article__image" style="background-image: url('media/images/post-image.jpg');"></div>
                    <div class="article__info">
                        <a href="article.php?id=<?php echo $comment['articles_id']; ?>"><?php echo $comment['author']; ?></a>
                        <div class="article__info__meta">
                            <small><a href="#">Название статьи #1</a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($comment['text']), 0, 50, 'UTF-8'); ?>...</div>
                    </div>
                </article>
                <?php
            }
            ?>
        </div>
    </div>
</div>