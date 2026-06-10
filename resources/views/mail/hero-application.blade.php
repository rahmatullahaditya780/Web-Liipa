<x-mail::message>
# Pengajuan Kemitraan The Heroes

**Nama:** {{ $data['name'] }}

**Email:** {{ $data['email'] }}

**No. HP:** {{ $data['phone'] }}

**Alamat:** {{ $data['address'] }}

**Pesan:**

{{ $data['message'] }}

<x-mail::panel>
Balas email ini untuk merespons langsung ke pengirim.
</x-mail::panel>

{{ config('app.name') }}
</x-mail::message>
