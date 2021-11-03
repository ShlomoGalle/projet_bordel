$( document ).ready( function() {

    $.ajax({
        data :{
            data: $(this).serialize()
        },
        type: 'POST',
        url: "../public/index.php/default",  
        success: function(data) {
            if(data.success == 1)
            {
                if(data.connected != 1)
                {
                    window.location.href = "index.html"
                }
            }
        }
    });

});
