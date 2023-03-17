@extends('dashboard.layouts.app')
@section('styles')
    <link href="{{asset('assets/css/pages/login/login-4.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('page')
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Content-->
            <div
                class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
                <!--begin::Wrapper-->
                <div class="login-content d-flex flex-column pt-lg-0 pt-12">
                    <!--begin::Logo-->
                    <a href="{{route('dashboard.auth.login')}}" class="login-logo pb-xl-20 pb-15">
                        <img src="#" class="" style="width: 192px;" alt=""/>
                    </a>
                    <!--end::Logo-->
                    <!--begin::Signin-->
                    <div class="login-form">
                        <!--begin::Form-->
                        <form class="form" action="{{route('dashboard.auth.login')}}"
                              method="post">
                            <!--begin::Title-->
                            <div class="pb-5 pb-lg-15 text-center">
                                <img src="{{asset('website/assets/neuth icons/Neuth-logo-blue.png')}}" class=""
                                     style="width: 192px;" alt=""/>
                            </div>
                            <!--begin::Title-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <label
                                    class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg
                                              {{ $errors->has('email')||$errors->has('credentials') ? 'is-invalid' : 'border-0' }}"
                                       type="email" name="email" autocomplete="off"/>
                                <span class="m-form__help text-danger">
                                        <strong>{{ $errors->has('email')?$errors->first('email'):null }}</strong>
                                    </span>
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <div class="d-flex justify-content-between mt-n5">
                                    <label
                                        class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                </div>
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg
                                     {{ $errors->has('password')||$errors->has('credentials') ? 'is-invalid' : 'border-0' }}"
                                       type="password" name="password" autocomplete="off"/>
                                <span class="m-form__help text-danger">
                                        <strong>{{ $errors->has('password')?$errors->first('password'):null }}</strong>
                                    </span> <span class="m-form__help text-danger">
                                        <strong>{{ $errors->has('credentials')?$errors->first('credentials'):null }}</strong>
                                    </span>
                            </div>
                            <!--end::Form group-->
                            <!--begin::Action-->
                            <div class="pb-lg-0 pb-5">
                                {!! csrf_field() !!}
                                <button type="submit"
                                        class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3  col-md-12">
                                    Login
                                </button>
                            </div>
                            <!--end::Action-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Content-->
        </div>
        <!--end::Login-->
    </div>

@endsection
@section('scripts')
    <script src="{{asset('assets/js/pages/custom/login/login-4.js')}}"></script>
@endsection
