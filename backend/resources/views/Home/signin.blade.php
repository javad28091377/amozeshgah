@include('partial.home.top')
@include('partial.home.menu')
@include('partial.home.slider')
    <div class="col-12 content">
      <div class="container-fluid">
       <div class="col-12 offset-md-3 col-md-6 offset-md-3">
         <div class="col-12 banner text-center">
          <span>تماس با ما</span>
         </div>
         <div class="col-12 boxsignin">
          <form>
            <div class="form-group">
                <label>نام کاربری:</label>
                <input type="text" placeholder="نام کاربری خود را وارد کنید" class="form-control">
            </div>
            <div class="form-group">
                <label>رمز عبور:</label>
                <input type="password" placeholder="رمز عبور را وارد کنید" class="form-control">
            </div>
            <hr>
            <div class="form-group">
                <label>یاداوری من:</label>
                <input type="checkbox">
            </div>
            <hr>
            <button class="col-12 btn btn-success">ورود</button>
          </form>
         </div>
       </div>
      </div>

    </div>
@include('partial.home.footer');