<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LaravelDashboard\Helper;

class Assets
{

    /**
     * Load Assets.
     *
     * @param $folder
     * @param $file
     * @return string
     *
     */
    public static function load($folder, $file)
    {
        return route('dashboard.assets', ['file' => $file, 'folder' => $folder]);
    }

    /**
     * Load Image
     *
     * @param $file
     * @return string
     *
     */
    public static function loadImg($file)
    {
        return route('dashboard.assets', ['file' => $file, 'folder' => 'img']);
    }

}
