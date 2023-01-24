<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
  $user_id = $_COOKIE['user_id'];
} else {
  $user_id = '';
  header('location:home.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <?php include 'components/user_header.php'; ?>
  <section class="card">
    <div class="content">
      <h1>Ranking Post Like</h1>
      <?php
      $sql_query = "SELECT *, Count(post_id) FROM likes LEFT JOIN post ON likes.post_id = post.id WHERE post_id != 0 GROUP BY post_id ORDER BY Count(post_id) desc limit 10";
      $result_post_like = $conn->query($sql_query);

      if ($result_post_like->rowCount() > 0) {
        while ($arr_post_like = $result_post_like->fetch(PDO::FETCH_ASSOC)) {

      ?>
          <div class="item">
            <p>Post:
              <?php
              if ($arr_post_like['title'] === NULL) {
                echo 'NULL';
              } else {
                echo $arr_post_like['title'];
              }
              ?>
            </p>
            <p>
              Like Total: <?= $arr_post_like['Count(post_id)']; ?>
            </p>
          </div>
      <?php
        }
      } else {
        echo '<p class="empty">Nothing Ranking Post Like!</p>';
      }
      ?>
    </div>
    <div class="content">
      <h1>Ranking Video Like</h1>
      <?php
      $sql_query = "SELECT *, Count(content_id) FROM likes LEFT JOIN content ON likes.content_id = content.id WHERE content_id != 0 GROUP BY content_id ORDER BY Count(content_id) desc limit 10";
      $result_video_like = $conn->query($sql_query);

      if ($result_video_like->rowCount() > 0) {
        while ($arr_video_like = $result_video_like->fetch(PDO::FETCH_ASSOC)) {

      ?>
          <div class="item">
            <p>Video:
              <?php
              if ($arr_video_like['title'] === NULL) {
                echo 'NULL';
              } else {
                echo $arr_video_like['title'];
              }
              ?>
            </p>
            <p>
              Like Total: <?= $arr_video_like['Count(content_id)']; ?>
            </p>
          </div>
      <?php
        }
      } else {
        echo '<p class="empty">Nothing Ranking Video Like!</p>';
      }
      ?>
    </div>

  </section>

  <section class="card">
    <div class="content">
      <h1>Ranking Comment Post</h1>
      <?php
      $sql_query = "SELECT *, Count(user_id) FROM commentss LEFT JOIN users ON commentss.user_id = users.id GROUP BY user_id ORDER BY Count(user_id) desc limit 10";
      $result_comment_post = $conn->query($sql_query);

      if ($result_comment_post->rowCount() > 0) {
        while ($arr_comment_post = $result_comment_post->fetch(PDO::FETCH_ASSOC)) {

      ?>
          <div class="item">
            <p>Name:
              <?= $arr_comment_post['name']; ?>
            </p>
            <p>
              Comment Total: <?= $arr_comment_post['Count(user_id)']; ?>
            </p>
          </div>
      <?php
        }
      } else {
        echo '<p class="empty">Nothing Ranking Comment Post!</p>';
      }
      ?>
    </div>
    <div class="content">
      <h1>Ranking Comment Video</h1>
      <?php
      $sql_query = "SELECT *, Count(user_id) FROM comments LEFT JOIN users ON comments.user_id = users.id GROUP BY user_id ORDER BY Count(user_id) desc limit 10";
      $result_comment_post = $conn->query($sql_query);

      if ($result_comment_post->rowCount() > 0) {
        while ($arr_comment_post = $result_comment_post->fetch(PDO::FETCH_ASSOC)) {

      ?>
          <div class="item">
            <p>Name:
              <?= $arr_comment_post['name']; ?>
            </p>
            <p>
              Comment Total: <?= $arr_comment_post['Count(user_id)']; ?>
            </p>
          </div>
      <?php
        }
      } else {
        echo '<p class="empty">Nothing Ranking Comment Post!</p>';
      }
      ?>
    </div>
  </section>






























  <?php include 'components/footer.php'; ?>

  <!-- custom js file link  -->
  <script src="js/script.js"></script>

</body>

</html>