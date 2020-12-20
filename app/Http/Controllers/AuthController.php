<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Role;
use App\RoleUser;
use App\Project;
use Auth;
use Storage;


class AuthController extends Controller
{
    public function signin($post = [])
    {
        $validator = $this->validate(request(), [
            'users_email' => 'required',
            'password' => 'required',
        ]);

        if ( ! $validator->fails())
        {
            $auth = ['email' => $post['users_email'], 'password' => $post['password']];
            if (Auth::validate($auth))
            {
                $user = User::where('email', $auth['email'])->first();                
                if ($user->status == 'active')
                {
                    Auth::attempt($auth, $post['remember_me']);
                    return TRUE;
                }
                else
                {
                    $this->message('Your account isn\'t active');                    
                    return FALSE;
                }
            }
            else
            {
                $this->message('Incorect username or password');
            }
        }
        return FALSE;
    }
    
    public function signup($post = [])
    {
        $current = User::where('email', $post['email'])->first();
        if ( ! empty($current))
        {
            $this->message('User with current email alredy registered.');
            return FALSE;
        }
        else
        {
            $user = new User();
            $user->email = $post['email'];
            $user->first_name = isset($post['first_name']) ? $post['first_name'] : "";
            $user->last_name = isset($post['last_name']) ? $post['last_name'] : "";
            $user->phone = isset($post['phone']) ? $post['phone'] : "";
            $user->email_other = isset($post['email_other']) ? $post['email_other'] : "";
            $user->comment = isset($post['comment']) ? $post['comment'] : "";
            $user->password = isset($post['password']) ? bcrypt($post['password']) : "";
            $user->status = 'pending';

            if ( ! empty($post['avatar']))
            {
                $user->avatar = Storage::disk('uploads')->put('uploads', $post['avatar']);
            }
            
            if ($user->save())
            {
                $role = new RoleUser;
                $role->user_id = $user->id;
                $role->role_id = $post['role'];
                $role->save();

                $this->message('User successfully add', 'success');
                return TRUE;
            }
        }
    }

    public function accept($post = [])
    {        
        $user = User::whereRaw('MD5(id) = "'. $post['url'].'"')->where('status', '=', 'sent')->first();
        if ($user)
        {
            $user->password = bcrypt($post['password']);
            $user->status = 'active';
            $user->save();
            $this->message('User successfully activate', 'success');
            return TRUE;         
        }

        $this->message('User error activate');
        return FALSE;    
    }
    
    public function signout()
    {
        Auth::logout();        
        return TRUE;
    }

    public function get_roles()
    {
        return Role::where('name', '!=', 'admin')->get();
    }
    
}

