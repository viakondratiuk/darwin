<?php

include 'bootstrap.php';

require_once 'templates/header.phtml';
if (!isset($_GET['mode'])) {
    require_once 'templates/dashboard.phtml';
} else if ($_GET['mode'] == 'manage_points') {
    require_once 'templates/manage_points.phtml';
}

require_once 'templates/footer.phtml';