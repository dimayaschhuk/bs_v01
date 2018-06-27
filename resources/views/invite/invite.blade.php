<p>Hello! {{ $inviter }} invites you to join our site.</p>
@if ($message_text != '')
<p>
    He also sends you following message:<br>
    {{ $message_text }}
</p>
@endif
<p>
  You can join our site by clicking the following link:

  <a href="{{ url('register/?code=' . $code) }}">{{ url('register/?code=' . $code) }}</a>
</p>