<?php

/**
 * @var CodeIgniter\View\View $this
 * @var string|false          $fileName
 */
?>
<div>
    <div class="a-link a-link--button -icon">
        <a href="<?= route_to('file-rendered-pdf', $fileName) ?>" target="_blank">
            <i class="a-icon boschicon-bosch-ic-download"></i>
            <span>Download rendered PDF</span>
        </a>
    </div>
</div>