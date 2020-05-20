<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    // public function show($id)
    // {
    //     return view('user.profile', ['user' => User::findOrFail($id)]);
    private $pathViewController = 'admin.pages.dashboard.';
    private $controllerName = 'dashboard';

    // }
    public function __construct()
  {

    View() -> share('controllerName', $this->controllerName);
  }
    public function index()
    {
        return view($this->pathViewController.'index'
        );
    }
}
