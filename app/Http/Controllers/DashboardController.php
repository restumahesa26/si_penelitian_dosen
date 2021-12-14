<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $dosen = User::where('role', 'DOSEN')->count();
        $submit = Penelitian::where('status', 'Submit')->count();
        $reject = Penelitian::where('status', 'Reject')->count();
        $accept = Penelitian::where('status', 'Accept')->count();

        return view('pages.dashboard', [
            'dosen' => $dosen, 'submit' => $submit, 'reject' => $reject, 'accept' => $accept
        ]);
    }
}
