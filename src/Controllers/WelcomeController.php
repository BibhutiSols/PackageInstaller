<?php

namespace Bibhuti\Installer\Controllers;

use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{
    /**
     * Display the installer welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        // dd('asd');
        return view('installer::welcome');
    }
}
