<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اموزشگاه داده نگر</title>
    <link rel="stylesheet" href="{{ asset('home/') }}/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="{{ asset('home/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('home/') }}/fontawesome/css/all.css">
</head>
<body>
    <div class="col-12 top p-2">
        <div class="row">
            <div class="col-4 col-md-4 logo">
               <img src="{{ asset('home/') }}/images/logo.png" width="60px" height="60px">
               <span class="d-none">اموزشگاه داده نگر</span>
            </div> 
            <div class="col-md-4 search d-none d-lg-block">
                <div class="searchbox">
                    <input type="text" placeholder="جستجو کنید">
                    <i class="fa fa-search"></i>
                </div>
            </div>
            <div class="col-6 col-md-4 date text-black">
                <span id="current-date"></span>
            </div> 
        </div>
    </div>