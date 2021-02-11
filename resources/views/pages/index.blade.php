@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/pagesindex.css') }}" type="text/css" >
    <script src="{{ asset('js/pages_index.js') }}" defer></script>
@endsection
@section('content')
    <!-- Header -->
    <header class="header">
        <h1 class="header-title">ماهان فرزانه</h1>
        <h1 class="header-discription">برنامه نویس و توسعه دهنده اپ</h1>
        <a class="header-button btn btn-success mt-4" href="{{ url('/blog') }}">مشاهده وبلاگ</a>
    </header>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services bg-light">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>مهارت ها و تجربیات</h2>
          </div>
  
          <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('img/logos/android_logo.png') }}" alt=""></div>
                <h4 class="title">اندروید</h4>
                <p class="description">پنج سال سابقه در تولید و انتشار اپ های اندرویدی در گوگل پلی و کافه بازار</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('img/logos/python_logo.png') }}" alt=""></div>
                <h4 class="title">پایتون</h4>
                <p class="description">مسلط به فریمورک جنگو و همچنین تجربه در برنامه نویسی و اسکریپت نویسی پایتون</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('img/logos/unity_logo.png') }}" alt=""></div>
                <h4 class="title">یونیتی</h4>
                <p class="description"> مسلط به موتور بازی سازی یونیتی و تجربه در برنامه نویسی گیم پلی و Ai</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="400">
              <div class="icon-box">
                <div class="icon"><img src="{{ asset('img/logos/server_logo.png') }}" alt=""></div>
                <h4 class="title">سرور ادمین</h4>
                <p class="description">تجربه در مدیریت سرورهای ویندوز و لینوکس همچنین تنظیم وب سرویس ها و دیتابیس</p>
              </div>
            </div>
  
          </div>
  
        </div>
    </section>
    <!-- End Services Section -->

    <div class="album py-5 bg-dark">
      <div class="container">
        <div class="section-title">
            <h2 style="color: beige">جدیدترین مطالب</h2>
        </div>
        <div class="row">
          @foreach ($posts as $post)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{ $post->post_image }}" alt={{ $post->title }}">
                <div class="card-body">
                  <h5 class="card-text"><a href="{{ url('/blog') }}/{{ $post->slug }}">{{ $post->title }}</a></h5>
                  <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    @if ($post->category)
                      <a href="{{url('/categories')}}/{{ $post->category->name }}"><span class="badge bg-success">{{ $post->category->name }}</span></a>
                    @endif
                    <small class="text-muted">{{ $post->posted_at }}</small>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title pb-3">
          <h2>تماس با من</h2>
          <p>در صورت نیاز با ارتباط با من و یا طرح هر گونه پیشنهاد یا انتقاد از طریق فرم زیر یا اطلاعات تماس اقدام نمایید.</p>
        </div>

          <div class="mt-4 mt-md-0">
            <form action="{{ url('/admin') }}/messages" method="post" role="form" class="php-email-form">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="نام شما" maxlength="50" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل شما" maxlength="50" data-rule="email" data-msg="Please enter a valid email" required />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="موضوع" maxlength="100" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required />
                <div class="validate"></div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="body" maxlength="200" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="پیام"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
      </div>
    </section><!-- End Contact Section -->
@endsection