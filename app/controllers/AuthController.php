<?php

class AuthController extends BaseController {

    public function getLogin() {

        if (Auth::check()) {
            if (!Auth::User()->role)
                return Redirect::to('contestadminpanel')->with('success', 'You are already logged in');
            else
                return Redirect::to('')->with('success', 'You are already logged in');
        }

        return View::make('login');
    }


    public function postLogin() {
        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        // Declare the rules for the form validation.
        $rules = array(
            'email' => 'Required',
            'password' => 'Required'
        );

        //Session::put('key', $userdata['email']);
        // Validate the inputs.
        $validator = Validator::make($userdata, $rules);

        // Check if the form validates with success.
        if ($validator->passes()) {
            // Try to log the user in.
            if (Auth::attempt($userdata, (Input::get('remember') == 'on')) ? true : false){

                    return Redirect::to('')->with('success', 'You have logged in successfully');
            } else {
                // Redirect to the login page.
                return Redirect::to('login')->withErrors(array('password' => 'Password invalid'))->withInput(Input::except('password'));
            }
        }

        // Something went wrong.
        return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
    }

    public function getRegister() {
        return View::make('register');
    }

    public function postRegister(){

        $input = Input::all();
        $rules = array(
            'email' => 'required|email|unique:users,email',
            'password' => 'Required|AlphaNum|Between:4,16|Confirmed',
            'password_confirmation' => 'Required|AlphaNum|Between:4,16',
            'firstname' => 'required',

        );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('register')->withErrors($validator)->withInput();
        } else {

            $user = new User;
            $user->email = $input['email'];
            $user->firstname = $input['firstname'];
            $user->password = Hash::make($input['password']);
            $user->save();

            return Redirect::to('login');
        }
    }

    public function deleteUser($id) {
        User::find($id)->delete();
        return Redirect::to('/member')->with('success', 'User has been deleted');
    }

    public function getLogout() {
        // Log out
        Auth::logout();
        Session::flush();

        // Redirect to homepage
        return Redirect::to('')->with('success', 'You are logged out');
    }
    
    public function updatePassword() {
        $userdata = Input::all();

        // Declare the rules for the form validation.
        $rules = array(
            'orgPassword' => 'Required',
            'password' => 'Required|AlphaNum|Between:4,16|Confirmed',
            'password_confirmation' => 'Required|AlphaNum|Between:4,16'
        );

        // Validate the inputs.
        $validator = Validator::make($userdata, $rules);

        if ($validator->passes()) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($userdata['password']);
            $user->update();
            return Redirect::to('member')->with('success', 'you got it');
        } else {
            return Redirect::to('admin')->withErrors($validator);
        }
    }
}
