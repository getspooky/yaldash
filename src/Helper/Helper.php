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

use App\User;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use LaravelDashboard\Models\Followers;
use LaravelDashboard\Models\Post;

class Helper
{

    /**
     *  Get the image inside the post
     *
     * @param string $content
     * @return mixed
     */
    public static function Scraping($content)
    {
        preg_match_all('/<img[^>]+>/i', $content, $result);

        if ($result[0]) {
            return $result[0];
        } else {
            return null;
        }
    }

    /**
     * Get Image of User
     *
     * @param \App\User $user
     * @return string
     */
    public static function UploadedAvatar(User $user)
    {
        if ($image = $user->attachementUser()->orderByDesc('id')->first()) {
            return asset('storage/avatars/' . $image->file_name);
        } else {
            return "https://www.gravatar.com/avatar/$user->email?s=200&d=identicon&r=PG";
        }
    }

    /**
     * Show the categories of users
     *
     * @param Post $post
     * @return string
     */
    public static function Categories(Post $post)
    {
       // show just the first categories
       return explode(',', $post->categories->categories)[0];
    }

    /**
     * Show the notification
     *
     * @param $id
     * @return Notification
     */
    public static function Notifications($id)
    {
        return User::find($id)->unreadNotifications;
    }

    /**
     * Return User information
     *
     * @param $field
     * @return mixed
     */
    public static function GlobalInformation($field)
    {
        if ($info = auth()->user()->information) {
            return $info[$field];
        }
        return "We don't find any data right now ";
    }


    /**
     * Return the devices count
     * @return int
     */
    public static function devices()
    {
        return auth()->user()->devices->count()+1;
    }

    /**
     * Return the number of subscribers for user
     * @param $id
     * @return string
     */
    public static function Subscribers_count($id)
    {
        $number = Followers::where('follow_id', $id)->count();
        return $number >= 1000 ? ($number / 1000) . "k" : $number;
    }

    /**
     * Return the level for user
     * @param $follow_id
     * @return int
     */
    public static function Level($follow_id)
    {
        $subscribers_count = self::Subscribers_count($follow_id);
        return ($subscribers_count * 100) / count(User::all());
    }

    /**
     * Check if user is already subscribe to another user.
     *
     * @param $id
     * @return boolean
     */
    public static function already_subscribe($id)
    {
        return count(auth()->user()->followers()->where('follow_id', $id)->get()) === 0;
    }

    /**
     * Get the total amount
     *
     * @return mixed
     */
    public static function amount()
    {
        return DB::table('stores')->join('buys', 'stores.id', '=', 'buys.store_id')
          ->sum('stores.price');
    }
}
