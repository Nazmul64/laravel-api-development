@extends('admin.master')
@section('main_content')

<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Brand Information</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{route('admin.index')}}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{route('brand.brand.add')}}">
                            <div class="text-tiny">Brands</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">New Brand</div>
                    </li>
                </ul>
            </div>
            <!-- new-category -->
            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title">Brand Name <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Brand name" name="name" tabindex="0" value="{{old('name')}}" aria-required="true">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title">Brand Slug <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Brand Slug" name="slug" tabindex="0" value="{{old('slug')}}" aria-required="true">
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset>
                        <div class="body-title">Upload Images <span class="tf-color-1">*</span></div>
                        <div class="upload-image flex-grow">
                            <div class="item" id="imgpreview" style="display:none">
                                <img src="" class="effect8" alt="">
                            </div>
                            <div id="upload-file" class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                    <input type="file" id="myFile" name="image" accept="image/*">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <div class="bot">
                        <button class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="bottom-page">
        <div class="body-text">Copyright © 2024 SurfsideMedia</div>
    </div>
</div>

<script>
    $(function() {
        $('#myFile').on('change', function(e) {
            const file = this.files[0];
            if (file) {
                $("#imgpreview img").attr('src', URL.createObjectURL(file));
                $('#imgpreview').show();
            }
        });

        $("input[name='name']").on('change', function() {
            $("input[name='slug']").val(StringToSlug($(this).val()));
        });

        function StringToSlug(text) {
            return text.toLowerCase()
                       .replace(/[^\w]+/g, '-')
                       .replace(/-+/g, '-');
        }
    });
</script>

@endsection
