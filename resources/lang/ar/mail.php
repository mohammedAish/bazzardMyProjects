<?php


return [
    'verification_code' => 'تفعيل حساب :name في  Bazzard',
    'verification_code_line_1' => 'شكرا لكٍ للتسجيل في  Bazzard لتفعيل اشتراكك قم بنسخ الرمز ادناه واستخدميه في التطبيق',
    'verification_code_line_2' => 'رمز التفعيل الخاص بك هو: <b>:code</b>',
    'verification_code_line_3' => 'او قم بالضغط على الرابط ادناه او نسخه ووضعه في المتصفح لتفعيل الحساب تلقائيا:',
    'verification_code_line_4' => '<a href="' . env('APP_URL') . '/ar/verify-user/:urlCode">' . env('APP_URL') . '/ar/verify-user/:urlCode</a>',
    'footer_line_1' => 'بكل حب',
    'footer_line_2' => 'فريق Bazzard',
    'reset_password' => 'اعادة تعين كلمة المرور ل :name في Bazzard',
    'reset_password_line_1' => 'بناء على طلبك لاعادة تعين كلمة المرور تم ارسال رمز التاكيك، يمكنك استخدام الرمز في التالي في التطبيق',
    'reset_password_line_2' => 'رمز التأكيد هو: <b>:code</b>',
    'reset_password_line_3' => 'او قومي بالضغط على الرابط ادناه او نسخه ووضعه في المتصفح لتغير كلمة المرور:',
    'reset_password_line_4' => '<a href="' . env('APP_URL') . '/ar/reset-password/:urlCode">' . env('APP_URL') . '/ar/reset-password/:urlCode</a>',
    'new_contact_us_request' => 'طلب تواصل جديد',
    'new_contact_us_request_line_1' => '
    <p> مرحباً ! </p>
    <p> هناك إدخال جديد على نموذج تواصل معنا، يمكنك الإطلاع عليه</p>
    ',
    'new_contact_us_request_line_2' => '
        <table> <tr>
            <td> الاسم </td> <td> :name </td>
            </tr> 
            <tr>
            <td> البريد </td> <td>:email</td>
            </tr>
            <tr> 
            <td> الرسالة </td> <td> <b> :text </b> </td>
        </tr> </table>
    '

];
