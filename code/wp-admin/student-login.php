<?php
require_once dirname( __DIR__ ) . '/wp-load.php';

date_default_timezone_set("Asia/Kolkata");

if(!isset($_GET['u']) && $_GET['u'] == "")
	exit("Token missing");

if(get_current_user_id() > 0)
	exit('User is already logged in, please open <a href="'.$_SERVER['REQUEST_URI'].'">this link</a> in private window.');

$token = explode(".", $_GET['u']);

if(count($token) != 2)
	exit("Invalid token provided");

$sql .= "SELECT ht_users.ID, ht_users.user_email FROM ht_users ";
$sql .= "INNER JOIN ht_usermeta ON ht_users.ID = ht_usermeta.user_id ";
$sql .= "WHERE ht_usermeta.meta_key = 'ht_capabilities' ";
$sql .= "AND ht_usermeta.meta_value LIKE '%student%' ";
$sql .= "AND MD5(CONCAT(ht_users.ID, '" . generateStudentLoginToken() . "')) = '" . $token[0] . "'";

$result = $wpdb->get_results($sql);

if(count($result) == 0) exit("Invalid token provided");

$user = get_user_by('email', $result[0]->user_email);

if(!$user)	exit("User not found");

$query = "INSERT INTO ht_admin_student_logins(token, admin_id, student_id, log_on) VALUES ('%s', '%s', '%s', NOW())";

$result = $wpdb->query($wpdb->prepare($query, [
	$token[0],
	$token[1],
	$user->ID,
]));

wp_set_current_user( $user->ID, $user->user_login );
wp_set_auth_cookie( $user->ID );
do_action( 'wp_login', $user->user_login, $user);

$userData = $user->data;
$userData->avatar = get_avatar_url( $user->ID );
?>
<script type="text/javascript">
	sessionStorage.setItem('bp_user', JSON.parse('<?php echo json_encode($userData); ?>'));
	window.location.href = "<?php echo home_url(); ?>";
</script>