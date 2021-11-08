$( document ).ready( function() {

    var urlcourante = document.location.href; 
    var url = new URL(urlcourante);
    id = url.searchParams.get("id");
    autorize = 1;

    $.ajax({
        data : {id : id},
        type: 'POST',
        async : false,
        url: "../public/index.php/check_autorize_batiment",  
        success: function(data) {
            if(data.success == 1)
            {
                if(data.autorize == 0)
                {
                    autorize = 0;
                    window.location.href = "/index.html";
                }
            }
        }
    }); 

    if(autorize == 1)
    {

        $.ajax({
            data : {id : id},
            type: 'POST',
            async : false,
            url: "../public/index.php/get_objet_vendre",  
            success: function(data) {
                if(data.success == 1)
                {
                    //APPEND LES OBJETS DANS LE MAGASIN
                    var tbodyRef = document.getElementById('objet_vendre').getElementsByTagName('tbody')[0]; 
                    for (let index = 0; index < data.objet_a_vendre.length; index++) {
                        var newRow = tbodyRef.insertRow();

                        var newCell = newRow.insertCell(); //NAME
                        // Append a text node to the cell
                        var newText = document.createTextNode(data.objet_a_vendre[index].name);
                        newCell.appendChild(newText);

                        var newCell = newRow.insertCell(); //TYPE D'ARME
                        // Append a text node to the cell
                        var newText = document.createTextNode(data.objet_a_vendre[index].type);
                        newCell.appendChild(newText);

                        var newCell = newRow.insertCell(); //POIDS
                        // Append a text node to the cell
                        var newText = document.createTextNode(data.objet_a_vendre[index].poids);
                        newCell.appendChild(newText);
                        
                        var newCell = newRow.insertCell(); //PRIX
                        // Append a text node to the cell
                        var newText = document.createTextNode(transform_intpiece_to_stringpiece(data.objet_a_vendre[index].prix));
                        newCell.appendChild(newText);
                    
                        var newCell = newRow.insertCell(); //ACHETER
                        // Append a text node to the cell
                        // var newText = document.createTextNode("Acheter");
                        // newCell.appendChild(newText);
                        newCell.innerHTML = '<button class="btn btn-primary btn-xs my-xs-btn" type="button" onClick="acheter('+ data.objet_a_vendre[index].id +')"> Acheter </button>';
                    }

                }
            }
        }); 

    }
});


function transform_intpiece_to_stringpiece($val)
{
    if($val < 100)
    {
        return $val + ' pc';
    }
    if($val < 10000)
    {
        $val_pa = $val/100;
        return $val_pa+ ' pa';
    }
    if($val >= 10000)
    {
        $val_po = $val/10000;
        return $val_po + ' po';
    }
}
