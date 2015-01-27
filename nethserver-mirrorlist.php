<?php

define('LATEST_RELEASE', '6.6');

$release = $_GET['release'];
$arch = $_GET['arch'];
$repo = $_GET['repo'];

$valid_release = in_array($release, array('6.5', LATEST_RELEASE));
$valid_arch = in_array($arch, array('x86_64'));
$valid_repo = in_array($repo, array(
    'base',
    'updates',
    'testing',
    'nethforge',
    'nethforge-testing',
    'dev',
));

if( ! $valid_release || ! $valid_arch || ! $valid_repo ) {
    header("HTTP/1.0 404 Not Found");
    exit(1);
}

header('Content-type: text/plain; charset=UTF-8');
echo "http://pulp.nethserver.org/nethserver/$release/$repo/$arch/
http://mirror.nethesis.it/nethserver/$release/$repo/$arch/
http://mirror1.nethserver.org/nethserver/$release/$repo/$arch/
";

