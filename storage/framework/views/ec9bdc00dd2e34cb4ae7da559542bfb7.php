<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template-no-customizer"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Admin Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <?php if(isset(settings()->favicon) && !empty(settings()->favicon)): ?>
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('public/admin')); ?>/assets/img/favicon/<?php echo e(settings()->favicon); ?>" />
    <?php else: ?>
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('public/admin')); ?>/assets/img/favicon/favicon.ico" />
    <?php endif; ?>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/fonts/fontawesome.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/fonts/tabler-icons.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/fonts/flag-icons.css')); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/css/rtl/core.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/css/rtl/theme-default.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/demo.css')); ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/libs/node-waves/node-waves.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/libs/typeahead-js/typeahead.css')); ?>" />
    <!-- Vendor -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/css/pages/page-auth.css')); ?>" />
    <!-- Helpers -->
    <script src="<?php echo e(asset('public/admin/assets/vendor/js/helpers.js')); ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo e(asset('public/admin/assets/js/config.js')); ?>"></script>
  </head>

  <body>
    <!-- Content -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="<?php echo e(asset('public/admin')); ?>/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?php echo e(asset('public/admin')); ?>/assets/js/pages-auth.js"></script>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\hr_portal\resources\views/admin/auth/layouts/app.blade.php ENDPATH**/ ?>