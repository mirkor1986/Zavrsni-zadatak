

<?php

include('db.php');

$id = $_GET['post_id'];

$commnentsSql = "SELECT *
FROM comments WHERE post_id = {$id}";


$commentsStatement = $connection->prepare($commnentsSql);
$commentsStatement->execute();
$commentsStatement->setFetchMode(PDO::FETCH_ASSOC);
$comments = $commentsStatement->fetchAll();


?>
<?php if (!empty($comments)) { ?>
<div class = "comm_ul">
    <strong><p>Comments<p></strong>
    
    <<ul>
            <?php foreach ($comments as $comment) { ?>
                
                 <li>
                    <strong><div><?php echo ($comment['author']) ?></div></strong>
                    <div><?php echo ($comment['text']) ?></div>
                    <hr>
                </li>

            <?php } ?>
    </ul>
</div>
<?php } else { ?>
    <strong>No comments for now...</strong>
<?php } ?>



   


