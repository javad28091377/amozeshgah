@include('partial.admin.header');
@include('partial.admin.sidebar');

@include('partial.admin.footer');
<script src="{{ asset('admin/dist/js/admin/students.js') }}"></script>
<script>
  GetAllstudents()
</script>