<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vídeos</title>

	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

	
	<link href="estilos.css" rel="stylesheet">
	
	
</head>
<body>







<header id="inicio" class="container-fluid ">
    <div class="container ">
		<h1>Data API YouTube</h1>
		<h3>Search list</h3>
		<form method="POST">
			<div class="row justify-content-center ">
				
				  <div class="col-6 col-sm-5 col-md-4 col-lg-3  ">
					<input type="text" class="form-control" placeholder="Buscar" id="q" name="q" >
				  </div>
				  
				  <div class="col-3 col-sm-3 col-md-2 col-lg-1">
				  <button type="submit" class="btn btn-primary">Buscar</button>
				  </div>
				  
			</div>
		</form>
    </div>
</header>





<?php

if (isset($_POST['q'])) {

	if (!file_exists('vendor/autoload.php')) {
	  echo 'please run "composer require google/apiclient:~2.0" in ...';
	}
	require_once 'vendor/autoload.php';
	
	
	$client = new Google_Client();
	$client->setDeveloperKey('AIzaSyCsMGE6AuVB--6XcS3OkmWrutDUC2Qm74Q');  //DEVELOPER_KEY

	$youtube = new Google_Service_YouTube($client);

	$searchResponse = $youtube->search->listSearch('id,snippet', array(
	  'q' => $_POST['q'],
	  'maxResults' => 12,
	));


?>

	<div class="container-fluid" id="caixaVideos">
		<div class="container">    
			<ul class="row justify-content-center caixaItensHabilidades">
				<?php foreach ($searchResponse['items'] as $searchResult) {  ?>
				<li class="col-12 col-sm-6 col-lg-4 col-xl-4 ">
					<a href="https://www.youtube.com/watch?v=<?php echo $searchResult['id']['videoId'] ?>" target="_blank">
						<div class="imgVideo" style="background-image:url('<?php echo $searchResult['snippet']['thumbnails']['high']['url'] ?>')"></div>
						<h6><?php echo $searchResult['snippet']['title'] ?></h6>
					</a>
				</li>
				<?php } ?>
			</ul>
			

			
		</div>
	</div>
	
<?php } ?>



	<div class="container-fluid" id="caixaLinkDocumentacao">
		<div class="container"> 			<div class="row justify-content-center">
			<div>11/2022</div>
				<div>
				  Documentação: <br>
				  <a target="_blank" href="https://developers.google.com/youtube/v3/docs/search/list">https://developers.google.com/youtube/v3/docs/search/list</a>
				</div>
			</div>
		</div>
	</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


</body>
</html>