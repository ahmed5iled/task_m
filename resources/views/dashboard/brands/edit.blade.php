@extends('dashboard.layouts.master')
@section('subheader')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">brands</h5>
                <!--end::Page Title-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard.brands.edit',['brand'=>$brand->id]) }}"
                           class="text-muted">Edit</a>
                    </li>
                </ul>
            </div>
            <!--end::Info-->
        </div>
    </div>

@endsection
@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b ">
                        <!--begin::Form-->
                        <form class=" "
                              action="{{ route('dashboard.brands.update',['brand'=>$brand->id]) }}"
                              enctype="multipart/form-data"
                              method="POST">
                            <div class="card-body">

                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <div class="form-group m-form__group">
                                            <label for="password">Image :
                                                <span class="text-danger">*</span>

                                            </label>
                                            <input type="file" name="image"
                                                   class="form-control m-input {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                                   id="image"
                                                   aria-describedby="emailHelp" placeholder="Please enter الصور">
                                            @if ($errors->has('image'))
                                                <span class="m-form__help text-danger">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-lg-2">
                                        <img src="{{Storage::url($brand->image)}}" style="width: 100px;height: 100px;">
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group m-form__group">
                                            <label for="password">Name:
                                                <span class="text-danger">*</span>

                                            </label>
                                            <input type="text" name="name"
                                                   class="form-control m-input {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                   id="image" value="{{$brand->name}}"
                                                   aria-describedby="emailHelp" placeholder="Please enter image ar">
                                            @if ($errors->has('name'))
                                                <span class="m-form__help text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                            </div>
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>

                        <!--end::Form-->
                    </div>

                    <!--end::Portlet-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        CKEDITOR.replace(document.querySelector('#description222'));
        CKEDITOR.replace(document.querySelector('#description2222'));
    </script>
    <script src="{{asset('assets/js/pages/crud/forms/widgets/tagify.js')}}" type="text/javascript"></script>

@endsection
