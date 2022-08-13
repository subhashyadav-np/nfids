@extends('layouts.frontend', [$title = "Contact Us"])

@section('content')
<div class="pt-5"></div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-4">
                <form method="POST" action="{{route('store_contact')}}">
                  @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputFirstName">First Name *</label>
                        <input type="text" class="form-control" name="f_name" id="inputFirstName" placeholder="eg. John" value="{{old('f_name')}}" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputLastName">Last Name *</label>
                        <input type="text" class="form-control" name="l_name" id="inputLastName" placeholder="eg. Doe" value="{{old('l_name')}}" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmailAddress">Email *</label>
                      <input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="eg. example@domain.com" value="{{old('email')}}" required>
                    </div>
                    <div class="form-group">
                      <label for="inputPhone">Mobile Number</label>
                      <input type="tel" class="form-control" id="inputPhone" name="phone" placeholder="eg. +977 980000000" value="{{old('phone')}}">
                    </div>
                    <div class="form-group">
                        <label for="inputMsgSubject">Subject *</label>
                        <input type="text" class="form-control" id="inputMsgSubject" name="subject" placeholder="eg. Message Subject Here" value="{{old('subject')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Message *</label>
                        <textarea class="form-control" id="inputMessage" name="message" placeholder="Write Message Body Here" cols="30" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                  </form>
            </div>
            <div class="col-md-6 mt-4">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.879811540589!2d85.33085661438491!3d27.720996931500363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb191323b58c95%3A0x5dd43210953e7bfc!2sBhatbhateni%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1627567848875!5m2!1sen!2snp" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection