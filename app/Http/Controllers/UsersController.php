<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
class UsersController extends Controller
{
	function get_all()
	{
		return User::where('status', '!=', 'declined')->with(['projects', 'transaction', 'role'])->get();
	}

	function send($id)
	{
		$user = User::where("id", "=", $id)->first();
		$user->activate_link = url('/auth/accept', [md5($user->id)]);
        $user->save();

		Mail::to($user->email)->send(new \App\Mail\UsersNewRegister($user));
		$this->message('User send email', 'success');
		return User::where('id', '=', $id)->update(['status' => 'sent']);
	}

	function delete($id)
	{
		User::where('id', '=', $id)->update(['status' => 'declined']);
	 	return $this->message('User successfully deleted!', 'success');
	}
}
