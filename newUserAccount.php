<?include("global.php");

function generate_uuid() {
	return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
		mt_rand( 0, 0xffff ),
		mt_rand( 0, 0x0fff ) | 0x4000,
		mt_rand( 0, 0x3fff ) | 0x8000,
		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
	);
}

//	decode json
$json = file_get_contents('php://input');
$data = json_decode($json);

// //	get fields from json
$emailAddress = $data->emailAddress;
$password = $data->password;
$uuid = generate_uuid();

mysql_query("INSERT INTO users (uuid, email_address, password) VALUES ('$uuid', $emailAddress', '$password')");

$response = array(
	"success"=>true,
	"tag"=>"newUserAccount"
);

echo json_encode($response);

?>