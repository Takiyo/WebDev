<h2>form</h2>

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