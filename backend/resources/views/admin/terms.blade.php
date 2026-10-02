@include('partial.admin.header')
@include('partial.admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      @include('partial.admin.box')
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">داشبورد ورژن 2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">  
      <div class="container-fluid"> 
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-4 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">
                  <i class="fa fa-users mr-1"></i>
                  فرم ثبت دوره جدید
                </h3>         
              </div><!-- /.card-header -->
              <div class="card-body">
                <form id="add_terms" action="/adminpanel/AddTerms" method="POST" enctype="multipart/form-data">
                  @csrf
                   <!-- اگر هر اروری وجود داشت -->
                  <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $errors)
                            <i>{{ $errors }}</i>
                          @endforeach
                        </ul>
                    </div>
                  @endif -->
                  @if(isset($status))
                    <p class="alert alert{{ $status }}">{{ $message }}</p>
                  @endif
                    <div class="form-group">
                        <label>نام دوره :</label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label>نام استاد :</label>
                        <input class="form-control" type="text" name="master">
                    </div>
                    <div class="form-group">
                        <label>ظرفیت دوره :</label>
                        <input class="form-control" type="number" name="capacity">
                    </div>
                    <div class="form-group">
                        <label>مبلغ دوره :</label>
                        <input class="form-control" type="number" name="price">
                    </div>
                    <div class="form-group">
                        <label>عکس دوره :</label>
                        <input class="form-control" type="file" name="pic">
                    </div>

                    <div class="form-group">
                      <button class="col-lg-12 btn btn-success">ثبت</button>
                    </div>
                </form>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-8 connectedSortable">
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">
                  <i class="fa fa-users mr-1"></i>
                  لیست دوره
                </h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-hover table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>دوره</th>
                      <th>استاد</th>
                      <th>ظرفیت</th>
                      <th>مبلغ</th>
                      <th>عکس</th>
                      <th>-</th>
                    </tr>
                  </thead>
                  <tbody id="id-table-getterms">  
                  </tbody>
                </table>
              </div><!-- /.card-body -->
            </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- edit -->
   <div class="modal fade p-3" style="z-index: 1000000;" id="edittermsmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mx-2" id="exampleModalLabel">ویرایش دسته بندی</h5>
          <button type="button" class="close mx-5" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="edittermsform" method="POST">
            <input class="form-control" type="hidden" name="editidterms" id="editid">
            <div class="form-group">
              <label>نام دوره :</label>
              <input class="form-control" type="text" name="edittitle" id="edittitle">
            </div>
            <div class="form-group">
                <label>نام استاد :</label>
                <input class="form-control" type="text" name="editmaster" id="editmaster">
            </div>
            <div class="form-group">
                <label>ظرفیت دوره :</label>
                <input class="form-control" type="number" name="editcapacity" id="editcapacity">
            </div>
            <div class="form-group">
                <label>مبلغ دوره :</label>
                <input class="form-control" type="number" name="editprice" id="editprice">
            </div>
            <div class="form-group">
                <label>عکس دوره :</label>
                <input class="form-control" type="file" name="editpic" id="editpic">
            </div>
            <div class="form-group">
              <button class="col-lg-12 btn btn-success">ثبت دسته بندی </button>
            </div>
        </form> 
        </div>
        <div class="modal-footer">
          <a href="#" type="button" id="btneditterm" class="btn btn-primary mx-1" data-dismiss="modal">انصراف</a>
        </div>
      </div>
    </div>
  </div>

  <!-- delet -->
   <div class="modal fade" style="z-index: 1000000;" id="delettermsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mx-2" id="exampleModalLabel">ایا میخواهید اطلاعات را حذف کنید؟</h5>
          <button type="button" class="close mx-5" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button id="btndeletterms" class="btn btn-primary mx-1" >بله</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">خیر</button>
        </div>
      </div>
    </div>
</div>  

@include('partial.admin.footer');
<script src="{{ asset('admin/') }}/dist/js/admin/terms.js"></script>
<script>
  GetAllTerms();
</script>