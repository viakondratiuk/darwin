<?php
include 'bootstrap.php';

require_once 'app/templates/header.phtml';

$mode = isset($_GET['mode']) ?: 'points_overview';

switch($mode) {
    case 'points_overview':
        require_once 'app/templates/dashboard.phtml';
        break;
    case 'points_manage':
        require_once 'app/templates/points_manage.phtml';
        break;
    default:
        require_once 'app/templates/dashboard.phtml';
        break;
}

require_once 'app/templates/footer.phtml';