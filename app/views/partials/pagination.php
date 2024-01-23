<?php
$previous = $currentPage > 1 ? ($currentPage - 1) : 1;
$next = $currentPage < $totalPages ? ($currentPage + 1) : $totalPages;
$isDisabledPrevious = $currentPage == 1 ? 'disabled' : '';
$isDisabledNext = $currentPage == $totalPages ? 'disabled' : '';
function renderPageItem($i, $currentPage)
{
    if ($currentPage == $i) {
        echo '<li class="page-item active">
        <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
        </li>';
    } else {
        echo '<li class="page-item">
        <a class="page-link" href="?page=' . $i . '">'.$i.'</a>
        </li>';
    }
}

function renderDisabledPageItem($i)
{
    echo '<li class="page-item disabled">
    <a class="page-link" href="#">' . $i . '</a>
    </li>';
}


echo '<li class="page-item ' . $isDisabledPrevious . '">
<a class="page-link"
    href="?page=' . $previous . '">Previous</a>
</li>';

if ($totalPages <= 10) {
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($currentPage == $i) {
            renderPageItem($i, $currentPage);
        } else {
            renderPageItem($i, $currentPage);
        }
    }
} else if ($currentPage < 6) {
    for ($i = 1; $i < 6; $i++) {
        if ($currentPage == $i) {
            renderPageItem($i, $currentPage);
        } else {
            renderPageItem($i, $currentPage);
        }
    }
    renderDisabledPageItem('...');

    // li last page
    renderPageItem($totalPages, $currentPage);
} else if ($currentPage > $totalPages - 5) {
    // li first page
    renderPageItem(1, $currentPage);
    renderDisabledPageItem('...');
    for ($i = $totalPages - 4; $i <= $totalPages; $i++) {
        if ($currentPage == $i) {
            renderPageItem($i, $currentPage);
        } else {
            renderPageItem($i, $currentPage);
        }
    }
} else {
    // li first page
    renderPageItem(1, $currentPage);
    renderDisabledPageItem('...');
    for ($i = $currentPage - 2; $i <= $currentPage + 2; $i++) {
        if ($currentPage == $i) {
            renderPageItem($i, $currentPage);
        } else {
            renderPageItem($i, $currentPage);
        }
    }
    renderDisabledPageItem('...');
    // li last page
    renderPageItem($totalPages, $currentPage);
}
// next
echo '<li class="page-item ' . $isDisabledNext . '">
<a class="page-link"
    href="?page=' . $next . '">Next</a>
</li>';

?>