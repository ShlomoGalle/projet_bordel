$( document ).ready( function() {
    var connected = 0;
    var personnage = 0;

    $.ajax({
        type: 'POST',
        url: "../public/index.php/default",
        success: function(data) {
            if(data.success == 1)
            {
                if(data.connected == 1)
                {
                    connected = 1;
                    if(data.personnage != 0)
                    {
                        $('#avec_personnage').show(); 
                        personnage = data.personnage;
                    }
                    else
                    {
                        $('#sans_personnage').show();
                    }
                    $('#deconnexion').show();
                }
                else
                {
                    $('#connexion_inscription').show();
                }
            }
        }
    });

    $('#form_connexion').submit(function(e) {
        if(connected == 0)
        {
            e.preventDefault();

            $.ajax({
                data :{
                    data: $(this).serialize()
                },
                type: 'POST',
                url: "../public/index.php/connexion",  
                success: function(data) {
                    if(data.success == 1)
                    {
                        $('#connexion_inscription').hide();
    
                        if(data.personnage != 0){
                            $('#avec_personnage').show();
                            $('#deconnexion').show();
                        }
                        else{
                            $('#sans_personnage').show();
                            $('#deconnexion').show();
                        }
                    }
                    else
                    {
                        $('#erreur_connexion').html(data.erreur);
                    }
                }
            });
        }
    });

    $('#form_inscription').submit(function(e) {
        if(connected == 0)
        {
            e.preventDefault();

            $.ajax({
                data :{
                    data: $(this).serialize()
                },
                type: 'POST',
                url: "../public/index.php/inscription",  
                success: function(data) {
                    if(data.success == 1)
                    {
                        $('#connexion_inscription').hide();
                        
                        $('#sans_personnage').show();
                        $('#deconnexion').show();
                    }
                    else
                    {
                        $('#erreur_inscription').html(data.erreur);
                    }
                }
            });
        }
    });

    $('#deconnexion').click(function() {
        $.ajax({
            type: 'POST',
            url: "../public/index.php/deconnexion",
            success: function(data) {
            }
        });
        window.location.reload();
    });
});
