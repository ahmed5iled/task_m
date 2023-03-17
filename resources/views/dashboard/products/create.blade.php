@extends('dashboard.layouts.master')

@section('subheader')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Products</h5>
                <!--end::Page Title-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard.products.create')}}"
                           class="text-muted">Create new</a>
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
            @if(session()->has('status'))
                @include('dashboard.includes.alerts',['message' => session()->get('message'),'alert_class' => 'success'])
            @endif
            <div class="row">
                <form action="{{route('dashboard.products.store')}}" method="POST"
                      enctype="multipart/form-data">
                    <div class="col-md-12">
                        <!--begin::card-->
                        <div class="card card-custom gutter-b ">
                            <!--begin::Form-->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="name"
                                                   value="{{old('name')}}"
                                                   class="form-control {{$errors->has('name')? 'is-invalid':''}}"
                                                   placeholder="Please enter name"/>
                                            <span
                                                class="form-text text-danger">{{$errors->has('name')? $errors->first("name"):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Barcode
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="barcode"
                                                   value="{{old('barcode')}}"
                                                   class="form-control {{$errors->has('barcode')? 'is-invalid':''}}"
                                                   placeholder="Please enter barcode"/>
                                            <span
                                                class="form-text text-danger">{{$errors->has('barcode')? $errors->first("barcode"):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Short Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="short_description" id="description"
                                                      class="form-control {{$errors->has('short_description')? 'is-invalid':''}}"
                                                      placeholder="Please enter short description">{{old('short_description')}}</textarea>
                                            <span
                                                class="form-text text-danger">{{$errors->has('short_description')? $errors->first("short_description"):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Long Description
                                                <span class="text-danger">*</span></label>
                                            <textarea name="long_description" id="description_2"
                                                      class="form-control {{$errors->has('long_description')? 'is-invalid':''}}"
                                                      placeholder="Please enter long description">{{old('long_description')}}</textarea>
                                            <span
                                                class="form-text text-danger">{{$errors->has('long_description')? $errors->first("long_description"):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Qty
                                                <span class="text-danger">*</span></label>
                                            <input type="number" name="quantity"
                                                   value="{{old('quantity')}}"
                                                   class="form-control {{$errors->has('quantity')? 'is-invalid':''}}"
                                                   placeholder="Please enter quantity"/>
                                            <span
                                                class="form-text text-danger">{{$errors->has('quantity')? $errors->first("quantity"):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Category<span class="text-danger">*</span></label>
                                            <select name="category_id"
                                                    class="form-control {{$errors->has('category_id')? 'is-invalid':''}}">
                                                <option value="">Select</option>
                                                @if($categories->count())
                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{$category->id}}" {{$category->id==old('category_id')?'selected':null}}>
                                                            {{$category->name??'-'}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span
                                                class="form-text text-danger">{{$errors->has('course_id')? $errors->first("course_id"):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Brands<span class="text-danger">*</span></label>
                                            <select name="brand_id"
                                                    class="form-control {{$errors->has('brand_id')? 'is-invalid':''}}">
                                                @if($brands->count())
                                                    <option value="">Select</option>
                                                    @foreach($brands as $brand)
                                                        <option
                                                            value="{{$brand->id}}" {{$brand->id==old('brand_id')?'selected':null}}>
                                                            {{$brand->name??'-'}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span
                                                class="form-text text-danger">{{$errors->has('brand_id')? $errors->first("brand_id"):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price
                                                <span class="text-danger">*</span></label>
                                            <input type="number" name="price"
                                                   value="{{old('price')}}"
                                                   class="form-control {{$errors->has('price')? 'is-invalid':''}}"
                                                   placeholder="Please enter price"/>
                                            <span
                                                class="form-text text-danger">{{$errors->has('price')? $errors->first("price"):''}}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"
                                                   value="{{old('image')}}"
                                                   class="form-control {{$errors->has('image')? 'is-invalid':''}}"
                                            />
                                            <span
                                                class="form-text text-danger">{{$errors->has('image')? $errors->first("image"):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" name="new_arrival" type="checkbox"
                                                   value="yes"
                                                   {{old('new_arrival')=='yes'?'checked':null}}
                                                   id="flexCheckDefault-1">
                                            <label class="form-check-label" for="flexCheckDefault-1">
                                                New Arrival
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes"
                                                   id="flexCheckChecked-2" name="most_view"
                                                {{old('most_view')=='yes'?'checked':null}}>
                                            <label class="form-check-label" for="flexCheckChecked-2">
                                                Most Viewed
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="offer" type="checkbox"
                                                   value="yes"
                                                   {{old('offer')=='yes'?'checked':null}}
                                                   id="flexCheckDefault-3">
                                            <label class="form-check-label" for="flexCheckDefault-3">
                                                Offer
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>

                            <!--end::Form-->
                        </div>
                        <!--end::card-->
                    </div>
                </form>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('scripts')
    <script>
        CKEDITOR.replace(document.querySelector('#description'));
        CKEDITOR.replace(document.querySelector('#description_2'));
    </script>
@endsection
