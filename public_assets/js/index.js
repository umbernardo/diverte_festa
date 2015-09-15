window.onload = initPage;  
  
function initPage(){  
  gerarCalendario();
} 

selecionarEspaco = function(){
	var valorSelecionado = document.getElementById("selecionador");
	
	for (i in espacos_Array){
		if(espacos_Array[i] == valorSelecionado.value){
			var string = valores_Array[i];
			string = " Preço: R$ "+string.replace(".",",");
			document.getElementById("preco").innerHTML = string;
			document.getElementById("TituloEspaco").innerHTML = valorSelecionado.value;
		}
		else if(valorSelecionado.value == "selecione o espaço"){
			document.getElementById("preco").innerHTML = "";
			document.getElementById("TituloEspaco").innerHTML = " ";
		}
	}
	limparCalendario();
	MES_ATUAL = data.getMonth();
	ANO_ATUAL = data.getFullYear();
	DIA_ATUAL = data.getDate();
	diaDoMes = new Date(ANO_ATUAL, MES_ATUAL, 1);
	valorVetorialDiaDaSemana = diaDoMes.getDay();
	gerarCalendario();
}

function ObterDiaDaSemana(ano,mes,dia){
	Data = new Date(ano,mes,dia);
	var diaDaSemana = new Array(7);
	diaDaSemana[0]=  "Domingo";
	diaDaSemana[1] = "Segunda - Feira";
	diaDaSemana[2] = "Terça - Feira";
	diaDaSemana[3] = "Quarta - Feira";
	diaDaSemana[4] = "Quinta - Feira";
	diaDaSemana[5] = "Sexta - Feira";
	diaDaSemana[6] = "Sabado";
	return diaDaSemana[Data.getDay()];
}

function ObterMesDoAno(ano,mes,dia){
	Data = new Date(ano,mes,dia);
	var mesesDoAno = new Array(12);
	mesesDoAno[0] = "Janeiro";
	mesesDoAno[1] = "Fevereiro";
	mesesDoAno[2] = "Março";
	mesesDoAno[3] = "Abril";
	mesesDoAno[4] = "Maio";
	mesesDoAno[5] = "Junho";
	mesesDoAno[6] = "Julho";
	mesesDoAno[7] = "Agosto";
	mesesDoAno[8] = "Setembro";
	mesesDoAno[9] = "Outubro";
	mesesDoAno[10] = "Novembro";
	mesesDoAno[11] = "Dezembro";
	return mesesDoAno[Data.getMonth()];
}

function ObterNumeroDeDiasPorMes(MES_ATUAL){
	var numeroDeDias;
	switch(MES_ATUAL){
	case 0:
		numeroDeDias = 31;
		break;
	case 1:
		var res = ANO_ATUAL % 4;
		if(res == 0){
			numeroDeDias = 29;
		}
		else{
			numeroDeDias = 28;
		}
		break;
	case 2:
		numeroDeDias = 31;
		break;
	case 3:
		numeroDeDias = 30;
		break;
	case 4:
		numeroDeDias = 31;
		break;
	case 5:
		numeroDeDias = 30;
		break;
	case 6:
		numeroDeDias = 31;
		break;
	case 7:
		numeroDeDias = 31;
		break;
	case 8:
		numeroDeDias = 30;
		break;
	case 9:
		numeroDeDias = 31;
		break;
	case 10:
		numeroDeDias = 30;
		break;
	case 11:
		numeroDeDias = 31;
		break;
	}
	return numeroDeDias;
}

