
<div class="position-absolute w-100 h-100" style="background-color: rgba(255,0,0,0.1);">
    <div class="row align-items-center h-100 m-3">
        <div class="col-sm"> 
        </div>
        <div class="col-sm card card-block mx-auto h-50">
            <div class="mx-auto my-auto">
                <?php echo validation_errors(); ?>

                <?php echo form_open('forms/create'); ?>

                    <label for="test2">Test2</label>
                    <input type="text" name="test2" /><br />

                    <label for="test3">Test3</label>
                    <textarea name="test3"></textarea><br />

                    <label for="test4">Test4</label>
                    <textarea name="test4"></textarea><br />

                    <input type="submit" name="submit" value="Create Product" />
                </form>
            </div> <!-- centered div -->
        </div> <!-- col -->
        <div class="col-sm"> 
        </div>
    </div> <!-- row -->
</div> <!-- container -->
