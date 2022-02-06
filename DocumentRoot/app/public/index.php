<?php
  
require_once __DIR__ . '/../../framework/fw.php';

// realpath:正規化された絶対パスを返す(/../../てきなの無くす)
app($_SERVER, realpath(__DIR__.'/../pages'),[
    // デリミタを@にしている
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