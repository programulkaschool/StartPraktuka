<?php
require ('config/config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $config['title']; ?></title>

    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="media/css/style.css">
</head>
<body>
<div id="wrapper">
    <!-- Header -->
    <?php include ('includes/header.php')?>

    <div id="content">
        <div class="container">
            <div class="row">
    <?php

    $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id`= ".(int)$_GET['id']);
    if (mysqli_num_rows($articles) <= 0) {
        ?>
        <section class="content__left col-md-8">
            <div class="block">
                <h3>Пост відсутній</h3>
                <div class="block__content">
                    <div class="full-text">
                        <h1>Пост незнайден</h1>
                    </div>
                </div>
            </div>
        </section>
        <?php

    } else {
        $art = mysqli_fetch_assoc($articles);
        mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id`= ".$art['id']);
    ?>
          <section class="content__left col-md-8">
            <div class="block">
              <a><?php echo $art['views']; ?> переглядів</a>
              <h3><?php echo $art['title']; ?></h3>
              <div class="block__content">
                <img style="width: 100%;" src="media/images/<?php echo $art['image']; ?>">
                <div class="full-text">
                    <?php echo $art['text']; ?></div>
              </div>
            </div>

            <div class="block">
              <a href="#comment-add-form">Добавить свой</a>
              <h3>Коментарі до посту</h3>
              <div class="block__content">
                <div class="articles articles__vertical">
                    <?php
                    $commetts = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id`= ".$art['id']." ORDER BY `comments`.`date` DESC");
                    if (mysqli_num_rows($commetts) <= 0) {
                        echo '<h2>Коментарі відсутні</h2>';
                    } else {
                        while($comment = mysqli_fetch_assoc($commetts)) {
                            ?>
                            <article class="article">
                                <div class="article__image" style="background-image: url('media/images/post-image.jpg');"></div>
                                <div class="article__info">
                                    <a href="article.php?id=<?php echo $comment['id']; ?>"><?php echo $comment['author']; ?></a>
                                    <div class="article__info__meta">
                                        <small><?php echo $comment['date']; ?></small>
                                    </div>
                                    <div class="article__info__preview"><?php echo mb_substr(strip_tags($comment['text']), 0, 50, 'UTF-8'); ?>...</div>
                                </div>
                            </article>
                            <?php
                        }
                    }
                    ?>
                </div>
              </div>
            </div>

            <div class="block" id="comment-add-form">
              <h3>Добавить комментарий</h3>
              <div class="block__content">
                <form class="form" method="post" action="article.php?id=<?php echo $art['id']; ?>#comment-add-form">
                    <?php

                    if (isset($_POST['do_post'])) {
                        $error = array();
                        if ($_POST['name'] == '') {
                            $error [] = 'Введіть Ім\'я';
                        }
                        if ($_POST['nickname'] == '') {
                            $error [] = 'Введіть Нік';
                        }
                        if ($_POST['text'] == '') {
                            $error [] = 'Введіть Текст комментария';
                        }
                        if (empty($error)) {
                            mysqli_query($connection, "INSERT INTO `comments` (`name`, `author`, `text`, `date`, `articles_id`) VALUES ('".$_POST['name']."', '".$_POST['nickname']."', '".$_POST['text']."', NOW() , '".$art['id']."')");
                            echo '<span style="color: #00d118; font-weight: bold;">Комент добавлений</span><hr>';
                        } else {
                            echo'<span style="color: red; font-weight: bold;">'.$error[0].'</span><hr>';
                        }
                    }


                    ?>


                  <div class="form__group">
                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="name" placeholder="Ім'я">
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="nickname" placeholder="Нік">
                      </div>
                    </div>
                  </div>
                  <div class="form__group">
                    <textarea name="text" required="" class="form__control" placeholder="Текст комментария ..."></textarea>
                  </div>
                  <div class="form__group">
                    <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                  </div>
                </form>
              </div>
            </div>
          </section>

                <?php }?>

            <section class="content__right col-md-4">
                <!-- Sidebar -->
                <?php include ('includes/sidebar.php')?>
            </section>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include ('includes/footer.php')?>
</div>
</body>
</html>