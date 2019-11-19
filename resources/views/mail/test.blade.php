@extends('layouts.app')
@section('content')
Hello <i>Antonio</i>,
<p>This is a demo email for testing purposes! Also, it's the HTML version.</p>
<img src="{!!$message->embedData(QrCode::format('png')->size(700)->generate($qr), 'QrCode.png', 'image/png')!!}" alt="" width="">
<p><u>Demo object values:</u></p>
 
<div>
<p><b>Demo One:</b>&nbsp;</p>
<p><b>Demo Two:</b>&nbsp;</p>
</div>
 
<p><u>Values passed by With method:</u></p>
 
<div>
<p><b>testVarOne:</b>&nbsp;</p>
<p><b>testVarTwo:</b>&nbsp;</p>
</div>
 
Thank You,
<br/>
<i></i>
@endsection