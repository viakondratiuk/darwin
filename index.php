<?php
include 'bootstrap.php';

require_once 'app/templates/header.phtml';

$mode = isset($_REQUEST['mode']) ? $_REQUEST['mode'] : 'dashboard';

switch($mode) {
    case 'dashboard':
        require_once 'app/templates/dashboard.phtml';
        break;
    case 'points_form':
        require_once 'app/templates/points/form.phtml';
        break;
    case 'points_form_save':
        require_once 'app/models/pointsManager.php';
        break;
    default:
        require_once 'app/templates/dashboard.phtml';
        break;
}

require_once 'app/templates/footer.phtml';