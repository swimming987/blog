<?php
namespace App\Http\Controller\Admin;
use App\Http\Controllers\Controller;

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
}