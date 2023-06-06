<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
<head>
    @include('templates.partials.styles')
</head>

<body>
    <div class="wrapper">
        @include('templates.partials.sidebar')
    <div class="page-wrapper">
        <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <h2 class=" text-bold text-center">
                Todo List
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                <span class="d-none d-sm-inline">
                </span>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="page-body">
        <div class="container-xl">
            
            @yield('content')
        </div>
        </div>
        @include('templates.partials.footer')
    </div>
    </div>
    </div>
    <!-- Libs JS -->
    @include('templates.partials.scripts')
</body>
</html>