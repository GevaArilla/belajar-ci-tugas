<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/">
      <span>🏠Home</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="keranjang"> 
      <span>🛒Keranjang</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <?php
if (session()->get('role') == 'admin') 
?>
  <?php
      if (session()->get('role') == 'admin') {
      ?>
      <li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="produk">
          
      <span>📝Produk</span>
    </a>
  </li><!-- End Dashboard Nav -->  
  <?php
}
?>

</ul>

</aside><!-- End Sidebar-->

