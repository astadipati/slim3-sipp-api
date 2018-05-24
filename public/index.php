<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
require_once ('../apiv1/perkara.php');
require_once ('../apiv1/sidang.php');
require_once ('../apiv1/keuangan.php');
require_once ('../apiv1/aktecerai.php');
require_once ('../apiv1/tes.php');
$app->run();