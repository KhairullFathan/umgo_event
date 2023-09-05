<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="<?=current_url()?>" class="app-brand-link">
      <span class="app-brand-text menu-text fw-bolder ms-2 h3">UMGO EVENT</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item <?= (@$mactive === 'Dashboard') ? 'active' : ''?>">
      <a href="<?= base_url('index.php/guest') ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>


    <?php foreach($menu as $m): ?>
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text"><?= $m->Menu ?></span>
      </li>
      <?php $submenu = $this->db->get_where('s_menu',['MenuID'=>$m->MenuID])->result()?>
      <?php foreach($submenu as $sm): ?>
        <li class="menu-item <?= (@$mactive === $sm->Submenu) ? 'active' : ''?>">
          <a href="<?= base_url('index.php/'.$sm->Link) ?>" class="menu-link">
            <i class="menu-icon tf-icons <?= $sm->Icon ?>"></i>
            <div><?= $sm->Submenu ?></div>
          </a>
        </li>
      <?php endforeach; ?>
    <?php endforeach; ?>

  </ul>
</aside>
<!-- / Menu -->