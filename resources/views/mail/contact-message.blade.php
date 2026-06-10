<x-mail::message>
# Pesan Baru dari Form Kontak

**Nama:** {{ $data['name'] }}

**Email:** {{ $data['email'] }}

**Subjek:** {{ $data['subject'] }}

**Pesan:**

{{ $data['message'] }}

<x-mail::panel>
Balas email ini untuk merespons langsung ke pengirim.
</x-mail::panel>

{{ config('app.name') }}
</x-mail::message>
