<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrsNewsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = TrsNewsletter::active()->latest('created_at')->get();
        return view('admin.newsletter.index', compact('newsletters'));
    }
}
