<div class="footer">
    <div class="child-footer d-flex">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <a href="{{ route('frontend.home') }}" class="logo">  
                        <img width="170" height="43" src="{{ $web_information->image->logo_footer ?? '' }}" alt="Ngân hoa">
                      </a>
                      <br>
                      {{-- <h4 class="title-menu">
                        <span>
                            {{ $web_information->information->site_name ?? '' }}
                        </span>
                    </h4> --}}
                    <ul>
                        <li>Địa chỉ: {{ $web_information->information->address ?? '' }}</li>
                        <li>Điện thoại: <a class="fone"
                                href="tel:{{ $web_information->information->phone ?? '' }}">{{ $web_information->information->phone ?? '' }}</a>
                            - Email: <a
                                href="mailto:{{ $web_information->information->email ?? '' }}">{{ $web_information->information->email ?? '' }}</a>
                        </li>
                    </ul>
                </div>
          
                <div class="col-lg-3 col-12">
                    <h4 class="title-menu">
                        <span>
                            Liên kết & Chính sách
                        </span>
                    </h4>
                    <ul>
                        @isset($menu)
                            @php
                                $footer_menu = $menu->filter(function ($item, $key) {
                                    return $item->menu_type == 'footer' &&
                                        ($item->parent_id == null || $item->parent_id == 0);
                                });

                                $content = '';
                                foreach ($footer_menu as $main_menu) {
                                    $url = $title = '';
                                    $title =
                                        isset($main_menu->json_params->title->{$locale}) &&
                                        $main_menu->json_params->title->{$locale} != ''
                                            ? $main_menu->json_params->title->{$locale}
                                            : $main_menu->name;
                                    foreach ($menu as $item) {
                                        if ($item->parent_id == $main_menu->id) {
                                            $title =
                                                isset($item->json_params->title->{$locale}) &&
                                                $item->json_params->title->{$locale} != ''
                                                    ? $item->json_params->title->{$locale}
                                                    : $item->name;
                                            $url = $item->url_link;

                                            $active = $url == url()->current() ? 'active' : '';

                                            $content .= '<li><a href="' . $url . '">' . $title . '</a>';
                                            $content .= '</li>';
                                        }
                                    }
                                }
                                echo $content;
                            @endphp
                        @endisset
                    </ul>
                </div>
                <div class="col-lg-3 col-12">
                    <h4 class="title-menu">
                        <span>
                            Nhận tin khuyến mãi
                        </span>
                    </h4>
                    <div class="mail_footer subscribe">
                        <form class="newsletter-form form_ajax" data-toggle="validator"
                            action="{{ route('frontend.contact.store') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <div class="groupiput">
                                    <input aria-label="Địa chỉ Email" type="email" class="form-control"
                                        placeholder="Nhập email của bạn" name="email" required autocomplete="off" />
                                </div>
                                <input type="hidden" name="is_type" value="contact">
                                <input type="hidden" name="name" value="Đăng ký mới">
                                <span class="input-group-append subscribe">
                                    <button class="btn btn-default" type="submit" aria-label="Đăng ký">Đăng ký</button>
                                </span>
                            </div>
                        </form>
                        <div class="social-footer">
                            <div class="social-buttons">
                                @isset($web_information->social->facebook)
                                    <a href="{{ $web_information->social->facebook ?? 'https://facebook.com/' }}"
                                        class="social-button facebook" title="Theo dõi trên Facebook"><i
                                            class="fab fa-facebook-f"></i></a>
                                @endisset

                                @isset($web_information->social->twitter)
                                    <a href="{{ $web_information->social->twitter ?? 'https://twitter.com/' }}"
                                        class="social-button twitter" title="Theo dõi trên Twitter"><i
                                            class="fab fa-twitter"></i></a>
                                @endisset

                                @isset($web_information->social->gmail)
                                    <a href="{{ $web_information->social->gmail ?? 'https://gmail.com/' }}"
                                        class="social-button google" title="Theo dõi trên Google"><i
                                            class="fab fa-google"></i></a>
                                @endisset

                                @isset($web_information->social->youtube)
                                    <a href="{{ $web_information->social->youtube ?? 'https://youtube.com/' }}"
                                        class="social-button youtube" title="Theo dõi trên Youtube"><i
                                            class="fab fa-youtube"></i></a>
                                @endisset
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-12">
                    <div class="footer-element">
                        <iframe src="{{ $web_information->source_code->map??"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0349105566534!2d105.783171!3d21.0312891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab92b21e3beb%3A0x4c9549d1df6c5d0b!2zNzggUC4gRHV5IFTDom4sIEThu4tjaCBW4buNbmcgSOG6rXUsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1719131906051!5m2!1svi!2s" }}" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="copyright d-flex">
        <div class="container">
            <div class="inner">
                <div class="row tablet">
                    <div id="copyright" class="col-lg-12 col-md-12 col-12">
                        <div class="wsp text-center">
                            Copyright@ 2024 Công ty Cổ phần GBD
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" class="backtop d-none" title="Lên đầu trang"><i class="fa fa-angle-up"
                    aria-hidden="true"></i></a>

        </div>
    </div>
