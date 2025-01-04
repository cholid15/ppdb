<ul class="navbar-nav">
    <?php foreach ($menus as $menu): ?>
        <?php if (empty($menu['submenu'])): ?>
            <!-- Jika Sinlge Menu -->
            <li class="nav-item"> <!--  Active -->
                <a class="nav-link" href="<?= $menu['url'] ?>">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <?= $menu['icon'] ?>
                    </span>
                    <span class="nav-link-title">
                        <?= esc($menu['title']) ?>
                    </span>
                </a>
            </li>
        <?php else: ?>
            <!-- Jika Menunya terdapat sub menu -->
            <li class="nav-item dropdown"> <!-- Active -->
                <a class="nav-link dropdown-toggle" href="#<?= $menu['id'] ?>" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <?= $menu['icon'] ?>
                    </span>
                    <span class="nav-link-title">
                        <?= esc($menu['title']) ?>
                    </span>
                </a>
                <div class="dropdown-menu">
                    <?php foreach ($menu['submenu'] as $submenu): ?>
                        <?php if (empty($submenu['submenu1'])) : ?>
                            <a class="dropdown-item" href="<?= $submenu['url'] ?>">
                                <?= esc($submenu['title']) ?>
                            </a>
                        <?php else : ?>
                            <div class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="true">
                                    <?= esc($submenu['title']) ?>
                                </a>
                                <div class="dropdown-menu" data-bs-popper="static">
                                    <?php foreach ($submenu['submenu1'] as $submenu1): ?>
                                        <a href="<?= $submenu1['url']; ?>" class="dropdown-item">
                                            <?= $submenu1['title']; ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<!-- <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#navbar-third" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
            </svg>
        </span>
        <span class="nav-link-title">
            Third
        </span>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="./#">
            First
        </a>
        <a class="dropdown-item" href="./#">
            Second
        </a>
        <a class="dropdown-item" href="./#">
            Third
        </a>
    </div>
</li> -->