gerarCalendario = function(){
	var numeroDeDias = ObterNumeroDeDiasPorMes(MES_ATUAL);
	var DiaSemana = ObterDiaDaSemana(ANO_ATUAL,MES_ATUAL,DIA_ATUAL);
	var MesDoAno = ObterMesDoAno(ANO_ATUAL,MES_ATUAL,DIA_ATUAL);
	var semana = 1;
	var diadoMes = 01;
	for(i = 1; i<=numeroDeDias; i++){
		if(valorVetorialDiaDaSemana >6){
			semana = semana + 1;
			valorVetorialDiaDaSemana = 0;
		}
		switch(valorVetorialDiaDaSemana){
			case 0:
				var string = "dom";
				string = string + semana;
				document.getElementById(string).innerHTML = diadoMes;
				document.getElementById(string).setAttribute( 'onClick','reservarData(this);');
				valorVetorialDiaDaSemana = valorVetorialDiaDaSemana + 1;
				string = null;
				diadoMes = diadoMes +1;
				break;
			case 1:
				var string = "seg";
				string = string + semana;
				document.getElementById(string).innerHTML = diadoMes;
				document.getElementById(string).setAttribute( 'onClick','reservarData(this);');
				valorVetorialDiaDaSemana = valorVetorialDiaDaSemana + 1;
				string = null;
				diadoMes = diadoMes +1;
				break;
			case 2:
				var string = "ter";
				string = string + semana;
				document.getElementById(string).innerHTML = diadoMes;
				document.getElementById(string).setAttribute( 'onClick','reservarData(this);');
				valorVetorialDiaDaSemana = valorVetorialDiaDaSemana + 1;
				string = null;
				diadoMes = diadoMes +1;
				break;
			case 3:
				var string = "qua";
				string = string + semana;
				document.getElementById(string).innerHTML = diadoMes;
				document.getElementById(string).setAttribute( 'onClick','reservarData(this);');
				valorVetorialDiaDaSemana = valorVetorialDiaDaSemana + 1;
				string = null;
				diadoMes = diadoMes +1;
				break;
			case 4:
				var string = "qui";
				string = string + semana;
				document.getElementById(string).innerHTML = diadoMes;
				document.getElementById(string).setAttribute( 'onClick','reservarData(this);');
				valorVetorialDiaDaSemana = valorVetorialDiaDaSemana + 1;
				string = null;
				diadoMes = diadoMes +1;
				break;
			case 5:
				var string = "sex";
				string = string + semana;
				document.getElementById(string).innerHTML = diadoMes;
				document.getElementById(string).setAttribute( 'onClick','reservarData(this);');
				valorVetorialDiaDaSemana = valorVetorialDiaDaSemana + 1;
				string = null;
				diadoMes = diadoMes +1;
				break;
			case 6:
				var string = "sab";
				string = string + semana;
				document.getElementById(string).innerHTML = diadoMes;
				document.getElementById(string).setAttribute( 'onClick','reservarData(this);');
				valorVetorialDiaDaSemana = valorVetorialDiaDaSemana + 1;
				string = null;
				diadoMes = diadoMes +1;
				break;
			
		}
	}
	var proximo_mes = ObterMesDoAno(ANO_ATUAL,MES_ATUAL+1,DIA_ATUAL);
	var mes_Anterior = ObterMesDoAno(ANO_ATUAL,MES_ATUAL-1,DIA_ATUAL);
	document.getElementById("tituloCalendario").innerHTML ="<button id='voltarCalendario' onClick='voltarMes()' title='"+mes_Anterior+"'> < </button>  "+ MesDoAno +" "+ANO_ATUAL +" <button id='avancarCalendario' onClick='avancarMes()' title='"+proximo_mes+"'> > </button>";
	document.getElementById("tituloCalendario").title=MesDoAno;
	mostrarDatasEmprestadas();
}



