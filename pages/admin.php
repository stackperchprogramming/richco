<?php if(session_status() == PHP_SESSION_NONE){ session_start(); }
include(__DIR__. '/../config.php');//get config
/**
 * @package RichCo
 */
require_once __DIR__ . '/../classes/Database.php';
if(!isset($database)){$database = new Database();}//initialize database class
?>
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <?php
  wp_head(); 
  ?>
</head>

<body>
<?php
    if(isset($_SESSION)){
        if(isset($_SESSION['type'])){
            print "<div id='admin_content' class='control_panel'>";
            $database->renderPage(__DIR__.'/control_panel.php');
        }else{
            print "<div id='admin_content' class='signin_page'>";
            $database->renderPage(__DIR__.'/signin_page.php');
        }
    }else{
        print "<div id='admin_content' class='signin_page'>";
        $database->renderPage(__DIR__.'/signin_page.php');
    }
?>    
</div>
<?php wp_footer(); ?>
</body>

</html>
