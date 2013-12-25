<?php
global $argv;
$start = microtime(true);

$top_cap = (isset($argv[1]) && !empty($argv[1])) ? $argv[1] : 100;
echo "Running the searcher over {$top_cap} iterations" . PHP_EOL;

foreach (range(0, $top_cap) as $cycle) {
    $contents = explode(PHP_EOL, file_get_contents('input.txt'));
    array_pop($contents); // remove the last (empty) element of the resulting array
    $count_found = $total_lines = 0;
    foreach ($contents as $line) {
        ++$total_lines;
        if (strpos($line, 'abracadabra') !== false) {
            ++$count_found;
        }
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

echo "There were a total of {$total_lines} lines to evaluate" . PHP_EOL;

$end = microtime(true);
$diff = $end - $start;

echo "The whole process took {$diff} s" . PHP_EOL;
?>
