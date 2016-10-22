<?php
/**
 * Created by PhpStorm.
 * User: richard
 * Date: 22/10/2016
 * Time: 16:35
 */

namespace App\Http\Controllers;


class AuthController extends Controller
{
    /**
     * Add auth middleware
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
