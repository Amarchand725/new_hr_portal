<?php $__env->startSection('title', $title.' - Cyberonix'); ?>
<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('public/admin/assets/vendor/css/pages/page-profile.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')); ?>" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-md-12">
         <div class="card mb-4">
            <div class="user-profile-header-banner">
                <?php if(isset($model->profile->coverImage) && !empty($model->profile->coverImage)): ?>
                    <img src="<?php echo e(asset('public/admin/assets/img/pages')); ?>/<?php echo e($model->profile->coverImage->image); ?>" alt="Banner image" class="rounded-top img-fluid">
                <?php else: ?>
                    <img src="<?php echo e(asset('public/admin/assets/img/pages/default.jpg')); ?>" alt="Banner image" class="rounded-top img-fluid">
                <?php endif; ?>
            </div>
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
               <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                  <img src="<?php echo e(asset('public/admin/assets/img/avatars/14.png')); ?>" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
               </div>
               <div class="flex-grow-1 mt-3 mt-sm-5">
                  <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                     <div class="user-profile-info">
                        <h4><?php echo e($model->first_name); ?> <?php echo e($model->last_name); ?></h4>
                        <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                           <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Designation">
                              <i class="ti ti-id-badge-2"></i>
                              <?php if(isset($model->jobHistory->designation) && !empty($model->jobHistory->designation->title)): ?>
                                <?php echo e($model->jobHistory->designation->title); ?>

                              <?php else: ?>
                                -
                              <?php endif; ?>
                           </li>
                           <li class="list-inline-item">
                              <i class="ti ti-send"></i> <?php echo e($model->email??'-'); ?>

                           </li>
                           <li class="list-inline-item">
                              <i class="ti ti-calendar"></i> Joined
                              <?php if(isset($model->jobHistory) && !empty($model->jobHistory->joining_date)): ?>
                                <?php echo e(date('F Y', strtotime($model->jobHistory->joining_date))); ?>

                              <?php else: ?>
                                -
                              <?php endif; ?>
                           </li>
                        </ul>
                     </div>
                     <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary waves-effect waves-light">
                     <i class="ti ti-user-check me-1"></i>View Profile
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 mb-4 col-lg-5 col-12">
         <div class="card">
            <div class="d-flex align-items-end row">
               <div class="col-7">
                  <div class="card-body text-nowrap">
                     <h5 class="card-title mb-3">Congratulations <?php echo e($model->first_name); ?>! 🎉</h5>
                     <p class="mb-3">Are you all set to take your productivity <br/> to the max 🚀 ?
                        Good luck for your day <br/> ahead 😎!
                     </p>
                     <p class="mb-3">Are you all set to take your productivity <br/>
                     </p>
                     <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary ">View Profile</a>
                  </div>
               </div>
               <div class="col-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                     <img src="<?php echo e(asset('public/admin/assets/img/illustrations/card-advance-sale.png')); ?>" height="140" alt="view sales">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
               <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamlateinModal">
                  <div class="card">
                     <div class="card-body pb-0">
                        <div class="card-icon">
                           <span class="badge bg-label-warning rounded-pill p-2">
                           <i class="ti ti-credit-card ti-sm"></i>
                           </span>
                        </div>
                        <h5 class="card-title mb-0 mt-2">Late-In Summary</h5>
                        <small class="text-muted">4 Late-in</small>
                     </div>
                     <div id="lateinSummary"></div>
                  </div>
               </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
               <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamhalfdayModal">
                  <div class="card">
                     <div class="card-body pb-0">
                        <div class="card-icon">
                           <span class="badge bg-label-danger rounded-pill p-2">
                           <i class="ti ti-credit-card ti-sm"></i>
                           </span>
                        </div>
                        <h5 class="card-title mb-0 mt-2">Half Day Summary</h5>
                        <small class="text-muted">4 Half Day</small>
                     </div>
                     <div id="halfdaySummary"></div>
                  </div>
               </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
               <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamabsentModal">
                  <div class="card">
                     <div class="card-body pb-0">
                        <div class="card-icon">
                           <span class="badge bg-label-danger rounded-pill p-2">
                           <i class="ti ti-credit-card ti-sm"></i>
                           </span>
                        </div>
                        <h5 class="card-title mb-0 mt-2">Absent Summary</h5>
                        <small class="text-muted">4 Absent</small>
                     </div>
                     <div id="absentSummary"></div>
                  </div>
               </a>
            </div>
         </div>
      </div>
      <div class="col-12">
         <div class="row">
            <div class="col-md-4">
               <div class="card">
                  <h5 class="card-header">News & Update</h5>
                  <div class="card-body pb-0">
                     <ul class="timeline mb-0">
                        <li class="timeline-item timeline-item-transparent">
                           <span class="timeline-point timeline-point-primary"></span>
                           <div class="timeline-event">
                              <div class="timeline-header border-bottom mb-3">
                                 <h6 class="mb-0">Dear Employees,</h6>
                                 <span class="text-primary">3rd October</span>
                              </div>
                              <div class="d-flex justify-content-between flex-wrap mb-2">
                                 <div>
                                    <span class="mb-3 d-block">As part of our efforts to streamline our payment processes, we would like to request that all employees provide their IBAN # through the form provided below.</span>
                                    <span class="mb-3 d-block">Please take a few moments to fill out the form with your accurate and complete IBAN information. This will ensure that your salaries, arrears, and reimbursements, are processed efficiently and without delay.</span>
                                    <span class="mb-3 d-block">If you encounter any issues or have any questions, please reach out to Sameer at +92 336 1227503. Thank you for your cooperation in this matter.
                                    Management,
                                    Cyberonix Consulting</span>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="timeline-item timeline-item-transparent">
                           <span class="timeline-point timeline-point-primary"></span>
                           <div class="timeline-event">
                              <div class="timeline-header border-bottom mb-3">
                                 <h6 class="mb-0">Dear Employees,</h6>
                                 <span class="text-primary">3rd October</span>
                              </div>
                              <div class="d-flex justify-content-between flex-wrap mb-2">
                                 <div>
                                    <span class="mb-3 d-block">As part of our efforts to streamline our payment processes, we would like to request that all employees provide their IBAN # through the form provided below.</span>
                                    <span class="mb-3 d-block">Please take a few moments to fill out the form with your accurate and complete IBAN information. This will ensure that your salaries, arrears, and reimbursements, are processed efficiently and without delay.</span>
                                    <span class="mb-3 d-block">If you encounter any issues or have any questions, please reach out to Sameer at +92 336 1227503. Thank you for your cooperation in this matter.
                                    Management,
                                    Cyberonix Consulting</span>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-md-8">
               <div class="row">
                  <div class="col-lg-6 col-sm-6">
                     <div class="col-12 mb-4">
                        <div class="card">
                           <div class="card-header">
                              <div class="d-flex justify-content-between">
                                 <small class="d-block mb-1 text-muted">Today Summary</small>
                                 <p class="card-text text-danger">Late In</p>
                              </div>
                              <h4 class="card-title mb-1">26-May-2023</h4>
                           </div>
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-5">
                                    <div class="d-flex gap-2 align-items-center mb-2">
                                       <span class="badge bg-label-info p-1 rounded"
                                          ><i class="ti ti-arrow-bar-to-down ti-xs"></i
                                          ></span>
                                       <p class="mb-0">Check In</p>
                                    </div>
                                    <h5 class="mb-0 pt-1 text-nowrap">09:31 AM</h5>
                                 </div>
                                 <div class="col-2">
                                    <div class="divider divider-vertical">
                                    </div>
                                 </div>
                                 <div class="col-5  text-end">
                                    <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
                                       <p class="mb-0">Check Out</p>
                                       <span class="badge bg-label-danger p-1 rounded"><i class="ti ti-arrow-bar-up ti-xs"></i></span>
                                    </div>
                                    <h5 class="mb-0 pt-1 text-nowrap ms-lg-n3 ms-xl-0">09:31 AM</h5>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center mt-4">
                                 <div class="progress w-100" style="height: 8px">
                                    <div
                                       class="progress-bar bg-info"
                                       style="width: 70%"
                                       role="progressbar"
                                       aria-valuenow="70"
                                       aria-valuemin="0"
                                       aria-valuemax="100"
                                       ></div>
                                    <div
                                       class="progress-bar bg-danger"
                                       role="progressbar"
                                       style="width: 30%"
                                       aria-valuenow="30"
                                       aria-valuemin="0"
                                       aria-valuemax="100"
                                       ></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 mb-4">
                        <div class="card h-100">
                           <div class="card-header d-flex justify-content-between pb-0">
                              <div class="card-title">
                                 <h5 class="m-0 me-2">Team Discrepancy & Leaves</h5>
                                 <small class="text-muted">This Month</small>
                              </div>
                              <div class="dropdown">
                                 <button class="btn p-0" type="button" id="salesByCountryTabs" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountryTabs">
                                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                 </div>
                              </div>
                           </div>
                           <div class="nav-align-top">
                              <div class="card-body pb-3 pt-1">
                                 <ul class="nav nav-tabs nav-fill" role="tablist">
                                    <li class="nav-item">
                                       <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-discrepancy" aria-controls="navs-justified-discrepancy" aria-selected="true">Discrepancy</button>
                                    </li>
                                    <li class="nav-item">
                                       <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-leaves" aria-controls="navs-justified-leaves" aria-selected="false">Leaves</button>
                                    </li>
                                 </ul>
                              </div>
                              <div class="tab-content p-0 pt-2 pb-2">
                                 <div class="tab-pane fade show active" id="navs-justified-discrepancy" role="tabpanel">
                                    <div class="table-responsive text-nowrap scroll-bottom">
                                       <div class="text-end mb-3 pe-3">
                                          <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamdiscrepancyModal" class="btn btn-primary waves-effect waves-light btn-sm">View All</a>
                                          <a href="javascript:;" class="btn btn-secondary waves-effect waves-light btn-sm">Approve All</a>
                                       </div>
                                       <table class="table table-striped">
                                          <thead>
                                             <tr>
                                                <th>
                                                   <div>
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                   </div>
                                                </th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Behavior</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody class="table-border-bottom-0">
                                             <tr>
                                                <td>
                                                   <div>
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex justify-content-start align-items-center user-name">
                                                      <div class="avatar-wrapper">
                                                         <div class="avatar me-2">
                                                            <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                         </div>
                                                      </div>
                                                      <div class="d-flex flex-column">
                                                         <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td>26-04-2023</td>
                                                <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                                <td>
                                                   <div class="text-end pe-4">
                                                      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#discrepancyModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                         </svg>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <div>
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex justify-content-start align-items-center user-name">
                                                      <div class="avatar-wrapper">
                                                         <div class="avatar me-2">
                                                            <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                         </div>
                                                      </div>
                                                      <div class="d-flex flex-column">
                                                         <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td>26-04-2023</td>
                                                <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                                <td>
                                                   <div class="text-end pe-4">
                                                      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#dicrepancyModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                         </svg>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <div>
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex justify-content-start align-items-center user-name">
                                                      <div class="avatar-wrapper">
                                                         <div class="avatar me-2">
                                                            <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                         </div>
                                                      </div>
                                                      <div class="d-flex flex-column">
                                                         <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td>26-04-2023</td>
                                                <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                                <td>
                                                   <div class="text-end pe-4">
                                                      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#discrepancyModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                         </svg>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <div>
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex justify-content-start align-items-center user-name">
                                                      <div class="avatar-wrapper">
                                                         <div class="avatar me-2">
                                                            <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                         </div>
                                                      </div>
                                                      <div class="d-flex flex-column">
                                                         <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td>26-04-2023</td>
                                                <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                                <td>
                                                   <div class="text-end pe-4">
                                                      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#discrepancyModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                         </svg>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <div>
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex justify-content-start align-items-center user-name">
                                                      <div class="avatar-wrapper">
                                                         <div class="avatar me-2">
                                                            <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                         </div>
                                                      </div>
                                                      <div class="d-flex flex-column">
                                                         <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td>26-04-2023</td>
                                                <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                                <td>
                                                   <div class="text-end pe-4">
                                                      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#discrepancyModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                         </svg>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <div>
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex justify-content-start align-items-center user-name">
                                                      <div class="avatar-wrapper">
                                                         <div class="avatar me-2">
                                                            <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                         </div>
                                                      </div>
                                                      <div class="d-flex flex-column">
                                                         <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td>26-04-2023</td>
                                                <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                                <td>
                                                   <div class="text-end pe-4">
                                                      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#discrepancyModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                         </svg>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <div>
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="d-flex justify-content-start align-items-center user-name">
                                                      <div class="avatar-wrapper">
                                                         <div class="avatar me-2">
                                                            <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                         </div>
                                                      </div>
                                                      <div class="d-flex flex-column">
                                                         <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td>26-04-2023</td>
                                                <td><span class="badge bg-label-danger me-1"> Early-out</span></td>
                                                <td>
                                                   <div class="text-end pe-4">
                                                      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#discrepancyModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                         </svg>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <div class="tab-pane fade" id="navs-justified-leaves" role="tabpanel">
                                    <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                                       <div class="table-responsive text-nowrap scroll-bottom">
                                          <div class="text-end mb-3 pe-3">
                                          <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamleavesModal" class="btn btn-primary waves-effect waves-light btn-sm">View All</a>
                                             <a href="javascript:;" class="btn btn-secondary waves-effect waves-light btn-sm">Approve All</a>
                                          </div>
                                          <table class="table table-striped">
                                             <thead>
                                                <tr>
                                                   <th>
                                                      <div>
                                                         <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                      </div>
                                                   </th>
                                                   <th>Name</th>
                                                   <th>Date</th>
                                                   <th>Behavior</th>
                                                   <th>Leave duration</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody class="table-border-bottom-0">
                                                <tr>
                                                   <td>
                                                      <div>
                                                         <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <div class="d-flex justify-content-start align-items-center user-name">
                                                         <div class="avatar-wrapper">
                                                            <div class="avatar me-2">
                                                               <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                            </div>
                                                         </div>
                                                         <div class="d-flex flex-column">
                                                            <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td>26-04-2023</td>
                                                   <td><span> Half-Day</span></td>
                                                   <td><span class="badge bg-label-danger me-1"> Casual</span></td>
                                                   <td>
                                                      <div class="text-end pe-4">
                                                         <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#leavesModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                               <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                            </svg>
                                                         </a>
                                                      </div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>
                                                      <div>
                                                         <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <div class="d-flex justify-content-start align-items-center user-name">
                                                         <div class="avatar-wrapper">
                                                            <div class="avatar me-2">
                                                               <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                            </div>
                                                         </div>
                                                         <div class="d-flex flex-column">
                                                            <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td>26-04-2023</td>
                                                   <td><span>Half-Day</span></td>
                                                   <td><span class="badge bg-label-danger me-1">Half-Day</span></td>
                                                   <td>
                                                      <div class="text-end pe-4">
                                                         <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#leavesModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                               <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                            </svg>
                                                         </a>
                                                      </div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>
                                                      <div>
                                                         <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <div class="d-flex justify-content-start align-items-center user-name">
                                                         <div class="avatar-wrapper">
                                                            <div class="avatar me-2">
                                                               <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                            </div>
                                                         </div>
                                                         <div class="d-flex flex-column">
                                                            <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td>26-04-2023</td>
                                                   <td><span> 1 Day</span></td>
                                                   <td><span class="badge bg-label-danger me-1">Half-Day</span></td>
                                                   <td>
                                                      <div class="text-end pe-4">
                                                         <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#leavesModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                               <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                            </svg>
                                                         </a>
                                                      </div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>
                                                      <div>
                                                         <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <div class="d-flex justify-content-start align-items-center user-name">
                                                         <div class="avatar-wrapper">
                                                            <div class="avatar me-2">
                                                               <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                            </div>
                                                         </div>
                                                         <div class="d-flex flex-column">
                                                            <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td>26-04-2023</td>
                                                   <td><span>Half-Day</span></td>
                                                   <td><span class="badge bg-label-danger me-1"> Casual</span></td>
                                                   <td>
                                                      <div class="text-end pe-4">
                                                         <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#leavesModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                               <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                            </svg>
                                                         </a>
                                                      </div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>
                                                      <div>
                                                         <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <div class="d-flex justify-content-start align-items-center user-name">
                                                         <div class="avatar-wrapper">
                                                            <div class="avatar me-2">
                                                               <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                            </div>
                                                         </div>
                                                         <div class="d-flex flex-column">
                                                            <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td>26-04-2023</td>
                                                   <td><span>1 day</span></td>
                                                   <td><span class="badge bg-label-danger me-1">Half-Day</span></td>
                                                   <td>
                                                      <div class="text-end pe-4">
                                                         <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#leavesModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                               <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                            </svg>
                                                         </a>
                                                      </div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>
                                                      <div>
                                                         <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <div class="d-flex justify-content-start align-items-center user-name">
                                                         <div class="avatar-wrapper">
                                                            <div class="avatar me-2">
                                                               <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                            </div>
                                                         </div>
                                                         <div class="d-flex flex-column">
                                                            <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td>26-04-2023</td>
                                                   <td><span>1 Day</span></td>
                                                   <td><span class="badge bg-label-danger me-1"> Casual</span></td>
                                                   <td>
                                                      <div class="text-end pe-4">
                                                         <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#leavesModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                               <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                            </svg>
                                                         </a>
                                                      </div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>
                                                      <div>
                                                         <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                                      </div>
                                                   </td>
                                                   <td>
                                                      <div class="d-flex justify-content-start align-items-center user-name">
                                                         <div class="avatar-wrapper">
                                                            <div class="avatar me-2">
                                                               <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                                            </div>
                                                         </div>
                                                         <div class="d-flex flex-column">
                                                            <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td>26-04-2023</td>
                                                   <td><span> Early-out</span></td>
                                                   <td><span class="badge bg-label-danger me-1">Half-Day</span></td>
                                                   <td>
                                                      <div class="text-end pe-4">
                                                         <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#leavesModal" class="btn btn-secondary btn-xxs waves-effect waves-light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-filled" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                               <path d="M14 3.072a8 8 0 0 1 2.617 11.424l4.944 4.943a1.5 1.5 0 0 1 -2.008 2.225l-.114 -.103l-4.943 -4.944a8 8 0 0 1 -12.49 -6.332l-.006 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643z" stroke-width="0" fill="currentColor"></path>
                                                            </svg>
                                                         </a>
                                                      </div>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-12 mb-4">
                           <div class="card">
                              <div class="card-header d-flex align-items-center justify-content-between">
                              <div>
                                 <h5 class="card-title mb-0">Team Summary</h5>
                                 <small class="text-muted">Today</small>
                              </div>
                              <div class="dropdown d-none d-sm-flex">
                              <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamfilterModal" class="btn btn-primary waves-effect waves-light btn-sm">View All</a>
                              </div>
                              </div>
                              <div class="card-body">
                              <div id="teamChart"></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="card">
                              <div class="row">
                                 <div class="col-md-6">
                                    <h5 class="card-header mt-1">My Team</h5>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="text-end mt-4 pe-4">
                                       <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamModal" class="btn btn-primary waves-effect waves-light btn-sm">View All</a>
                                    </div>
                                 </div>
                              </div>

                              <div class="table-responsive text-nowrap">
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th>Name</th>
                                          <th>Status</th>
                                       </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                       <tr>
                                          <td>
                                             <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="avatar-wrapper">
                                                   <div class="avatar me-2">
                                                      <img src="<?php echo e(asset('public/admin/assets/img/avatars/3.png')); ?>" alt="Avatar" class="rounded-circle">
                                                   </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                   <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                   <small class="emp_post text-truncate text-muted">Software Test Engineer</small>
                                                </div>
                                             </div>
                                          </td>
                                          <td><span class="badge bg-label-success me-1">Permanent</span></td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="avatar-wrapper">
                                                   <div class="avatar me-2">
                                                      <img src="<?php echo e(asset('public/admin/assets/img/avatars/3.png')); ?>" alt="Avatar" class="rounded-circle">
                                                   </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                   <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                   <small class="emp_post text-truncate text-muted">Software Test Engineer</small>
                                                </div>
                                             </div>
                                          </td>
                                          <td><span class="badge bg-label-success me-1">Permanent</span></td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="avatar-wrapper">
                                                   <div class="avatar me-2">
                                                      <img src="<?php echo e(asset('public/admin/assets/img/avatars/3.png')); ?>" alt="Avatar" class="rounded-circle">
                                                   </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                   <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                   <small class="emp_post text-truncate text-muted">Software Test Engineer</small>
                                                </div>
                                             </div>
                                          </td>
                                          <td><span class="badge bg-label-success me-1">Permanent</span></td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="avatar-wrapper">
                                                   <div class="avatar me-2">
                                                      <img src="<?php echo e(asset('public/admin/assets/img/avatars/3.png')); ?>" alt="Avatar" class="rounded-circle">
                                                   </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                   <span class="emp_name text-truncate">Glyn Giacoppo</span>
                                                   <small class="emp_post text-truncate text-muted">Software Test Engineer</small>
                                                </div>
                                             </div>
                                          </td>
                                          <td><span class="badge bg-label-warning me-1">Prohibition</span></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="teamabsentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="text-start mb-4">
                  <h3 class="mb-2">Team Summary</h3>
               </div>
               <div class="table-responsive text-nowrap">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Punched In</th>
                           <th>Punched Out</th>
                           <th>Behavior</th>
                        </tr>
                     </thead>
                     <tbody class="table-border-bottom-0">
                        <tr class="bg-label-danger">
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/4.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>-</td>
                           <td>-</td>
                           <td><span class="badge bg-danger me-1">Absent</span></td>
                        </tr>
                        <tr class="bg-label-danger">
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/4.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>-</td>
                           <td>-</td>
                           <td><span class="badge bg-danger me-1">Absent</span></td>
                        </tr>
                        <tr class="bg-label-danger">
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/4.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>-</td>
                           <td>-</td>
                           <td><span class="badge bg-danger me-1">Absent</span></td>
                        </tr>
                        <tr class="bg-label-danger">
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/4.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>-</td>
                           <td>-</td>
                           <td><span class="badge bg-danger me-1">Absent</span></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamhalfdayModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="text-start mb-4">
                  <h3 class="mb-2">Team Summary</h3>
               </div>
               <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Punched In</th>
                           <th>Punched Out</th>
                           <th>Behavior</th>
                        </tr>
                     </thead>
                     <tbody class="table-border-bottom-0">
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/9.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>09:31 AM</td>
                           <td>10:28 AM</td>
                           <td><span class="badge bg-label-danger me-1">Half-Day</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/9.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>09:31 AM</td>
                           <td>10:28 AM</td>
                           <td><span class="badge bg-label-danger me-1">Half-Day</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/9.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>09:31 AM</td>
                           <td>10:28 AM</td>
                           <td><span class="badge bg-label-danger me-1">Half-Day</span></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamlateinModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="text-start mb-4">
                  <h3 class="mb-2">Team Summary</h3>
               </div>
               <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Punched In</th>
                           <th>Punched Out</th>
                           <th>Behavior</th>
                        </tr>
                     </thead>
                     <tbody class="table-border-bottom-0">
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/9.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>09:31 AM</td>
                           <td>10:28 AM</td>
                           <td><span class="badge bg-label-danger me-1">Late-in</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/9.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>09:31 AM</td>
                           <td>10:28 AM</td>
                           <td><span class="badge bg-label-danger me-1">Late-in</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/9.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>09:31 AM</td>
                           <td>10:28 AM</td>
                           <td><span class="badge bg-label-danger me-1">Late-in</span></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamleavesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="text-start mb-4">
                        <h3 class="mb-2">Team Leaves</h3>
                     </div>
                  </div>
                  <div class="col-md-6 text-end">
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamleavesModal" class="mt-1 btn btn-primary waves-effect waves-light btn-md">Accept All</a>
                  </div>
               </div>

               <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th>
                              <div>
                                 <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                              </div>
                           </th>
                           <th>Name</th>
                           <th>Attendance Date</th>
                           <th>Behavior</th>
                           <th>Reason</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody class="table-border-bottom-0">
                        <tr>
                           <td>
                              <div>
                                 <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                              </div>
                           </td>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/3.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>15 May 2023</td>
                           <td><span class="badge bg-label-danger me-1">Half Day</span></td>
                           <td>sick</td>
                           <td><span class="badge bg-label-warning me-1">Pending</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div>
                                 <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                              </div>
                           </td>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/3.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>15 May 2023</td>
                           <td><span class="badge bg-label-danger me-1">Half Day</span></td>
                           <td>sick</td>
                           <td><span class="badge bg-label-warning me-1">Pending</span></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamdiscrepancyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="text-start mb-4">
                        <h3 class="mb-2">Team Discrepancy</h3>
                     </div>
                  </div>
                  <div class="col-md-6 text-end">
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#teamleavesModal" class="mt-1 btn btn-primary waves-effect waves-light btn-md">Accept All</a>
                  </div>
               </div>
               <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th>
                              <div>
                                 <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                              </div>
                           </th>
                           <th>Name</th>
                           <th>Attendance Date</th>
                           <th>Attendance Time</th>
                           <th>Behavior</th>
                           <th>Applied At</th>
                           <th>Reason</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody class="table-border-bottom-0">
                        <tr>
                           <td>
                              <div>
                                 <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                              </div>
                           </td>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/3.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>08 May 2023</td>
                           <td>10:15 PM</td>
                           <td><span class="badge bg-label-danger me-1">late</span></td>
                           <td>15 May 2023 10:18 PM</td>
                           <td>did a full hour shift</td>
                           <td><span class="badge bg-label-warning me-1">Pending</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div>
                                 <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                              </div>
                           </td>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/3.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>08 May 2023</td>
                           <td>10:15 PM</td>
                           <td><span class="badge bg-label-danger me-1">late</span></td>
                           <td>15 May 2023 10:18 PM</td>
                           <td>did a full hour shift</td>
                           <td><span class="badge bg-label-success me-1">Approved</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div>
                                 <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                              </div>
                           </td>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/3.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>08 May 2023</td>
                           <td>10:15 PM</td>
                           <td><span class="badge bg-label-danger me-1">late</span></td>
                           <td>15 May 2023 10:18 PM</td>
                           <td>did a full hour shift</td>
                           <td><span class="badge bg-label-success me-1">Approved</span></td>
                        </tr>

                     </tbody>
                  </table>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamfilterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="text-start mb-4">
                  <h3 class="mb-2">Team Summary</h3>
               </div>
               <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Punched In</th>
                           <th>Punched Out</th>
                           <th>Behavior</th>
                        </tr>
                     </thead>
                     <tbody class="table-border-bottom-0">
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/3.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>09:31 AM</td>
                           <td>10:28 AM</td>
                           <td><span class="badge bg-label-danger me-1">Half-Day</span></td>
                        </tr>
                        <tr class="bg-label-danger">
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/4.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>-</td>
                           <td>-</td>
                           <td><span class="badge bg-danger me-1">Absent</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/9.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>09:31 AM</td>
                           <td>10:28 AM</td>
                           <td><span class="badge bg-label-success me-1">Regular</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/12.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>09:31 AM</td>
                           <td>10:28 AM</td>
                           <td><span class="badge bg-label-danger me-1">Late in</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/13.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>09:31 AM</td>
                           <td>10:28 AM</td>
                           <td><span class="badge bg-label-danger me-1">Early out</span></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="teamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="text-start mb-4">
                  <h3 class="mb-2">My Team</h3>
               </div>
               <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>ID</th>
                           <th>Email</th>
                           <th>Number</th>
                           <th>Joining Date</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody class="table-border-bottom-0">
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/3.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>4966</td>
                           <td>muhammad.yousuf@abtach.org</td>
                           <td>03343624253</td>
                           <td>05-10-2021</td>
                           <td><span class="badge bg-label-success me-1">Permanent</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/1.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>4966</td>
                           <td>muhammad.yousuf@abtach.org</td>
                           <td>03343624253</td>
                           <td>05-10-2021</td>
                           <td><span class="badge bg-label-success me-1">Permanent</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/2.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>4966</td>
                           <td>muhammad.yousuf@abtach.org</td>
                           <td>03343624253</td>
                           <td>05-10-2021</td>
                           <td><span class="badge bg-label-success me-1">Permanent</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/4.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>4966</td>
                           <td>muhammad.yousuf@abtach.org</td>
                           <td>03343624253</td>
                           <td>05-10-2021</td>
                           <td><span class="badge bg-label-success me-1">Permanent</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/5.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>4966</td>
                           <td>muhammad.yousuf@abtach.org</td>
                           <td>03343624253</td>
                           <td>05-10-2021</td>
                           <td><span class="badge bg-label-success me-1">Permanent</span></td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center user-name">
                                 <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                       <img src="<?php echo e(asset('public/admin/assets/img/avatars/6.png')); ?>" alt="Avatar" class="rounded-circle">
                                    </div>
                                 </div>
                                 <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate">Muhammad Yousuf Khan</span>
                                    <small class="emp_post text-truncate text-muted">Senior Executive UI/UX</small>
                                 </div>
                              </div>
                           </td>
                           <td>4966</td>
                           <td>muhammad.yousuf@abtach.org</td>
                           <td>03343624253</td>
                           <td>05-10-2021</td>
                           <td><span class="badge bg-label-success me-1">Permanent</span></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="discrepancyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="text-start mb-4">
                  <h3 class="mb-2">Detail</h3>
               </div>
               <table class="table table-striped">
                  <tbody class="table-border-bottom-0">
                     <tr>
                        <th>Employee</th>
                        <td>
                           <div class="d-flex justify-content-start align-items-center user-name">
                              <div class="avatar-wrapper">
                                 <div class="avatar me-2">
                                    <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                 </div>
                              </div>
                              <div class="d-flex flex-column">
                                 <span class="emp_name text-truncate">Glyn Giacoppo</span>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th>Attendance Date</th>
                        <td>31 Mar 2023</td>
                     </tr>
                     <tr>
                        <th>Attendance Time</th>
                        <td>10:55 PM</td>
                     </tr>
                     <tr>
                        <th>Wroking Hours</th>
                        <td>8 Hours</td>
                     </tr>
                     <tr>
                        <th>Type</th>
                        <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                     </tr>
                     <tr>
                        <th>Status</th>
                        <td><span class="badge bg-label-warning me-1"> Pending</span></td>
                     </tr>
                     <tr>
                        <th>Applied At</th>
                        <td>26 Apr 2023 03:06 AM</td>
                     </tr>
                     <tr>
                        <th>Reason</th>
                        <td>Sick</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Approve</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="leavesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="text-start mb-4">
                  <h3 class="mb-2">Detail</h3>
               </div>
               <table class="table table-striped">
                  <tbody class="table-border-bottom-0">
                     <tr>
                        <th>Employee</th>
                        <td>
                           <div class="d-flex justify-content-start align-items-center user-name">
                              <div class="avatar-wrapper">
                                 <div class="avatar me-2">
                                    <img src="http://localhost/new_hr_portal-master/public/admin/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                                 </div>
                              </div>
                              <div class="d-flex flex-column">
                                 <span class="emp_name text-truncate">Glyn Giacoppo</span>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th>Attendance Date</th>
                        <td>31 Mar 2023</td>
                     </tr>
                     <tr>
                        <th>Attendance Time</th>
                        <td>10:55 PM</td>
                     </tr>
                     <tr>
                        <th>Type</th>
                        <td><span> Casual</span></td>
                     </tr>
                     <tr>
                        <th>Status</th>
                        <td><span class="badge bg-label-warning me-1"> Pending</span></td>
                     </tr>
                     <tr>
                        <th>Applied At</th>
                        <td>26 Apr 2023</td>
                     </tr>
                     <tr>
                        <th>Reason</th>
                        <td>Sick</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Approve</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('public/admin/assets/js/dashboards-analytics.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/charts-apex.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/dashboards/admin-dashboard.blade.php ENDPATH**/ ?>