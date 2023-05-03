@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User Profile /</span> Profile</h4>

        <!-- Header -->
        <div class="row">
            <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                <img src="{{ asset('admin') }}/assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top" />
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    <img
                    src="{{ asset('admin') }}/assets/img/avatars/14.png"
                    alt="user image"
                    class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"
                    />
                </div>
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div
                    class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4"
                    >
                    <div class="user-profile-info">
                        <h4>John Doe</h4>
                        <ul
                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2"
                        >
                        <li class="list-inline-item"><i class="ti ti-color-swatch"></i> UX Designer</li>
                        <li class="list-inline-item"><i class="ti ti-map-pin"></i> Vatican City</li>
                        <li class="list-inline-item"><i class="ti ti-calendar"></i> Joined April 2021</li>
                        </ul>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-primary">
                        <i class="ti ti-user-check me-1"></i>Connected
                    </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!--/ Header -->

        <!-- Navbar pills -->
        <div class="row">
            <div class="nav-align-top nav-tabs-shadow mb-4">
                <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                    <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link active"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-profile"
                          aria-controls="navs-top-profile"
                          aria-selected="true"
                        >
                        <i class="ti-xs ti ti-user-check me-1"></i> Profile
                        </button>
                    </li>
                    <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-teams"
                          aria-controls="navs-top-teams"
                          aria-selected="true"
                        >
                        <i class="ti-xs ti ti-users me-1"></i> Teams
                        </button>
                    </li>
                    <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-bank-details"
                          aria-controls="navs-top-bank-details"
                          aria-selected="true"
                        >
                        <i class="fa fa-building-columns me-1"></i> Bank Details
                        </button>
                    </li>
                    <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-personal-info"
                          aria-controls="navs-top-personal-info"
                          aria-selected="true"
                        >
                        <i class="fa-solid fa-circle-info me-1"></i> Personal Information
                        </button>
                    </li>
                    <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-top-security"
                          aria-controls="navs-top-security"
                          aria-selected="true"
                        >
                        <i class="fa fa-lock"></i> Security
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-top-profile" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-5">
                                <!-- About User -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <small class="card-text text-uppercase">About</small>
                                    <ul class="list-unstyled mb-4 mt-3">
                                        <li class="d-flex align-items-center mb-3">
                                        <i class="ti ti-user"></i><span class="fw-bold mx-2">Full Name:</span> <span>John Doe</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                        <i class="ti ti-check"></i><span class="fw-bold mx-2">Status:</span> <span>Active</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                        <i class="ti ti-crown"></i><span class="fw-bold mx-2">Role:</span> <span>Developer</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                        <i class="ti ti-flag"></i><span class="fw-bold mx-2">Country:</span> <span>USA</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                        <i class="ti ti-file-description"></i><span class="fw-bold mx-2">Languages:</span>
                                        <span>English</span>
                                        </li>
                                    </ul>
                                    <small class="card-text text-uppercase">Contacts</small>
                                    <ul class="list-unstyled mb-4 mt-3">
                                        <li class="d-flex align-items-center mb-3">
                                        <i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Contact:</span>
                                        <span>(123) 456-7890</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                        <i class="ti ti-brand-skype"></i><span class="fw-bold mx-2">Skype:</span>
                                        <span>john.doe</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                        <i class="ti ti-mail"></i><span class="fw-bold mx-2">Email:</span>
                                        <span>john.doe@example.com</span>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <!--/ About User -->
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-7">
                                <!-- Activity Timeline -->
                                <div class="card card-action mb-4">
                                    <div class="card-header align-items-center">
                                    <h5 class="card-action-title mb-0">Activity Timeline</h5>
                                    <div class="card-action-element">
                                        <div class="dropdown">
                                        <button
                                            type="button"
                                            class="btn dropdown-toggle hide-arrow p-0"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                        >
                                            <i class="ti ti-dots-vertical text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0);">Share timeline</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                            <li>
                                            <hr class="dropdown-divider" />
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                        </ul>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="card-body pb-0">
                                    <ul class="timeline ms-1 mb-0">
                                        <li class="timeline-item timeline-item-transparent">
                                        <span class="timeline-point timeline-point-primary"></span>
                                        <div class="timeline-event">
                                            <div class="timeline-header">
                                            <h6 class="mb-0">Client Meeting</h6>
                                            <small class="text-muted">Today</small>
                                            </div>
                                            <p class="mb-2">Project meeting with john @10:15am</p>
                                            <div class="d-flex flex-wrap">
                                            <div class="avatar me-2">
                                                <img src="{{ asset('admin') }}/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                                            </div>
                                            <div class="ms-1">
                                                <h6 class="mb-0">Lester McCarthy (Client)</h6>
                                                <span>CEO of Infibeam</span>
                                            </div>
                                            </div>
                                        </div>
                                        </li>
                                        <li class="timeline-item timeline-item-transparent">
                                        <span class="timeline-point timeline-point-success"></span>
                                        <div class="timeline-event">
                                            <div class="timeline-header">
                                            <h6 class="mb-0">Create a new project for client</h6>
                                            <small class="text-muted">2 Day Ago</small>
                                            </div>
                                            <p class="mb-0">Add files to new design folder</p>
                                        </div>
                                        </li>
                                        <li class="timeline-item timeline-item-transparent">
                                        <span class="timeline-point timeline-point-danger"></span>
                                        <div class="timeline-event">
                                            <div class="timeline-header">
                                            <h6 class="mb-0">Shared 2 New Project Files</h6>
                                            <small class="text-muted">6 Day Ago</small>
                                            </div>
                                            <p class="mb-2">
                                            Sent by Mollie Dixon
                                            <img
                                                src="{{ asset('admin') }}/assets/img/avatars/4.png"
                                                class="rounded-circle me-3"
                                                alt="avatar"
                                                height="24"
                                                width="24"
                                            />
                                            </p>
                                            <div class="d-flex flex-wrap gap-2 pt-1">
                                            <a href="javascript:void(0)" class="me-3">
                                                <img
                                                src="{{ asset('admin') }}/assets/img/icons/misc/doc.png"
                                                alt="Document image"
                                                width="15"
                                                class="me-2"
                                                />
                                                <span class="fw-semibold text-heading">App Guidelines</span>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <img
                                                src="{{ asset('admin') }}/assets/img/icons/misc/xls.png"
                                                alt="Excel image"
                                                width="15"
                                                class="me-2"
                                                />
                                                <span class="fw-semibold text-heading">Testing Results</span>
                                            </a>
                                            </div>
                                        </div>
                                        </li>
                                        <li class="timeline-item timeline-item-transparent border-0">
                                        <span class="timeline-point timeline-point-info"></span>
                                        <div class="timeline-event">
                                            <div class="timeline-header">
                                            <h6 class="mb-0">Project status updated</h6>
                                            <small class="text-muted">10 Day Ago</small>
                                            </div>
                                            <p class="mb-0">Woocommerce iOS App Completed</p>
                                        </div>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <!--/ Activity Timeline -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-top-teams" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                    <a href="javascript:;" class="d-flex align-items-center">
                                        <div class="avatar me-2">
                                        <img
                                            src="{{ asset('admin') }}/assets/img/icons/brands/react-label.png"
                                            alt="Avatar"
                                            class="rounded-circle"
                                        />
                                        </div>
                                        <div class="me-2 text-body h5 mb-0">React Developers</div>
                                    </a>
                                    <div class="ms-auto">
                                        <ul class="list-inline mb-0 d-flex align-items-center">
                                        <li class="list-inline-item me-0">
                                            <a href="javascript:void(0);" class="text-body"
                                            ><i class="ti ti-star text-muted me-1"></i
                                            ></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                            <button
                                                type="button"
                                                class="btn dropdown-toggle hide-arrow p-0"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                <i class="ti ti-dots-vertical text-muted"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                                <li>
                                                <hr class="dropdown-divider" />
                                                </li>
                                                <li>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                                </li>
                                            </ul>
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                    </div>
                                    <p class="mb-3">
                                    We don’t make assumptions about the rest of your technology stack, so you can develop new
                                    features in React.
                                    </p>
                                    <div class="d-flex align-items-center pt-1">
                                    <div class="d-flex align-items-center">
                                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            title="Vinnie Mostowy"
                                            class="avatar avatar-sm pull-up"
                                        >
                                            <img class="rounded-circle" src="{{ asset('admin') }}/assets/img/avatars/5.png" alt="Avatar" />
                                        </li>
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            title="Allen Rieske"
                                            class="avatar avatar-sm pull-up"
                                        >
                                            <img class="rounded-circle" src="{{ asset('admin') }}/assets/img/avatars/12.png" alt="Avatar" />
                                        </li>
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            title="Julee Rossignol"
                                            class="avatar avatar-sm pull-up"
                                        >
                                            <img class="rounded-circle" src="{{ asset('admin') }}/assets/img/avatars/6.png" alt="Avatar" />
                                        </li>
                                        <li class="avatar avatar-sm">
                                            <span
                                            class="avatar-initial rounded-circle pull-up"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="8 more"
                                            >+8</span
                                            >
                                        </li>
                                        </ul>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:;" class="me-2"><span class="badge bg-label-primary">React</span></a>
                                        <a href="javascript:;"><span class="badge bg-label-warning">Vue.JS</span></a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                    <a href="javascript:;" class="d-flex align-items-center">
                                        <div class="avatar me-2">
                                        <img
                                            src="{{ asset('admin') }}/assets/img/icons/brands/vue-label.png"
                                            alt="Avatar"
                                            class="rounded-circle"
                                        />
                                        </div>
                                        <div class="me-2 text-body h5 mb-0">Vue.js Dev Team</div>
                                    </a>
                                    <div class="ms-auto">
                                        <ul class="list-inline mb-0 d-flex align-items-center">
                                        <li class="list-inline-item me-0">
                                            <a href="javascript:void(0);" class="text-body"
                                            ><i class="ti ti-star text-muted me-1"></i
                                            ></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                            <button
                                                type="button"
                                                class="btn dropdown-toggle hide-arrow p-0"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                <i class="ti ti-dots-vertical text-muted"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                                <li>
                                                <hr class="dropdown-divider" />
                                                </li>
                                                <li>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                                </li>
                                            </ul>
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                    </div>
                                    <p class="mb-3">
                                    The development of Vue and its ecosystem is guided by an international team, some of whom have
                                    chosen to be featured below.
                                    </p>
                                    <div class="d-flex align-items-center pt-1">
                                    <div class="d-flex align-items-center">
                                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            title="Kaith D'souza"
                                            class="avatar avatar-sm pull-up"
                                        >
                                            <img class="rounded-circle" src="{{ asset('admin') }}/assets/img/avatars/5.png" alt="Avatar" />
                                        </li>
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            title="John Doe"
                                            class="avatar avatar-sm pull-up"
                                        >
                                            <img class="rounded-circle" src="{{ asset('admin') }}/assets/img/avatars/1.png" alt="Avatar" />
                                        </li>
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            title="Alan Walker"
                                            class="avatar avatar-sm pull-up"
                                        >
                                            <img class="rounded-circle" src="{{ asset('admin') }}/assets/img/avatars/6.png" alt="Avatar" />
                                        </li>
                                        <li class="avatar avatar-sm">
                                            <span
                                            class="avatar-initial rounded-circle pull-up"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="14 more"
                                            >+14</span
                                            >
                                        </li>
                                        </ul>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:;"><span class="badge bg-label-danger">Developer</span></a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-top-bank-details" role="tabpanel">
                        <div class="row">
                            <section id="profile-info">
                                <!-- Teams Cards -->
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="d-flex align-items-center justify-content-between w-100">
                                                        <div class="">
                                                            <a href="javascript:;" class="">
                                                                <div class="me-2 text-body h5 mb-0">Bank Details</div>
                                                            </a>
                                                        </div>
                                                        <div class="">
                                                            <button class="btn btn-primary waves-effect waves-light">Edit</button>
                                                        </div>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <ul class="list-inline mb-0 d-flex align-items-center">
                                                            <li class="list-inline-item me-0">
                                                                <a href="javascript:void(0);" class="text-body"><i class="ti ti-star text-muted me-1"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn dropdown-toggle hide-arrow p-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ti ti-dots-vertical text-muted"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                                                        <li>
                                                                            <hr class="dropdown-divider">
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                                                        <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                                <label for="account_title" class="form-label">Account Title</label>
                                                                <input class="form-control" type="text" id="account_title" name="account_title" value="Ali Hassan" autofocus="">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="zip_code" class="form-label">Zip Code</label>
                                                                <input class="form-control" type="text" id="zip_code" name="zip_code" value="1014" autofocus="">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="bank_name" class="form-label">Bank Name</label>
                                                                <input class="form-control" type="text" id="bank_name" name="bank_name" value="Alied" autofocus="">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="bank_code" class="form-label">Bank Code</label>
                                                                <input class="form-control" type="number" name="bank_code" id="bank_code" value="1023">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="account_number" class="form-label">Account Number</label>
                                                                <input class="form-control" type="number" id="account_number" name="account_number" value="1001 1001 1001 1001" placeholder="1001 1001 1001 1001">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="iban_number" class="form-label">IBAN Number</label>
                                                                <input type="text" class="form-control" id="iban_number" name="iban_number" value="pk1001100110011001">
                                                            </div>
                                                        </div>
                                                        <div class="mt-2">
                                                            <button type="submit" class="btn btn-primary me-2 waves-effect waves-float waves-light">Save changes</button>
                                                            <button type="reset" class="btn btn-label-secondary waves-effect waves-float waves-light">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Teams Cards -->

                                <!-- modal content start -->
                                <div class="container-xxl flex-grow-1 container-p-y">
                                    <!-- Pricing Modal -->
                                    <div class="modal fade" id="pricingModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-simple modal-pricing">
                                            <div class="modal-content p-2 p-md-5">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <!-- Pricing Plans -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!-- Change Password -->
                                                            <div class="my-4 px-4">
                                                                <h5 class="card-header">Change Password</h5>
                                                                <div class="card-body">
                                                                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                                                                        <div class="row">
                                                                            <div class="mb-3 col-md-6 form-password-toggle">
                                                                                <label class="form-label" for="currentPassword">Current Password</label>
                                                                                <div class="input-group input-group-merge">
                                                                                    <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="············">
                                                                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="mb-3 col-md-6 form-password-toggle">
                                                                                <label class="form-label" for="newPassword">New Password</label>
                                                                                <div class="input-group input-group-merge">
                                                                                    <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="············">
                                                                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="mb-3 col-md-6 form-password-toggle">
                                                                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                                                                <div class="input-group input-group-merge">
                                                                                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="············">
                                                                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 mb-4">
                                                                                <h6>Password Requirements:</h6>
                                                                                <ul class="ps-3 mb-0">
                                                                                    <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                                                                    <li class="mb-1">At least one lowercase character</li>
                                                                                    <li>At least one number, symbol, or whitespace character</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div>
                                                                                <button type="submit" class="btn btn-primary me-2 waves-effect waves-float waves-light">Save changes</button>
                                                                                <button type="reset" class="btn btn-label-secondary waves-effect waves-float waves-light">Cancel</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!--/ Change Password -->
                                                        </div>
                                                    </div>
                                                    <!--/ Pricing Plans -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Pricing Modal -->
                            </div>
                          </section>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-top-personal-info" role="tabpanel">
                        <section id="profile-info">
                            <div class="row">
                                <!-- center profile info section -->
                                <div class="col-xl-12">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Bank Details</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="d-flex items-center justify-content-between border p-3 rounded">
                                                        <div class="select2-selection__rendered">Employee No.</div>
                                                        <div class="text-muted">1145</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="d-flex items-center justify-content-between border p-3 rounded">
                                                        <div class="select2-selection__rendered">Designation</div>
                                                        <div class="text-muted">Senior Vice President (SVP) - Management Committee</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="d-flex items-center justify-content-between border p-3 rounded">
                                                        <div class="select2-selection__rendered">Employee Name.</div>
                                                        <div class="text-muted">Ali Hassan Khan</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="d-flex items-center justify-content-between border p-3 rounded">
                                                        <div class="select2-selection__rendered">Appointment Date</div>
                                                        <div class="text-muted">31-01-2023</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="d-flex items-center justify-content-between border p-3 rounded">
                                                        <div class="select2-selection__rendered">Department</div>
                                                        <div class="text-muted">Main Department</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="d-flex items-center justify-content-between border p-3 rounded">
                                                        <div class="select2-selection__rendered">Salary</div>
                                                        <div class="text-muted">1145</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="d-flex items-center justify-content-between border p-3 rounded">
                                                        <div class="select2-selection__rendered">Email</div>
                                                        <div class="text-muted">admin@hawxtechnologies.com</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="d-flex items-center justify-content-between border p-3 rounded">
                                                        <div class="select2-selection__rendered">Address</div>
                                                        <div class="text-muted">Gulshan block 7</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="d-flex items-center justify-content-between border p-3 rounded">
                                                        <div class="select2-selection__rendered">Date of Birth</div>
                                                        <div class="text-muted">03-02-1998</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="d-flex items-center justify-content-between border p-3 rounded">
                                                        <div class="select2-selection__rendered">About Me</div>
                                                        <div class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <!-- <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                                    <button type="reset" class="btn btn-label-secondary">Cancel</button> -->
                                            </div>
                                        </div>
                                        <!-- /Account -->
                                    </div>
                                </div>
                            </div>
                            <!-- modal content start -->

                            <!-- modal content end -->
                        </section>
                    </div>
                    <div class="tab-pane fade" id="navs-top-security" role="tabpanel">
                        <div class="row">
                            <h5 class="card-header">Change Password</h5>
                            <form id="formAccountSettings" method="POST" onsubmit="return false">
                                <div class="row">
                                    <div class="mb-3 col-md-6 form-password-toggle">
                                        <label class="form-label" for="currentPassword">Current Password</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="············">
                                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6 form-password-toggle">
                                        <label class="form-label" for="newPassword">New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="············">
                                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6 form-password-toggle">
                                        <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="············">
                                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <h6>Password Requirements:</h6>
                                        <ul class="ps-3 mb-0">
                                            <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                            <li class="mb-1">At least one lowercase character</li>
                                            <li>At least one number, symbol, or whitespace character</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary me-2 waves-effect waves-float waves-light">Save changes</button>
                                        <button type="reset" class="btn btn-label-secondary waves-effect waves-float waves-light">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection
