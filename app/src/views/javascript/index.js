$( document ).ready( function() {

    $("#test").click(function() {

        var race = $("#field").val();

        $.ajax({ ///TEST
            data :{race : race},
            type: 'POST',
            url: "../public/index.php/instanciation_class_personnage",  
            success: function(data) {
                if(data.success == 1){
                    // $("#print").append('test');
                    $("#print").append(data.message + '<br />');

                    // console.log(data.message);
                    // window.location.href = "/creationpersonnage.html";
                }
                else{
                    $("#print").append(data.message + '<br />');
                }
            }
        });
    });
});
