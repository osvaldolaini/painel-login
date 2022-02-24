<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Admin\Article;
use App\Model\Admin\Email;
use App\Model\Admin\Partner;
use App\Model\Admin\SocialMedia;
use App\Model\Admin\Subscriber;
use App\Model\Admin\View;
use DateTime;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home',[
        ]);
    }
}
