function displayForm(productChoice){
    var selector = document.getElementById('formSelect');
    var value = selector[selector.selectedIndex].value;

    if (value == "Tools"){
        document.getElementById("toolsForm").style.display = "block";
        document.getElementById("electronicsForm").style.display = "none"; 

    }
    else{
        document.getElementById("electronicsForm").style.display = "block"; 
        document.getElementById("toolsForm").style.display = "none";
    }
}