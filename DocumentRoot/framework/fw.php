<?php

function app(array $request, string $base_dir,array $routes){
    $url=parse_url($request['REQUEST_URI'])['path'];

    if(is_file($base_dir.$url)){
        if(preg_match('@\.php@',$url)){
            //readfileでファイル出力
            readfile($base_dir.$url);
            // include $base_dir .$url;
        }else if(preg_match('@\.png@',$url)){
            header('Content-Type: image/png');
            readfile($base_dir.$url);
        }else{
            readfile($base_dir.$url);
        }
        return;
    }

    foreach ($routes as $pattern=>$function){
        if(preg_match($pattern,$url,$param)){
            $function($param);
            return;
        }
    }

    http_response_code(404);
    echo $url.'はないです';
}