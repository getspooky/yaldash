<footer class="footer-laravel-dashboard" style="margin-top:{{ $top }}">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6 footer-col">
        <div class="logofooter">Logo</div>
        <p>laraveldash is a beautifully designed administration panel for Laravel.</p>
        <p><i class="fa fa-map-pin"></i> Morocco , Casablanca</p>
        <p><i class="fa fa-phone"></i> Phone (Morocco) : +212 </p>
        <p><i class="fa fa-envelope"></i> E-mail : getspookydev@gmail.com</p>

      </div>
      <div class="col-md-3 col-sm-6 footer-col">
        <h6 class="heading7">GENERAL LINKS</h6>
        <ul class="footer-ul">
          <li><a href="#"> Career</a></li>
          <li><a href="#"> Privacy Policy</a></li>
          <li><a href="#"> Terms & Conditions</a></li>
          <li><a href="#"> Client Gateway</a></li>
          <li><a href="#"> Ranking</a></li>
          <li><a href="#"> Case Studies</a></li>
          <li><a href="#"> Frequently Ask Questions</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 footer-col">
        <h6 class="heading7">LATEST NEWS</h6>
        <div class="post">
          <p>LaravelDash panel. Generated in minutes. No syntax to learn. Just generate and download clean Laravel code <span>August 3,2015</span></p>
        </div>
      </div>
      {{ $slot }}
    </div>
  </div>
</footer>
