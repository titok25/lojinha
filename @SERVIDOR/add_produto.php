<?php 

session_start();

require_once("../api/db.php");

				$sql = mysqli_query($conn, "SELECT * FROM acesso");
				 while($rowx = mysqli_fetch_array($sql)){ 
				 
				 $login = $rowx["login"];
				 $senha = $rowx["senha"];
				 
				 if($_SESSION['login']==$login && $_SESSION['senha']==$senha){ // se os dados nao bater.. direciona para area de login
                  if($_SESSION['tempo'] > time()){ //verifica se o tempo da sessão ainda está dentro do permitido
				  }else{
				  $tempo = time();
				  header("Location: ./?temp=expired&id=$tempo");
				  exit;
				  }				 
				 }else{
				 $tempo = time();
				 header("Location: ./?access=fail=id=$tempo");
				 exit;
				 }
				 }

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Add produto
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3  bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="dashboard.php">
        
        <?php 
		$sql = mysqli_query($conn, "SELECT * FROM config");
						 while($rowx = mysqli_fetch_array($sql)){ 
						 						 
						 $lojinha = $rowx["nome"];
						 
						 }
						 
						 echo '<span class="ms-1 font-weight-bold text-white">Loja - '.$lojinha.'</span>';
		?>
		
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="cadastros.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment_ind</i>
            </div>
            <span class="nav-link-text ms-1">Cadastros</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="produtos.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">local_grocery_store</i>
            </div>
            <span class="nav-link-text ms-1">Produtos</span>
          </a>
        </li>
      
	  <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="add_produto.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add_circle</i>
            </div>
            <span class="nav-link-text ms-1">Adicionar Produto</span>
          </a>
        </li>
	  
        <li class="nav-item">
          <a class="nav-link text-white " href="estatisticas.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">insert_chart</i>
            </div>
            <span class="nav-link-text ms-1">Estatisticas</span>
          </a>
        </li>
		
			<li class="nav-item">
          <a class="nav-link text-white" href="bloqueados.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">key</i>
            </div>
            <span class="nav-link-text ms-1">Bloqueados</span>
          </a>
        </li>	
		
        <li class="nav-item">
          <a class="nav-link text-white" href="administrador.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Administrador</span>
          </a>
        </li>
     
	 	<li class="nav-item">
          <a class="nav-link text-white" href="pix.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">paid</i>
            </div>
            <span class="nav-link-text ms-1">Config Pix</span>
          </a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link text-white" href="config.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">storefront</i>
            </div>
            <span class="nav-link-text ms-1">Config Loja</span>
          </a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link text-white" href="apis.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notification_important</i>
            </div>
            <span class="nav-link-text ms-1">Config Apis</span>
          </a>
        </li>
		
		 <li class="nav-item">
          <a class="nav-link text-white " href="sair.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sair</span>
          </a>
        </li>
		
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="https://api.whatsapp.com/send?phone=5513996514973&text=Oi%20THE-FAKE" target="_blank" type="button">Falar com the-fake</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Página</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Adicionar produto</li>
          </ol>
         <h6 class="font-weight-bolder mb-0">Loja V1.0</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div style="visibility:hidden;" class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
			<div class="avatar me-3">
             <img src="./assets/img/the.png" alt="kal" class="border-radius-lg shadow">
            </div>
					  
              <a href="sair.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sair</span>
              </a>
            </li>
           
		   <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
			
			
         
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
	<br><br><br>
	<div class="card card-body mx-3 mx-md-4 mt-n6">
       <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
     <h6 class="text-white text-capitalize ps-3">Novo produto</h6>
     </div>
        <div class="row">
          <div class="row">
		  
		  
           	   <div class="col-12 mt-4">
              
						
              <div class="row">
			 		
							  
				<form id="formulario" onsubmit="return false">

				
				<label id="imgpic1" for='pic1' style="text-align:center;background-color: transparent; border: 1px solid #344767; cursor:pointer;justify-content: center;width: 100%;background-image: none; color: #344767; padding: 4px 12px;font-size: 15px;font-weight: 400;border-radius: 4px;text-decoration: none;transition: all 0.3s ease;">Imagem principal do produto (click aqui)</label>
				<input onclick="verificarIMG1()" style="display:none; width:100%;text-align:center;color:transparent;" accept="image/*" type="file" id="pic1" name="pic1">
				
				<input type="hidden" id="idproduto" name="idproduto">
				
                <label id="imgpic2" for='pic2' style="text-align:center;background-color: transparent; border: 1px solid #344767; cursor:pointer;justify-content: center;width: 100%;background-image: none; color: #344767; padding: 4px 12px;font-size: 15px;font-weight: 400;border-radius: 4px;text-decoration: none;transition: all 0.3s ease;">Imagem da descricao do produto (click aqui)</label>
			    <input onclick="verificarIMG2()" style="display:none; width:100%;text-align:center;color:transparent;" accept="image/*" type="file" id="pic2" name="pic2">
				
				<div style="display:block;" id="areaoff">
				<div class="input-group input-group-outline my-3">	
				  <label class="form-label">Nome do produto</label>
				  <input id="nomeproduto" name="nomeproduto" type="text" class="form-control">
				</div>
								
				<div class="input-group input-group-outline my-3">
				  <label class="form-label">Valor do produto</label>
				  <input onkeypress="mascara(this,reais)" id="valor" name="valor" type="text" class="form-control">
				</div>
				
				<div class="input-group input-group-outline my-3">	
				  <label class="form-label">Desconto ( Ex: 70,80 etc.. )</label>
				  <input type="text" id="desconto" name="desconto" class="form-control">
				</div>
				
				<div class="input-group input-group-outline my-3">	
				  <label class="form-label">Texto descrição do produto</label>
				  <input type="text" id="texto" name="texto" class="form-control">
				</div>
				
							
				<div class="mt-3 d-flex">
				  <h6 class="mb-0">Oferta relampago</h6>
				  <div class="form-check form-switch ps-0 ms-auto my-auto">
					<input class="form-check-input mt-1 ms-auto" type="checkbox" id="flexSwitchCheckDefault" id="oferta" name="oferta" onclick="verificarCheckBox();">
				  </div>
				</div>
				
				<div class="mt-3 d-flex">
				  <h6 class="mb-0">Pix (Padrão)</h6>
				  <div class="form-check form-switch ps-0 ms-auto my-auto">
					<input class="form-check-input mt-1 ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked="" disabled>
				  </div>
				</div>
				
				</div>
				</form>
               
              </div>
			  
			  <br>
			  
			
			 <a id="salvar" class="btn bg-gradient-success w-100 toast-btn" data-target="infoToast" href="#" onclick="addprox();">Adicionar</a> 
			  
            </div>
			
          </div>
        </div>
      </div>
	  
	   <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade hide p-2 mt-2 bg-gradient-info" role="alert" aria-live="assertive" id="infoToastk4" aria-atomic="true">
          <div class="toast-header bg-transparent border-0">
            <i class="material-icons text-white me-2">pan_tool_alt</i>
            <span class="me-auto text-white font-weight-bold">Capturando informações, Aguarde!</span>
            <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
        </div>
      </div>

	  
	  <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade hide p-2 mt-2 bg-gradient-danger" role="alert" aria-live="assertive" id="infoToastok2" aria-atomic="true">
          <div class="toast-header bg-transparent border-0">
            <i class="material-icons text-white me-2">shopping_cart</i>
            <span class="me-auto text-white font-weight-bold">Oops! Não e um código de produto valido!</span>
            <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
        </div>
      </div>
	  
	  <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade hide p-2 mt-2 bg-gradient-info" role="alert" aria-live="assertive" id="infoToast" aria-atomic="true">
          <div class="toast-header bg-transparent border-0">
            <i class="material-icons text-white me-2">notifications</i>
            <span class="me-auto text-white font-weight-bold">Produto acionado!</span>
            <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
        </div>
      </div>
	  
	  <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade hide p-2 mt-2 bg-gradient-danger" role="alert" aria-live="assertive" id="infoToastok4" aria-atomic="true">
          <div class="toast-header bg-transparent border-0">
            <i class="material-icons text-white me-2">notifications</i>
            <span class="me-auto text-white font-weight-bold">Oops! Produto ja cadastrado!</span>
            <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
        </div>
      </div>
	  
	  
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="" class="font-weight-bold" target="_blank">THE-FAKE</a>
              </div>
            </div>
           
          </div>
        </div>
      </footer>
    </div>
  </main>
 
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/jquery.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  
  <script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>
  