function limparCalendario(){
	var semana = 1;
	var diadoMes = 1;
	var k = 0;
	for(i = 1; i<=42; i++){
			if(k >6){
				semana = semana + 1;
				k = 0;
			}
			switch(k){
				case 0:
					var string = "dom";
					string = string + semana;
					document.getElementById(string).innerHTML = "-";
					document.getElementById(string).className = " ";
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				case 1:
					var string = "seg";
					string = string + semana;
					document.getElementById(string).innerHTML = "-";
					document.getElementById(string).className = " ";
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				case 2:
					var string = "ter";
					string = string + semana;
					document.getElementById(string).innerHTML = "-";
					document.getElementById(string).className = " ";
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				case 3:
					var string = "qua";
					string = string + semana;
					document.getElementById(string).innerHTML = "-";
					document.getElementById(string).className = " ";
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				case 4:
					var string = "qui";
					string = string + semana;
					document.getElementById(string).innerHTML = "-";
					document.getElementById(string).className = " ";
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				case 5:
					var string = "sex";
					string = string + semana;
					document.getElementById(string).innerHTML = "-";
					document.getElementById(string).className = " ";
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				case 6:
					var string = "sab";
					string = string + semana;
					document.getElementById(string).innerHTML = "-";
					document.getElementById(string).className = " ";
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				
			}
			document.getElementById("dataT").value="";
		}

}

 function mostrarDatasEmprestadas(){
	var semana = 1;
	var diadoMes = 1;
	var k = 0;
	for(i = 1; i<=42; i++){
			if(k >6){
				semana = semana + 1;
				k = 0;
			}
			switch(k){
				case 0:
					var string = "dom";
					string = string + semana;
					var quantidade = datasReservadasArray.length;
					for(g=0;g<quantidade;g++){
						var array = datasReservadasArray[g].split(";");
						var data = array[0];
						var dia = data.substring(8,10);
						if(dia.indexOf(0) > -1){
							dia = dia.substring(1,2);
						}
						var mes = data.substring(6,7);
						var ano = data.substring(0,4);
						var MES = MES_ATUAL+1;
						var campoSelecionado = document.getElementById("selecionador").value;
						if((dia == document.getElementById(string).innerHTML) && (mes == MES) && (ano == ANO_ATUAL) && (campoSelecionado == array[1])){
								document.getElementById(string).className = "reservado";
														
						}
					}
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				case 1:
					var string = "seg";
					string = string + semana;
					var quantidade = datasReservadasArray.length;
					for(g=0;g<quantidade;g++){
						var array = datasReservadasArray[g].split(";");
						var data = array[0];
						var dia = data.substring(8,10);
						if(dia.indexOf(0) > -1){
							dia = dia.substring(1,2);
						}
						var mes = data.substring(6,7);
						var ano = data.substring(0,4);
						var MES = MES_ATUAL+1;
						var campoSelecionado = document.getElementById("selecionador").value;
						if((dia == document.getElementById(string).innerHTML) && (mes == MES) && (ano == ANO_ATUAL) && (campoSelecionado == array[1])){
								document.getElementById(string).className = "reservado";
														
						}
					}
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				case 2:
					var string = "ter";
					string = string + semana;
					var quantidade = datasReservadasArray.length;
					for(g=0;g<quantidade;g++){
						var array = datasReservadasArray[g].split(";");
						var data = array[0];
						var dia = data.substring(8,10);
						if(dia.indexOf(0) > -1){
							dia = dia.substring(1,2);
						}
						var mes = data.substring(6,7);
						var ano = data.substring(0,4);
						var MES = MES_ATUAL+1;
						var campoSelecionado = document.getElementById("selecionador").value;
						if((dia == document.getElementById(string).innerHTML) && (mes == MES) && (ano == ANO_ATUAL) && (campoSelecionado == array[1])){
								document.getElementById(string).className = "reservado";
														
						}
					}
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				case 3:
					var string = "qua";
					string = string + semana;
					var quantidade = datasReservadasArray.length;
					for(g=0;g<quantidade;g++){
						var array = datasReservadasArray[g].split(";");
						var data = array[0];
						var dia = data.substring(8,10);
						if(dia.indexOf(0) > -1){
							dia = dia.substring(1,2);
						}
						var mes = data.substring(6,7);
						var ano = data.substring(0,4);
						var MES = MES_ATUAL+1;
						var campoSelecionado = document.getElementById("selecionador").value;
						if((dia == document.getElementById(string).innerHTML) && (mes == MES) && (ano == ANO_ATUAL) && (campoSelecionado == array[1])){
								document.getElementById(string).className = "reservado";
														
						}
					}
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				case 4:
					var string = "qui";
					string = string + semana;
					var quantidade = datasReservadasArray.length;
					for(g=0;g<quantidade;g++){
						var array = datasReservadasArray[g].split(";");
						var data = array[0];
						var dia = data.substring(8,10);
						if(dia.indexOf(0) > -1){
							dia = dia.substring(1,2);
						}
						var mes = data.substring(6,7);
						var ano = data.substring(0,4);
						var MES = MES_ATUAL+1;
						var campoSelecionado = document.getElementById("selecionador").value;
						if((dia == document.getElementById(string).innerHTML) && (mes == MES) && (ano == ANO_ATUAL) && (campoSelecionado == array[1])){
								document.getElementById(string).className = "reservado";
														
						}
					}
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				case 5:
					var string = "sex";
					string = string + semana;
					var quantidade = datasReservadasArray.length;
					for(g=0;g<quantidade;g++){
						var array = datasReservadasArray[g].split(";");
						var data = array[0];
						var dia = data.substring(8,10);
						if(dia.indexOf(0) > -1){
							dia = dia.substring(1,2);
						}
						var mes = data.substring(6,7);
						var ano = data.substring(0,4);
						var MES = MES_ATUAL+1;
						var campoSelecionado = document.getElementById("selecionador").value;
						if((dia == document.getElementById(string).innerHTML) && (mes == MES) && (ano == ANO_ATUAL) && (campoSelecionado == array[1])){
								document.getElementById(string).className = "reservado";
														
						}
					}
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				case 6:
					var string = "sab";
					string = string + semana;
					var quantidade = datasReservadasArray.length;
					for(g=0;g<quantidade;g++){
						var array = datasReservadasArray[g].split(";");
						var data = array[0];
						var dia = data.substring(8,10);
						if(dia.indexOf(0) > -1){
							dia = dia.substring(1,2);
						}
						var mes = data.substring(6,7);
						var ano = data.substring(0,4);
						var MES = MES_ATUAL+1;
						var campoSelecionado = document.getElementById("selecionador").value;
						if((dia == document.getElementById(string).innerHTML) && (mes == MES) && (ano == ANO_ATUAL) && (campoSelecionado == array[1])){
								document.getElementById(string).className = "reservado";
														
						}
					}
					k = k + 1;
					string = null;
					diadoMes = diadoMes +1;
					break;
				
			}
		}

} 

