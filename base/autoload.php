<?php

spl_autoload_register(function ($class) {
    $classMap = require(__DIR__ . '/classes.php');
    $dirList = ['controllers', 'models'];

    if (!empty($classMap[$class])) {
        require($classMap[$class]);
    } else {
        list($alias, $dir, $class) = explode('\\', $class);
        if ($alias === 'app' && in_array($dir, $dirList)) {
            if (file_exists('../' . $dir . '/'. $class . '.php')) {
                require('../' . $dir . '/'. $class . '.php');
            } else {
                exit('控制器不存在!');
            }
        } else {
            exit('加载类文件失败!');
        }
    }
});
