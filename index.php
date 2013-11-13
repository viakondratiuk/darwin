<?php
include 'bootstrap.php';

require_once 'app/templates/header.phtml';

$mode = isset($_REQUEST['mode']) ? $_REQUEST['mode'] : 'points_overview';

switch($mode) {
    case 'points_overview':
        require_once 'app/templates/dashboard.phtml';
        break;
    case 'points_manage':
        require_once 'app/templates/points_manage.phtml';
        break;
    case 'points_manage_save':
        require_once 'app/models/points_manage.php';
        break;
    default:
        require_once 'app/templates/dashboard.phtml';
        break;
}

require_once 'app/templates/footer.phtml';