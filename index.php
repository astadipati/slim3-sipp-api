<?php 
require __DIR__ . '/vendor/autoload.php';
require 'libs/NotORM.php'; 

use \Slim\App;

$app = new App();
require_once('libs/koneksi.php');
$app-> get('/', function(){
    echo "Hello World";
});

$app ->get('/semua_ac', function() use($app, $db){
	$ac["error"] = false;
	$ac["message"] = "Berhasil mendapatkan data akte cerai";
    foreach($db->view_ac() as $data){
        $ac['semua_akte_cerai'][] = array(
            'id' => $data['perkara_id'],
            'tahun_ac' => $data['tahun_akta_cerai'],
            'nomor_ac' => $data['nomor_akta_cerai']
            );
    }
    echo json_encode($ac);
});

$app ->get('/ac/{id}', function($request, $response, $args) use($app, $db){
    $ac = $db->view_ac()->where('perkara_id',$args['id']);
    $acdetail = $ac->fetch();

    if ($ac->count() == 0) {
        $responseJson["error"] = true;
        $responseJson["message"] = "Akte Cerai Tidak Ditemukan";
    } else {
        $responseJson["error"] = false;
        $responseJson["message"] = "Berhasil mengambil data";
        $responseJson["tahun_ac"] = $acdetail['tahun_akta_cerai'];
        $responseJson["nomor_ac"] = $acdetail['nomor_akta_cerai'];
        $responseJson["tanggal_ac"] = $acdetail['tanggal_ac'];
        $responseJson["tanggal_serah1"] = $acdetail['serah1'];
        $responseJson["tanggal_serah2"] = $acdetail['serah2'];
    }

    echo json_encode($responseJson); 
});

//run App
$app->run();