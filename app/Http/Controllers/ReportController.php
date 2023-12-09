<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index', [
            'reports' => Report::latest()->get(),
        ]);
    }
    public function store(Request $request, Message $message)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $message->report()->create([
            'description' => $request->content
        ]);

        return redirect()->back();
    }
}
