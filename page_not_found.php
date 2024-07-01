<?php
declare(strict_types = 1);                                    // Use strict types
http_response_code(404);                                      // Set HTTP response code
require_once 'config.php';              // Create PDO object
                      // Include functions

$sql = "SELECT id, name FROM students WHERE validity = 1;"; // SQL to get categories
$navigation  = pdo($pdo, $sql)->fetchAll();                   // Get navigation categories
$section     = '';                                            // Current category
$title       = 'Page not found';                              // HTML <title> content
$description = '';                                            // Meta description content
?>
<?php require_once 'theme/header.php'; ?>
  <main class="container" id="content">
    <h1 class="text-white">Sorry! We cannot find that page.</h1>
    <p>Try the <a class="text-white" href="index.php">home page</a> or email us
      <a class="text-white" href="mailto:hello@eg.link">hello@eg.link</a></p>
  </main>
<?php
require_once 'theme/footer.php';
exit;
?>