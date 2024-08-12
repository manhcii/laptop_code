@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
@endphp
@push('style')
<link href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/contact_style.scss2c6f.css') }}" rel="stylesheet" type="text/css" media="all" />
  <style>
    
  </style>
@endpush
@section('content')
  <div class="main-index">
      <section class="bread-crumb">
  <div class="container">
    <div class="row">
      <div class="col-12 a-left">
        <ul class="breadcrumb">         
          <li class="home">
            <a href="/"><span>Trang chủ</span></a>            
            <span class="mr_lr">&nbsp;/&nbsp;</span>
          </li>
          
          <li><strong><span>Liên hệ</span></strong></li>
          
        </ul>
      </div>
    </div>
  </div>
</section> 

<div class="page_contact ">
  <div class="container">
    <div class="title-block-page">
      <h1>Liên hệ</h1>
    </div>
    <div class="row">
      <div class="col-12 order-lg-2 order-2">
        <div class="row">
          <div class="col-lg-4 col-12">
            <div class="item-contact">
              <div class="img">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div class="content-r">
                Địa chỉ:
                <p>
                  {{ $web_information->information->address ?? '' }}
                </p>
              </div>
            </div>
            <div class="item-contact">
              <div class="img">
                <i class="fas fa-question"></i>
              </div>
              <div class="content-r">
                Gửi thắc mắc:
                <a href="mailto:{{ $web_information->information->email ?? '' }}">{{ $web_information->information->email ?? '' }}</a>
              </div>
            </div>
            <div class="item-contact">
              <div class="img">
                <i class="fas fa-phone-alt"></i>
              </div>
              <div class="content-r">
                Điện thoại:
                <a class="fone" href="tel:{{ $web_information->information->phone ?? '' }}">{{ $web_information->information->phone ?? '' }}</a> 
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-12">
            <div id="pagelogin">
              <form class="form_ajax" method="post" action="{{ route('frontend.contact.store') }}" id="contact" accept-charset="UTF-8">
                @csrf
                <input type="hidden" name="is_type" value="contact">
              <div class="form-signup clearfix">
                <div class="row group_contact">
                  <fieldset class="form-group col-lg-6 col-12">
                    <label>Họ và tên <em>*</em></label>
                    <input placeholder="" type="text" class="form-control  form-control-lg" required="" value="" name="name">
                  </fieldset>

                  <fieldset class="form-group col-lg-6 col-12">
                    <label>Email <em>*</em></label>
                    <input placeholder="" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="" id="email1" class="form-control form-control-lg" value="" name="email">
                  </fieldset>

                  <fieldset class="form-group col-12">
                    <label>Nội dung <em>*</em></label>
                    <textarea placeholder="" name="content" id="comment" class="form-control content-area form-control-lg" rows="5" required=""></textarea>
                  </fieldset>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="button-default">Gửi liên hệ</button>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 order-1 order-lg-1">
        <div class="wrapcontact">
          <div class="iFrameMap">
            <div id="contact_map" class="map">
              {!! ($web_information->source_code->map) !!}
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
    </div>
@endsection
