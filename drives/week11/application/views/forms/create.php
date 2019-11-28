
<div class="position-absolute w-100 h-100" style="background-color: rgba(255,0,0,0.1);">
    <div class="row align-items-center h-100 m-3">
        <div class="col-sm"></div>
        <div class="col-sm card card-block mx-auto h-50 myCard">
            <div class="mx-1 my-1 ">
                <?php echo validation_errors(); ?>

                <?php echo form_open('forms/create'); ?>

                <div class="form-group formSelector">
                    <label for="formSelect">Product Form Selection</label>
                    <select id="formSelect" class="form-control form-control-lg" onchange='displayForm()'>
                        <option disabled selected value> -- select an option -- </option>
                        <option>Tools</option>
                        <option>Electronics</option>
                    </select>
                </div>
            </div> <!-- centered div -->

                
            <div class=" my-auto">
                <div id='toolsForm' style="display:none;">
                    <div class="form-group">
                    <label for="Test2"></label>
                    <input type="text" name="test2" id="" class="form-control" placeholder="placehold" >
                    <small id="helpId" class="text-muted">Tools</small>
                    <br>
                    <br>
                    <input type="text" name="test2" id="" class="form-control" placeholder="placehold" >
                    <small id="helpId" class="text-muted">Tools</small>
                    <br>
                    <br>
                    <input type="text" name="test2" id="" class="form-control" placeholder="placehold" >
                    <small id="helpId" class="text-muted">Tools</small>
                    <br>
                    <br>
                    <input type="text" name="test2" id="" class="form-control" placeholder="placehold" >
                    <small id="helpId" class="text-muted">Tools</small>
                    </div>
                </div>
                
                <div id='electronicsForm' style="display:none;">
                    <div class="form-group">
                        <label for="Test3"></label>
                        <input type="text" name="test3" id="" class="form-control" placeholder="placehold" >
                        <small id="helpId" class="text-muted">Electronics</small>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary my-1">Submit</button>
                </form>
                </div> <!-- centered div -->

        </div> <!-- col -->
        <div class="col-sm"></div>
        
    </div> <!-- row -->
    
</div> <!-- container -->
