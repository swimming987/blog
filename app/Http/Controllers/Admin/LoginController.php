<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Org\code\Code;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

/**
 * Created by PhpStorm.
 * User: swimming
 * Date: 2020/11/12
 * Time: 7:31
 */
class LoginController extends Controller
{
    public function login() {
        
        return view('admin.login');
    }

    public function code(){
        $code = new Code();
        return $code->make();
    }
}