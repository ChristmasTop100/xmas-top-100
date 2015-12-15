{{ trans('onetimelogin.title') }}

{{ trans('onetimelogin.salutation', ['name' => $user->name]) }}

{{ trans('onetimelogin.token_text', ['otl_link' =>  'http://christmastop100.nl/auth/otl/' . $token]) }}

{{ trans('onetimelogin.closing') }}
{{ trans('onetimelogin.sender_name') }}