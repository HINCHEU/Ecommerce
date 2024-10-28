@extends('admin.index')
@section('main_content')
    <!-- main-content -->
    <div class="main-content">
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Add Product</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                        <li>
                            <a href="index.html">
                                <div class="text-tiny">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <a href="#">
                                <div class="text-tiny">Ecommerce</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">Add product</div>
                        </li>
                    </ul>
                </div>
                <!-- form-add-product -->
                <form class="tf-section-2 form-add-product" method="post" action="{{ route('admin.create') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="wg-box">
                        <fieldset class="name">
                            <div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" placeholder="Enter product name" name="name"
                                tabindex="0" value="" aria-required="true" required="">
                            <div class="text-tiny">Do not exceed 20 characters when entering the product name.</div>
                        </fieldset>

                        <fieldset class="brand">

                            <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>

                            <div class="select">
                                <select class="" name="category">
                                    <option>Choose category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </fieldset>
                        {{--                        <div class="gap22 cols"> --}}
                        {{--                            <fieldset class="category"> --}}
                        {{--                                <div class="body-title mb-10">Color <span class="tf-color-1">*</span></div> --}}
                        {{--                                <div class="select"> --}}
                        {{--                                    <select class=""> --}}
                        {{--                                        <option>Choose category</option> --}}
                        {{--                                        <option>Shop</option> --}}
                        {{--                                        <option>Product</option> --}}
                        {{--                                    </select> --}}
                        {{--                                </div> --}}
                        {{--                            </fieldset> --}}
                        {{--                            <fieldset class="male"> --}}
                        {{--                                <div class="body-title mb-10">Size <span class="tf-color-1">*</span></div> --}}
                        {{--                                <div class="select"> --}}
                        {{--                                    <select class=""> --}}
                        {{--                                        <option>Male</option> --}}
                        {{--                                        <option>Female</option> --}}
                        {{--                                        <option>Other</option> --}}
                        {{--                                    </select> --}}
                        {{--                                </div> --}}
                        {{--                            </fieldset> --}}
                        {{--                        </div> --}}
                        <fieldset class="description">
                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                            <textarea class="mb-10" name="description" placeholder="Description" tabindex="0" rows="30" aria-required="true"
                                required="" name="description"></textarea>
                            <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                        </fieldset>
                    </div>
                    <div class="wg-box">
                        <fieldset>
                            <div class="body-title mb-10">Upload images</div>
                            <div class="upload-image mb-16">

                                <div class="item up-load">
                                    <label class="uploadfile" for="myFile1">
                                        <span class="text-tiny" id="textDisplay1">Drop your images here or select <span
                                                class="tf-color">click to browse</span></span>
                                        <input type="file" id="myFile1" name="filename1"
                                            onchange="previewImage(event, 'imagePreview1', 'textDisplay1')">
                                        <img src="images/upload/upload-2.png" alt="" id="imagePreview1"
                                            style="display: none; width: 200px; height: auto;">
                                    </label>
                                </div>

                                <div class="item up-load">
                                    <label class="uploadfile" for="myFile2">
                                        <span class="text-tiny" id="textDisplay2">Drop your images here or select <span
                                                class="tf-color">click to browse</span></span>
                                        <input type="file" id="myFile2" name="filename2"
                                            onchange="previewImage(event, 'imagePreview2', 'textDisplay2')">
                                        <img src="images/upload/upload-2.png" alt="" id="imagePreview2"
                                            style="display: none; width: 200px; height: auto;">
                                    </label>
                                </div>

                                <div class="item up-load">
                                    <label class="uploadfile" for="myFile3">
                                        <span class="text-tiny" id="textDisplay3">Drop your images here or select <span
                                                class="tf-color">click to browse</span></span>
                                        <input type="file" id="myFile3" name="filename3"
                                            onchange="previewImage(event, 'imagePreview3', 'textDisplay3')">
                                        <img src="images/upload/upload-2.png" alt="" id="imagePreview3"
                                            style="display: none; width: 200px; height: auto;">
                                    </label>
                                </div>

                            </div>
                            {{--                            <div class="body-text">You need to add at least 4 images. Pay attention to the quality of --}}
                            {{--                                the --}}
                            {{--                                pictures you add, comply with the background color standards. Pictures must be in --}}
                            {{--                                certain --}}
                            {{--                                dimensions. Notice that the product shows all the details --}}
                            {{--                            </div> --}}
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="number" min="0" placeholder="Enter Quantity"
                                name="quantity" tabindex="0" value="" aria-required="true" required="">
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title mb-10">Price <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" placeholder="Enter price" name="price"
                                tabindex="0" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="cols gap22">
                            <fieldset class="name">
                                <div class="body-title mb-10">Add Size</div>
                                {{-- <div class="select mb-10">
                                    <select class="" name="size">
                                        @foreach ($size as $item)
                                            <option value="{{ $item->id }}">{{ $item->size }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <ul
                                    class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach ($size as $item)
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="size-checkbox-{{ $item->id }}" type="checkbox"
                                                    name="sizes[]" value="{{ $item->id }}"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="size-checkbox-{{ $item->id }}"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $item->size }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                {{--                                <div class="list-box-value mb-10"> --}}
                                {{--                                    <div class="box-value-item"> --}}
                                {{--                                        <div class="body-text">EU - 38.5</div> --}}
                                {{--                                    </div> --}}
                                {{--                                    <div class="box-value-item"> --}}
                                {{--                                        <div class="body-text">EU - 39</div> --}}
                                {{--                                    </div> --}}
                                {{--                                    <div class="box-value-item"> --}}
                                {{--                                        <div class="body-text">EU - 40</div> --}}
                                {{--                                    </div> --}}
                                {{--                                </div> --}}
                                {{--                                <div class="list-box-value"> --}}
                                {{--                                    <div class="box-value-item"> --}}
                                {{--                                        <div class="body-text">EU - 41.5</div> --}}
                                {{--                                    </div> --}}
                                {{--                                    <div class="box-value-item"> --}}
                                {{--                                        <div class="body-text">EU - 42</div> --}}
                                {{--                                    </div> --}}
                                {{--                                    <div class="box-value-item"> --}}
                                {{--                                        <div class="body-text">EU - 43</div> --}}
                                {{--                                    </div> --}}
                                {{--                                </div> --}}
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title mb-10">Add Color</div>
                                {{-- <div class="select">
                                    <select class="" name="color">
                                        <option selected disabled>Choose Color</option>
                                        @foreach ($color as $item)
                                            <option value="{{ $item->id }}">{{ ucfirst($item->color) }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <ul
                                    class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach ($color as $item)
                                        <li
                                            class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center ps-3">
                                                <input id="color-checkbox-{{ $item->id }}" type="checkbox"
                                                    name="colors[]" value="{{ $item->id }}"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="color-checkbox-{{ $item->id }}"
                                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $item->color }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </fieldset>

                            {{--                            <fieldset class="name"> --}}
                            {{--                                <div class="body-title mb-10">Product date</div> --}}
                            {{--                                <div class="select"> --}}
                            {{--                                    <input type="date" name="date" value="2023-11-20"> --}}
                            {{--                                </div> --}}
                            {{--                            </fieldset> --}}
                        </div>
                        <div class="cols gap10">
                            <button class="tf-button w-full" type="submit">Add product</button>
                            {{--                            <button class="tf-button style-1 w-full" type="submit">Save product</button> --}}
                            <a href="#" class="tf-button style-2 w-full">Schedule</a>
                        </div>
                    </div>
                </form>
                <!-- /form-add-product -->
            </div>
            <!-- /main-content-wrap -->
        </div>
        <!-- /main-content-wrap -->
        <!-- bottom-page -->
        <div class="bottom-page">
            <div class="body-text">Copyright © 2024 Remos. Design with</div>
            <i class="icon-heart"></i>
            <div class="body-text">by <a href="https://themeforest.net/user/themesflat/portfolio">Themesflat</a> All
                rights reserved.
            </div>
        </div>
        <!-- /bottom-page -->
    </div>
    <!-- /main-content -->
    <script>
        function previewImage(event, previewId, textDisplayId) {
            const imagePreview = document.getElementById(previewId);
            const textDisplay = document.getElementById(textDisplayId);
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block'; // Display the image preview
                    textDisplay.style.display = 'none'; // Hide the text
                };

                reader.readAsDataURL(file); // Convert image file to base64 string
            } else {
                imagePreview.src = "";
                imagePreview.style.display = 'none'; // Hide the preview if no file is selected
                textDisplay.style.display = 'block'; // Show the text again if no file is selected
            }
        }
    </script>
@endsection
