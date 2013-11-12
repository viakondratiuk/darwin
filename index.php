<?php

include 'bootstrap.php';

require_once 'templates/header.phtml';

$mode = isset($_GET['mode']) ?: 'points_overview';

switch($mode) {
    case 'points_overview':
        require_once 'templates/dashboard.phtml';
        break;
    case 'points_manage':
        require_once 'templates/manage_points.phtml';
        break;
    default:
        require_once 'templates/dashboard.phtml';
        break;
}

require_once 'templates/footer.phtml';