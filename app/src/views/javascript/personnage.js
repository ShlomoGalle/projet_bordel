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
                var newText = document.createTextNode('Bonus');
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
                var newText = document.createTextNode('Bonus ');
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

                if(data.capacite.length == 0)
                {
                    $("#div_capacite").hide();
                }
                else{
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

                if(data.liste_de_sort.length == 0)
                {
                    $("#div_liste_de_sort").hide();
                }
                else{
                    //APPEND LES LISTES DE SORTS DU PERSONNAGE DANS LA FEUILLE DE PERSONNAGE
                    var tbodyRef = document.getElementById('liste_de_sort').getElementsByTagName('tbody')[0];
                    var newRow = tbodyRef.insertRow();

                    for (let index = 0; index < data.liste_de_sort.length; index++) {                    
                        var newCell = newRow.insertCell();
                        var newText = document.createTextNode(data.liste_de_sort[index]);
                        newCell.appendChild(newText);index++;
                        var newCell = newRow.insertCell();
                        var newText = document.createTextNode(data.liste_de_sort[index]);
                        newCell.appendChild(newText);index++;
                        var newCell = newRow.insertCell();
                        var newText = document.createTextNode(data.liste_de_sort[index]);
                        newCell.appendChild(newText);
                        var newRow = tbodyRef.insertRow();
                    }
                }

                //APPEND LES LANGUES DU PERSONNAGE DANS LA FEUILLE DE PERSONNAGE
                var tbodyRef = document.getElementById('langue').getElementsByTagName('tbody')[0];
                var newRow = tbodyRef.insertRow();
                newCell.appendChild(newText);
                for (let index = 0; index < data.langue.length; index++) {
                    var newCell = newRow.insertCell();
                    // Append a text node to the cell
                    var newText = document.createTextNode(data.langue[index]);
                    newCell.appendChild(newText);index++;
                    var newCell = newRow.insertCell();
                    // Append a text node to the cell
                    var temp_text = niveau_de_comprehension_langue((data.langue[index]).toString());
                    var newText = document.createTextNode(temp_text);
                    newCell.appendChild(newText);
                    var newRow = tbodyRef.insertRow();
                }
            }
        }
    });    

    
});


function niveau_de_comprehension_langue(val)
{
    switch (val) {
        case '1':
            return 'Permet des communications verbales de base par des phrases simples, ni lecture, ni écriture.';
        case '2':
            return 'Permet des discussions sur des sujets très simple avec un vocabulaire simple, si les deux interlocuteurs parlent lentement et avec une bonne articulation.';            
        case '3':
            return "Permet de parler avec un aisance équivalent à celle d'un natif moyen, mais sans l'accent. Commence à lire et écrire un vocabulaire simple.";
        case '4':
            return "Elocution plutôt bonne, un début d'accent, capacité de lecture et d'écriture d'un lettré moyen";
        case '5':
            return "Confère une parfaite maitrise de la langue, l'alphabétisation est parfaite.";
        default:
            break;
    }
}