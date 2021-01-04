@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/main/category.css') }}">
@endsection
@section('content')
    <button type="button" class="btn btn-primary" id="save_change">
        Lưu thay đổi
    </button>

    <ul id="sortable">
        @foreach ($categories as $category)
            <li class="ui-state-default" data-value="{{$category->id}}" id="category_{{$category->id}}">
                <div class="main-header container-header @if($category->type==2) main-header-color @endif">
                    <p class="main-title header" title="{{$category->title}}">{{$category->title}}</p>
                    <button class='btn menu-icon' data-toggle="modal" data-target="#myModal"
                            onclick="getInfo({{$category->id}})">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="main-content">
                    <ul id="sortable_sub_{{$category->id}}" class="sortable_sub">
                        @foreach ($category->children as $sub)
                            <li class="ui-state-default" data-value="{{$sub->id}}" id="category_{{$sub->id}}">
                                <div class="sub-header">
                                    <p class="sub-title header" title="{{$sub->title}}">{{$sub->title}}</p>
                                    <button class='btn menu-icon' data-toggle="modal" data-target="#myModal"
                                            onclick="getInfo({{$sub->id}})">
                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </li>
                        @endforeach
                        <li class="ui-state-default disable-sub-sort-item" id="add_button_category_{{$category->id}}">
                            <div class="sub-header">
                                <button onclick="add_new_sub({{$category->id}})" data-toggle="modal"
                                        data-target="#myModal">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>

            </li>
        @endforeach
        <li class="ui-state-default disable-sort-item" id="add_button_category">
            <button onclick="add_new()" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
        </li>
    </ul>

@endsection

@section('js')
    {{--    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/main/category.js') }}"></script>
    <script>

        @foreach ($categories as $category)
        $("#sortable_sub_{{$category->id}}").sortable({
            placeholder: "ui-state-highlight",
            items: "li:not(.disable-sub-sort-item)",
            start: function (e, ui) {
                ui.placeholder.height(ui.item.height());
            },
        });
        $("#sortable_sub_{{$category->id}}").disableSelection();
        @endforeach
    </script>

@endsection
