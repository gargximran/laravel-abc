<?php

namespace App\Http\Controllers\Backend\Message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Message\Message;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderBy('id', 'desc')->get();
        return view('backend.pages.message.manage', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required'
            ],
            [
                'email' => 'required'
            ],
            [
                'website' => 'required'
            ],
            [
                'message' => 'required'
            ]
        );
        
        $message = new Message();

        $message->name      = $request->name;
        $message->email     = $request->email;
        $message->website   = $request->website;
        $message->message   = $request->message;

        $message->save();

        Mail::to($message->email)->send(new ContactMessage($message));

        return response()->json($message, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('backend.pages.message.viewMessage', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Message $message)
    {
        if( !is_null($message) ){
            $message->delete();
        }
        $request->session()->flash('delete', 'Message deleted successfully');
        return redirect()->route('message.show');
    }
}
