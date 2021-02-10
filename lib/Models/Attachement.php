<?php
/*
 * This file is part of the yaldash  package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadeFile;

class Attachement extends Model
{

    protected $guarded = [];

    protected $fillable = ['file_name'];

    public function attachable()
    {
        return $this->morphTo();
    }

    public function UploadFile(File $file, $name)
    {
        $upload = Storage::putFileAs('public/avatars', $file, $name);
        if ($upload) {
            return $upload;
        }
        return false;
    }

    public function DeleteFile($file)
    {
        if (FacadeFile::exists($file)) {
            return FacadeFile::delete($file);
        }
        return false;
    }

    public function UpdateFile($file, $file_rename)
    {
        if (FacadeFile::exists($file) && FacadeFile::isFile($file)) {
            return rename($file, $file_rename);
        }
        return false;
    }

    public function resolveChildRouteBinding($childType, $value, $field)
    {
     // TODO: Implement resolveChildRouteBinding() method.
    }

}
