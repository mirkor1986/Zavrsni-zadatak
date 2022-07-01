<?php include('templates/header.php');?>

<?php

include('db.php');

if ($_POST) {
    $text = $_POST['text'];
    $author = $_POST['author'];
    $postId = $_POST['post_id'];
    $insertSql = "INSERT INTO comments (`text`, `author`, `post_id`) VALUES ('{$text}', '{$author}', {$postId});";
    $insertStatement = $connection->prepare($insertSql);
    $insertStatement->execute();
}

$id = $_GET['post_id'];


$sql = "SELECT *
FROM posts WHERE Id = {$id}";

$statement = $connection->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$post = $statement->fetch();


?>
<div class="blog-post">
<h1 class="blog-post-title"> <?php echo ($post['Title']) ?></h1>
<p><?php echo ($post['Body']) ?> </p>
<div><?php echo ($post['Created_at']) ?> by <?php echo ($post['Author']) ?></div>
</div>

<div class = "comm_ul">
<?php include('comments.php'); ?>

<?php include('templates/sidebar.php');?></div>

<form action="single-post.php?post_id=<?php echo ($post['Id']) ?>" method="post">
Text: <textarea name="text"></textarea><br>
Author: <input type="text" name="author"><br>
<input type="hidden" name="post_id" value="<?php echo ($post['Id']) ?>">
<input type="submit">
</form>

<?php include('templates/footer.php');?>