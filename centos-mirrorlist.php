<?php

define('LATEST_RELEASE', '6.6');

$release = $_GET['release'];
$arch = $_GET['arch'];
$repo = $_GET['repo'];

$valid_release = in_array($release, array('6.5', LATEST_RELEASE));
$valid_arch = in_array($arch, array('x86_64'));
$valid_repo = in_array($repo, array(
    'os', 'updates',
));

if( ! $valid_release || ! $valid_arch || ! $valid_repo ) {
    header("HTTP/1.0 404 Not Found");
    exit(1);
}

if($release === LATEST_RELEASE) {
    header(sprintf('Location: http://mirrorlist.centos.org/?release=%s&arch=%s&repo=%s',
                   $release, $arch, $repo));
} else {
    header('Content-type: text/plain; charset=UTF-8');
    echo sprintf("http://vault.centos.org/%s/%s/%s/\r\n", $release, $repo, $arch);
}

