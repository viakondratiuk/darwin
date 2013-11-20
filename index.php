<?php
include 'bootstrap.php';

require_once 'app/templates/header.phtml';

$mode = isset($_REQUEST['mode']) ? $_REQUEST['mode'] : 'points';

switch($mode) {
    case 'points':
        require_once 'app/templates/points.phtml';
        break;
    case 'plans':
        require_once 'app/templates/plans.phtml';
        break;
    case 'links':
        require_once 'app/templates/links.phtml';
        break;
    default:
        require_once 'app/templates/points.phtml';
        break;
}

require_once 'app/templates/footer.phtml';