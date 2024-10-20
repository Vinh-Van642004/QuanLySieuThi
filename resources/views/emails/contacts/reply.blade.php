<!-- resources/views/emails/contact/reply.blade.php -->
@component('mail::message')
# Phản hồi từ {{ config('app.name') }}

Chào {{ $contactName }},

Chúng tôi đã nhận được yêu cầu của bạn và đây là phản hồi từ chúng tôi:

{{ $replyMessage }}

Cảm ơn bạn đã liên hệ với chúng tôi!

Trân trọng,  
{{ config('app.name') }}
@endcomponent
