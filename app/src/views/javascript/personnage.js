$( document ).ready( function() {

    $.ajax({
        async : false,
        type: 'POST',
        url: "../public/index.php/get_info_personnage",  
        success: function(data) {
            if(data.success == 1)
            {
                //APPEND L IDENTITE DU PERSONNAGE DANS LA FEUILLE DE PERSONNAGE
                var tbodyRef = document.getElementById('identite').getElementsByTagName('tbody')[0]; 
                var newRow = tbodyRef.insertRow();
                for (let index = 0; index < data.identite.length; index++) {
                    var newCell = newRow.insertCell();
                    // Append a text node to the cell
                    var newText = document.createTextNode(data.identite[index]);
                    newCell.appendChild(newText);
                }

                //APPEND LES CARACTERISTIQUES DU PERSONNAGE DANS LA FEUILLE DE PERSONNAGE
                var tbodyRef = document.getElementById('caracteristique').getElementsByTagName('tbody')[0];
                var newRow = tbodyRef.insertRow();
                var newCell = newRow.insertCell();
                var newText = document.createTextNode('Valeur ');
                newCell.appendChild(newText);
                for (let index = 0; index < data.caracteristique.length; index++) {
                    var newCell = newRow.insertCell();
                    // Append a text node to the cell
                    var newText = document.createTextNode(data.caracteristique[index]);
                    newCell.appendChild(newText);
                }

                //APPEND LES VAL DES COMP DU PERSONNAGE DANS LA FEUILLE DE PERSONNAGE
                var tbodyRef = document.getElementById('competence').getElementsByTagName('tbody')[0];
                var newRow = tbodyRef.insertRow();
                var newCell = newRow.insertCell();
                var newText = document.createTextNode('Valeur ');
                newCell.appendChild(newText);
                for (let index = 0; index < data.competence_val.length; index++) {
                    var newCell = newRow.insertCell();
                    // Append a text node to the cell
                    var newText = document.createTextNode(data.competence_val[index]);
                    newCell.appendChild(newText);
                }
                //APPEND LE NIVEAU DES COMP DU PERSONNAGE DANS LA FEUILLE DE PERSONNAGE
                var newRow = tbodyRef.insertRow();
                var newCell = newRow.insertCell();
                var newText = document.createTextNode('Niveau ');
                newCell.appendChild(newText);
                for (let index = 0; index < data.competence_niveau.length; index++) {
                    var newCell = newRow.insertCell();
                    // Append a text node to the cell
                    var newText = document.createTextNode(data.competence_niveau[index]);
                    newCell.appendChild(newText);
                }

                //APPEND LES CAPACITES DU PERSONNAGE DANS LA FEUILLE DE PERSONNAGE
                var tbodyRef = document.getElementById('capacite').getElementsByTagName('tbody')[0];
                for (let index = 0; index < data.capacite.length; index++) {
                    var newRow = tbodyRef.insertRow();
                    var newCell = newRow.insertCell();
                    // Append a text node to the cell
                    var newText = document.createTextNode(data.capacite[index]);
                    newCell.appendChild(newText);
                    var newCell = newRow.insertCell();
                    // Append a text node to the cell
                    var newText = document.createTextNode('1');
                    newCell.appendChild(newText);
                }
            }
        }
    });    

    
});
