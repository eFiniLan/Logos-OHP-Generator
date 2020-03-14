<?php
/**
 * Created by PhpStorm.
 * User: rickl
 * Date: 4/14/2019
 * Time: 9:32 AM
 */

$OHPFolder = __DIR__ . DIRECTORY_SEPARATOR . 'OHPGen' . DIRECTORY_SEPARATOR;
$localFolder = $OHPFolder . 'Core' . DIRECTORY_SEPARATOR . 'Assets' . DIRECTORY_SEPARATOR;
$remoteFolder = 'https://raw.githubusercontent.com/eFiniLan/Logos-OHP-Generator/development/OHPGen/Core/Assets/';
$remoteWorship = file_get_contents('https://raw.githubusercontent.com/eFiniLan/Logos-OHP-Generator/development/worship.json');
$remoteHymns = file_get_contents('https://raw.githubusercontent.com/eFiniLan/Logos-OHP-Generator/development/hymns.json');
$types = ['worship', 'hymns'];
$localWorship = [];
$localHymns = [];

if ($remoteWorship === FALSE && $remoteHymns === FALSE) {
    echo "Unable to download the latest song list, please check your internet connection or try again later.\n";
    exit();
}

$remoteWorship = json_decode($remoteWorship, true);
$remoteHymns = json_decode($remoteHymns, true);

// get local json file
foreach ($types as $type) {
    $varName = 'local' . ucfirst($type);
    ${$varName} = retrieveLocalJson($type, $localFolder);
}

// compare remote and local generated json, if remote song is not in local or md5 mismatch, we download them
foreach ($types as $type) {
    $remote = ${'remote' . ucfirst($type)};
    $local = ${'local' . ucfirst($type)};
    $toUpdate = [];
    foreach ($remote as $filename => $md5) {
        if (!isset($local[$filename])) {
            $toUpdate[] = ['file' => $filename, 'msg' => 'new'];
        } else if ($remote[$filename] !== $local[$filename]) {
            $toUpdate[] = ['file' => $filename, 'msg' => 'mismatch'];
        }
    }

    if (!empty($toUpdate)) {
        echo sprintf("Updating %d %s songs\n", count($toUpdate), $type);
        foreach ($toUpdate as $details) {
            $filename = $details['file'];
            $msg = $details['msg'];
            $remoteContent = @file_get_contents($remoteFolder . $type . '/' . urlencode($filename));
            if ($remoteContent !== FALSE) {
                echo "Updating $type - $filename...($msg)\n";
                $fp = fopen($localFolder . $type . DIRECTORY_SEPARATOR . $filename, 'wb');
                fwrite($fp, $remoteContent);
            } else {
                echo "Unable to update $type - $filename (remote file next exists?)...\n";
            }
        }
    }
}

// we generate the local json file and store it, so we can update it to github
foreach ($types as $type) {
    $list = retrieveLocalJson($type, $localFolder);
    $fp = fopen("$type.json", 'wb');
    fwrite($fp, json_encode($list, JSON_PRETTY_PRINT));
    fclose($fp);
}

echo "Songs are up to date.\n";


function retrieveLocalJson($type, $localFolder)
{
    $list = [];
    $files = scandir($localFolder . $type, 0);
    foreach ($files as $filename) {
        if ($filename !== '.' && $filename !== '..') {
            $content = file_get_contents($localFolder . $type . DIRECTORY_SEPARATOR . $filename);
            $content = str_replace(array("\r", "\n"), '', $content);
            $list[$filename] = md5($content);
        }
    }
    return $list;
}