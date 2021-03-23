<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/4028e22912.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>11</title>
    <style>
        [data-aos^=fade][data-aos^=fade]{
            opacity: 1 !important;
        }
    </style>
</head>
<body>
<?php
$msg = \Session::get("msg");
$msgClass = 'alert-info';
?>
@if($msg)
    <?php
    //اول حرفين من الرسالة وتحويلهم الى حروف صغيرة
    $first2Letters = strtolower(substr($msg, 0, 2));
    if ($first2Letters == 's:') {
        $msgClass = 'alert-success';
        $msg = substr($msg, 2);//قص اول حرفين
    } else if ($first2Letters == 'w:') {
        $msgClass = 'alert-warning';
        $msg = substr($msg, 2);//قص اول حرفين
    } else if ($first2Letters == 'i:') {
        $msgClass = 'alert-info';
        $msg = substr($msg, 2);//قص اول حرفين
    } else if ($first2Letters == 'e:') {
        $msgClass = 'alert-danger';
        $msg = substr($msg, 2);//قص اول حرفين
    }
    ?>
    <div class='alert {{$msgClass}} alert-dismissible'>
        {{$msg}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger  alert-dismissible show">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- =======================================
            INVOICE
============================================= -->
<div class="container-fluid">
    @if(session()->has('mobile_unique_error'))
    <div class="alert alert-danger  alert-dismissible show">
        <p>{{ session('mobile_unique_error') }}</p>
    </div>
    @endif
    <div class="row justify-content-center p-0 m-0">
        <div class="col-10 col-md-6 " style="border-radius: 25px; box-shadow: 1px 2px 20px 10px #E4E4E4;">

            <div class="row m-0" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <form enctype="multipart/form-data"
                      action="{{ route('admin.questionnaire.store' , ['section' => $section->id]) }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <div class="input-group">
                            <div class="row">

                                @foreach($section->questions as $question)
                                    @if($question->feialdType->type == 'gender')
                                        <div class="offset-md-1 col-12 col-md-10 mt-3">
                                            <label class="form-check-label"
                                                   for="exampleCheck1">{{ $question->title }}</label>
                                            <select name="{{ $question->title }}" class="custom-select from-foc mb-3">

                                                <option value="Mail">Mail</option>
                                                <option value="Fmail">Fmail</option>
                                            </select>
                                        </div>
                                    @elseif($question->feialdType->type == 'YesOrNo')
                                        <div class="offset-md-1 col-12 col-md-10 mt-3">
                                            <label class="form-check-label"
                                                   for="exampleCheck1">{{ $question->title }}</label>
                                            <select name="{{ $question->title }}" class="custom-select from-foc mb-3">

                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>
                                            </select>
                                        </div>
                                    @elseif($question->feialdType->type == 'country')
                                        <div class="offset-md-1 col-12 col-md-10 mt-3">
                                            <label class="form-check-label"
                                                   for="exampleCheck1">{{ $question->title }}</label>
                                            <select name="{{ $question->title }}" class="custom-select from-foc mb-3">
                                                <option selected>SELECT COUNTRY</option>
                                                @foreach(\App\Models\Country::get() as $country)
                                                    <option value="{{ $country->official_name_en }}">{{ $country->official_name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @elseif($question->feialdType->type == 'image')
                                        <div class="offset-md-1 col-12 col-md-10 mt-3">
                                        <div class="form-group row">
                                            <div class='col-sm-6'>
                                                <label for="imageFile">{{ $question->title }}</label>
{{--                                                <button type="button" class="btn btn-secondary">  click here to upload {{ $question->title }}--}}
                                                <div class="custom-file btn btn-secondary" >
                                                    <input type="file" name="{{ $question->title }}" class="custom-file-input " id="imageFile" >
                                                </div>
{{--                                                </button>--}}
                                            </div>
                                        </div>
                                        </div>
                                    @else
                                        <div class="offset-md-1 col-12 col-md-10 mt-3">
                                            <label class="form-check-label"
                                                   for="exampleCheck1">{{ $question->title }}</label>
                                            <input type="{{ $question->feialdType->type }}"
                                                   class="form-control from-foc" placeholder="{{ $question->title }}"
                                                   aria-label="Enter your email" aria-describedby="basic-addon1"
                                                   name="{{ $question->title }}">
                                        </div>
                                    @endif
                                @endforeach

                                <div class="offset-md-1 col-12 col-md-10 mt-3">
                                    <button type="submit" class="btn btn-primary">Send
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- =======================================
            end-INVOICE
============================================= -->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
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
