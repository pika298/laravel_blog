<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

// manual mail function
use Mail;

class PagesController extends Controller {

	public function getIndex() {
		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout() {
		$first = 'Alex';
		$last = 'Curtis';

		$fullname = $first . " " . $last;
		$email = 'leechinyu2015@gmail.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}

	public function getContact() {
		return view('pages.contact');
	}

	// send mail
	public function postContact(Request $request) {
		// validate the form
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		// message is a reserved word, use bodymessage to avoid error
		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		// check # send mail in laravel.com
		// create views/emails folder for differet email purposes
		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('leechinyu2015@gmail.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your Email was Sent!');

		return redirect('/');
	}


}