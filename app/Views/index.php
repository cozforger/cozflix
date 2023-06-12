<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/asset/css/style.css" type="text/css" media="all" />
    <script type="text/javascript" src="/asset/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="/asset/js/jquery-func.js"></script>
    <!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
  </head>
  <body>
    <!-- START PAGE SOURCE -->
    <div id="shell">
      <div id="header">
        <div class="social">
          <span>FOLLOW US ON:</span>
          <ul>
            <li><a class="twitter" href="#">twitter</a></li>
            <li><a class="facebook" href="#">facebook</a></li>
            <li><a class="vimeo" href="#">vimeo</a></li>
            <li><a class="rss" href="#">rss</a></li>
          </ul>
        </div>
        <div id="navigation">
          <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Coming Soon</a></li>
            
            <li class="dropdown">
            <?php if (session()->has('is_login')) : ?>
              <a href="#" class="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              
                <a href="javascript:void(0)"><?= session()->get('username') ?></a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item text-dark" href="/filmsaya">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Film Saya
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-dark" href="/logout">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
            </div>
            <?php else : ?>
              <li><a href="/login">Login</a></li>
              <li><a href="/register">Register</a></li>
            <?php endif ?>
</li>

          </ul>
        </div>
        <div id="sub-navigation">
          <ul>
            <li><a href="/filmx">Tampilkan Semua</a></li>
            <li><a href="#">Paling Sering Dicari</a></li>
            <li><a href="#">Sedang Trend</a></li>
          </ul>
          <div id="search">
            <form action="#" method="get" accept-charset="utf-8">
              <label for="search-field">SEARCH</label>
              <input type="text" name="search field" value="" id="search-field" class="blink search-field" />
              <input type="submit" value="GO!" class="search-button" />
            </form>
          </div>
        </div>
      </div>
      <div id="main">
        <div id="content">
          <div class="box">
          <div class="head">
              <h2>Paling Sering Dicari</h2>
              <p class="text-right"><a href="filmx">Selengkapnya</a></p>        
              </div>
<?php foreach ($list as $list) : ?>
<div class="movie">
    <div class="movie-image">
    <a href="<?= site_url('/detail/'.$list['id']) ?>"><span class="play"><span class="name"><?= $list['judul'] ?><span class="rating"><?= $list['harga'] ?></span></span></span> <img src="/asset/img/<?= $list['gambar'] ?>" class="rounded-lg mobile:px-1 mx-auto cursor-pointer" alt="" /></a>
    </div>

</div>
<?php endforeach; ?>
    <div class="cl">&nbsp;</div>
</div>
<div class="box">
            <div class="head">
              <h2>Sedang Trend</h2>
              <p class="text-right"><a href="#">Selengkapnya</a></p>
            </div>
            <div class="movie">
              <div class="movie-image">
                <span class="play"><span class="name">TRANSFORMERS</span></span> <a href="#"><img src="/asset/css/img/movie7.jpg" alt="" /></a>
              </div>
            </div>
            <div class="movie">
              <div class="movie-image">
                <span class="play"><span class="name">MAGNETO</span></span> <a href="#"><img src="/asset/css/img/movie8.jpg" alt="" /></a>
              </div>
            </div>
            <div class="movie">
              <div class="movie-image">
                <span class="play"><span class="name">KUNG FU PANDA</span></span> <a href="#"><img src="/asset/css/img/movie9.jpg" alt="" /></a>
              </div>
            </div>
            <div class="movie">
              <div class="movie-image">
                <span class="play"><span class="name">EAGLE EYE</span></span> <a href="#"><img src="/asset/css/img/movie10.jpg" alt="" /></a>
              </div>
            </div>
            <div class="movie">
              <div class="movie-image">
                <span class="play"><span class="name">NARNIA</span></span> <a href="#"><img src="/asset/css/img/movie11.jpg" alt="" /></a>
              </div>
            </div>
            <div class="movie last">
              <div class="movie-image">
                <span class="play"><span class="name">ANGELS &amp; DEMONS</span></span> <a href="#"><img src="/asset/css/img/movie12.jpg" alt="" /></a>
              </div>
            </div>
            <div class="cl">&nbsp;</div>
          </div>
<div id="news">
          <div class="head">
            <h3>NEWS</h3>
            <p class="text-right"><a href="#">Selengkapnya</a></p>
          </div>
          <div class="content">
            <p class="date">12.04.22</p>
            <h4>Disney's A Christmas Carol</h4>
            <p>&quot;Disney's A Christmas Carol,&quot; a multi-sensory thrill ride re-envisioned by Academy Award&reg;-winning filmmaker Robert Zemeckis, captures...</p>
            <a href="#">Read more</a>
          </div>
          <div class="content">
            <p class="date">11.04.22</p>
            <h4>Where the Wild Things Are</h4>
            <p>Innovative director Spike Jonze collaborates with celebrated author Maurice Sendak to bring one of the most beloved books of all time to the big screen in &quot;Where the Wild Things Are,&quot;...</p>
            <a href="#">Read more</a>
          </div>
          <div class="content">
            <p class="date">10.04.22</p>
            <h4>The Box</h4>
            <p>Norma and Arthur Lewis are a suburban couple with a young child who receive an anonymous gift bearing fatal and irrevocable consequences.</p>
            <a href="#">Read more</a>
          </div>
        </div>
        <div id="coming">
<div class="head">
  <h3>COMING SOON<strong>!</strong></h3>
            <p class="text-right"><a href="#">Selengkapnya</a></p>
          </div>
          <div class="content">
            <h4>The Princess and the Frog</h4>
            <a href="#"><img src="css/images/coming-soon1.jpg" alt="" /></a>
            <p>Walt Disney Animation Studios presents the musical &quot;The Princess and the Frog,&quot; an animated comedy set in the great city of New Orleans...</p>
            <a href="#">Read more</a>
          </div>
          <div class="cl">&nbsp;</div>
          <div class="content">
            <h4>The Princess and the Frog</h4>
            <a href="#"><img src="css/images/coming-soon2.jpg" alt="" /></a>
            <p>Walt Disney Animation Studios presents the musical &quot;The Princess and the Frog,&quot; an animated comedy set in the great city of New Orleans...</p>
            <a href="#">Read more</a>
          </div>
        </div>
        <div class="cl">&nbsp;</div>
      </div>
        <div id="footer">
        <p class="lf"><a href="#"></a></p>
        <!--p class="rf"><a href="http://chocotemplates.com/">ChocoTemplates.com</a></p>-->
        <div style="clear: both"></div>
      </div>
</div>

    <!-- END PAGE SOURCE -->
  </body>
</html>

<?= $this->endSection('content'); ?>