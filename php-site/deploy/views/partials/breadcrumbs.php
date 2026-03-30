<?php
/** @var array<int, array{label: string, href: string}> $items */
?>
<nav aria-label="Breadcrumb" class="border-l-2 border-[#ff4500]/30 pl-3">
  <ol class="flex items-center gap-1.5 flex-wrap">
    <?php foreach ($items as $index => $item) :
      $isLast = $index === count($items) - 1;
      ?>
      <li class="flex items-center gap-1.5 text-xs sm:text-[11px]">
        <?php if ($index > 0) : ?>
          <span class="text-white/20 select-none" aria-hidden="true">/</span>
        <?php endif; ?>
        <?php if ($isLast) : ?>
          <span class="text-[#ff4500] font-medium py-1" aria-current="page"><?= tml_e($item['label']) ?></span>
        <?php else : ?>
          <a href="<?= tml_e($item['href']) ?>" class="text-white/30 transition-colors duration-200 hover:text-white/90 py-1 min-h-[44px] flex items-center"><?= tml_e($item['label']) ?></a>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</nav>
