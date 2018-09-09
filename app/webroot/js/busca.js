$(document).ready(function(){
    var caminho;
    $(".buscar").live('click',function(){
        model = $(this).attr('obj');
        caminho = model+"/busca/"+ $('.search-query').val();
        $.get(caminho, null, function(page){
            $(".conteudo_lintagem").html(page);
        });
    });
});