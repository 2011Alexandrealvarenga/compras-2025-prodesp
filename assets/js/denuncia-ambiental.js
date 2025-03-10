(function(){

    $("#radio-sigilio").click(function(){	
        alert("aeee");
    })

    /* Validações */
    if( !validateEmail(emailaddress)) { 

    }

    /* Funções */
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
    }
});