<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/4028e22912.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>11</title>
</head>
<body>
@include('layouts.msg')
{{--{{ dd($section->questions) }}--}}
<!-- =======================================
            INVOICE
============================================= -->
<div class="container-fluid">
    <div class="row justify-content-center p-0 m-0">
        <div class="col-10 col-md-6 " style="border-radius: 25px; box-shadow: 1px 2px 20px 10px #E4E4E4;">

            <div class="row m-0" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
               <center>

                   <div class=" col-12">
                       <p class="text-color-2 " style="margin-top:50vh;margin-bottom:50vh;font-size: 32px;">
                           {{-- Thanks to submit this questionnaire --}}
                           شكرا لتقديم هذا الاستبيان
                       </p>
                   </div>

               </center>
            </div>
        </div>
    </div>
</div>
<!-- =======================================
            end-INVOICE
============================================= -->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Optional JavaScript -->
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        easing: 'ease-out-back',
        duration: 1500
    });
</script>
</body>
</html>
