<?php

use App\Exceptions\CustomException;

return [
    'unauthenticated' => 'Unauthenticated.',
    'userAlreadyExists' => 'User already exits',
    'questionIsNotAssociatedWithUser' => 'Something went wrong, The question is not associated with you.',
    'wrongAnswer' => 'Wrong answer for the security-question.',
    'invalidEntity' => 'Invalid :entity.',
    'userNotFoundAtMambu' => 'User not found on mambu.',
    'otpExpired' => 'OTP Expired.',
    'sendSmsFailed' => 'Failed to send SMS. Something went wrong, Please try after sometime',
    'sendSmsStr' => "Dear Customer, Use this OTP :code for Momentum Mobile APP :code_for.\n\nOTP will expired in 15 minutes.\n\nThanks."
];