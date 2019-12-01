function displayForm(productChoice){
    var selector = document.getElementById('formSelect');
    var value = selector[selector.selectedIndex].value;
    
    var toolsInputs = document.getElementsByClassName("toolsInput");
    var elecInputs = document.getElementsByClassName("electronicsInput");

    // Depending on selected option, shows corresponding form, sets inputs to be required, and
    if (value == "Tools"){
        document.getElementById("toolsForm").style.display = "block";
        document.getElementById("electronicsForm").style.display = "none"; 


        for (var i = 0; i < toolsInputs.length; i++)
        {
            toolsInputs[i].required = true;
            elecInputs[i].required = false;           
            elecInputs[i].value = "";
        }

    }
    else if (value == "Electronics"){
        document.getElementById("electronicsForm").style.display = "block"; 
        document.getElementById("toolsForm").style.display = "none";

        for (var i = 0; i < elecInputs.length; i++)
        {
            elecInputs[i].required = true;
            toolsInputs[i].required = false;
            toolsInputs[i].value = "";
        }
    }
}