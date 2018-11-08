<?php

namespace Maksuco\LangJson\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LangJson extends Controller
{
	public function index()
	{
		if(!auth()->check() OR auth()->user()->id != config('langjson.admin_id')){
			return redirect('/');
		}
		return view('langjson::langjson_index');
	}
	
	public function post(Request $request)
	{
		Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message, $request->name));
		Contact::create($request->all());
		return redirect(route('langjson'));
	}
}