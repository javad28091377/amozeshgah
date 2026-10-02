@include('partial.home.top')
@include('partial.home.menu')
@include('partial.home.slider')
<div class="col-12 content">
      <div class="container-fluid">
       <div class="col-12 offset-md-3 col-md-6 offset-md-3">
         <div class="col-12 banner text-center">
          <span>HTML</span>
         </div>
         <div class="col-12 boxphp">
            <div class="col-12 pic  text-center">
                <img src="{{ asset('home/') }}/images/html.png" width="80px" height="80px">
                <hr>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                </p>
            </div>
            <div class="col-12 offset-md-4 col-md-4 offset-md-4 teacher text-center">
                <img src="{{ asset('home/') }}/images/student.png"  width="70px" height="70px">
                <hr>
                <p>نام:سعیدی</p>
                <p>سابقه:5سال</p>
                <p>رشته:تحت وب</p>
                <button class="col-10 btn btn-success">ثبت نام</button>
            </div>
         </div>
       </div>
      </div>

    </div>
@include('partial.home.footer');