<html lang="pt-br">
<head>
	<meta charset="utf-8" >
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="modal-video" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Modal title</h4>
	      </div>
	      <div class="modal-body">
	        <iframe>
	        	
	        </iframe>
	      </div>
	      <div class="modal-footer">
	        
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

<div class="container">

	<div class="jumbotron">
	  <h1>Aprendendo JSON usando Redtube</h1>
	  <p></p>

	    <div class="input-group">
	      <input type="text" id="txt-pesquisar" class="form-control" placeholder="Naomi Russel fazendo...">
	      <span class="input-group-btn">
	        <button id="btn-pesquisar" class="btn btn-default" type="button">Pesquisar</button>
	      </span>
	    </div><!-- /input-group -->
	</div>

	<div id="div-loading" style="display : none;">

		<div class="progress">
		  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
		    <span class="sr-only">45% Complete</span>
		  </div>
		</div>

	</div>

	<div id="conteudo">

		<div class="row">
		  
		</div> <!-- /row images -->
	</div> <!-- fecha conteudo -->

</div>

<script id="tmpl-Video" type="text/html">
	<div class="col-sm-6 col-md-3">
		<div class="thumbnail">
			<img id="" class="img-video" src="${video.thumb}" alt="Flower Tucci">
		    <div class="caption">
		        <h3>Tempo: ${video.views}</h3>
		       <p class="txt-video">${video.title}</p>
			</div>
		</div>
	</div>
</script>

<!-- CDN jQuery-->
<script src="js/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>



<!-- Ajax jQuery Microsoft-->
<script src="http://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
	$("#btn-pesquisar").click(function () 
		{	
			// pegando o valor do input e jogando na variavel termo
			var termo = $("#txt-pesquisar").val();

			var proxy = "";

			proxy = "https://crossorigin.me/"

			var url = proxy + "http://api.redtube.com/?data=redtube.Videos.searchVideos&output=json&search="	+ termo;

			$.ajax(
				{
					url : url, 
					method: 'GET', 
					beforeSend : function () {
						$("#div-loading").show();
					},
					success : function (retorno) {
						if(retorno.count !=0)
						{
								$(".video").remove();
							$("#tmpl-video").tmpl(retorno.videos).appendTo("#conteudo");
						}
						else 
						{
							alert("Não foi encontrado nenhum video");
						}
					},
					error : function () {
						alert("Falha de conexão");
					},
					complete: function () {
						$("#div-loading").hide();
					}	
				});

		});
</script>

</body>
</html>

