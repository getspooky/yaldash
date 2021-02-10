<?php
/*
 * This file is part of the yaldash  package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Helper;

class Assets
{

    public static function load($folder, $file)
    {
        return route('dashboard.assets', ['file' => $file, 'folder' => $folder]);
    }

    public static function loadImg($file)
    {
        return route('dashboard.assets', ['file' => $file, 'folder' => 'images']);
    }

}
