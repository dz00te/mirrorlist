<?php

$distroversion = dirname(__DIR__);
$release = $_GET['release'];
$arch = $_GET['arch'];
$repo = $_GET['repo'];

// Validate release number against distroversion:
$valid_release = $release === preg_replace('/(\.\d+)+$/', '', $distroversion);
$valid_arch = in_array($arch, array('x86_64'));
$valid_repo = in_array($repo, array(
    'base',
    'updates',
    'testing',
));

if( ! $valid_release || ! $valid_arch || ! $valid_repo ) {
    header("HTTP/1.0 404 Not Found");
    exit(1);
}

header('Content-type: text/plain; charset=UTF-8');
echo "http://mirror.nethserver.org/nethserver/$distroversion/$repo/$arch/
http://mirror1.nethserver.org/nethserver/$distroversion/$repo/$arch/
http://mirror.nethesis.it/nethserver/$distroversion/$repo/$arch/
";

