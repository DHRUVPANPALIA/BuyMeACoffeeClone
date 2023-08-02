<?php

namespace BuyMeCoffeeClone\Kernel;

final class View{
    private  const  PATH = __DIR__ . '/../templates/';
    private const FILE_EXTENSION = '.html.php';
    public static function render(string $view, string $title){
        return ;
    }

    private static function isViewExist(string $filename){
        return is_file(self::PATH . $filename . self::FILE_EXTENSION);
    }

}