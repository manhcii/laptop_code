<link rel="preload" as='style'
    href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/plugincss2c6f.css?1697597694844') }}"
    type="text/css">
<link
    href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/plugincss2c6f.css?1697597694844') }}"
    rel="stylesheet" type="text/css" media="all" />
<link rel="preload" as='style'
    href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/main.scss2c6f.css?1697597694844') }}">
<link rel="preload" as='style'
    href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/header.scss2c6f.css?1697597694844') }}">
<link
    href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/main.scss2c6f.css?1697597694844') }}"
    rel="stylesheet" type="text/css" media="all" />
<link
    href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/header.scss2c6f.css?1697597694844') }}"
    rel="stylesheet" type="text/css" media="all" />
<link rel="preload" as='style' type="text/css"
    href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/index.scss2c6f.css?1697597694844') }}">
<link
    href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/index.scss2c6f.css?1697597694844') }}"
    rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('themes/frontend/watches/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css') }}"
    rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('themes/frontend/watches/css/custom.css') }}"
    rel="stylesheet" type="text/css" media="all" />


<script
    src="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/jquery2c6f.js?1697597694844') }}"
    type="text/javascript"></script>
<script
    src="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/swiper2c6f.js?1697597694844') }}"
    type="text/javascript"></script>
<style>
    .header_nav_main{
        height: auto;
        max-height:84px !important ;
    }
    .bg-header-nav .header-nav>ul.item_big>li.nav-item {
        padding-left: 20px;
    }

    .swal2-popup {
        overflow: hidden !important;
    }

    body.swal2-toast-shown .swal2-container {
        width: auto !important;
    }

    .bottom-nav-bar-mobile .itembar.center .bar-menu {
        margin-top: 0px !important;
    }

    .bottom-nav-bar-mobile .itembar .cartbar-mobile:before {
        width: 13px;
        height: 13px;
        top: 0px
    }
    .header, .footer {
        background: #20a53a;
    }
    .header_nav_main, .title-block a, .title-block span, .section_blog .item_blog_base .thumb .thead{
        background: #218400;
    }
    .section_tab_product .tab-container .tab-content:nth-child(1).current, .section_tab_product .nav-tab li:nth-child(1).current {
        background: #20a53a;
    }
    .footer ul li a, .footer ul li, .wsp.text-center{
        color: #fff;
    }
</style>
<link rel="stylesheet" href="{{ asset('themes/frontend/watches/css/sweetalert2.min.css') }}" type="text/css">
<script src="{{ asset('themes/frontend/watches/js/sweetalert2.all.min.js') }}" type="text/javascript"></script>
@isset($web_information->source_code->header)
    {!! $web_information->source_code->header !!}
@endisset
