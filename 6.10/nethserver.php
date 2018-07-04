<?php

# Temporary script for 6.10. Remove after releases!!

$release = $_GET['release'];
$arch = $_GET['arch'];
$repo = $_GET['repo'];

$valid_release = $release === '6';
$valid_arch = in_array($arch, array('x86_64'));
$valid_repo = in_array($repo, array(
    'base',
    'updates',
    'testing',
    'nethforge',
    'nethforge-testing'
));

if( ! $valid_release || ! $valid_arch || ! $valid_repo ) {
    header("HTTP/1.0 404 Not Found");
    exit(1);
}

header('Content-type: text/plain; charset=UTF-8');

$mirrors = array('http://packages.nethserver.org/nethserver');

foreach($mirrors as $mirror) {
    echo trim($mirror)."/6.10/$repo/$arch/\n";
}

