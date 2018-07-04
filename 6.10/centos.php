<?php

$release = $_GET['release'];
$arch = $_GET['arch'];
$repo = $_GET['repo'];

$valid_release = $release === '6';
$valid_arch = in_array($arch, array('x86_64'));
$valid_repo = in_array($repo, array('os', 'updates'));

if( ! $valid_release || ! $valid_arch || ! $valid_repo ) {
    header("HTTP/1.0 404 Not Found");
    exit(1);
}

header(sprintf('Location: http://mirrorlist.centos.org/?release=%s&arch=%s&repo=%s',
               $release, $arch, $repo));

