{{-- resources/views/emails/welcome.blade.php --}}

<p>Dear {{ $user->name }},</p>

<p>Welcome to our website! Your account has been successfully created with the following details:</p>

<ul>
    <li>Email: {{ $user->email }}</li>
    <li>Password: {{ $user->name }}</li>
    <li>WhatsApp Number: {{ $user->whatsapp_number }}</li>
</ul>

<p>Thank you for joining us!</p>
