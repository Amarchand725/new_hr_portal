<?php $__env->startSection('title', 'Dashboard - Cyberonix'); ?>
<?php $__env->startPush('styles'); ?>
<link href="<?php echo e(asset('public/admin/assets/vendor/css/pages/page-profile.css')); ?>" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-md-9">
         <div class="card mb-4">
            <div class="user-profile-header-banner">
               <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/profilebg.jpg" alt="Banner image" class="rounded-top img-fluid">
            </div>
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
               <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                  <img src="<?php echo e(asset('public/admin/assets/img/avatars/14.png')); ?>" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
               </div>
               <div class="flex-grow-1 mt-3 mt-sm-5">
                  <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                     <div class="user-profile-info">
                        <h4>Amir Ali</h4>
                        <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                           <li class="list-inline-item">
                              <i class="ti ti-id-badge-2"></i> Sr.Executive Vice President - SEVP
                           </li>
                           <li class="list-inline-item">
                              <i class="ti ti-send"></i> amir.ali@cyberonix.org
                           </li>
                           <li class="list-inline-item">
                              <i class="ti ti-calendar"></i> Joined April 2021
                           </li>
                        </ul>
                     </div>
                     <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light">
                     <i class="ti ti-user-check me-1"></i>View Profile
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="card">
            <div class="reporting-authority position-relative text-center">
               <div class="card-bg"></div>
               <div class="card-body">
                  <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto user-profile-header">
                     <img src="<?php echo e(asset('public/admin/assets/img/avatars/1.png')); ?>" alt="user image" class="d-block mx-auto rounded user-profile-img border-5">
                  </div>
                  <h3 class="mt-1">
                  Amir Ali
                  <h3>
                  <h5 class="btn-primary d-inline-block px-2 py-1 rounded">Reporting Authority</h5>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 mb-4 col-lg-5 col-12">
         <div class="card BGgradient">
            <div class="d-flex align-items-end row">
               <div class="col-7">
                  <div class="card-body text-nowrap text-white">
                     <h5 class="card-title mb-3 text-white">Congratulations John! 🎉</h5>
                     <p class="mb-3">Are you all set to take your productivity <br/> to the max 🚀 ?
                        Good luck for your day <br/> ahead 😎!
                     </p>
                     <p class="mb-3">Are you all set to take your productivity <br/>
                     </p>
                     <a href="javascript:;" class="btn btn-white ">View Profile</a>
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
               <div class="card">
                  <div class="card-body pb-0">
                     <div class="card-icon">
                        <span class="badge bg-label-warning rounded-pill p-2">
                        <i class="ti ti-credit-card ti-sm"></i>
                        </span>
                     </div>
                     <h5 class="card-title mb-0 mt-2">Late-In Summary</h5>
                     <small>4 Late-in</small>
                  </div>
                  <div id="lateinSummary"></div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
               <div class="card">
                  <div class="card-body pb-0">
                     <div class="card-icon">
                        <span class="badge bg-label-danger rounded-pill p-2">
                        <i class="ti ti-credit-card ti-sm"></i>
                        </span>
                     </div>
                     <h5 class="card-title mb-0 mt-2">Half Day Summary</h5>
                     <small>4 Half Day</small>
                  </div>
                  <div id="halfdaySummary"></div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
               <div class="card">
                  <div class="card-body pb-0">
                     <div class="card-icon">
                        <span class="badge bg-label-danger rounded-pill p-2">
                        <i class="ti ti-credit-card ti-sm"></i>
                        </span>
                     </div>
                     <h5 class="card-title mb-0 mt-2">Absent Summary</h5>
                     <small>4 Absent</small>
                  </div>
                  <div id="absentSummary"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-12">
         <div class="row">
            <div class="col-md-4">
               <div class="card employe-timeline">
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
                                       class="progress-bar bg-primary"
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
                     <div class="col-md-12">
                           <div class="card">
                              <div class="row">
                                 <div class="col-md-6">
                                    <h5 class="card-header mt-1">My Team</h5>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="text-end mt-4 pe-4">
                                       <a href="javascript:;" class="btn btn-primary waves-effect waves-light btn-sm">View Detail</a>
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
                                          <td><span class="badge bg-label-primary me-1">Permanent</span></td>
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
                                          <td><span class="badge bg-label-primary me-1">Permanent</span></td>
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
                                          <td><span class="badge bg-label-primary me-1">Permanent</span></td>
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
                  <div class="col-md-6">
                     <div class="card h-100">
                        <div class="card-header d-flex justify-content-between pb-2 mb-1">
                           <div class="card-title mb-1">
                              <h5 class="m-0 me-2">Attendance Summary</h5>
                              <small class="text-muted">This Month</small>
                           </div>
                           <div class="dropdown">
                              <button class="btn p-0" type="button" id="salesByCountryTabs" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountryTabs">
                                 <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                 <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                 <a class="dropdown-item" href="javascript:void(0);">Share</a>
                              </div>
                           </div>
                        </div>
                        <div class="nav-align-top">
                           <div class="card-body pb-3">
                              <ul class="nav nav-tabs nav-fill" role="tablist">
                                 <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-new" aria-controls="navs-justified-new" aria-selected="true">Late-in</button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-link-preparing" aria-controls="navs-justified-link-preparing" aria-selected="false">Early Out</button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-link-shipping" aria-controls="navs-justified-link-shipping" aria-selected="false">Half Day</button>
                                 </li>
                                 <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-link-absent" aria-controls="navs-justified-link-absent" aria-selected="false">Absent</button>
                                 </li>
                              </ul>
                           </div>
                           <div class="tab-content p-0 pt-2 pb-2">
                              <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                                 <div class="table-responsive text-nowrap">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Date</th>
                                             <th>Punched In</th>
                                             <th>Behavior</th>
                                          </tr>
                                       </thead>
                                       <tbody class="table-border-bottom-0">
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td>09:31 AM</td>
                                             <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                          </tr>
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td>09:31 AM</td>
                                             <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                          </tr>
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td>09:31 AM</td>
                                             <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                          </tr>
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td>09:31 AM</td>
                                             <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                          </tr>

                                          <tr>
                                             <td>26-04-2023</td>
                                             <td>09:31 AM</td>
                                             <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                          </tr>
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td>09:31 AM</td>
                                             <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                          </tr>
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td>09:31 AM</td>
                                             <td><span class="badge bg-label-danger me-1"> Late-in</span></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <div class="text-center mt-4">
                                       <a href="javascript:;" class="btn btn-primary waves-effect waves-light">Apply All</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="navs-justified-link-preparing" role="tabpanel">
                                 <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                                    <div class="table-responsive text-nowrap">
                                       <table class="table table-striped">
                                          <thead>
                                             <tr>
                                                <th>Date</th>
                                                <th>Punched Out</th>
                                                <th>Behavior</th>
                                             </tr>
                                          </thead>
                                          <tbody class="table-border-bottom-0">
                                             <tr>
                                                <td>26-04-2023</td>
                                                <td>09:31 AM</td>
                                                <td><span class="badge bg-label-danger me-1"> Early-out</span></td>
                                             </tr>
                                             <tr>
                                                <td>26-04-2023</td>
                                                <td>09:31 AM</td>
                                                <td><span class="badge bg-label-danger me-1"> Early-out</span></td>
                                             </tr>
                                             <tr>
                                                <td>26-04-2023</td>
                                                <td>09:31 AM</td>
                                                <td><span class="badge bg-label-danger me-1"> Early-out</span></td>
                                             </tr>
                                             <tr>
                                                <td>26-04-2023</td>
                                                <td>09:31 AM</td>
                                                <td><span class="badge bg-label-danger me-1"> Early-out</span></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <div class="text-center mt-4">
                                          <a href="javascript:;" class="btn btn-primary waves-effect waves-light">Apply All</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="navs-justified-link-shipping" role="tabpanel">
                                 <div class="table-responsive text-nowrap">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Date</th>
                                             <th>Punched Out</th>
                                             <th>Behavior</th>
                                          </tr>
                                       </thead>
                                       <tbody class="table-border-bottom-0">
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td>09:31 AM</td>
                                             <td><span class="badge bg-label-danger me-1"> Haly Day</span></td>
                                          </tr>
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td>09:31 AM</td>
                                             <td><span class="badge bg-label-danger me-1"> Haly Day</span></td>
                                          </tr>
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td>09:31 AM</td>
                                             <td><span class="badge bg-label-danger me-1"> Haly Day</span></td>
                                          </tr>
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td>09:31 AM</td>
                                             <td><span class="badge bg-label-danger me-1"> Haly Day</span></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <div class="text-center mt-4">
                                       <a href="javascript:;" class="btn btn-primary waves-effect waves-light">Apply All</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="navs-justified-link-absent" role="tabpanel">
                                 <div class="table-responsive text-nowrap">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Date</th>
                                             <th>Behavior</th>
                                          </tr>
                                       </thead>
                                       <tbody class="table-border-bottom-0">
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td><span class="badge bg-label-danger me-1"> Absent</span></td>
                                          </tr>
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td><span class="badge bg-label-danger me-1"> Absent</span></td>
                                          </tr>
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td><span class="badge bg-label-danger me-1"> Absent</span></td>
                                          </tr>
                                          <tr>
                                             <td>26-04-2023</td>
                                             <td><span class="badge bg-label-danger me-1"> Absent</span></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <div class="text-center mt-4">
                                       <a href="javascript:;" class="btn btn-primary waves-effect waves-light">Apply All</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="col-md-4 mb-4">
                     <div class="card">
                        <h5 class="card-header">Daily Logs</h5>
                        <div class="card-body pb-0">
                           <ul class="timeline daily-log mb-0">
                              <li class="timeline-item timeline-item-transparent">
                                 <span class="timeline-point timeline-point-primary"></span>
                                 <div class="timeline-event">
                                    <div class="timeline-header border-bottom mb-2">
                                       <h6 class="mb-0 text-primary">Punch In at,</h6>
                                    </div>
                                    <div class="d-flex justify-content-between flex-wrap mb-2">
                                       <div>
                                          <span class="d-block mb-1">May 09, 2023</span>
                                          <span class="mb-0 d-block text-muted">02:42 AM</span>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li class="timeline-item timeline-item-transparent">
                                 <span class="timeline-point timeline-point-primary"></span>
                                 <div class="timeline-event">
                                    <div class="timeline-header border-bottom mb-2">
                                       <h6 class="mb-0 text-primary">Punch In at,</h6>
                                    </div>
                                    <div class="d-flex justify-content-between flex-wrap mb-2">
                                       <div>
                                          <span class="d-block mb-1">May 09, 2023</span>
                                          <span class="mb-0 d-block text-muted">02:42 AM</span>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li class="timeline-item timeline-item-transparent">
                                 <span class="timeline-point timeline-point-primary"></span>
                                 <div class="timeline-event">
                                    <div class="timeline-header border-bottom mb-2">
                                       <h6 class="mb-0 text-danger">Punch Out at,</h6>
                                    </div>
                                    <div class="d-flex justify-content-between flex-wrap mb-2">
                                       <div>
                                          <span class="d-block mb-1">May 09, 2023</span>
                                          <span class="mb-0 d-block text-muted">02:42 AM</span>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('public/admin/assets/js/dashboards-analytics.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/emp-dashboard.blade.php ENDPATH**/ ?>