<style>
  :root {
    --green: #219150;
    --black: #10221b;
    --white: #fff;
    --light-bg: #eee;
    --orange: #00FFFF;
    --text-color-1: #444;
    --text-color-2: #666;
    --bg-color-1: #fff;
    --bg-color-2: #eee;
    --box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .1);
  }

  .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }

  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }

  .reviews .reviews-slider {
    padding-bottom: 2rem;
  }

  .reviews .box {
    padding: 2rem;
    text-align: center;
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, .1);
    border-radius: .5rem;
  }

  .reviews .box img {
    height: 13rem;
    width: 13rem;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 1rem;
  }

  .reviews .box h3 {
    color: var(--text-color-2);
    font-size: 2.5rem;
  }

  .reviews .box p {
    color: var(--text-color-1);
    font-size: 1.5rem;
    padding: 1rem 0;
  }

  .reviews .box .stars i {
    color: var(--orange);
    font-size: 1.7rem;
  }
</style>

<script>
  $('.datepicker').datepicker({
    format: "yyyy-mm-dd"
  })
  window.start_load = function () {
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function () {
    $('#preloader2').fadeOut('fast', function () {
      $(this).remove();
    })
  }

  window.uni_modal = function ($title = '', $url = '', $size = '') {
    start_load()
    $.ajax({
      url: $url,
      error: err => {
        console.log()
        alert("An error occured")
      },
      success: function (resp) {
        if (resp) {
          $('#uni_modal .modal-title').html($title)
          $('#uni_modal .modal-body').html(resp)
          if ($size != '') {
            $('#uni_modal .modal-dialog').addClass($size)
          } else {
            $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
          }
          $('#uni_modal').modal({
            show: true,
            backdrop: 'static',
            keyboard: false,
            focus: true
          })
          end_load()
        }
      }
    })
  }
  window.uni_modal_right = function ($title = '', $url = '') {
    start_load()
    $.ajax({
      url: $url,
      error: err => {
        console.log()
        alert("An error occured")
      },
      success: function (resp) {
        if (resp) {
          $('#uni_modal_right .modal-title').html($title)
          $('#uni_modal_right .modal-body').html(resp)

          $('#uni_modal_right').modal('show')
          end_load()
        }
      }
    })
  }
  window.viewer_modal = function ($src = '') {
    start_load()
    var t = $src.split('.')
    t = t[1]
    if (t == 'mp4') {
      var view = $("<video src='" + $src + "' controls autoplay></video>")
    } else {
      var view = $("<img src='" + $src + "' />")
    }
    $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
    $('#viewer_modal .modal-content').append(view)
    $('#viewer_modal').modal({
      show: true,
      focus: true
    })
    end_load()

  }
  window.alert_toast = function ($msg = 'TEST', $bg = 'success') {
    $('#alert_toast').removeClass('bg-success')
    $('#alert_toast').removeClass('bg-danger')
    $('#alert_toast').removeClass('bg-info')
    $('#alert_toast').removeClass('bg-warning')

    if ($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if ($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if ($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if ($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({ delay: 3000 }).toast('show');
  }
  window._conf = function ($msg = '', $func = '', $params = []) {
    $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")")
    $('#confirm_modal .modal-body').html($msg)
    $('#confirm_modal').modal('show')
  }
  window.load_cart = function () {
    $.ajax({
      url: 'admin/ajax.php?action=get_cart_count',
      success: function (resp) {
        if (resp > -1) {
          resp = resp > 0 ? resp : 0;
          $('.item_count').html(resp)
        }
      }
    })
  }
  $('#login_now').click(function () {
    uni_modal("LOGIN", 'login.php')
  })
  $(document).ready(function () {
    load_cart()
    $('#preloader').fadeOut('fast', function () {
      $(this).remove();
    })
  })
</script>
<!-- Bootstrap core JS-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- Core theme JS-->

<script src="js/scripts.js"></script>
<section class="reviews" id="reviews">
  <h1 class="heading">
    <center><span>Reviews</span><center>
   

  </h1>
  <div class="swiper mySwiper reviews-slider">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="box">
          <img src="images/raghuraam.jpeg">
          <h3>Raghuraam</h3>
          <p>
            This alumni tracking website is fantastic for reconnecting with classmates.
            The user-friendly interface and networking features make staying in touch a breeze. Highly
            recommended for a seamless alumni experience.
          </p>
          <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="far fa-star"></i>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="box">
          <img src="images/pooja.jpeg" alt="">
          <h3>pooja sharma</h3>
          <p>
            Thrilled with this alumni tracking platform! It simplifies reconnecting with old friends,
            and the event coordination features are superb. Kudos to the developers for creating a
            fantastic tool for alumni connections.</p>
          <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="far fa-star"></i>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="box">
          <img src="images/Murthy.jpeg" alt="">
          <h3>Murthy bhat</h3>
          <p>
            The alumni tracking website is helpful but could be more robust. Improved search
            functionality and enhanced engagement features would elevate the user experience. Overall,
            useful for basic tracking but has room for improvement.</p>
          <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>

          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="box">
          <img src="images/sangeetha.jpeg" alt="">
          <h3>sangeetha sharma </h3>
          <p>
            This alumni tracking website exceeded expectations. It not only reconnects me with
            classmates but also provides valuable job and mentorship opportunities. An essential tool
            to stay connected with my alma mater.
          </p>
          <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="far fa-star"></i>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="box">
          <img src="images/sanjeevhegde.jpeg" alt="">
          <h3>sanjeev hegde</h3>
          <p>
            The alumni tracking website shows promise, but minor glitches in the interface need
            attention. A bit more customization for profiles would enhance the user experience. Despite
            this, it serves its purpose well.


          </p>
          <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>

          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="box">
          <img src="https://cdn1.matadornetwork.com/blogs/1/2016/03/India4real.jpg" alt="">
          <h3>Sanskriti Chauhan</h3>
          <p>
            The speed and convenience of this alumni tracking website stand out. Updating my profile and
            finding fellow alumni is quick and easy. A time-saving solution for staying in the loop with
            the alma mater community.</p>
          <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="far fa-star"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>