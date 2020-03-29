<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
 * Redirect the user to the GitHub authentication page.
 *
 * @return \Illuminate\Http\Response
 */
  public function redirectToProvider()
  {
      return Socialite::driver('github')->redirect();
  }

  /**
   * Obtain the user information from GitHub.
   *
   * @return \Illuminate\Http\Response
   */
   public function handleProviderCallback()
   {
     $this->apiLogin('github');
   }

   public function redirectToGoogle()
   {
     return Socialite::driver('google')->redirect();
   }

   public function handleGoogleCallback()
   {
     $this->apiLogin('google', 'auth/google');
   }

   private function apiLogin($drive, $catchUrl = null){

     try {

         $user = Socialite::driver($drive)->user();
         $finduser = User::where('name', $user->name)->first();

         if($finduser){
           Auth::login($finduser);
           return redirect()->to('/home');
         }else if (!$user->name || !$user->email || !$user->id){
           dd("Some data is missing, you can access with ".$drive);
           return redirect()->back();
         }else{
           $newUser = User::create([
               'name' => $user->name,
               'email' => $user->email,
               'password'=> Hash::make($user->id),]);
           Auth::login($newUser);
           return redirect()->to('/home');
         }

     } catch (Exception $e) {
       if($catchUrl){
         return redirect($catchUrl);
       }else{
         return redirect()->back();
       }
     }
   }
}
