<?php 

$app->get('/data/{id}/ac', function($request){
	require_once('../libs/koneksi.php');
	$id = $request->getAttribute('id');
	$query = "SELECT * FROM perkara_akta_cerai WHERE perkara_id = $id";
	// $query = "SELECT * FROM perkara";
	$result = $mysqli->query($query);
	if (!$result) {
		header('Content-Type: application/json');
		echo json_encode(array(
			'status' => false,
			'message' => "Tidak Ada Data"
		 ));
	}else{
		while ($row = $result->fetch_assoc()) {
		$data = $row;
		}
		if (isset($data)){
			header('Content-Type: application/json');
			echo json_encode($data);	
		}
	}
});
// $app->get('/data/{id}/ac', function($request){
// 	require_once('../setting/koneksi.php');
// 	$id = $request->getAttribute('id');
// 	$query = "SELECT perkara_id, tahun_akta_cerai, nomor_akta_cerai, tanggal_akta_cerai, no_seri_akta_cerai FROM perkara_akta_cerai WHERE perkara_id = $id";
// 	$result = $mysqli->query($query);
// 	if (!$result) {
// 		header('Content-Type: application/json');
// 		echo json_encode(array(
// 			'status' => false,
// 			'message' => "Tidak Ada Data 1"
// 		 ));
// 	}else{
// 		// $data[]= $result->fetch_assoc(); jika ingin tampil data dengan array
// 		$data= $result->fetch_assoc();
// 		if (isset($data)){
// 		header('Content-Type: application/json');
// 		echo json_encode($data);	
// 		}else{
// 			echo json_encode(array(
// 			'status' => false,
// 			'message' => "Tidak Ada Data 2"
// 		 ));
// 	}
// 	}
// });