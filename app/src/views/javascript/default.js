$( document ).ready( function() {
    var urlpath = window.location.pathname; 

    $.ajax({
        data :{
            data: $(this).serialize()
        },
        async:false,
        type: 'POST',
        url: "../public/index.php/default",  
        success: function(data) {
            if(data.success == 1)
            {
                if(data.connected != 1)
                {
                    window.location.href = "index.html";
                }
                if(data.personnage != 0 && urlpath == "/creationpersonnage.html") //Si il veut aller dans creation de perso alors qu'il est déjà co
                {
                    window.location.href = "index.html";
                }
                if(data.personnage == 0) //Si il veut aller dans leu jeu alors qu'il a pas de perso
                {
                    if(urlpath == "/personnage.html" || urlpath == "/carte.html")
                    {
                        window.location.href = "index.html";
                    }
                }
            }
        }
    });

});
