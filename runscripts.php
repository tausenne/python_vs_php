<?php
$top_caps = array(200, 2000, 20000);
$runs = 100;

$php_cmd = 'php abracadabra.php ';
$py_cmd = 'python bootstrap.py ';

function runComm($cmd, $top_cap) {
    $cmd .= $top_cap;
    $output = `$cmd`;

    $output = explode(PHP_EOL, $output);
    array_pop($output); // pop the last empty element off the array that was explode()d on newlines
    preg_match('/[0-9]+\.[0-9]*/', $output[count($output) - 1], $matches); // parse out the seconds

    return $matches[0];
}

$fs = fopen('benchmarks.txt', 'w');
fwrite($fs, 'Iterations,PHP measurement,Python measurement' . PHP_EOL);
foreach ($top_caps as $top_cap) {
    for ($i = 0; $i < 100; ++$i) {
        $php_data = runComm($php_cmd, $top_cap);
        $py_data = runComm($py_cmd, $top_cap);
        fwrite($fs, "$top_cap,{$php_data},{$py_data}" . PHP_EOL);
    }
}
fclose($fs);
?>
