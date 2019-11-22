<h2>index</h2>

<?php foreach ($product as $product_item): ?>

        <h3><?php echo $product_item['title']; ?></h3>
        <div class="main">
                <?php echo $product_item['text']; ?>
        </div>

<?php endforeach; ?>
