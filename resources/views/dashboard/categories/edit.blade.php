@extends('dashboard.layouts.master')
@section('subheader')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Categories</h5>
                <!--end::Page Title-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard.categories.edit',['category'=>$category->id])}}"
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
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b ">
                        <!--begin::Form-->
                        <form action="{{route('dashboard.categories.update',['category'=>$category->id])}}"
                              method="POST"
                              enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="name" value="{{$category->name??old('name')}}"
                                                   class="form-control {{$errors->has('name')? 'is-invalid':''}}"
                                                   placeholder="Please enter name"/>
                                            <span
                                                class="form-text text-danger">{{$errors->has('name')? $errors->first("name"):''}}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Level
                                                <span class="text-danger">*</span></label>
                                            <select name="parent_id"
                                                    class="form-control {{$errors->has('parent_id')? 'is-invalid':''}}">
                                                <option value="0" {{old('parent_id')=='0'?'selected':null}}>Main
                                                </option>
                                                @if($categories->count())
                                                    @foreach($categories as $single_category)
                                                        <option
                                                            value="{{$single_category->id}}" {{$category->parent_id==$single_category->id?'selected':null}}>
                                                            {{$single_category->name??'-'}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span
                                                class="form-text text-danger">{{$errors->has('parent_id')? $errors->first("parent_id"):''}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {{method_field('PUT')}}
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
