<?php
namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\Admin\EditProfileRequest as AdminRequest;
use App\Http\Requests\SM\EditProfileRequest as SMRequest;
use App\Http\Requests\AM\EditProfileRequest as AMRequest;
use App\Http\Requests\MR\EditProfileRequest as MRRequest;
use View;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function doLogin(LoginRequest $request)
    {
        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active'=>'1'],
            $request->remember_me)) {
            if (\Auth::user()->level_id == '1') {
                return redirect()->intended('admin/dashboard');
            }
            if (\Auth::user()->level_id == '7') {
                return redirect()->intended('mr/dashboard');
            }
            if (\Auth::user()->level_id == '3') {
                return redirect()->intended('am/dashboard');
            }
            if (\Auth::user()->level_id == '2') {
                return redirect()->intended('sm/dashboard');
            }
        }
        return redirect()->route('login')->with('login-error', 'Please Check your login data !');
    }

    public function doLogout()
    {
        \Auth::logout();
        return redirect()->route('login');
    }

    public function editAdminProfile()
    {
        $profile    =   Employee::findOrFail(\Auth::user()->id);
        $dataView   =   [
            'profile'   =>  $profile
        ];
        return view('admin.profile.edit', $dataView);
    }

    public function postEditAdminProfile(AdminRequest $request)
    {
        $employee           =   Employee::findOrFail(\Auth::user()->id);
        $employee->name     =   $request->name;
        $employee->email    =   $request->email;
        $employee->password =   \Hash::make($request->password);
        try {
            $employee->save();
            return redirect()->back()->with('message','Your Profile has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to update your profile , with error message: ' . $ex->getMessage();
        }
    }

    public function editMRProfile()
    {
        $profile    =   Employee::findOrFail(\Auth::user()->id);
        $dataView   =   [
            'profile'   =>  $profile
        ];
        return view('mr.profile.edit', $dataView);
    }

    public function postEditMRProfile(MRRequest $request)
    {
        $employee           =   Employee::findOrFail(\Auth::user()->id);
        $employee->name     =   $request->name;
        $employee->email    =   $request->email;
        $employee->password =   \Hash::make($request->password);
        try {
            $employee->save();
            return redirect()->back()->with('message','Your Profile has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to update your profile , with error message: ' . $ex->getMessage();
        }
    }

    public function editAMProfile()
    {
        $profile    =   Employee::findOrFail(\Auth::user()->id);
        $dataView   =   [
            'profile'   =>  $profile
        ];
        return view('am.profile.edit', $dataView);
    }

    public function postEditAMProfile(AMRequest $request)
    {
        $employee           =   Employee::findOrFail(\Auth::user()->id);
        $employee->name     =   $request->name;
        $employee->email    =   $request->email;
        $employee->password =   \Hash::make($request->password);
        try {
            $employee->save();
            return redirect()->back()->with('message','Your Profile has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to update your profile , with error message: ' . $ex->getMessage();
        }
    }

    public function editSMProfile()
    {
        $profile    =   Employee::findOrFail(\Auth::user()->id);
        $dataView   =   [
            'profile'   =>  $profile
        ];
        return view('sm.profile.edit', $dataView);
    }

    public function postEditSMProfile(SMRequest $request)
    {
        $employee           =   Employee::findOrFail(\Auth::user()->id);
        $employee->name     =   $request->name;
        $employee->email    =   $request->email;
        $employee->password =   \Hash::make($request->password);
        try {
            $employee->save();
            return redirect()->back()->with('message','Your Profile has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to update your profile , with error message: ' . $ex->getMessage();
        }
    }
}
