<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
    <meta http-equiv=3D"Content-Type" content=3D"text/html; charset=3DUTF-8">
    <title>Account creation</title>
</head>
<body>
<h1>{{ trans('onetimelogin.title') }}</h1>
<p>{{ trans('onetimelogin.salutation', ['name' => $user->name]) }}</p>
<p>{!! trans('onetimelogin.token_text', ['otl_link' =>  url('/auth/otl/' . $token)]) !!}</p>
<p>{{ trans('onetimelogin.closing') }}<br />
{{ trans('onetimelogin.sender_name')  }}</p>

</body>
</html>