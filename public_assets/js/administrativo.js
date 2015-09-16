selecionarEspaco = function(){
	var valorSelecionado = document.getElementById("selecionador");
  var campoCentral = document.getElementById("campoCentral");
  var html = '<form action="administracao.php" method="POST"><p></p><p> Digite no campo abaixo a query que você deseja executar!</p> <label class="col-xs-12 form-group"> <input name="query" type="text" class="form-control" placeholder="SQL QUERY" required> <div class="help-block with-errors"></div> </label> <label class="col-xs-12 form-group"> </label> <label class="col-sm-12 col-xs-12 form-group"><input name="Submit" type="submit" value="executar"></label><input type="hidden" name="valorSelecionado" value="'+valorSelecionado.value+'"> </form>';

  campoCentral.innerHTML = html;

}
