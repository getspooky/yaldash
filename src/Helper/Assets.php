<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 14/03/19
 * Time: 21:06
 */

namespace Yasser\LaravelDashboard\Helper;

class Assets
{

    /**
     * Load Assets
     * @param $folder
     * @param $file
     * @return string
     *
     */

    public static function load($folder, $file)
    {
        return route('dashboard.assets', ['file'=>$file,'folder'=>$folder]);
    }

    /**
     * Load Image
     * @param $file
     * @return string
     *
     */

    public static function loadImg($file)
    {
        return route('dashboard.assets', ['file'=>$file,'folder'=>'img']);
    }
}
