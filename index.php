<?php
    require __DIR__ . '/autoload.php';
    require ( 'header.php' );

    $recent_articles = \App\Models\Articles::owRecentArticle( 3 );
    $user = new \App\Models\User();
    $user->name = 'Vasya';
    $user->email = 'vasya@mail.com';
    $user->owInsert();
?>

<section>
    <div class="container">
        <?php if ( !empty( $recent_articles ) ) : ?>
            <h2 class="text-center">All article</h2>
            <div class="row">
                <?php foreach ( $recent_articles as $key => $article ) : ?>
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $article->title ?></h5>
                                <p class="card-text"><?php
                                    if ( strlen( $article->content ) > 10)
                                        $str = substr( $article->content, 0, 180) . '...';
                                    echo  $str;
                                    ?>
                                </p>
                                <a href="App/View/article.php?id=<?php echo $article->id  ?>" class="btn btn-primary">Read More</a>
                                <cite><?php echo $article->author ?></cite>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <h2 class="text-center">Sry, for now there are no articles.</h2>
        <?php endif; ?>
    </div>
</section>

<?php require ( 'footer.php' );
