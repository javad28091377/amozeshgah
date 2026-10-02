@include('partial.home.top')
@include('partial.home.menu')
@include('partial.home.slider')
    <div class="col-12 content">
      <div class="container-fluid">
       <div class="col-12 offset-md-3 col-md-6 offset-md-3">
         <div class="col-12 banner text-center">
          <span>تماس با ما</span>
         </div>
         <div class="col-12 boxcontact">
           <div class="col-12 contact text-center">
            <img src="{{ asset('home/') }}/images/telegram.png" width="60px" height="60px">
            <img src="{{ asset('home/') }}/images/instagram.png" width="60px" height="60px">
            <img src="{{ asset('home/') }}/images/whatsapp.png" width="60px" height="60px">
            <hr>
            <p>ادرس:خ 18دی جنب ایستگاه تاکسی معلم</p>
            <p>شماره:09116434242</p>
           </div>
           <div class="col-12 map">
            <iframe class="col-12" height="400px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3204.479501233751!2d53.05490898068202!3d36.566661209463156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f853fe264c4f53f%3A0x2d62a13b972b6aa5!2sMazandaran%20Province%2C%20Sari%2C%2018%20Dey%2C%20Iran!5e0!3m2!1sen!2s!4v1707596044968!5m2!1sen!2s"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           </div>
         </div>
       </div>
      </div>

    </div>
@include('partial.home.footer');