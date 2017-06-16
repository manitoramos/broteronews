<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$perPage = 8;

$sql = "SELECT * from noticias WHERE Confirmed='Yes' ORDER BY id DESC";
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage; 
$faq = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}
$pages  = ceil($_GET["rowcount"]/$perPage);
$output = '';
$begin = 0;
$break = 0;

$anotherow = $db_handle->numRows($sql);
if(!empty($faq)) {
$output .= '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />';
foreach($faq as $k=>$v) {
 if($begin == 0){
							$output .= "<div class=\"row text-center\">";
							}
		                   $output .= "<div class=\"col-md-3 col-sm-6\">";
		                      $output .= "<div class=\" ex2\">";
$output .= "<span class=\"pull-left text-muted\" style=\"font-size:70%\">{$faq[$k]['data']}</span>";
$output .= "<div class=\"pull-right text-muted monte\" style=\"font-size:70%;color:black;\"><span>{$faq[$k]['categoria']}</span></div>";
$output .= "<a href=\"noticia@{$faq[$k]['id']}\"><img class=\"immgg\" src=\"{$faq[$k]['imagem']}\" alt=\"\"></a>";
		                            $output .= "<div class=\"caption\">";
		                                $output .= "<h4><a style=\"text-decoration:none;\" href=\"noticia@{$faq[$k]['id']}\">{$faq[$k]['titulo']}</a></h4>";
		                                $output .= "<p style=\"color:black;\">{$faq[$k]['desshort']}</p>";
		                            $output .= "</div>";
		                        $output .= "</div>";
		                    $output .= "</div>";
							$begin++;
							$break++;
							if($begin == 4 && $anotherow > 4){
								$begin = 0;
								$output .= "</div>";
							}
							if($break == 9){
								$output .= "<div class=\"row text-center\">";
								break;
							}
}
}
print $output;
?>
