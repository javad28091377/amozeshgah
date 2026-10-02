<?php
namespace App\Services\Contracts;

// Interface => رابط بین سرویس و کنترلر
Interface CheckDuplicateTermsServiceInterface
{
    public function CheckTermisExist($title,$master); // معرفی یا اجرا تابع سرویس پیاده سازی شده
}