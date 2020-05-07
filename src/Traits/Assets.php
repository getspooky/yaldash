<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yasser\LaravelDashboard\Traits;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

trait Assets
{
    /**
     * The Dashboard_assets function generates a URL for an asset using the current scheme of the request
     *
     * @param $folder
     * @param $file
     * @return Response
     */
    public function Dashboard_assets($folder, $file)
    {
        $path = str_replace(['../','./'], '', $file);

        $path = dirname(__DIR__)."/published/$folder/$path";

        if (File::exists($path)) {
            $ContentType = null;

            if (ends_with($path, '.js')) {
                $ContentType = 'text/javascript';
            } elseif (ends_with($path, '.css')) {
                $ContentType = 'text/css';
            } else {
                $ContentType = File::mimeType($path);
            }
            return response(File::get($path), 200, ['Content-Type' => $ContentType]);
        }
    }
}
