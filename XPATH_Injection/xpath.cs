<?php
require_once('../_helpers/strip.php');
$name = strip_tags($_GET['name']);
?>

<html>
  <head>

  </head>
  <body>
    <p>
      Hi, <?= htmlentities($name, ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <script>
      window.onload = function(){
        let someObject = window.someObject || {};
        let script = document.createElement('script');
        if(someObject.url){
          script.src = encodeURI(someObject.url);
          document.body.appendChild(script);
        }
     };
    </script>
  </body>
</html>