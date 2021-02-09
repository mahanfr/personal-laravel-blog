<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['store']]);
    }
    public function index()
    {
        $messages = Message::orderBy('created_at','desc')->paginate(30);
        return view('messages')->with('messages',$messages);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required','email'=>'required','subject'=>'required']);
        $message = new Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->body = $request->input('body');
        $message->save();
        return redirect('/')->with('success','Message Sent');
    }

    public function destroy($id){
        $message = Message::where('id', $id)->firstOrFail();
        if(is_null($message)){
            return redirect('/admin/messages')->with('error','Message not found!');
        }
        $message->delete();
        return redirect('/admin/messages')->with('success','Message Deleted');
    }
}
