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
     * return related view showing 10 items in each page
     */
    public function index()
    {
        return view('adminDashboard.message.index', ['messages' => Message::paginate(10)]);
    }

    /**
     * return related view for sending a new message to an email address from dashboard
     */
    public function create()
    {
        return view('adminDashboard.message.create');
    }

    /**
     * store the message that user is sending from contact us form in messages table
     */
    public function store(SendMessageRequest $request)
    {
        $input = $request->all();
        Message::create($input);
        Session::flash('message_sent', 'پیام ارسال شد');
        return redirect('/');
    }

    /**
     * show the message selected from messages index page and mark it as read
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);
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
     * delete the desired message
     */
    public function destroy($id)
    {
        Message::findOrFail($id)->delete();
        Session::flash('message_deleted', 'پیام پاک شد');
        return redirect('/messages');
    }

    /**
     * email the response to a message from contact us form to the provided email address
     */
    public function sendMail(SendMailRequest $request)
    {
        $input = $request->all();
        Mail::to($input['email'])->send(new ZhenicMailable($input));
        return redirect('/messages');
    }

    /**
     * email new message to any given email address provided in the input
     */
    public function SendMailToUser(SendMailToUserRequest $request)
    {
        $input = $request->all();
        $input['name'] = '';
        Mail::to($input['email'])->send(new ZhenicMailable($input));
        return redirect('/messages');
    }

    /**
     * returns the contact us view
     */
    public function ContactUsView()
    {
        $siteInfo = SiteInfo::findOrFail(1);
        $sliders = $siteInfo->photos;
        return view('main.contactUs', compact('sliders'));
    }
}
