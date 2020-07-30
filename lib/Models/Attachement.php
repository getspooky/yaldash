<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yasser\LaravelDashboard\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\File as FacadeFile;

class Attachement extends Model
{

    protected $guarded = [];

    protected $fillable = ['file_name'];


    /**
     * Get all of the owning attachable models
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function attachable()
    {
        return $this->morphTo();
    }


    /**
     * Upload File
     *
     * @param File $file
     * @param string $name
     * @return mixed
     */
    public function UploadFile(File $file, $name)
    {
        $upload = Storage::putFileAs('public/avatars', $file, $name);

        if ($upload) {
            return $upload;
        }

        return false;
    }

    /**
     * Delete File
     *
     * @param string $file
     * @return mixed
     */
    public function DeleteFile($file)
    {
        if (FacadeFile::exists($file)) {
            return FacadeFile::delete($file);
        }

        return false;
    }


    /**
     * Delete File
     * @param string $file
     * @param string $file_rename
     * @return mixed
     */
    public function UpdateFile($file, $file_rename)
    {
        if (FacadeFile::exists($file) && FacadeFile::isFile($file)) {
            return rename($file, $file_rename);
        }

        return false;
    }
}
