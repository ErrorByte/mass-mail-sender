<?php
################################
#                              #
# ErrorByte Mass Mailer Sender #
# Coded By ErrorByte           #
# Copyright ErrorByte          #
# AnarchoXploit                #
#                              #
################################
require "Mail.php";
error_reporting(0);
echo "################################\n";
echo "#                              #\n";
echo "# ErrorByte Mass Mailer Sender #\n";
echo "#                              #\n";
echo "################################\n";
echo "\nSMTP HOST : ";
$host = "ssl://".trim(fgets(STDIN));
echo "\nSMTP PORT ( Default 465)  : ";
$p_raw = trim(fgets(STDIN));
if(!empty($p_raw)) {
$port = $p_raw;
} else {
$port = 465;
}
echo "\nSMTP USERNAME : ";
$user = trim(fgets(STDIN));
echo "\nSMTP PASSWORD : ";
system('stty -echo');
$pass = trim(fgets(STDIN));
system('stty echo');
echo "\n";
echo "\nYour Name : ";
$name = trim(fgets(STDIN));
echo "\nSubject : ";
$judul = trim(fgets(STDIN));
echo "\nMaillist : ";
$list = explode("\n", file_get_contents(trim(fgets(STDIN))));
echo "\nHTML File : ";
$file = file_get_contents(trim(fgets(STDIN)));
echo "\nSync....\n\n";
foreach($list as $mlist) {
$hed = array(
'From' => $name.'<'.$user.'>',
'To' => $mlist,
'Subject' => $judul,
'MIME-Version' => '1.0',
'Content-Type' => 'text/html; charset=ISO-8859-1');
$smtp = Mail::factory('smtp',
array('host' => $host,
'port' => 465,
'auth' => true,
'username' => $user,
'password' => $pass));
$msg = stripslashes($msg);
$m = $smtp->send($mlist, $hed, $file);
if(!empty($mlist)) {
if(PEAR::isError($m)) {
echo "Fail Send To $mlist\n";
} else {
echo "Success Sended To $mlist\n";
}
} else {
continue;
}
}
echo "\n";
?>
