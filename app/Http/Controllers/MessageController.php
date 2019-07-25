<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ls_message = Message::all();
        return view("message.list")->with(['lsMessage'=>$ls_message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("message.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'  => 'required|max:255|min:3',
                'phone' => 'required|max:300|min:9',
                'email' => 'required|max:300|min:3',
                'content' => 'required|max:5000|min:3',
            ]
        );
        $name = $request -> input("name");
        $phone = $request -> input("phone");
        $email = $request -> input("email");
        $content = $request -> input("content");
        $new_message = new Message();
        $new_message->name = $name;
        $new_message->phone = $phone;
        $new_message->email = $email;
        $new_message->content = $content;
        $new_message->save();
        $request->session()->flash('primary', 'Message was sent successful');
        return redirect()->route("createMessage");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ls_message = Message::all();
        $message = Message::find($id);
        return view("message.view")->with(["message" => $message]);
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
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $message = Message::find($id);
        $message->delete();
        $request->session()->flash('success', 'Message was deleted.');
        return redirect()->route("message.index");
    }
}
