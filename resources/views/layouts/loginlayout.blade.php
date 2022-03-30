<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body>
  @yield('content')

  <script src="{{asset('template')}}/vendors/js/vendor.bundle.base.js"></script>
  <script src="{{asset('template')}}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="{{asset('template')}}/js/off-canvas.js"></script>
  <script src="{{asset('template')}}/js/hoverable-collapse.js"></script>
  <script src="{{asset('template')}}/js/template.js"></script>
  <script src="{{asset('template')}}/js/settings.js"></script>
  <script src="{{asset('template')}}/js/todolist.js"></script>
</body>

</html>
