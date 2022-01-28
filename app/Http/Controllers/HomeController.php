<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        if (array_key_exists('need-token', $request->post())) {

            /*TODO: запретить бесконечное создание токенов*/
            $token = User::find($request->user()->id)->generateTestToken();
            return view('home', [
                'token' => $token,
                'user_id' => $request->user()->id
            ]);
        }
        return view('home');
    }
}
