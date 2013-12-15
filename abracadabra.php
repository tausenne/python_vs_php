<?php
$start = microtime(true);
$contents = explode(PHP_EOL, file_get_contents('input.txt'));
array_pop($contents); // remove the last (empty) element of the resulting array
$count_found = 0;
echo 'There are a total of ' . number_format(count($contents)) . ' lines to evaluate' . PHP_EOL;
foreach ($contents as $line) {
    if (strpos($line, 'abracadabra') !== false) {
        ++$count_found;
    }
}

switch ($count_found) {
    case 0:
        echo 'There was no abracadabra in the file' . PHP_EOL;
        break;

    default:
        switch ($count_found) {
            case 1:
                $verb = 'was';
                $quote = 'abracadabra';
                break;

            default:
                $verb = 'were';
                $quote = 'abracadabras';
        }

        echo "There {$verb} {$count_found} {$quote} in the file" . PHP_EOL;
}

$end = microtime(true);
$diff = $end - $start;

echo "The whole process took {$diff} s" . PHP_EOL;
?>
