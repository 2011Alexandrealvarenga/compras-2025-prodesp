jQuery(document).ready(function(){
  jQuery(".step").click(function() {
    jQuery('html, body').animate({
        scrollTop: jQuery(".hiring").offset().top
    }, 1000);
  });


  jQuery('#btn-cad-usuarios').click(
    function(){
    jQuery('.cadastro-content').css('display','block');
    jQuery('.perfis-content').css('display','none');
    jQuery('.sistema-content').css('display','none');

  }
  );
  jQuery('#btn-conhe-perfis').click(
    function(){
    jQuery('.perfis-content').css('display','block');
    jQuery('.cadastro-content').css('display','none');
    jQuery('.sistema-content').css('display','none');
    }
  );
  jQuery('#btn-acesso-sistema').click(
    function(){
    jQuery('.sistema-content').css('display','block');
    jQuery('.perfis-content').css('display','none');
    jQuery('.cadastro-content').css('display','none');
    }
  );
  
});
 //  ancora 
if (window.location.href.includes("ircomecar")) {
    window.scrollBy(0, 400);
}else if(window.location.href.includes("irfluxo-das-contratacoes")) {
  window.scrollBy(0, 900);
}