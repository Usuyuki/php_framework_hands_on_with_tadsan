<?php

require_once __DIR__ . '/../../framework/fw.php';

app($_SERVER, realpath(__DIR__.'/../pages'),[
    '@\A/\z@' => function(){
        header("Location: /index.php");
    },
    '@\A/users/(?<user_id>\d+)/books\z@' => function(array $param){
?>
<h1>蔵書一覧</h1>
<p>こんにちは <?= htmlspecialchars($param['user_id']) ?>さん</p>
<?php
    },
    '@\A/now\z@' => function(){
        echo date('Y-m-d H:i:s');
    },
]);