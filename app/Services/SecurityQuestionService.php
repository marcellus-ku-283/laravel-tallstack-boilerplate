<?php

namespace App\Services;

use App\Models\SecurityQuestion;

class SecurityQuestionService
{
    private $model;

    public function __construct(SecurityQuestion $model)
    {
        $this->model = $model;
    }

    public function collection($inputs = [])
    {
        $securityQuestions = $this->model;
        return $securityQuestions->get();
    }
}