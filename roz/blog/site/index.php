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
              <section class="content__left col-md-8">
                <div class="block">
                  <a href="categories.php">Усі пости</a>
                  <h3>Нові пости в блозі</h3>
                  <div class="block__content">
                    <div class="articles articles__horizontal">
                        <?php
                        $articles_select = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 6");
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
                                    <div class="article__info__preview"><?php echo mb_substr(strip_tags($articles['text']), 0, 50, 'UTF-8'); ?> ...</div>
                                </div>
                            </article>
                            <?php
                        }
                        ?>

                    </div>
                  </div>
                </div>

                <div class="block">
                  <a href="categories.php?id=3">Усі пости Програмування</a>
                  <h3>Програмування [Нові]</h3>
                  <div class="block__content">
                    <div class="articles articles__horizontal">

                        <?php
                        $articles_select = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 3 ORDER BY `id` DESC LIMIT 4");
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
                      <a href="categories.php?id=1">Усі пости Машини</a>
                      <h3>Машини [Нові]</h3>
                      <div class="block__content">
                          <div class="articles articles__horizontal">
                              <?php
                              $articles_select = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 1 ORDER BY `id` DESC LIMIT 4");
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

              </section>
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