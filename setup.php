<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Limonade Database Setup</title>
	<meta name="generator" content="TextMate http://macromates.com/">
	<meta name="author" content="Fabrice Luraine">
</head>
<body>
  <h1>Limonade Database Setup</h1>

<?php
function exceptions_error_handler($severity, $message, $filename, $lineno)
{
  if (error_reporting() == 0) return;
  if (error_reporting() & $severity)
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
}
set_error_handler('exceptions_error_handler');
$localhost = preg_match('/^localhost(\:\d+)?/', $_SERVER['HTTP_HOST']);
$dsn = $localhost ? 'mysql:dbname=hayvote;host=127.0.0.1' : 'mysql:dbname=hayvote;host=127.0.0.1';
    try
    {
      $db = new PDO($dsn);
      $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
      $db->exec(file_get_contents('db/schema.sql'));
      $db->exec(file_get_contents('db/fixtures.sql'));

      ?>
      <p>Setup succesful. <a href="index.php">Let's go !</a></p>
      <?php

    }
    catch(Exception $e)
    {

      ?>
      <p><strong>Setup failed:</strong> <code><?php echo e?></code>
      <?php

    }
?>
</body>
</html>
