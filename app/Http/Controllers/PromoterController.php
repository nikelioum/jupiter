<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Promoter;

class PromoterController extends Controller
{
    //Promoter Login
    public function promoterLogin(Request $request){

         // Validate the request input
         $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to find the promoter by email
        $promoter = Promoter::where('email', $request->email)->first();

        if ($promoter && Hash::check($request->password, $promoter->password)) {
            
            // Store the promoter information in the session
            session([
                'promoter' => [
                    'id' => $promoter->id,
                    'name' => $promoter->name,
                    'email' => $promoter->email,
                ],
            ]);


            // Redirect to the dashboard with success message
            return redirect()->route('select.customer')->with('success', 'You are logged in!');
        }

        // Authentication failed
        return view('front.index');
    }


    //Promoter Logout
    public function promoterLogout(Request $request)
    {
        // Clear the promoter data from the session
        $request->session()->forget('promoter');

        // Redirect to the login form with a success message
        return redirect()->route('promoter.login.form')->with('success', 'You have been logged out!');
    }
}
