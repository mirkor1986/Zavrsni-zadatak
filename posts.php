<?php

include('db.php');

$sql = "SELECT *
FROM posts ORDER BY Created_at DESC";

$statement = $connection->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$posts = $statement->fetchAll();

?>

<?php
      foreach ($posts as $post) {
    ?>
     <div class="blog-post">
        <a href="single-post.php?post_id=<?php echo ($post['Id']) ?>" class="blog-post-title"><?php echo($post['Title']) ?></a>
        <p class="blog-post-meta"><?php echo($post['Created_at']) ?>
        <p> <?php echo($post['Body']) ?>...</p>
     </div>
 <?php
   }    
    ?>   
