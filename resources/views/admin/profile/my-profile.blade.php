@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User / View / Profile</h4>
        <div class="row">
          <!-- User Sidebar -->
          <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
              <div class="card-body">
                <div class="user-avatar-section">
                  <div class="d-flex align-items-center flex-column">
                    @if(isset($model->profile) && !empty($model->profile->profile))
                        <img class="img-fluid rounded mb-3 pt-1 mt-4"
                            src="{{ asset('public/admin/assets/img/avatars') }}/{{ $model->profile->profile }}"
                            height="100"
                            width="100"
                            alt="User avatar"
                        />
                    @else
                        <img class="img-fluid rounded mb-3 pt-1 mt-4"
                            src="{{ asset('public/admin/default.png') }}"
                            height="100"
                            width="100"
                            alt="User avatar"
                        />
                    @endif
                    <div class="user-info text-center">
                        <h4>{{ $model->first_name }} {{ $model->last_name }} <span data-toggle="tooltip" data-placement="top" title="Employment ID">( {{ $model->profile->employment_id??'-' }} )</span></h4>
                        <span class="badge bg-label-secondary mt-1">
                            @if(isset($model->jobHistory->position->title) && !empty($model->jobHistory->position->title))
                                {{ $model->jobHistory->position->title }}
                            @else
                                -
                            @endif
                        </span>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
                  <div class="d-flex align-items-start me-4 mt-3 gap-2">
                    <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-checkbox ti-sm"></i></span>
                    <div>
                        <p class="mb-0 fw-semibold">
                            @if(isset($model->userWorkingShift->workShift) && !empty($model->userWorkingShift->workShift->name))
                                {{ $model->userWorkingShift->workShift->name }}
                            @else
                                -
                            @endif
                        </p>
                        <small>Work Shift</small>
                    </div>
                  </div>
                  <div class="d-flex align-items-start mt-3 gap-2">
                    <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-briefcase ti-sm"></i></span>
                    <div>
                      <p class="mb-0 fw-semibold">
                        @if(isset($model->departmentBridge->department) && !empty($model->departmentBridge->department->name))
                            {{ $model->departmentBridge->department->name }}
                        @else
                            -
                        @endif
                      </p>
                      <small>Department</small>
                    </div>
                  </div>
                </div>
                <p class="mt-4 small text-uppercase text-muted">Details</p>
                <div class="info-container">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <span class="fw-semibold me-1">Employment ID:</span>
                            <span>
                                @if(isset($model->profile) && !empty($model->profile->employment_id))
                                    {{ $model->profile->employment_id }}
                                @else
                                -
                                @endif
                            </span>
                        </li>
                        <li class="mb-2">
                            <span class="fw-semibold me-1">Employment Status:</span>
                            <span>
                                @if(isset($model->jobHistory->userEmploymentStatus->employmentStatus) && !empty($model->jobHistory->userEmploymentStatus->employmentStatus->name))
                                    {{ $model->jobHistory->userEmploymentStatus->employmentStatus->name }}
                                @else
                                -
                                @endif
                            </span>
                        </li>
                        <li class="mb-2">
                            <span class="fw-semibold me-1">Joining Date:</span>
                            <span>
                                @if(isset($model->jobHistory) && !empty($model->jobHistory->joining_date))
                                Joined {{ date('d M Y', strtotime($model->jobHistory->joining_date)) }}
                                @else
                                -
                                @endif
                            </span>
                        </li>
                        <li class="mb-2">
                            <span class="fw-semibold me-1">Username:</span>
                            <span>
                            {{ $model->first_name }} {{ $model->last_name }}
                            </span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">Email:</span>
                            <span>{{ $model->email??'-' }}</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">Status:</span>
                            @if($model->status)
                                <span class="badge bg-label-success">Active</span>
                            @else
                                <span class="badge bg-label-danger">In-Active</span>
                            @endif
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">Role:</span>
                            <span>
                                @if(!empty($model->getRoleNames()))
                                    @foreach ($model->getRoleNames() as $roleName)
                                        {{ $roleName }},
                                    @endforeach
                                @else
                                -
                                @endif
                            </span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">Contact:</span>
                            <span>
                                @if(isset($model->profile) && !empty($model->profile->phone_number))
                                    {{ $model->profile->phone_number }}
                                @else
                                -
                                @endif
                            </span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">Gender:</span>
                            <span>
                            @if(isset($model->profile) && !empty($model->profile->gender))
                                {{ $model->profile->gender }}
                            @else
                            -
                            @endif
                            </span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">Birth Day:</span>
                            <span>
                            @if(isset($model->profile) && !empty($model->profile->date_of_birth))
                                {{ date('d M Y', strtotime($model->profile->date_of_birth)) }}
                            @else
                            -
                            @endif
                            </span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">About Me:</span>
                            <span>
                            @if(isset($model->profile) && !empty($model->profile->about_me))
                                {{ $model->profile->about_me }}
                            @else
                            -
                            @endif
                            </span>
                        </li>
                    </ul>
                </div>
              </div>
            </div>
            <!-- /User Card -->
          </div>
          <!--/ User Sidebar -->

          <!-- User Content -->
          <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- User Pills -->
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
              <li class="nav-item">
                <li class="nav-item">
                    <button
                      type="button"
                      class="nav-link active"
                      role="tab"
                      data-bs-toggle="tab"
                      data-bs-target="#navs-edit-account"
                      aria-controls="navs-edit-account"
                      aria-selected="true"
                    >
                    <i class="ti ti-user-check me-1 ti-xs"></i>Edit Account
                    </button>
                </li>
              </li>
              <li class="nav-item">
                <button
                      type="button"
                      class="nav-link"
                      role="tab"
                      data-bs-toggle="tab"
                      data-bs-target="#navs-password"
                      aria-controls="navs-password"
                      aria-selected="true"
                    >
                    <i class="ti ti-lock me-1 ti-xs"></i>Password
                    </button>
              </li>
              <li class="nav-item">
                <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-address"
                    aria-controls="navs-address"
                    aria-selected="true"
                >
                <i class="ti ti-building me-1 ti-xs"></i>Addess
                </button>
              </li>
              <li class="nav-item">
                <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-emergency-contact"
                    aria-controls="navs-emergency-contact"
                    aria-selected="true"
                >
                <i class="ti ti-cell me-1 ti-xs"></i>Emergency Contact
                </button>
              </li>
              <li class="nav-item">
                <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-job-history"
                    aria-controls="navs-job-history"
                    aria-selected="true"
                >
                <i class="ti ti-tag me-1 ti-xs"></i>Job History
                </button>
              </li>

              {{-- <li class="nav-item">
                    <button
                        type="button"
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#navs-notification"
                        aria-controls="navs-notification"
                        aria-selected="true"
                    >
                    <i class="ti ti-bell me-1 ti-xs"></i>Notifications
                    </button>
                </li> --}}
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="navs-edit-account" role="tabpanel">
                    <div class="card-body">
                        <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('profile.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}

                            <div class="row">
                                <div class="col-xl-6 order-1 order-xl-0">
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="first_name"
                                            placeholder="Enter first name"
                                            value="{{ $model->first_name }}"
                                            name="first_name">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="first_name_error" class="text-danger error"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="d-block form-label">Gender</label>
                                        <div class="form-check mb-2">
                                        <input
                                            type="radio"
                                            id="gender-male"
                                            name="gender"
                                            class="form-check-input"
                                            @if(isset($model->profile) && !empty($model->profile->gender) && $model->profile->gender=='male')
                                            checked
                                            @endif
                                            required
                                            value="male"
                                        />
                                        <label class="form-check-label" for="gender-male">Male</label>
                                        </div>
                                        <div class="form-check">
                                        <input
                                            type="radio"
                                            id="gender-female"
                                            name="gender"
                                            class="form-check-input"
                                            @if(isset($model->profile) && !empty($model->profile->gender) && $model->profile->gender=='female')
                                            checked
                                            @endif
                                            required
                                            value="female"
                                        />
                                        <label class="form-check-label" for="gender-female">Female</label>
                                        </div>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="gender_error" class="text-danger error"></span>
                                    </div>

                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="phone_number">Phone </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="phone_number"
                                            placeholder="Enter your phone number"
                                            value="{{ $model->profile->phone_number??'' }}"
                                            name="phone_number">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="phone_number_error" class="text-danger error"></span>
                                    </div>

                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="profile">Upload Profile Image</label>
                                        <input type="file" class="form-control" accept="image/*" id="profile" placeholder="Enter first name" name="profile">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="profile_error" class="text-danger error"></span>

                                        @if(isset($model->profile) && !empty($model->profile->profile))
                                            <span id="profile-preview">
                                                <img style="width:20%; height:20%" src="{{ asset('public/admin/assets/img/avatars') }}/{{ $model->profile->profile }}" alt="">
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 order-0 order-xl-0">
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="last_name"
                                            placeholder="Enter last name"
                                            value="{{ $model->last_name }}"
                                            name="last_name">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="last_name_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="date_of_birth">Date of birth </label>
                                        <input
                                            type="date"
                                            class="form-control"
                                            id="date_of_birth"
                                            placeholder="Enter your contact number"
                                            value="{{ $model->profile->date_of_birth??'' }}"
                                            name="date_of_birth">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="date_of_birth_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="marital_status">Marital Status </label>
                                        <select name="marital_status" id="marital_status" class="form-control">
                                            <option value="" selected>Select marital status</option>
                                            <option value="1" {{ isset($model->profile->marital_status) && $model->profile->marital_status==1?'selected':'' }}>Married</option>
                                            <option value="0" {{ isset($model->profile->marital_status) && $model->profile->marital_status==0?'selected':'' }}>Single</option>
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="marital_status_error" class="text-danger error"></span>
                                    </div>
                                </div>
                                <div class="col-xl-12 order-0 order-xl-0">
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="cover_image_id">Cover Image</label>
                                        <div class="row gy-3">
                                            @foreach ($cover_images as $cover_image)
                                                <div class="col-md">
                                                    <div class="form-check custom-option custom-option-icon">
                                                        <label class="form-check-label custom-option-content" for="cover_image_id{{ $cover_image->id }}">
                                                            <span class="custom-option-body">
                                                                <img style="width: 150px; height:50px" src="{{ asset('public/admin/assets/img/pages') }}/{{ $cover_image->image }}" alt="Cover Profile Image">
                                                            </span>
                                                            @if(isset($model->profile) && !empty($model->profile->cover_image_id) && $model->profile->cover_image_id==$cover_image->id)
                                                                <input
                                                                    name="cover_image_id"
                                                                    class="form-check-input"
                                                                    type="radio"
                                                                    value="{{ $cover_image->id }}"
                                                                    id="cover_image_id{{ $cover_image->id }}"
                                                                    checked
                                                                />
                                                            @else
                                                                <input
                                                                    name="cover_image_id"
                                                                    class="form-check-input"
                                                                    type="radio"
                                                                    value="{{ $cover_image->id }}"
                                                                    id="cover_image_id{{ $cover_image->id }}"
                                                                />
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 order-0 order-xl-0">
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="about_me">About </label>
                                        <textarea name="about_me" id="about_me" cols="30" rows="5" class="form-control" placeholder="Enter about you.">{{ $model->profile->about_me??'' }}</textarea>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="about_me_error" class="text-danger error"></span>
                                    </div>
                                </div>
                                <div class="col-12 order-2 order-xl-0">
                                    <button type="submit" class="btn btn-primary me-2">
                                    Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-password" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 pl-md-2 pt-md-0 pt-sm-4 pt-4">
                                <div class="tab-content px-primary">
                                    <div id="Change Password-1" class="tab-pane fade active show">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="d-flex align-items-center text-capitalize mb-0 title tab-content-header">
                                            Change Password
                                            </h5>
                                            <div class="d-flex align-items-center mb-0"></div>
                                        </div>
                                        <hr>
                                        <div class="content py-primary" id="change-password">
                                            <div class="content" id="Change Password-1">
                                                <form id="create-form" data-modal-id="change-password" action="{{ route('profile.change-password') }}" data-method="POST">
                                                    @csrf

                                                    <div class="form-group" placeholder="Enter old password" show-password="true">
                                                        <div class="row align-items-center">
                                                            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12">
                                                                <label class="text-left d-block mb-lg-0">
                                                                    Old password
                                                                </label>
                                                            </div>
                                                            <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12">
                                                                <div class="form-password-toggle">
                                                                    <div class="input-group">
                                                                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="············" aria-describedby="basic-default-password2">
                                                                        <span id="old_password" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                                        <span id="old_password_error" class="text-danger error"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-xl-3">
                                                                    <label for="input-text-new-password" class="text-left d-block mb-2 mb-lg-0">
                                                                        New password
                                                                    </label>
                                                                </div>
                                                                <div class="col-lg-8 col-xl-8">
                                                                    <div class="form-password-toggle">
                                                                        <div class="input-group">
                                                                            <input type="password" class="form-control" id="password" name="password" placeholder="············" aria-describedby="basic-default-password2">
                                                                            <span id="password" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                                                            <span id="password_error" class="text-danger error"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="note note-warning p-4 mt-2">
                                                                    <p class="m-1">The password should contain one upper case, one lower case, numbers, one special character ( +=#?!@$%^&amp;*- ). It should be a minimum of 8 characters.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" placeholder="Enter confirm password" show-password="true">
                                                        <div class="row align-items-center">
                                                            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12">
                                                                <label class="text-left d-block mb-lg-0">
                                                                    Confirm password
                                                                </label>
                                                            </div>
                                                            <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12">
                                                                <div class="form-password-toggle">
                                                                    <div class="input-group">
                                                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="············" aria-describedby="basic-default-password2">
                                                                        <span id="password_confirmation" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                                        <span id="password_confirmation_error" class="text-danger error"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-5 mb-0">
                                                        <button data-v-27baa82a="" type="submit" class="btn text-center btn-primary submitBtn">
                                                            <span data-v-27baa82a="" class="w-100">
                                                            Save
                                                            </span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-address" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 order-1 order-xl-0">
                                <h4>Address Details</h4>
                                <hr />
                                <div class="content py-primary">
                                    <div id="Address Details-11">
                                        <div class="row mb-primary"> <!-- Permanent Address -->
                                            <div class="col-lg-4">
                                                <div class="d-flex align-items-center mb-3 mb-lg-0">
                                                    <div>
                                                        <div class="icon-box ml-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-home">
                                                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    Permanent address
                                                </div>
                                            </div>
                                            @if(isset($user_permanent_address) && !empty($user_permanent_address))
                                                @php
                                                    $permanent_address = json_decode($user_permanent_address['value']);
                                                @endphp
                                                <div class="col-lg-4">
                                                    <p class="mb-0">
                                                        {{ $permanent_address->details??'' }}
                                                    </p>
                                                    <p class="mb-0">
                                                        {{ $permanent_address->city??'' }}
                                                    </p>
                                                    <p class="mb-0">
                                                        {{ $permanent_address->area??'' }},
                                                        {{ $permanent_address->state??'' }},
                                                        {{ $permanent_address->zip_code??'' }},
                                                        {{ $permanent_address->country??'' }}
                                                    </p>
                                                    <div class="d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-phone primary-text-color mr-2" sheight="15">
                                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                                        </svg>
                                                        <p class="mb-0">
                                                            {{ $permanent_address->phone_number??'' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="text-right mt-3 mt-lg-0 data-{{ $user_permanent_address->id }}">
                                                        <div role="group" aria-label="Default action" class="btn-group btn-group-action">
                                                            <button
                                                                data-toggle="tooltip"
                                                                data-placement="top"
                                                                data-edit-url="{{ route('user_contacts.edit', $user_permanent_address->id) }}"
                                                                data-url="{{ route('user_contacts.update', $user_permanent_address->id) }}"
                                                                title="Edit Permanent Address"
                                                                data-type='permanent'
                                                                class="btn edit-btn"
                                                                type="button" data-bs-toggle="modal" data-bs-target="#addNewAddress"
                                                                >
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit">
                                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                                </svg>
                                                            </button>
                                                            <button
                                                                data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Delete"
                                                                data-slug="{{ $user_permanent_address->id }}"
                                                                data-del-url="{{ route('user_contacts.destroy', $user_permanent_address->id) }}"
                                                                class="btn delete">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-trash-2">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-lg-4 data">
                                                    <div class="col-lg-4 default-permanent">
                                                        <p class="text-muted mb-0">Not added yet</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="text-right mt-3 mt-lg-0 default-permanent">
                                                        <button
                                                            title="Add Permanent Address"
                                                            data-type="permanent_address"
                                                            data-url="{{ route('user_contacts.store') }}"
                                                            class="btn btn-primary btn-sm add-btn waves-effect waves-light custom-btn"
                                                            type="button" data-bs-toggle="modal" data-bs-target="#addNewAddress">
                                                            Add
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row mb-primary align-items-center mt-5"> <!-- Current Address -->
                                            <div class="col-lg-4">
                                                <div class="d-flex align-items-center mb-3 mb-lg-0">
                                                    <div>
                                                        <div class="icon-box ml-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-map-pin">
                                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                                <circle cx="12" cy="10" r="3"></circle>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    Current address
                                                </div>
                                            </div>

                                            @if(isset($user_current_address) && !empty($user_current_address))
                                                @php
                                                    $current_address = json_decode($user_current_address['value']);
                                                @endphp
                                                <div class="col-lg-4">
                                                    <p class="mb-0">
                                                        {{ $current_address->details??'' }}
                                                    </p>
                                                    <p class="mb-0">
                                                        {{ $current_address->city??'' }}
                                                    </p>
                                                    <p class="mb-0">
                                                        {{ $current_address->area??'' }},
                                                        {{ $current_address->state??'' }},
                                                        {{ $current_address->zip_code??'' }},
                                                        {{ $current_address->country??'' }}
                                                    </p>
                                                    <div class="d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-phone primary-text-color mr-2" sheight="15">
                                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                                        </svg>
                                                        <p class="mb-0">
                                                            {{ $current_address->phone_number??'' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 mt-3">
                                                    <div class="text-right mt-3 mt-lg-0">
                                                        <div role="group" aria-label="Default action" class="btn-group btn-group-action">
                                                            <button
                                                                data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Edit Current Address"
                                                                data-edit-url="{{ route('user_contacts.edit', $user_current_address->id) }}"
                                                                data-url="{{ route('user_contacts.update', $user_current_address->id) }}"
                                                                class="btn edit-btn"
                                                                type="button" data-bs-toggle="modal" data-bs-target="#addNewAddress"
                                                                >
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit">
                                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                                </svg>
                                                            </button>
                                                            <button
                                                                data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Delete"
                                                                data-slug="{{ $user_current_address->id }}"
                                                                data-del-url="{{ route('user_contacts.destroy', $user_current_address->id) }}"
                                                                class="btn delete">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-trash-2">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-lg-4">
                                                    <p class="text-muted mb-0">Not added yet</p>
                                                </div>
                                                <div class="col-lg-3 mt-3">
                                                    <div class="text-right mt-3 mt-lg-0">
                                                        <button
                                                            title="Add Current Address"
                                                            data-type="current_address"
                                                            data-url="{{ route('user_contacts.store') }}"
                                                            class="btn btn-primary btn-sm add-btn waves-effect waves-light custom-btn"
                                                            type="button" data-bs-toggle="modal" data-bs-target="#addNewAddress">
                                                            Add
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-emergency-contact" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <div class="content py-primary">
                                <div id="Emergency Contacts-12">
                                    @if(isset($user_emergency_contacts) && !empty($user_emergency_contacts))
                                        @foreach ($user_emergency_contacts as $user_emergency_contact)
                                            @php $contact_details = json_decode($user_emergency_contact->value); @endphp
                                            <div class="row mb-primary mt-5" id="id-{{ $user_emergency_contact->id }}">
                                                <div class="col-lg-4">
                                                    <div class="d-flex align-items-center mb-3 mb-lg-0">
                                                        <div>
                                                            <div class="icon-box mr-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-user">
                                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        {{ isset($contact_details->name)?$contact_details->name:'' }}
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-users primary-text-color">
                                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="9" cy="7" r="4"></circle>
                                                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <p class="mb-0">{{ isset($contact_details->relationship)?$contact_details->relationship:'' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mt-2">
                                                        <div class="mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-phone primary-text-color">
                                                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <p class="mb-0">{{ isset($contact_details->phone_number)?$contact_details->phone_number:'' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mt-2">
                                                        <div class="mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-map-pin primary-text-color">
                                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                                <circle cx="12" cy="10" r="3"></circle>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <p class="mb-0">{{ isset($contact_details->address_details)?$contact_details->address_details:'' }}</p>
                                                            <p class="mb-0"> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="text-right mt-3 mt-lg-0">
                                                        <div role="group" aria-label="Default action" class="btn-group btn-group-action">
                                                            <button
                                                                data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Edit Emergency Contact"
                                                                type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#addEmergencyContact"
                                                                data-edit-url="{{ route('user_contacts.edit', $user_emergency_contact->id) }}"
                                                                data-url="{{ route('user_contacts.update', $user_emergency_contact->id) }}"
                                                                class="btn edit-btn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit">
                                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                                </svg>
                                                            </button>

                                                            <button
                                                                data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Delete"
                                                                data-slug="{{ $user_emergency_contact->id }}"
                                                                data-del-url="{{ route('user_contacts.destroy', $user_emergency_contact->id) }}"
                                                                class="btn delete">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-trash-2">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="row align-items-center mt-5">
                                        <div class="col-lg-4">
                                            <div class="d-flex align-items-center mb-3 mb-lg-0">
                                                <div>
                                                    <div class="icon-box mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-user-plus">
                                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="8.5" cy="7" r="4"></circle>
                                                            <line x1="20" y1="8" x2="20" y2="14"></line>
                                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                                        </svg>
                                                    </div>
                                                </div>
                                                Emergency Contact
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <p class="text-muted mb-0">
                                                You can add multiple contacts
                                            </p>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="text-right">
                                                <button
                                                    title="Add Emergency Contact"
                                                    data-type="emergency_contact"
                                                    data-url="{{ route('user_contacts.store') }}"
                                                    class="btn btn-primary btn-sm add-btn waves-effect waves-light custom-btn"
                                                    type="button" data-bs-toggle="modal" data-bs-target="#addEmergencyContact">
                                                    Add
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-job-history" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <!-- Timeline Advanced-->
                            <div class="col-xl-12">
                                <h5 class="card-header">Job History</h5>
                                <div class="card-body pb-0">
                                    <ul class="timeline mt-3 mb-0">
                                        @foreach ($job_histories as $job_history)
                                            <li class="timeline-item timeline-item-secondary pb-3 border-0">
                                                <span class="timeline-indicator timeline-indicator-primary">
                                                    <i class="ti ti-send"></i>
                                                </span>
                                                <div class="timeline-event">
                                                    <div class="timeline-header border-bottom mb-3">
                                                        <h6 class="mb-0">{{ $job_history->designation->title??'-' }}</h6>
                                                        <span class="text-muted">{{ date('d F Y', strtotime($job_history->joining_date)) }}</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between flex-wrap mb-2">
                                                        <div>
                                                            <span>
                                                                @if(isset($job_history->user->departmentBridge->department) && !empty($job_history->user->departmentBridge->department))
                                                                    {{ $job_history->user->departmentBridge->department->name }}
                                                                @endif
                                                            </span>
                                                            <i class="ti ti-arrow-right scaleX-n1-rtl mx-3"></i>
                                                            <span>PRK.
                                                                @if(isset($job_history->salary) && !empty($job_history->salary->salary))
                                                                    {{ number_format($job_history->salary->salary, 2) }}
                                                                @else
                                                                -
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div>
                                                            @if(!empty($job_history->salary->effective_date))
                                                                Effected Date: <span>{{ date('d F Y', strtotime($job_history->salary->effective_date)) }}</span>
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <a href="javascript:void(0)" target="_blank">
                                                        <i class="ti ti-link"></i>
                                                        Appointment Letter.
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- /Timeline Advanced-->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-notification" role="tabpanel">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0">Billing Address</h5>
                        <div class="card-action-element">
                        <button
                            class="btn btn-primary btn-sm edit-address"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#addNewAddress"
                        >
                            Edit address
                        </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-xl-7 col-12">
                            <dl class="row mb-0">
                            <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Company Name:</dt>
                            <dd class="col-sm-8">Vuexy</dd>

                            <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Billing Email:</dt>
                            <dd class="col-sm-8">user@ex.com</dd>

                            <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Tax ID:</dt>
                            <dd class="col-sm-8">TAX-357378</dd>

                            <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">VAT Number:</dt>
                            <dd class="col-sm-8">SDF754K77</dd>

                            <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Billing Address:</dt>
                            <dd class="col-sm-8">
                                100 Water Plant <br />Avenue, Building 1303<br />
                                Wake Island
                            </dd>
                            </dl>
                        </div>
                        <div class="col-xl-5 col-12">
                            <dl class="row mb-0">
                            <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Contact:</dt>
                            <dd class="col-sm-8">+1 (605) 977-32-65</dd>

                            <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Country:</dt>
                            <dd class="col-sm-8">Wake Island</dd>

                            <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">State:</dt>
                            <dd class="col-sm-8">Capholim</dd>

                            <dt class="col-sm-4 mb-2 fw-semibold text-nowrap">Zipcode:</dt>
                            <dd class="col-sm-8">403114</dd>
                            </dl>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <!-- Add New Address Modal -->
        <div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
            <div class="modal-content p-3 p-md-5">
              <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                  <h3 class="address-title mb-2" id="modal-label">Add New Address</h3>
                </div>
                <form id="create-form" class="row g-3" data-modal-id="addNewAddress" data-method="" action="">
                    @csrf

                    <input type="hidden" name="type" id="form-type">
                    <span id="edit-content">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="details">Address Details</label>
                            <textarea name="details" id="details" class="form-control" rows="3" placeholder="Enter address details"></textarea>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <span id="details_error" class="text-danger error"></span>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="area">Area</label>
                                <input
                                type="text"
                                id="area"
                                name="area"
                                class="form-control"
                                placeholder="Enter area name"
                                />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="area_error" class="text-danger error"></span>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="city">City</label>
                                <input
                                type="text"
                                id="city"
                                name="city"
                                class="form-control"
                                placeholder="Enter city name"
                                />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="city_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="state">State</label>
                                <input
                                type="text"
                                id="state"
                                name="state"
                                class="form-control"
                                placeholder="Enter state name"
                                />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="state_error" class="text-danger error"></span>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="zip_code">Zip code</label>
                                <input
                                type="text"
                                id="zip_code"
                                name="zip_code"
                                class="form-control"
                                placeholder="Enter zip code"
                                />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="zip_code_error" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="country">Country</label>
                                <select
                                    id="country"
                                    name="country"
                                    class="select2 form-select"
                                    data-allow-clear="true"
                                >
                                    <option value="pakistan" selected>Pakistan</option>
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="country_error" class="text-danger error"></span>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="phone_number">Phone Number</label>
                                <input
                                    type="text"
                                    id="phone_number"
                                    name="phone_number"
                                    class="form-control"
                                    placeholder="Enter phone number"
                                />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="phone_number_error" class="text-danger error"></span>
                            </div>
                        </div>
                    </span>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
                        <button
                            type="reset"
                            class="btn btn-label-secondary"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        >
                        Cancel
                        </button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--/ Add New Address Modal -->

        <!-- Add Emergency Contact Modal -->
        <div class="modal fade" id="addEmergencyContact" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
              <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="text-center mb-4">
                    <h3 class="address-title mb-2" id="modal-label"></h3>
                  </div>
                  <form id="create-form" class="row g-3" data-modal-id="addEmergencyContact" data-method="" action="">
                      @csrf

                      <input type="hidden" name="type" id="form-type">
                      <span id="edit-content">
                          <div class="row mt-2">
                              <div class="col-12 col-md-6">
                                  <label class="form-label" for="name">Name</label>
                                  <input
                                  type="text"
                                  id="name"
                                  name="name"
                                  class="form-control"
                                  placeholder="Enter name"
                                  />
                                  <div class="fv-plugins-message-container invalid-feedback"></div>
                                  <span id="name_error" class="text-danger error"></span>
                              </div>
                              <div class="col-12 col-md-6">
                                  <label class="form-label" for="relationship">Relationship</label>
                                  <input
                                  type="text"
                                  id="relationship"
                                  name="relationship"
                                  class="form-control"
                                  placeholder="Enter relationship"
                                  />
                                  <div class="fv-plugins-message-container invalid-feedback"></div>
                                  <span id="relationship_error" class="text-danger error"></span>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-12 col-md-6">
                                  <label class="form-label" for="phone_number">Phone Number</label>
                                  <input
                                  type="text"
                                  id="phone_number"
                                  name="phone_number"
                                  class="form-control"
                                  placeholder="Enter phone number"
                                  />
                                  <div class="fv-plugins-message-container invalid-feedback"></div>
                                  <span id="phone_number_error" class="text-danger error"></span>
                              </div>
                              <div class="col-12 col-md-6">
                                  <label class="form-label" for="email">Email</label>
                                  <input
                                  type="text"
                                  id="email"
                                  name="email"
                                  class="form-control"
                                  placeholder="Enter email"
                                  />
                                  <div class="fv-plugins-message-container invalid-feedback"></div>
                                  <span id="email_error" class="text-danger error"></span>
                              </div>
                          </div>
                          <div class="col-12 col-md-12">
                            <label class="form-label" for="address_details">Address Details</label>
                            <textarea name="address_details" id="" rows="4" class="form-control" placeholder="Enter address details"></textarea>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <span id="address_details_error" class="text-danger error"></span>
                        </div>
                          <div class="row mt-2">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="city">City</label>
                                <input
                                type="text"
                                id="city"
                                name="city"
                                class="form-control"
                                placeholder="Enter city name"
                                />
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="city_error" class="text-danger error"></span>
                            </div>
                              <div class="col-12 col-md-6">
                                  <label class="form-label" for="country">Country</label>
                                  <select
                                      id="country"
                                      name="country"
                                      class="select2 form-select"
                                      data-allow-clear="true"
                                  >
                                      <option value="pakistan" selected>Pakistan</option>
                                  </select>
                                  <div class="fv-plugins-message-container invalid-feedback"></div>
                                  <span id="country_error" class="text-danger error"></span>
                              </div>
                          </div>
                      </span>
                      <div class="col-12 text-center">
                          <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
                          <button
                              type="reset"
                              class="btn btn-label-secondary"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                          >
                          Cancel
                          </button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--/ Add New Address Modal -->
      </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // When the file input changes
            $('#cover_image_id').change(function() {
                var file = this.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                // Create an image element
                var img = $('<img style="width:10%; height:5%">').attr('src', e.target.result);

                // Display the image preview
                $('#cover_image_id-preview').html(img);
                }

                // Read the image file as a data URL
                reader.readAsDataURL(file);
            });

            $('#profile').change(function() {
                var file = this.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                // Create an image element
                var img = $('<img style="width:20%; height:10%">').attr('src', e.target.result);

                // Display the image preview
                $('#profile-preview').html(img);
                }

                // Read the image file as a data URL
                reader.readAsDataURL(file);
            });
        });
    </script>
@endpush
