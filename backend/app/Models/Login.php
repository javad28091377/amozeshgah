<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Login extends Authenticatable
{
    protected $table = 'logins';
    protected $primaryKey = 'username';
    protected $keyType = 'string';
    public $incrementing = false;     // آیدی (کلید اصلی) این مدل به‌صورت خودکار زیاد نشه؟
    public $timestamps = true;    // لاراول خودش زمان ساخت و آخرین ویرایش رکورد رو مدیریت بکنه یا نه؟
    protected $fillable = ['username','password','role','status','twostep'];
    protected $hidden = ['password'];    // وقتی مدل رو به جی سان یا آرایه تبدیل می‌کنیم این فیلدها را مخفی کن
}
