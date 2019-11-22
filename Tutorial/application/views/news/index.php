<h2><?php echo $title; ?></h2>

<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
                <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>


<!-- placeholder -->
<div class="position-absolute w-100 h-100" style="background-color: rgba(255,0,0,0.1);">
    <div class="row align-items-center h-100 m-3">
        <div class="col-sm"> 
        </div>
        <div class="col-sm card card-block mx-auto h-50">
            card
        </div> <!-- col -->
        <div class="col-sm"> 
        </div>
    </div> <!-- row -->
</div> container
