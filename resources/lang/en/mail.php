<?php


return [
    'verification_code' => 'Verify :name account in Bazzard',
    'verification_code_line_1' => 'Thank you for registering at Bazzard. You can use the code in app to verify your email',
    'verification_code_line_2' => 'Your verification code is: <b>:code</b>',
    'verification_code_line_3' => 'Or click on the link in below to verify your account.',
    'verification_code_line_4' => '<a href="' . env('APP_URL') . '/verify-user/:urlCode">' . env('APP_URL') . '/verify-user/:urlCode</a>',
    'footer_line_1' => 'With lovely',
    'footer_line_2' => 'Bazzard team',
    'reset_password' => 'Reset Password for :name in Bazzard',
    'reset_password_line_1' => 'A request to reset the password for your account has been made at Bazzard, you can use the code in app to change your password',
    'reset_password_line_2' => 'Your verification code is: <b>:code</b>',
    'reset_password_line_3' => 'Or click on the link in below to change your password from browser.',
    'reset_password_line_4' => '<a href="' . env('APP_URL') . '/reset-password/:urlCode">' . env('APP_URL') . '/reset-password/:urlCode</a>',

    'new_contact_us_request_line_2' => '
        <table> <tr>
            <td> Name  </td> <td> :name </td>
            </tr> 
            <tr>
            <td> Email  </td> <td>:email</td>
            </tr>
            <tr> 
            <td> the message  </td> <td> <b> :text </b> </td>
        </tr> </table>
    '
];
