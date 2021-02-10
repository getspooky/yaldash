<?php
/*
 * This file is part of the yaldash  package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Traits;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

trait Assets
{

    public function Dashboard_assets($folder, $file)
    {
        $path = str_replace(['../', './'], '', $file);
        $path = __DIR__. "/../../published/$folder/$path";

        if (File::exists($path)) {
            $ContentType = null;
            if (str_ends_with($path, '.js')) {
                $ContentType = 'text/javascript';
            } elseif (str_ends_with($path, '.css')) {
                $ContentType = 'text/css';
            } else {
                $ContentType = File::mimeType($path);
            }

            return response(File::get($path), 200, [ 'Content-Type' => $ContentType ]);

        }

    }
}
