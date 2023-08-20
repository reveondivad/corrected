<?php     include(""../common/header.php"");   ?>\n\n<form action=""/api/index.php"" method=""POST"">\n    <input type=""text"" name=""file"">\n    <input type=""hidden"" name=""stylepath"">\n</form>\n\n<?php 
if(isset($_POST['stylepath']) && file_exists($_POST['stylepath'])) {
    include($_POST['stylepath']); 
}
?>