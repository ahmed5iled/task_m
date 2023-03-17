<a href="{{route('dashboard.categories.edit',['category'=>$category->id])}}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md">
    <i class="la la-edit"></i>
</a>
<a data-url="{{route('dashboard.categories.destroy',['category'=>$category->id])}}"
   data-item-id="{{ $category->id }}"
   class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"
   data-toggle="modal"
   data-target="#delete_modal">
    <i class="la la-trash"></i>
</a>

<script src="{{ asset('assets/js/delete-item.js') }}" type="text/javascript"></script>
