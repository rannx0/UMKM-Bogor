@extends('layouts.register')

@section('content')
<div class="container m-auto mt-3">
    <div class="row justify-content-center">
        <div class="w-100">
            <div class="row">
                <div class="card border-primary border ">
                    <div class="card-body">
                        <h3 class="h3 mb-3"> Register Your UMKM</h3>
                        <div id="bar" class="progress mb-3" style="height: 7px;">
                            <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                        </div>
                        <div id="rootwizard">
                            <div class="row">
                                <div class="col-md-3">
    
                                    <ul class="nav nav-pills nav-justified mb-3 flex-column">
                                        <li class="nav-item" data-target-form="#accountForm">
                                            <a href="#first" data-bs-toggle="tab" data-toggle="tab"
                                                class="nav-link rounded-1 pt-2 pb-2">
                                                <i class="mdi mdi-account-circle"></i>
                                                <span class="d-none d-sm-inline">Login Account</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <i class="dripicons-network-5 fs-3"></i>
                                        </li>
                                        <li class="nav-item" data-target-form="#profileForm">
                                            <a href="#second" data-bs-toggle="tab" data-toggle="tab"
                                                class="nav-link rounded-0 pt-2 pb-2">
                                                <i class="mdi mdi-face-man-profile me-1"></i>
                                                <span class="d-none d-sm-inline">Personal data</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <i class="dripicons-network-5 fs-3"></i>
                                        </li>
                                        <li class="nav-item" data-target-form="#profileForm">
                                            <a href="#second" data-bs-toggle="tab" data-toggle="tab"
                                                class="nav-link rounded-0 pt-2 pb-2">
                                                <i class="mdi mdi-face-man-profile me-1"></i>
                                                <span class="d-none d-sm-inline">Personal Data</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <i class="dripicons-network-5 fs-3"></i>
                                        </li>
                                        <li class="nav-item" data-target-form="#profileForm">
                                            <a href="#second" data-bs-toggle="tab" data-toggle="tab"
                                                class="nav-link rounded-0 pt-2 pb-2">
                                                <i class="mdi mdi-face-man-profile me-1"></i>
                                                <span class="d-none d-sm-inline">Data Usaha/UMKM</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <i class="dripicons-network-5 fs-3"></i>
                                        </li>
                                        <li class="nav-item" data-target-form="#otherForm">
                                            <a href="#third" data-bs-toggle="tab" data-toggle="tab"
                                                class="nav-link rounded-0 pt-2 pb-2">
                                                <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                                <span class="d-none d-sm-inline">Finish</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="col-md-9">
                                    <div class="tab-content mb-0 b-0">
        
                                        <div class="tab-pane" id="first">
                                            <form id="accountForm" method="post" action="#" class="form-horizontal">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="userName3">
                                                                User Name
                                                            </label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" id="userName3"
                                                                    name="userName3" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="userName3">
                                                                Email
                                                            </label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" id="userName3"
                                                                    name="userName3" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="password3">
                                                                Password</label>
                                                            <div class="col-md-9">
                                                                <input type="password" id="password3" name="password3"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
        
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="confirm3">Re
                                                                Password</label>
                                                            <div class="col-md-9">
                                                                <input type="password" id="confirm3" name="confirm3"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                            </form>
                                        </div>
        
                                        <div class="tab-pane fade" id="second">
                                            <form id="profileForm" method="post" action="#" class="form-horizontal">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="name3"> First
                                                                name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="name3" name="name3" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="surname3"> Last
                                                                name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="surname3" name="surname3"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
        
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="email3">Email</label>
                                                            <div class="col-md-9">
                                                                <input type="email" id="email3" name="email3"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="name3"> First
                                                                name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="name3" name="name3" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="surname3"> Last
                                                                name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="surname3" name="surname3"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
        
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="email3">Email</label>
                                                            <div class="col-md-9">
                                                                <input type="email" id="email3" name="email3"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="name3"> First
                                                                name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="name3" name="name3" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="surname3"> Last
                                                                name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="surname3" name="surname3"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
        
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="email3">Email</label>
                                                            <div class="col-md-9">
                                                                <input type="email" id="email3" name="email3"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="name3"> First
                                                                name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="name3" name="name3" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="surname3"> Last
                                                                name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="surname3" name="surname3"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
        
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="email3">Email</label>
                                                            <div class="col-md-9">
                                                                <input type="email" id="email3" name="email3"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </form>
                                        </div>
        
                                        <div class="tab-pane fade" id="third">
                                            <form id="otherForm" method="post" action="#" class="form-horizontal"></form>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="text-center">
                                                        <h2 class="mt-0">
                                                            <i class="mdi mdi-check-all"></i>
                                                        </h2>
                                                        <h3 class="mt-0">Thank you !</h3>
        
                                                        <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus.
                                                            Suspendisse convallis dignissim eros at volutpat. In egestas mattis
                                                            dui. Aliquam mattis dictum aliquet.</p>
        
                                                        <div class="mb-3">
                                                            <div class="form-check d-inline-block">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customCheck4" required>
                                                                <label class="form-check-label" for="customCheck4">I agree with
                                                                    the Terms and Conditions</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
                                            </form>
                                        </div>
        
                                        <ul class="list-inline wizard mb-0">
                                            <li class="previous list-inline-item"><a href="javascript:void(0);"
                                                    class="btn btn-info">Previous</a>
                                            </li>
                                            <li class="next list-inline-item float-end"><a href="javascript:void(0);"
                                                    class="btn btn-info">Next</a></li>
                                        </ul>
        
                                    </div> <!-- tab-content -->
                                </div>
                            </div>
                        </div> <!-- end #rootwizard-->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        "use strict";

        // Initialize bootstrap wizards
        $("#basicwizard").bootstrapWizard();
        $("#progressbarwizard").bootstrapWizard({
            onTabShow: function (t, r, a) {
                var o = ((a + 1) / r.find("li").length) * 100;
                $("#progressbarwizard")
                    .find(".bar")
                    .css({ width: o + "%" });
            },
        }),
        $("#btnwizard").bootstrapWizard({
            nextSelector: ".button-next",
            previousSelector: ".button-previous",
            firstSelector: ".button-first",
            lastSelector: ".button-last"
        });
        $("#rootwizard").bootstrapWizard({
            onNext: function(t, r, a) {
                var o = $($(t).data("targetForm"));
                if (o && (o.addClass("was-validated"), !1 === o[0].checkValidity())) {
                    event.preventDefault();
                    event.stopPropagation();
                    return false;
                }
            },
            onTabChange: function(t, r, a) {
                if (a === 'next') {
                    $(t).find('.button-next').trigger('click');
                }
            }
        });

        // Custom tab navigation
        $('.button-next').on('click', function() {
            navigateToNextTab($(this));
        });

        // Special case for first tab
        $('#first .button-next').on('click', function() {
            navigateToNextTab($(this), '#second');
        });

        // Helper function for navigating to next tab
        function navigateToNextTab($button, nextTabId) {
            var currentTab = $button.closest('.tab-pane');
            var nextTab = nextTabId ? $('#' + nextTabId) : currentTab.next('.tab-pane');

            if (nextTab.length > 0) {
                currentTab.removeClass('active');
                nextTab.addClass('active');
                currentTab.addClass('fade');
                nextTab.removeClass('fade');
            }
        }
    });
</script>
@endsection