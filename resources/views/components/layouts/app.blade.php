<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }} - {{ config('app.name') }}</title>
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <link href="{{ asset('/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        @laravelPWA
    </head>
    <body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            @include('components.layouts.includes.header')
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        @auth()
                        <div id="kt_app_toolbar" class="app-toolbar bg-opacity-25 bg-dark w-100" style="background: transparent">
                            <x-base.background-animated />
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-column">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack my-10 my-lg-14">
                                    <!--begin::Page title-->
                                    <div class="page-title d-flex flex-column justify-content-center me-3">
                                        <!--begin::Title-->
                                        <h1 class="page-heading d-flex title-custom fw-bolder fs-2hx flex-column text-light justify-content-center my-0">
                                            {{ $title }}
                                            <!--begin::Description-->
                                            <span class="page-desc text-white opasity-50 fs-7 fw-semibold pt-2"></span>
                                            <!--end::Description--></h1>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Page title-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Hero-->
                                <div class="row align-items-center mb-14 mb-lg-18">
                                    <!--begin::Col-->
                                    <div class="col-md-4 mb-10 mb-md-0">
                                        <!--begin::Statistics-->
                                        <div class="d-flex align-items-center mb-13">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol- symbol-70px me-6">
                                                <img src="{{ auth()->user()->socials()->first()->avatar ?? Storage::url('user/default/profil.png')}}" class="" alt="" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column mb-1">
                                                <a href="#" class="title-custom text-light fs-2">{{ auth()->user()->name }}</a>
                                                <span class="description-custom text-light fw-bold d-block fs-5">{{ auth()->user()->email }}</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Statistics-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-8 d-flex justify-content-md-end">
                                        <!--begin::Card-->
                                        <div class="card card-flush bg-white border-0  pt-3 pb-1">
                                            <!--begin::Header-->
                                            <div class="card-header d-flex align-items-center">
                                                <!--begin::Title-->
                                                <h2 class="title-custom fs-2">Status des authentifications</h2>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body pt-3">
                                                <table class="table table-striped table-bordered gap-5 gy-5 gs-5 gx-5 fs-3">
                                                    <tbody>
                                                        <tr>
                                                            <td class="bg-light-info fw-bold">Code Identification Vortech Studio</td>
                                                            <td class="text-end">{{ auth()->user()->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bg-light-info fw-bold">Authentificateur</td>
                                                            <td class="text-end">{!! auth()->user()->otp_status !!}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Hero-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        @endauth
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content pt-10 bg-white">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                {{ $slot }}
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer py-2 py-lg-4 bg-white">
                        <!--begin::Footer container-->
                        <div class="app-container container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack">
                            <!--begin::Copyright-->
                            <div class="text-gray-900 order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2023&copy;</span>
                                <a href="https://{{ config('app.domain') }}" target="_blank" class="text-gray-800 text-hover-primary">{{ config('app.name') }}</a>
                            </div>
                            <!--end::Copyright-->
                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">

                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Footer container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>

    <!--end::App-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
    <!--begin::Javascript-->
    <script>var hostUrl = "assets/";</script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('/js/scripts.bundle.js') }}"></script>
    <x-livewire-alert::scripts />
    </body>
</html>
