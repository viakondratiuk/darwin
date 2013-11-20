<?php
include 'bootstrap.php';

require_once 'app/templates/header.phtml';

$mode = isset($_REQUEST['mode']) ? $_REQUEST['mode'] : 'points';
$page = 'app/templates/' . $mode . '.phtml';
if (file_exists($page)) {
    require_once $page;
} else {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    echo '<p>Page not found.</p>';
}

require_once 'app/templates/footer.phtml';