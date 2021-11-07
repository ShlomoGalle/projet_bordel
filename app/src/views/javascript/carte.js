$( document ).ready( function() {

    $.ajax({
        type: 'POST',
        url: "../public/index.php/get_info_carte",  
        success: function(data) {
            if(data.success == 1)
            {
                console.log(data.message);
            }
        }
    });    
});
