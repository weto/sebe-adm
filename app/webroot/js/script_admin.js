/*$(document).ready(function(){
    $('.add_img').click(function(){
        indice = $('.input_dinamico').length + 1;
        $(".container_mais_fotos").append('<div class=\'input_dinamico\'><label>Imagem</label> <input type="file" name="data[Foto][imagem'+indice+']" id="FotoImagem'+indice+'"> </div>');
    });
});*/

var tempo = new Number();
// Tempo em segundos

var app_base_default = $('#app_base_default').val();

var acao_automatico  = $('#acao_automatico').val();

var acao_retorno     = $('#acao_retorno').val();

tempo = 30;

var link = app_base_default+"/"+acao_automatico;

$('#parar').click(function(){
	link = app_base_default+"/"+acao_retorno;
	$('#parar').val('Parando');
});

function startCountdown(){

	// Se o tempo não for zerado
	if((tempo - 1) >= 0){

		// Pega a parte inteira dos minutos
		var min = parseInt(tempo/60);
		// Calcula os segundos restantes
		var seg = tempo%60;

		// Formata o número menor que dez, ex: 08, 07, ...
		if(min < 10){
			min = "0"+min;
			min = min.substr(0, 2);
		}
		if(seg <=9){
			seg = "0"+seg;
		}

		// Cria a variável para formatar no estilo hora/cronômetro
		horaImprimivel = '00:' + min + ':' + seg;
		
		//JQuery pra setar o valor
		$("#tempo").html(horaImprimivel);

		// Define que a função será executada novamente em 1000ms = 1 segundo
		setTimeout('startCountdown()',1000);

		// diminui o tempo
		tempo--;

	// Quando o contador chegar a zero faz esta ação
	}else{
		location.href = link;
	}

}

// Chama a função ao carregar a tela
startCountdown();

var url_atual = window.location.href;
if((url_atual.split('flas')).length>1){
	$('#parar').trigger("click");
}

document.crawlerNome.submit();
