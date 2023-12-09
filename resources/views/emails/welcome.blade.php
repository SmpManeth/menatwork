{{-- resources/views/emails/welcome.blade.php --}}

<p>Dear {{ $user->name }},</p>

<p>Welcome to MenATWork - Your Golden Opportunity to make a better life with a secure job in Romania. <br>

    Let's get started. Your account has been successfully created with the following logins:
</p>

<ul>
    <li>Email: {{ $user->email }}</li>
    <li>Password: {{ $user->name }}</li>
    <li>WhatsApp Number: {{ $user->whatsapp_number }}</li>
</ul>

<p>Please keep this saved in somewhere safe. <br>
    Thank you for joining us! <br><br><br>

    - Team MenAtWork -</p>