<script type="text/javascript" charset="utf-8">
	/*function pegaDados(){
	var codigo = document.getElementById("codigopro").value;
	if(codigo.indexOf("https") == -1){
	 document.getElementById("infoToastok2").setAttribute("class", "toast fade hide p-2 mt-2 bg-gradient-danger show");
	  document.getElementById("infoToast").setAttribute("class", "toast fade hide p-2 mt-2 bg-gradient-info hide");
	  setTimeout(()=>{
	  document.getElementById("infoToastok2").setAttribute("class", "toast fade hide p-2 mt-2 bg-gradient-danger hide");
	  }, 4000);
	}else{
	$.post("api_adm/", {painel:"codigoProduto", codigox:codigo},function(retorno){
	var theinfo = retorno.split("|");
	
	document.getElementById("jsonimgs").value=theinfo[0];
	document.getElementById("descricao").value=theinfo[1];
	document.getElementById("descricao2").value=theinfo[2];
	document.getElementById("nomeproduto").value=theinfo[3];
	document.getElementById("itemid").value=theinfo[4];
	document.getElementById("imgloja").value=theinfo[5];
	document.getElementById("loja").value=theinfo[6];
	document.getElementById("comentarios").value=theinfo[7];
	document.getElementById("cortamanho").value=theinfo[8];
	
	document.getElementById("areaoff").style.display="";
	document.getElementById("extrator").style.display="none";
	document.getElementById("salvar").style.display="";
	document.getElementById("cancelar").style.display="";
	document.getElementById("infoToast").setAttribute("class", "toast fade hide p-2 mt-2 bg-gradient-info hide");
	 });
	}
	}*/

    function verificarIMG1(){
	setInterval(()=>{
	var imagem = document.getElementById("pic1").value;
	if(imagem.includes(".png") || imagem.includes(".jpg")){
	document.getElementById("imgpic1").style="text-align:center;background-color: #58b05c; border: 1px solid #344767; cursor:pointer;justify-content: center;width: 100%;background-image: none; color: white; padding: 4px 12px;font-size: 15px;font-weight: 400;border-radius: 4px;text-decoration: none;transition: all 0.3s ease;";
	}else{
	document.getElementById("imgpic1").style="text-align:center;background-color: transparent; border: 1px solid #344767; cursor:pointer;justify-content: center;width: 100%;background-image: none; color: #344767; padding: 4px 12px;font-size: 15px;font-weight: 400;border-radius: 4px;text-decoration: none;transition: all 0.3s ease;";
	}	
	}, 500);
	}
	
	function verificarIMG2(){
	setInterval(()=>{
	var imagem = document.getElementById("pic2").value;
	if(imagem.includes(".png") || imagem.includes(".jpg")){
	document.getElementById("imgpic2").style="text-align:center;background-color: #58b05c; border: 1px solid #344767; cursor:pointer;justify-content: center;width: 100%;background-image: none; color: white; padding: 4px 12px;font-size: 15px;font-weight: 400;border-radius: 4px;text-decoration: none;transition: all 0.3s ease;";
	
	}else{
	document.getElementById("imgpic2").style="text-align:center;background-color: transparent; border: 1px solid #344767; cursor:pointer;justify-content: center;width: 100%;background-image: none; color: #344767; padding: 4px 12px;font-size: 15px;font-weight: 400;border-radius: 4px;text-decoration: none;transition: all 0.3s ease;";
	
	}	
	}, 500);
	}
	
	function addprox(){
	
	
	 document.getElementById("infoToast").setAttribute("class", "toast fade hide p-2 mt-2 bg-gradient-info hide");
	 
	 var produto = document.getElementById("nomeproduto").value;
	 var des = document.getElementById("desconto").value;
	 var texto = document.getElementById("texto").value;
	 var val = document.getElementById("valor").value;
	 var chkbox = chk;
	
	
	 $.post("api_adm/", {painel:"addproduto", nome:produto, desconto:des, textodescricao:texto, valor:val, oferta:chkbox},function(retorno){
	 
	 var thefull = retorno.trim();
	 if(thefull=="ja_foi_cadastrado"){
	 
	  document.getElementById("infoToast").setAttribute("class", "toast fade hide p-2 mt-2 bg-gradient-info hide");
	  document.getElementById("infoToastok4").setAttribute("class", "toast fade hide p-2 mt-2 bg-gradient-info show");
	
	  setTimeout(()=>{
	  document.getElementById("infoToastok4").setAttribute("class", "toast fade hide p-2 mt-2 bg-gradient-info hide");
	  }, 3000);
	
	 }
	 else if(thefull=="erro"){
	 alert("houve um erro ao cadastrar o produto!");
	 }else{
	 
	 var parte = thefull.split("|");
	 var id = parte[1];
	 
	 document.getElementById("idproduto").value=id;
	  
	  setTimeout(()=>{
	  
	  var form_data = new FormData(document.getElementById("formulario"));
      
	  fetch("api_adm/product.php",{
      method: "POST",
      body: form_data
      });
	  
      //window.location.href="produtos.php";
	  newProduto2();
	  
	  }, 1500);
	  
	  function newProduto2(){
	  setTimeout(()=>{
	  var form_data = new FormData(document.getElementById("formulario"));
      
	  fetch("api_adm/product2.php",{
      method: "POST",
      body: form_data
      });
	  
      window.location.href="produtos.php?success=produtoAdicionado";
	  
	  }, 1500);
	  
	  }
	  
	 
	 }
	
	 
	 });
	// if(retorno=="ja foi cadastrado"){
	 
	
	
	// }else{
	
	// document.getElementById("infoToastok3").setAttribute("class", "toast fade hide p-2 mt-2 bg-gradient-info show");
	// setTimeout(()=>{
	// document.getElementById("infoToastok3").setAttribute("class", "toast fade hide p-2 mt-2 bg-gradient-info hide");
	// }, 4000);	
    
	// document.getElementById("codigopro").value="";
	// document.getElementById("areaoff").style.display="none";	
	// document.getElementById("extrator").style.display="";
	// document.getElementById("salvar").style.display="none";
	// document.getElementById("cancelar").style.display="none";
	// document.getElementById("jsonimgs").value="";
	// document.getElementById("descricao").value="";
	// document.getElementById("descricao2").value="";
	// document.getElementById("nomeproduto").value="";
	// document.getElementById("itemid").value="";
	// window.location.href="produtos.php";
	// }
	 // });
	}

	function reais(v){
    v=v.replace(/\D/g,"");
    v=v/100;
    v=v.toFixed(2);
    return v;
	}
	function mascara(o,f){
		v_obj=o;
		v_fun=f;
		setTimeout("execmascara()",1);
	}
	function execmascara(){
		v_obj.value=v_fun(v_obj.value);
	}
	
	
	//onclick da oferta relampago na tela
	var chk = 0; // 0 == nao | 1 == sim
	function verificarCheckBox() {
    if(chk==0){
	chk=1;
	}else if(chk==1){
	chk=0;
	}
	}
</script>
  
  
</body>
</html>