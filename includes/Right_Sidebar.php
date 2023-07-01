<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">لیست محصولات</h4>
        <hr>
        <ul class="nav flex-column">
          <?php getCat(); ?>
        </ul>
        <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">برندها</h4>
        <hr>
        <ul class="nav flex-column">
            <?php getBrand(); ?>
        </ul>
      </div>
    </nav>