</div>

<div class="bottom-nav-bar-mobile">
    <div class="inner-group container">
        <div class="itembar" onclick="location.href='{{ route('frontend.home') }}';">
            <div class="bar-menu">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        id="iconhome" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                        xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M506.555,208.064L263.859,30.367c-4.68-3.426-11.038-3.426-15.716,0L5.445,208.064    c-5.928,4.341-7.216,12.665-2.875,18.593s12.666,7.214,18.593,2.875L256,57.588l234.837,171.943c2.368,1.735,5.12,2.57,7.848,2.57    c4.096,0,8.138-1.885,10.744-5.445C513.771,220.729,512.483,212.405,506.555,208.064z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M442.246,232.543c-7.346,0-13.303,5.956-13.303,13.303v211.749H322.521V342.009c0-36.68-29.842-66.52-66.52-66.52    s-66.52,29.842-66.52,66.52v115.587H83.058V245.847c0-7.347-5.957-13.303-13.303-13.303s-13.303,5.956-13.303,13.303v225.053    c0,7.347,5.957,13.303,13.303,13.303h133.029c6.996,0,12.721-5.405,13.251-12.267c0.032-0.311,0.052-0.651,0.052-1.036v-128.89    c0-22.009,17.905-39.914,39.914-39.914s39.914,17.906,39.914,39.914v128.89c0,0.383,0.02,0.717,0.052,1.024    c0.524,6.867,6.251,12.279,13.251,12.279h133.029c7.347,0,13.303-5.956,13.303-13.303V245.847    C455.549,238.499,449.593,232.543,442.246,232.543z" />
                            </g>
                        </g>
                    </svg>
                </div>
                <a href="index.html">Trang chủ</a>
            </div>
        </div>
        <div class="itembar">
            <div class="bar-menu category-action">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        id="iconcate" x="0px" y="0px" viewBox="0 0 486.8 486.8"
                        style="enable-background:new 0 0 486.8 486.8;" xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M140.35,32c0-17.6-14.4-32-32-32h-76.3c-17.6,0-32,14.4-32,32v76.2c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32V32    H140.35z M115.85,108.3c0,4.1-3.4,7.5-7.5,7.5h-76.3c-4.1,0-7.5-3.4-7.5-7.5V32c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5    v76.3H115.85z" />
                                <path
                                    d="M140.35,205.3c0-17.6-14.4-32-32-32h-76.3c-17.6,0-32,14.4-32,32v76.2c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32    v-76.2H140.35z M115.85,281.5c0,4.1-3.4,7.5-7.5,7.5h-76.3c-4.1,0-7.5-3.4-7.5-7.5v-76.2c0-4.1,3.4-7.5,7.5-7.5h76.2    c4.1,0,7.5,3.4,7.5,7.5v76.2H115.85z" />
                                <path
                                    d="M108.35,346.5h-76.3c-17.6,0-32,14.4-32,32v76.2c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32v-76.2    C140.35,360.9,125.95,346.5,108.35,346.5z M115.85,454.8c0,4.1-3.4,7.5-7.5,7.5h-76.3c-4.1,0-7.5-3.4-7.5-7.5v-76.2    c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2H115.85z" />
                                <path
                                    d="M173.35,281.5c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32v-76.2c0-17.6-14.4-32-32-32h-76.2c-17.6,0-32,14.4-32,32    L173.35,281.5L173.35,281.5z M197.85,205.3c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2c0,4.1-3.4,7.5-7.5,7.5h-76.2    c-4.1,0-7.5-3.4-7.5-7.5L197.85,205.3L197.85,205.3z" />
                                <path
                                    d="M173.35,454.8c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32v-76.2c0-17.6-14.4-32-32-32h-76.2c-17.6,0-32,14.4-32,32    L173.35,454.8L173.35,454.8z M197.85,378.5c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2c0,4.1-3.4,7.5-7.5,7.5h-76.2    c-4.1,0-7.5-3.4-7.5-7.5L197.85,378.5L197.85,378.5z" />
                                <path
                                    d="M346.55,281.5c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32v-76.2c0-17.6-14.4-32-32-32h-76.2c-17.6,0-32,14.4-32,32    L346.55,281.5L346.55,281.5z M371.05,205.3c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2c0,4.1-3.4,7.5-7.5,7.5h-76.2    c-4.1,0-7.5-3.4-7.5-7.5L371.05,205.3L371.05,205.3z" />
                                <path
                                    d="M346.55,454.8c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32v-76.2c0-17.6-14.4-32-32-32h-76.2c-17.6,0-32,14.4-32,32    L346.55,454.8L346.55,454.8z M371.05,378.5c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2c0,4.1-3.4,7.5-7.5,7.5h-76.2    c-4.1,0-7.5-3.4-7.5-7.5L371.05,378.5L371.05,378.5z" />
                                <path
                                    d="M173.35,32v76.2c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32V32c0-17.6-14.4-32-32-32h-76.2    C187.65,0,173.35,14.4,173.35,32z M197.85,32c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2c0,4.1-3.4,7.5-7.5,7.5h-76.2    c-4.1,0-7.5-3.4-7.5-7.5L197.85,32L197.85,32z" />
                                <path
                                    d="M378.55,140.3h76.2c17.6,0,32-14.4,32-32V32c0-17.6-14.4-32-32-32h-76.2c-17.6,0-32,14.4-32,32v76.2    C346.55,125.9,360.95,140.3,378.55,140.3z M371.05,32c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2    c0,4.1-3.4,7.5-7.5,7.5h-76.2c-4.1,0-7.5-3.4-7.5-7.5L371.05,32L371.05,32z" />
                            </g>
                        </g>
                    </svg>
                </div>
                <span>Danh mục</span>
            </div>
        </div>
        <div class="itembar center">
            <div class="bar-menu cartbar-mobile" onclick="location.href='cart.html';">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" id="iconcart" enable-background="new 0 0 512 512"
                        height="512" viewBox="0 0 512 512" width="512">
                        <path
                            d="m504.399 185.065c-6.761-8.482-16.904-13.348-27.83-13.348h-98.604l-53.469-122.433c-3.315-7.591-12.157-11.06-19.749-7.743-7.592 3.315-11.059 12.158-7.743 19.75l48.225 110.427h-178.458l48.225-110.427c3.315-7.592-.151-16.434-7.743-19.75-7.591-3.317-16.434.15-19.749 7.743l-53.469 122.434h-98.604c-10.926 0-21.069 4.865-27.83 13.348-6.637 8.328-9.086 19.034-6.719 29.376l52.657 230c3.677 16.06 17.884 27.276 34.549 27.276h335.824c16.665 0 30.872-11.216 34.549-27.276l52.657-230.001c2.367-10.342-.082-21.048-6.719-29.376zm-80.487 256.652h-335.824c-2.547 0-4.778-1.67-5.305-3.972l-52.657-229.998c-.413-1.805.28-3.163.936-3.984.608-.764 1.985-2.045 4.369-2.045h85.503l-3.929 8.997c-3.315 7.592.151 16.434 7.743 19.75 1.954.854 3.99 1.258 5.995 1.258 5.782 0 11.292-3.363 13.754-9l9.173-21.003h204.662l9.173 21.003c2.462 5.638 7.972 9 13.754 9 2.004 0 4.041-.404 5.995-1.258 7.592-3.315 11.059-12.158 7.743-19.75l-3.929-8.997h85.503c2.384 0 3.761 1.281 4.369 2.045.655.822 1.349 2.18.936 3.983l-52.657 230c-.528 2.301-2.76 3.971-5.307 3.971z" />
                        <path
                            d="m166 266.717c-8.284 0-15 6.716-15 15v110c0 8.284 6.716 15 15 15s15-6.716 15-15v-110c0-8.284-6.715-15-15-15z" />
                        <path
                            d="m256 266.717c-8.284 0-15 6.716-15 15v110c0 8.284 6.716 15 15 15s15-6.716 15-15v-110c0-8.284-6.716-15-15-15z" />
                        <path
                            d="m346 266.717c-8.284 0-15 6.716-15 15v110c0 8.284 6.716 15 15 15s15-6.716 15-15v-110c-.001-8.284-6.716-15-15-15z" />
                    </svg>
                </div>
                <a href="{{ route('frontend.order.cart') }}">Giỏ hàng</a>
            </div>
        </div>
        <div class="itembar" onclick="location.href='blogs/all.html';">
            <div class="bar-menu">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        id="iconblog" x="0px" y="0px" viewBox="0 0 512 512"
                        style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M467,0H45C20.187,0,0,20.187,0,45v422c0,24.813,20.187,45,45,45h422c24.813,0,45-20.187,45-45V45    C512,20.187,491.813,0,467,0z M482,467c0,8.271-6.729,15-15,15H45c-8.271,0-15-6.729-15-15V150h452V467z M482,120H30V45    c0-8.271,6.729-15,15-15h422c8.271,0,15,6.729,15,15V120z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <circle cx="75" cy="75" r="15" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <circle cx="135" cy="75" r="15" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <circle cx="195" cy="75" r="15" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M225,180H75c-8.284,0-15,6.716-15,15v122c0,8.284,6.716,15,15,15h150c8.284,0,15-6.716,15-15V195    C240,186.716,233.284,180,225,180z M210,302H90v-92h120V302z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M437,302H285c-8.284,0-15,6.716-15,15s6.716,15,15,15h152c8.284,0,15-6.716,15-15S445.284,302,437,302z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M437,241H285c-8.284,0-15,6.716-15,15s6.716,15,15,15h152c8.284,0,15-6.716,15-15S445.284,241,437,241z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M437,362H75c-8.284,0-15,6.716-15,15s6.716,15,15,15h362c8.284,0,15-6.716,15-15S445.284,362,437,362z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M437,422H75c-8.284,0-15,6.716-15,15s6.716,15,15,15h362c8.284,0,15-6.716,15-15S445.284,422,437,422z" />
                            </g>
                        </g>
                    </svg>
                </div>
                <a href="/tin-tuc">Tin tức</a>
            </div>
        </div>

        <div class="itembar" onclick="location.href='yeu-thich.html';">
            <div class="bar-menu">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        id="iconwishlist" x="0px" y="0px" viewBox="0 0 391.837 391.837"
                        style="enable-background:new 0 0 391.837 391.837;" xml:space="preserve">
                        <g>
                            <path style="fill:#D7443E;"
                                d="M285.257,35.528c58.743,0.286,106.294,47.836,106.58,106.58   c0,107.624-195.918,214.204-195.918,214.204S0,248.165,0,142.108c0-58.862,47.717-106.58,106.58-106.58l0,0   c36.032-0.281,69.718,17.842,89.339,48.065C215.674,53.517,249.273,35.441,285.257,35.528z">
                            </path>
                        </g>
                    </svg>
                </div>
                <a href="{{ route('frontend.contact') }}">Liên hệ</a>
            </div>
        </div>

    </div>
</div>
