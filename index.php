<?php 
$default_path="/phewcloud";
// Version
define('VERSION', '1.0.0');

// Application Title
define('APP_TITLE', 'Phew Cloud');

include $_SERVER['DOCUMENT_ROOT']."/phewcloud/components/main/header.php";
?>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT']."/phewcloud/components/main/sidebar.php"; ?>
  <main>
    <!-- application comes here -->
    
  </main>
  <?php include $_SERVER['DOCUMENT_ROOT']."/phewcloud/components/main/additional/scripts.php"; ?>
</body>
</html>