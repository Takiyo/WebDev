<div class="row">
    <div class="col-sm"></div>
    <div class="col-sm">

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $title; ?></h5>
                <p class="card-text"><?php echo validation_errors(); ?><br></p>
                
            <?php echo form_open('news/create'); ?>

            <label for="title">Title</label>
            <input type="text" name="title" /><br />

            <label for="text">Text</label>
            <textarea name="text"></textarea><br />

            <input type="hidden" name='date' value='<?php echo date('Y-m-d')?>'/>

            <input class="btn btn-primary" type="submit" name="submit" value="Create news item" />

            </form>
            </div>
        </div>

    </div>
    <div class="col-sm"></div>
</div>
