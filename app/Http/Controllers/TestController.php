<?php
namespace App\Http\Controllers;

use App\Helpers\GlideHelper;

class TestController extends Controller
{
    public function test()
    {
        return GlideHelper::createPublicUrl('articles/605cf067ba404.png', ['w' => 200]);
    }
}
