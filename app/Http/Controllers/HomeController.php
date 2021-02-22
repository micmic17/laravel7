<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $user = Auth::user();
        
        return view('user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $storeImage = $this->storeImage($request);

        $user = Auth::user();
        $user->update($storeImage);

        return redirect('/profile');
    }

    protected function storeImage($request)
    {
        $file = $request->file('image');

        if ($file) {
            $path = $file->store('public');

            $request->request->add(['profile_image' => str_replace('public/', '', $path)]);
        }

        return $request->except(['image']);
    }
}
