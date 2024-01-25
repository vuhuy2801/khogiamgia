<?php
if(!isset($banner)){
    $banner = [];
}
function renderBanner($banner)
{
    $html = '';
    foreach ($banner as $key => $value) {
        $html .= '
        <div class="carousel-item ' . ($key == 0 ? 'active' : '') . '">
            <a href="' . $value['address_target'] . '" target="_blank">
                <img src="' . $value['image'] . '" alt="" />
            </a>
        </div>
        ';
    }
    return $html;
}

function renderBannerIndicator($banner)
{
    $html = '';
    foreach ($banner as $key => $value) {
        $html .= '
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="' . $key . '" class="' . ($key == 0 ? 'active' : '') . '" aria-current="true"
            aria-label="Slide ' . $key . '"></button>
        ';
    }
    return $html;
}

function renderDefaultBanner()
{
    return '
    <div class="carousel-item active">
        <a href="#" target="_blank">
            <img src="/public/images/banner.png" alt="" />
        </a>
    </div>
    ';
}

function renderDefaultBannerIndicator()
{
    return '
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 0"></button>
    ';
}

function renderButton()
{
    return ' <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
</button>

<button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</button>';
}

?>
<section class="banner">
    <div class="container" data-aos="fade-up">
        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php echo count($banner) === 0 ? renderDefaultBannerIndicator() : renderBannerIndicator($banner) ?>
            </div>
            <div class="carousel-inner">
                <?php echo count($banner) === 0 ? renderDefaultBanner() : renderBanner($banner) ?>
            </div>
            <?php echo count($banner) > 1 ? renderButton() : '' ?>
        </div>
    </div>

</section>