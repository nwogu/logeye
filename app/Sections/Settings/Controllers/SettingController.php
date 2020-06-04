<?php

namespace App\Sections\Settings\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Sections\Settings\Requests\UpdateUser;
use App\Sections\Settings\Requests\ChangePassword;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $h1 = _p('pages.settings.h1', 'Settings');

        $user = Auth::user();

        return view('sections.settings.index', compact('h1', 'user'));
    }

    public function update(UpdateUser $request)
    {
        $user = $request->user();

        $user->update($request->all());

        return notify(
            _p('pages.settings.notify.update', 'User data successfully updated'),
            $user->refresh()
        );
    }

    public function password(ChangePassword $request)
    {
        $user = $request->user();

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return notify(
            _p('pages.settings.notify.password', 'Password successfully updated'),
            $user->refresh()
        );
    }

    public function refreshApiToken(Request $request)
    {
        $user = tap($request->user(), function ($user) {
            $user->generateToken(); $user->save();
        });

        return notify(
            'API Token refreshed',
            $user->refresh()
        );
    }
}
