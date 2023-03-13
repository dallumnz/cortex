@extends('layouts.admin')

@section('content')
<section class="content-main">

    @include('system.notification')

    <div class="content-header">
        <h2 class="content-title">{{ $category->name .' '. __('app.subcategories.name') }}</h2>
        <div>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-danger">
                &times; {{ __('app.common.cancel')}}
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if(isset($subcategory))
                    @include('subcategories.forms.update')
                    @else
                    @include('subcategories.forms.create')
                    @endif
                </div>
                <div class="col-md-8">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($subcategories))
                            @foreach($subcategories as $subcategory)
                            <tr>
                                <td><b>{{ $subcategory->name }}</b></td>
                                <td>{{ $subcategory->slug }}</td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light">
                                            <i class="bi bi-chevron-down"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('subcategories.edit', $subcategory->id) }}">Edit</a>
                                            <a class="dropdown-item text-danger"
                                                onclick="return confirm('Are you sure?')"
                                                href="{{ route('subcategories.destroy', $subcategory->id) }}">Delete</a>
                                        </div>
                                    </div>
                                    <!-- dropdown //end -->
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div> <!-- card end -->
        </div>
    </div>
</section> <!-- content-main end -->
@endsection