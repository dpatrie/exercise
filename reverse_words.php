<?php
function reverseWords(&$str) {
    reverseChars($str);

    $length = strlen($str);
    if ($length < 2) return;

    $ofsBegin = 0;
    for ($i=0; $i <= $length; $i++) {
        if ($i == $length || $str[$i] == ' ') {
            reverseChars($str, $ofsBegin, $i-1);
            $ofsBegin = $i + 1;
        }
    }
}

function reverseChars(&$str, $ofsBegin = 0, $ofsEnd = false) {
    if (!$ofsEnd) {
        $ofsEnd = strlen($str) - 1;
    }

    while ($ofsBegin < $ofsEnd) {
        $tmp = $str[$ofsBegin];
        $str[$ofsBegin] = $str[$ofsEnd];
        $str[$ofsEnd] = $tmp;

        $ofsBegin++;
        $ofsEnd--;
    }
}

$testCases = array(
    array(
        'Hello   World',
        'World   Hello'
    )
    ,
    array(
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'laborum. est id anim mollit deserunt officia qui culpa in sunt proident, non cupidatat occaecat sint Excepteur pariatur. nulla fugiat eu dolore cillum esse velit voluptate in reprehenderit in dolor irure aute Duis consequat. commodo ea ex aliquip ut nisi laboris ullamco exercitation nostrud quis veniam, minim ad enim Ut aliqua. magna dolore et labore ut incididunt tempor eiusmod do sed elit, adipiscing consectetur amet, sit dolor ipsum Lorem'
    ),
    array(
        '',
        ''
    ),
    array(
        'Hello',
        'Hello'
    ),
    array(
        'Some sentence that has an even number of char!',
        'char! of number even an has that sentence Some'
    )
    ,
    array(
        'Some sentence that has an odd number of char!',
        'char! of number odd an has that sentence Some'
    )
);

$passed = true;
foreach ($testCases as $test) {
    reverseWords($test[0]);
    if ($test[0] != $test[1]) {
        echo "\nTest failed -> (Expected: $test[1], Obtained: $test[0])\n";
        $passed = false;
    }
}
if ($passed) {
    echo "\nTest passed!\n";
}
