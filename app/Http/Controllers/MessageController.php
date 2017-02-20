<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Http\Requests\SendMailToUserRequest;
use App\Http\Requests\SendMessageRequest;
use App\Mail\ZhenicMailable;
use App\Message;
use App\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminDashboard.message.index', ['messages' => Message::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminDashboard.message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SendMessageRequest $request)
    {
        $input = $request->all();

        Message::create($input);

        Session::flash('message_sent', 'پیام ارسال شد');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);
        /**
         * mark the message as read
         */
        $message->read = 1;
        $message->save();
        return view('adminDashboard.message.show', compact('message'));
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
    public function destroy($id)
    {
        Message::findOrFail($id)->delete();

        Session::flash('message_deleted', 'پیام پاک شد');

        return redirect('/messages');
    }

    public function sendMail(SendMailRequest $request)
    {
        $input = $request->all();

        Mail::to($input['email'])->send(new ZhenicMailable($input));

        return redirect('/messages');
    }

    public function SendMailToUser(SendMailToUserRequest $request)
    {
        $input = $request->all();
        $input['name'] = '';
        Mail::to($input['email'])->send(new ZhenicMailable($input));

        return redirect('/messages');
    }

    public function ContactUsView()
    {
        $siteInfo = SiteInfo::findOrFail(1);
        $sliders = $siteInfo->photos;
        return view('main.contactUs', compact('sliders'));
    }
}
