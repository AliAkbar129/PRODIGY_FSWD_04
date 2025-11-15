<?php
spl_autoload_register(function ($class) {

    $prefixes = [
        'Ratchet\\'       => __DIR__ . '/vendor/cboden/Ratchet-0.4.x/src/Ratchet/',
        'React\\'         => [
            __DIR__ . '/vendor/react/event-loop-3.x/src/',
            __DIR__ . '/vendor/react/socket-3.x/src/'
        ],
        'Evenement\\'     => __DIR__ . '/vendor/evenement/evenement-master/src/',
        'Psr\\Http\\Message\\' => __DIR__ . '/vendor/psr/http-message-master/src/',
        'Psr\\Http\\Factory\\' => __DIR__ . '/vendor/psr/http-factory-master/src/',
        'Ratchet\\RFC6455\\'   => __DIR__ . '/vendor/ratchet/RFC6455-master/src/'
    ];

    foreach ($prefixes as $prefix => $dirs) {
        if (!is_array($dirs)) $dirs = [$dirs];

        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) continue;

        $relativeClass = substr($class, $len);
        $relativeClassPath = str_replace('\\', '/', $relativeClass) . '.php';

        foreach ($dirs as $dir) {
            $file = $dir . $relativeClassPath;
            if (file_exists($file)) {
                require $file;
                return;
            }
        }
    }
});
