<?php
$isSearch = isset($query) ? $query : false;
$previous = $currentPage > 1 ? ($currentPage - 1) : 1;
$next = $currentPage < $totalPages ? ($currentPage + 1) : $totalPages;
$isDisabledPrevious = $currentPage == 1 ? 'disabled' : '';
$isDisabledNext = $currentPage == $totalPages ? 'disabled' : '';
function renderPageItem($i, $currentPage, $isSearch)
{
    if ($isSearch) {
        if ($currentPage == $i) {
            echo '<li class="page-item active">
            <a class="page-link" href="?page=' . $i . '&q=' . $isSearch . '">' . $i . '</a>
            </li>';
        } else {
            echo '<li class="page-item">
            <a class="page-link" href="?page=' . $i . '&q=' . $isSearch . '">' . $i . '</a>
            </li>';
        }
    } else {
        if ($currentPage == $i) {
            echo '<li class="page-item active">
            <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
            </li>';
        } else {
            echo '<li class="page-item">
            <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
            </li>';
        }
    }

}


function renderDisabledPageItem($i)
{
    echo '<li class="page-item disabled">
    <a class="page-link" href="#">' . $i . '</a>
    </li>';
}

if ($isSearch) {
    echo '<li class="page-item ' . $isDisabledPrevious . '">
    <a class="page-link"
        href="?page=' . $previous . '&q=' . $isSearch . '">Previous</a>
    </li>';
} else {
    echo '<li class="page-item ' . $isDisabledPrevious . '">
    <a class="page-link"
        href="?page=' . $previous . '">Previous</a>
    </li>';
}


if ($totalPages <= 10) {
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($currentPage == $i) {
            renderPageItem($i, $currentPage, $isSearch);
        } else {
            renderPageItem($i, $currentPage, $isSearch);
        }
    }
} else if ($currentPage < 6) {
    for ($i = 1; $i < 6; $i++) {
        if ($currentPage == $i) {
            renderPageItem($i, $currentPage, $isSearch);
        } else {
            renderPageItem($i, $currentPage, $isSearch);
        }
    }
    renderDisabledPageItem('...');

    // li last page
    renderPageItem($totalPages, $currentPage, $isSearch);
} else if ($currentPage > $totalPages - 5) {
    // li first page
    renderPageItem(1, $currentPage, $isSearch);
    renderDisabledPageItem('...');
    for ($i = $totalPages - 4; $i <= $totalPages; $i++) {
        if ($currentPage == $i) {
            renderPageItem($i, $currentPage, $isSearch);
        } else {
            renderPageItem($i, $currentPage, $isSearch);
        }
    }
} else {
    // li first page
    renderPageItem(1, $currentPage, $isSearch);
    renderDisabledPageItem('...');
    for ($i = $currentPage - 2; $i <= $currentPage + 2; $i++) {
        if ($currentPage == $i) {
            renderPageItem($i, $currentPage, $isSearch);
        } else {
            renderPageItem($i, $currentPage, $isSearch);
        }
    }
    renderDisabledPageItem('...');
    // li last page
    renderPageItem($totalPages, $currentPage, $isSearch);
}
// next
if ($isSearch) {
    echo '<li class="page-item ' . $isDisabledNext . '">
    <a class="page-link"
        href="?page=' . $next . '&q=' . $isSearch . '">Next</a>
    </li>';
} else {
    echo '<li class="page-item ' . $isDisabledNext . '">
<a class="page-link"
    href="?page=' . $next . '">Next</a>
</li>';
}

?>