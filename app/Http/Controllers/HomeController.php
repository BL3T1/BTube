<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class HomeController
{
    public string $str = 'hello world';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        //return view('home);
        echo('hello world');
        $name = 'Category';
        $methods = $name;
        $methods .= 'add';

        return $methods;
    }

    public function main(): string
    {

    }
}
