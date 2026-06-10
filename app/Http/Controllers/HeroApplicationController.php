<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeroApplicationRequest;
use App\Mail\HeroApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class HeroApplicationController extends Controller
{
    public function show(): View
    {
        return view('pages.heroes');
    }

    public function send(HeroApplicationRequest $request): RedirectResponse
    {
        Mail::to(config('mail.contact_recipient'))
            ->send(new HeroApplication($request->validated()));

        return back()->with('status', 'Formulir kemitraan berhasil dikirim. Kami akan segera menghubungi Anda!');
    }
}
