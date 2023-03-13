@extends('layouts.admin')

@section('content')
<section class="content-main">

    @include('system.notification')

    <div class="content-header">
        <h2 class="content-title">{{ __('app.categories.name') }}</h2>
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
                    @if(isset($category))
                    @include('categories.forms.update')
                    @else
                    @include('categories.forms.create')
                    @endif
                </div>
                <div class="col-md-8">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Subcategories</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td><b>{{ $category->name }}</b></td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->subcategories()->count() }}</td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light">
                                            <i class="bi bi-chevron-down"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                            <a href="{{ route('subcategories.index', $category->id) }}"
                                                class="dropdown-item">Subcategories</a>
                                            <a onclick="return confirm('Are you sure?')"
                                                class="dropdown-item text-danger"
                                                href="{{ route('categories.destroy', $category->id) }}">Delete</a>
                                        </div>
                                    </div>
                                    <!-- dropdown //end -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- card end -->
        </div>
    </div>
</section> <!-- content-main end -->
@endsection