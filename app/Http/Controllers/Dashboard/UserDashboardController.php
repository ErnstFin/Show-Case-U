<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserDashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $recentFiles = $user->fileEntries()
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.user', [
            'user' => $user,
            'recentFiles' => $recentFiles,
            'totalFiles' => $user->fileEntries()->count(),
        ]);
    }
}

