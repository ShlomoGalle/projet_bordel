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
            url: "../public/index.php/get_objet_achat",  
            success: function(data) {
                if(data.success == 1)
                {
                    //APPEND LES OBJETS DANS LE MAGASIN/ECHOPPE/TAVERNE
                    var tbodyRef = document.getElementById('objet_achat').getElementsByTagName('tbody')[0]; 
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
                    
                        if(data.objet_a_vendre[index].achetable == 1)
                        {
                            var newCell = newRow.insertCell(); //ACHETER
                            newCell.innerHTML = '<button class="btn btn-primary btn-xs my-xs-btn" type="button" onClick="acheter_objet('+ id +', '+ data.objet_a_vendre[index].id +', \''+ data.objet_a_vendre[index].type_objet +'\')"> Acheter </button>';
                        }
                        else
                        {
                            var newCell = newRow.insertCell(); //ACHETER
                            newCell.innerHTML = '<button class="btn btn-primary btn-xs my-xs-btn" type="button" disabled> Acheter </button>';
                        }
                    }

                }
            }
        }); 

        
        $.ajax({
            type: 'POST',
            url: "../public/index.php/get_inventaire",  
            success: function(data) {
                if(data.success == 1)
                {
                    var tbodyRef = document.getElementById('objet_vendre').getElementsByTagName('tbody')[0]; 
                    for (let index = 0; index < data.inventaire.arme.length; index++) {
                        var newRow = tbodyRef.insertRow();

                        var newCell = newRow.insertCell(); //NAME
                        // Append a text node to the cell
                        var newText = document.createTextNode(data.inventaire.arme[index].name);
                        newCell.appendChild(newText);

                        var newCell = newRow.insertCell(); //TYPE D'ARME
                        // Append a text node to the cell
                        var newText = document.createTextNode(data.inventaire.arme[index].type);
                        newCell.appendChild(newText);

                        var newCell = newRow.insertCell(); //POIDS
                        // Append a text node to the cell
                        var newText = document.createTextNode(data.inventaire.arme[index].poids);
                        newCell.appendChild(newText);
                        
                        var newCell = newRow.insertCell(); //PRIX
                        // Append a text node to the cell
                        var newText = document.createTextNode(transform_intpiece_to_stringpiece(data.inventaire.arme[index].prix));
                        newCell.appendChild(newText);

                        var newCell = newRow.insertCell(); //VENDRE
                        newCell.innerHTML = '<button class="btn btn-primary btn-xs my-xs-btn" type="button" onClick="vendre_objet('+ data.inventaire.arme[index].id +', \''+ data.inventaire.arme[index].type_objet +'\')"> Vendre </button>';
                    }

                    for (let index = 0; index < data.inventaire.armure.length; index++) {
                        var newRow = tbodyRef.insertRow();

                        var newCell = newRow.insertCell(); //NAME
                        // Append a text node to the cell
                        var newText = document.createTextNode(data.inventaire.armure[index].name);
                        newCell.appendChild(newText);

                        var newCell = newRow.insertCell(); //TYPE D'ARMURE
                        // Append a text node to the cell
                        var newText = document.createTextNode(data.inventaire.armure[index].type);
                        newCell.appendChild(newText);

                        var newCell = newRow.insertCell(); //POIDS
                        // Append a text node to the cell
                        var newText = document.createTextNode(data.inventaire.armure[index].poids);
                        newCell.appendChild(newText);
                        
                        var newCell = newRow.insertCell(); //PRIX
                        // Append a text node to the cell
                        var newText = document.createTextNode(transform_intpiece_to_stringpiece(data.inventaire.armure[index].prix));
                        newCell.appendChild(newText);

                        var newCell = newRow.insertCell(); //VENDRE
                        newCell.innerHTML = '<button class="btn btn-primary btn-xs my-xs-btn" type="button" onClick="vendre_objet('+ data.inventaire.armure[index].id +', \''+ data.inventaire.armure[index].type_objet +'\')"> Vendre </button>';
                    }

                    for (let index = 0; index < data.inventaire.objet.length; index++) {
                        var newRow = tbodyRef.insertRow();

                        var newCell = newRow.insertCell(); //NAME
                        // Append a text node to the cell
                        var newText = document.createTextNode(data.inventaire.objet[index].name);
                        newCell.appendChild(newText);

                        var newCell = newRow.insertCell(); //TYPE D'OBJET
                        // Append a text node to the cell
                        var newText = document.createTextNode(data.inventaire.objet[index].type);
                        newCell.appendChild(newText);

                        var newCell = newRow.insertCell(); //POIDS
                        // Append a text node to the cell
                        var newText = document.createTextNode(data.inventaire.objet[index].poids);
                        newCell.appendChild(newText);
                        
                        var newCell = newRow.insertCell(); //PRIX
                        // Append a text node to the cell
                        var newText = document.createTextNode(transform_intpiece_to_stringpiece(data.inventaire.objet[index].prix));
                        newCell.appendChild(newText);

                        var newCell = newRow.insertCell(); //VENDRE
                        newCell.innerHTML = '<button class="btn btn-primary btn-xs my-xs-btn" type="button" onClick="vendre_objet('+ data.inventaire.objet[index].id +', \''+ data.inventaire.objet[index].type_objet +'\')"> Vendre </button>';
                    }

                }
            }
        });

    }
});


function transform_intpiece_to_stringpiece(val)
{
    if(val < 100)
    {
        return val + ' pc';
    }
    if(val < 10000)
    {
        var val_pa = val/100;
        return val_pa+ ' pa';
    }
    if(val >= 10000)
    {
        var val_po = val/10000;
        return val_po + ' po';
    }
}

function acheter_objet(id_batiment, id_objet, type_objet)
{
    $.ajax({
        data : {id_batiment : id_batiment, id_objet: id_objet, type_objet : type_objet},
        type: 'POST',
        async : false,
        url: "../public/index.php/acheter_objet",  
        success: function(data) {
            if(data.success == 1)
            {
                console.log(id_batiment, id_objet, type_objet);
                location.reload();
            }
            else
            {
                console.log("id du batiment n'existe pas")
            }
        }
    });
}

function vendre_objet(id_objet, type_objet)
{
    console.log(id_batiment, id_objet, type_objet);

    // $.ajax({
    //     data : {id_batiment : id_batiment, id_objet: id_objet, type_objet : type_objet},
    //     type: 'POST',
    //     async : false,
    //     url: "../public/index.php/acheter_objet",  
    //     success: function(data) {
    //         if(data.success == 1)
    //         {
    //             console.log(id_batiment, id_objet, type_objet);
    //             location.reload();
    //         }
    //         else
    //         {
    //             console.log("id du batiment n'existe pas")
    //         }
    //     }
    // });
}

