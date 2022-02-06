<?php

$counter_file = 'counter.txt';
$counter_length = 8;

$fp = fopen(__DIR__.'/'.$counter_file, 'r+');

if ($fp){
    if (flock($fp, LOCK_EX)){
        $counter = fgets($fp, $counter_length);
        $counter+=1;
        rewind($fp);//ファイルポインタの位置を先頭に
        if (fwrite($fp,  $counter) === FALSE) {
            echo 'ファイル書き込みに失敗しました';
        }
        flock($fp, LOCK_UN);
    }
}
fclose($fp);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>いにしえのカウンター</title>
</head>

<body>
    <h1><?php echo $counter ?>人目の訪問数です</h1>
</body>

</html>