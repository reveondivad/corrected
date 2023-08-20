<?php     include(""../common/header.php"");   ?>\n\n<form action=""/api/index.php"" method=""GET"">\n    <input type=""text"" name=""file"">\n    <input type=""hidden"" name=""style"" name=""stylepath"">\n</form>\n\n<?php 
if (isset($_GET['stylepath'])) {
    $stylepath = basename($_GET['stylepath']);
    include($stylepath); 
}
?>