@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/pagesindex.css') }}" type="text/css" >
    <script src="{{ asset('js/pages_index.js') }}" defer></script>
@endsection
@section('content')
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