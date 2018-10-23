<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] .  '/header.php';

    $post_id = $_GET['id'];
    $single_article = \App\Models\Articles::owFindById( $post_id );
?>
<section>
    <div class="container">
        <h2><?php echo $single_article['title'] ?></h2>
        <p><?php echo $single_article['content'] ?></p>
        <cite><?php echo $single_article['author'] ?></cite>
    </div>
</section>
