
    <div class="row align-items-center h-100 m-3"> <!-- start 3 col layout -->
        <div class="col-sm"></div>
        <div class="col-sm card card-block mx-auto h-75 myCard">
            <div class="mx-1 my-1">
                <?php echo validation_errors(); ?>

                <!-- Form controller, create() method -->
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

            <!-- TODO -->
                
            <div class="my-auto">
                <div id='toolsForm' style="display:none;" class="form-group">
                    <div class="text-center py-4"><img src="<?php echo base_url() ?>/images/screwdriverIcon.png" class="formIcon"/></div>
                    <input type="text" name="toolsName" id="" class="form-control toolsInput" >
                    <small id="helpId" class="text-muted">Name</small>
                    <br>
                    <br>
                    <select name="toolsShipper" class="form-control toolsInput">
                        <option disabled selected value> -- select a shipper -- </option>
                        <option>FedEx</option>
                        <option>UPS</option>
                        <option>USPS</option>
                        <option>Other</option>
                    </select> 
                    <small id="helpId" class="text-muted">Shipper</small>
                    <br>
                    <br>
                    <input type="number" min='0' onkeypress="return isNumberKey(event)" name="toolsWeight" id="Weight?" class="form-control toolsInput" >
                    <small id="helpId" class="text-muted">Weight (ounces)</small>
                    <br>
                    <br>
                    <button type="submit" class="btn btn btn-outline-success btn-block">Submit</button>
                </div>
                
                <div class="form-group" id='electronicsForm' style="display:none;">
                    <div class="text-center py-4"><img src="<?php echo base_url() ?>/images/computerchipIcon.png" class="formIcon"/></div>
                    <input type="text" name="electronicsName" id="" class="form-control electronicsInput" >
                    <small id="helpId" class="text-muted">Name</small>
                    <br>
                    <br>                        
                    <select name="electronicsRecyclable" class="form-control electronicsInput">
                        <option [ngvalue]="true">Yes</option>
                        <option [ngvalue]="false">No</option>
                    </select> 
                    <small id="helpId" class="text-muted">Is it Recyclable?</small>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-outline-success btn-block">Submit</button>
                </div>
                </form>
            </div> <!-- centered div -->

        </div> <!-- col -->

        <div class="col-sm"></div>
        
    </div> <!-- row -->
    