avancarMes = function(){
	if(MES_ATUAL >= 11){
		MES_ATUAL = 0;
		ANO_ATUAL = ANO_ATUAL + 1;
	}
	else{
		MES_ATUAL = MES_ATUAL + 1;
		var quantidadeDeDiasMes = ObterNumeroDeDiasPorMes(MES_ATUAL);
		
	}
	 data = new Date(ANO_ATUAL,MES_ATUAL,1);
	 DIA_ATUAL = 1;
	 valorVetorialDiaDaSemana = data.getDay();
	 limparCalendario();
	 gerarCalendario();
}

voltarMes = function(){
	if(MES_ATUAL <=0){
		MES_ATUAL = 11;
		ANO_ATUAL = ANO_ATUAL - 1;
	}
	else{
		MES_ATUAL = MES_ATUAL - 1;	
		var quantidadeDeDiasMes = ObterNumeroDeDiasPorMes(MES_ATUAL);
		
	}
	 data = new Date(ANO_ATUAL,MES_ATUAL,1);
	 DIA_ATUAL = 1;
	 valorVetorialDiaDaSemana = data.getDay();
	 limparCalendario();
	 gerarCalendario();
}

 function reservarData(campoData){
	if(campoData.className=="PRE-reservado"){
		campoData.className="";
		document.getElementById("dataT").value="";
		DiasReservados = false;
	}
	else if(campoData.className=="reservado"){
		alert("Este dia já foi reservado!, Por Favor, Reserve outro Dia!");
	}
	else{
		if(DiasReservados == true){
			alert("Você não pode reservar mais de um dia ao mesmo tempo!\n Por Favor, Cancele a reserva já realizada!");
			campoData.className=" ";
		}
		else if(document.getElementById("selecionador").value == "selecione o espaço"){
			campoData.className=" ";
			DiasReservados = false;
			var t = campoData.id;
			document.getElementById("dataT").value="";
		}
		else{
			campoData.className="PRE-reservado";
			DiasReservados = true;
			var t = campoData.id;
			document.getElementById("dataT").value=document.getElementById(t).innerHTML+"/"+ObterMesDoAno(ANO_ATUAL,MES_ATUAL,DIA_ATUAL)+"/"+ANO_ATUAL;
		}
	}
}