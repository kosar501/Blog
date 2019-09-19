@include('layouts.header')
<meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>

<body>
<!-- Preloader -->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!-- /Preloader -->
<div class="wrapper theme-6-active pimary-color-pink">

@include('layouts.navbar')

@include('layouts.leftsidebar')

@include('layouts.rightsidebar')

<!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid pt-25">

            <div class="row heading-bg">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-15">
                    <h5 class="txt-dark">
                        <span style="font-size: 25px;">درآمد</span>
                    </h5>
                </div>
            </div>

            <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                <li role="presentation" class="active"><a data-toggle="tab" id="profile_tab_7"
                                                          role="tab" href="#profile_7"
                                                          aria-expanded="true">گزارش درآمد و هزینه ها</a>
                </li>
            </ul>

            <div class="clearfix"></div>

            <div class="tab-content" id="myTabContent_8">
                <div id="profile_8" class="tab-pane fade active in" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-12">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /Main Content -->

</div>
@include('layouts.footer')
</body>

</html>
