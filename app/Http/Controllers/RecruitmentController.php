<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RecruitmentController extends Controller
{
    public function index()
    {
        $applications = Recruitment::all();
        return Inertia::render('Recruitment/Index', ['applications' => $applications]);
    }

    public function create()
    {
        return Inertia::render('Recruitment/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'experience' => 'required|string|max:500',
        ]);

        Recruitment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'experience' => $request->experience,
        ]);

        return redirect()->route('recruitment.index')->with('success', 'Application submitted successfully.');
    }
}
