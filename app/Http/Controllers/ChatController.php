<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\MessageSent;

class ChatController extends Controller
{
    private $users = [
        'admin' => 'password123',
        'user1' => 'pass123',
        // Add more users as needed
    ];

    public function index(Request $request)
    {
        $username = $request->query('username');
        $password = $request->query('password');
        if (array_key_exists($username, $this->users) && $this->users[$username] === $password) {
            // Redirect to /chat if user and password are correct
            return view('chat');
        }   // Redirect to /chat if user and password are correct
           
       else {
            // Display error message or prevent navigation
            // You cannot use JavaScript's alert function directly in Laravel controller
            // Instead, you can return a response with an error message
            return back()->with('error', 'Username or password is incorrect. Please try again.');
        }
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $key = $request->input('key');
        if($key == "12345"){
        event(new MessageSent($message));

        return response()->json(['status' => 'Message sent!']);}
        else {
            return response()->json(['status' => 'Not authorized send message'], 403);
        }
    }
}
