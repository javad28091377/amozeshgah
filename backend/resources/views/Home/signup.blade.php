@include('partial.home.top')
@include('partial.home.menu')
@include('partial.home.slider')
    <div class="col-12 content">
      <div class="container-fluid">
       <div class="col-12 offset-md-3 col-md-6 offset-md-3">
         <div class="col-12 banner text-center">
          <span>فرم ثبت نام</span>
         </div>
         <div class="col-12 boxform">
          <form>
            <div class="form-group">
              <label>نام و نام خانوادگی:</label>
              <input type="text" placeholder="به عنوان مثال: کسرا سعیدی" class="form-control">
            </div>
            <div class="form-group">
              <label>سن:</label>
              <input type="number" placeholder="سن خود را با فرمت عدد وارد کنید" class="form-control">
            </div>
            <div class="form-group">
              <label>جنسیت</label>
              <select class="form-control">
                <option value=""></option>
                <option value="male">اقا</option>
                <option value="female">خانم</option>
              </select>
              <div class="form-group">
                <label>شماره:</label>
                <input type="text" placeholder="به عنوان مثال:09112120101" class="form-control">
              </div>
              <div class="form-group">
                <label>ادرس:</label>
                <textarea class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label>ایمیل:</label>
                <input type="email" placeholder="ایمیل خود را وارد کنید" class="form-control">
              </div>
              <div class="form-group">
                <label>رمز:</label>
                <input type="password" placeholder="حداقل 8رقم با یک حروف بزرگ" class="form-control">
              </div>
              <div class="form-group">
                <label>تکرار رمز:</label>
                <input type="password" class="form-control">
              </div>
              <div class="form-group">
                <label>اپلود عکس:</label>
                <input type="file" class="form-control">
              </div>
              <hr>
              <div class="form-group">
                <label>قوانین را میپزیرم</label>
                <input type="checkbox">
              </div>
              <hr>
              <button class="col-12 btn btn-success">ثبت نام</button>
              
            </div>

          </form>
         </div>
       </div>
      </div>

    </div>
@include('partial.home.footer');