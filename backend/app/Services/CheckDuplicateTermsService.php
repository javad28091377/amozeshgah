<?php
namespace App\Services;

use App\Models\Term;
use App\Services\Contracts\CheckDuplicateTermsServiceInterface;

// پیاده سازی یک سرویس برای بررسی تکراری نبودن یک ترم یا دوره آموزشی در دیتابیس است
class CheckDuplicateTermsService implements CheckDuplicateTermsServiceInterface
{
    public function CheckTermisExist($title,$master)
    {
        return Term::where('title',$title)->
            where('master',$master)
            ->exists();    
    }
}
