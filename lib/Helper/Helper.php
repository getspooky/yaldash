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

use App\Models\User;
use Illuminate\Support\Facades\DB;
use yal\laraveldash\Models\Followers;
use yal\laraveldash\Models\Post;

class Helper
{

  public static function Scraping($content)
  {
    preg_match_all('/<img[^>]+>/i', $content, $result);

    if ($result[0]) {
      return $result[0];
    } else {
      return null;
    }
  }

  public static function UploadedAvatar(User $user)
  {
    if ($image = $user->attachementUser()->orderByDesc('id')->first()) {
      return asset('storage/avatars/' . $image->file_name);
    } else {
      return "https://www.gravatar.com/avatar/$user->email?s=200&d=identicon&r=PG";
    }
  }

  public static function Categories(Post $post)
  {
    // show just the first categories
    return explode(',', $post->categories->categories)[0];
  }

  public static function Notifications($id)
  {
    return User::find($id)->unreadNotifications;
  }

  public static function GlobalInformation($field)
  {
    if ($info = auth()->user()->information) {
      return $info[$field];
    }
    return "We don't find any data right now ";
  }

  public static function devices()
  {
    return auth()->user()->devices->count() + 1;
  }

  public static function Subscribers_count($id)
  {
    $number = Followers::where('follow_id', $id)->count();
    return $number >= 1000 ? ($number / 1000) . "k" : $number;
  }

  public static function Level($follow_id)
  {
    $subscribers_count = self::Subscribers_count($follow_id);
    return ($subscribers_count * 100) / count(User::all());
  }

  public static function already_subscribe($id)
  {
    return count(auth()->user()->followers()->where('follow_id', $id)->get()) === 0;
  }

  public static function amount()
  {
    return DB::table('stores')->join('buys', 'stores.id', '=', 'buys.store_id')
      ->sum('stores.price');
  }

  public static function setActive($routeName)
  {
    return request()->routeIs($routeName) ? ' active' : '';
  }
}
