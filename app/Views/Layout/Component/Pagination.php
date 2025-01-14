<?php $pager->setSurroundCount(3) ?>
<ul class="pagination">

    <!-- Previous  -->
    <?php if ($pager->hasPrevious()) : ?>
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getFirst() ?>" tabindex="-1" aria-disabled="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M11 7l-5 5l5 5" />
                <path d="M17 7l-5 5l5 5" />
            </svg>
        </a>
    </li>


    <li class="page-item">
        <a class="page-link" href="<?= $pager->getPrevious() ?>" tabindex="-1" aria-disabled="true">
            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M15 6l-6 6l6 6"></path>
            </svg>
            prev
        </a>
    </li>
    <?php endif; ?>

    <!-- Link Item -->
    <?php foreach ($pager->links() as $link): ?>
    <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
        <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
    </li>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
    <!-- Next -->
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getNext() ?>">
            next
            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 6l6 6l-6 6"></path>
            </svg>
        </a>
    </li>

    <li class="page-item">
        <a class="page-link" href="<?= $pager->getLast() ?>" tabindex="-1" aria-disabled="true">
            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-right">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M7 7l5 5l-5 5" />
                <path d="M13 7l5 5l-5 5" />
            </svg>
        </a>
    </li>
    <?php endif; ?>
</ul>