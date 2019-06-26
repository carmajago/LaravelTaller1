<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;


class MessageController extends Controller
{
    
    public function index()
    {
    
        return view('messages',[
        'messages' => Message::latest()->paginate()
        ]);
    }

    public function show($id)
    {
        $message = Message::find($id);

        return view('message', [ 'message' => $message]);
    }

    public function edit($id)
    {
        $message = Message::find($id);

        return view('Editmessage', [ 'message' => $message]);
    }

    public function update($id)
    {
        $message = Message::find($id);

        return redirect()->back()->with('message', 'Actualizado con éxito');

    }


    public function create()
    {

        return view('Createmessage');
    }


    public function store() {

        $message = request()->validate([
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required',
      ]);

        Message::create($message);
        
        return redirect()->route('messages.index');
    }

    public function destroy($id){

        Message::findOrFail($id)->delete();
        return redirect()->route('messages.index');
    }
}
