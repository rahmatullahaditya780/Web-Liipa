<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('pages.contact');
    }

    public function send(ContactRequest $request): RedirectResponse
    {
        Mail::to(config('mail.contact_recipient'))
            ->send(new ContactMessage($request->validated()));

        return back()->with('status', 'Pesan Anda berhasil dikirim. Terima kasih sudah menghubungi kami!');
    }
}
