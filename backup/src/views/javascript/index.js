$( document ).ready( function() {

    $("#test").click(function() {
    
        console.log('test');
    
        $.ajax({ ///TEST
            data :{test : 'test'},
            type: 'POST',
            url: "../public/index.php/home",  
            success: function(data) {
                if(data.success == 1){
                    console.log(data.message);
                    // window.location.href = "/creationpersonnage.html";
                }
            }
        });
    });
});
