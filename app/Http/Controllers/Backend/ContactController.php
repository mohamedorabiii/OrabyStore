<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMe;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function __construct(protected ContactService $contactService) {}

    public function index()
    {
        return view('contact');
    }

    public function send(ContactMe $request)
    {
        $this->contactService->sendMessage($request->validated());
        return back()->with('success', 'Message sent successfully!');
    }
}