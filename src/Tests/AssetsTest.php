<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 25/03/19
 * Time: 18:09
 */

namespace Yasser\Tests;


use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Yasser\LaravelDashboard\Helper\Assets;

class AssetsTest extends TestCase
{

   public function testCanLoadCss(){

       $user = Auth::loginUsingId(1);

       $response = $this->call('GET',Assets::load('css','boot.css'));

       $this->assertEquals(200,$response->status());

   }


    public function testCanLoadJavaScript(){

        $user = Auth::loginUsingId(1);

        $response = $this->call('GET',Assets::load('js','app.js'));

        $this->assertEquals(200,$response->status());

    }


    public function testCanLoadImage(){

        $user = Auth::loginUsingId(1);

        $response = $this->call('GET',Assets::load('img','settings.svg'));

        $this->assertEquals(200,$response->status());

    }



}
