<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 24/03/19
 * Time: 13:18
 */

namespace Yasser\Tests\Views;

use Illuminate\Support\Facades\Auth;
use Yasser\LaravelDashboard\Kit\BrowserKitTesting;

class PostTest extends BrowserKitTesting
{


    public function testPostPageRender(){

        $this->withoutMiddleware();

        $visit = $this->get(route('post.create'));

        $visit->see('Post Overview');

    }

}
