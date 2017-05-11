<section class='bannerHome'>
    <div class='carousel' slider='3'>
        <div class="banner1">
            <img src="/images/banner/people1.png" alt="">
            <div class="description hidden">{{ trans('home.titleBanner1') }}</div>
        </div>
        <div class="banner2">
            <img src="/images/banner/people2.png" alt="">
            <div class="description hidden">{{ trans('home.titleBanner2') }}</div>
        </div>
        <div class="banner3">
            <img src="/images/banner/people1.png" alt="">
            <div class="description hidden">{{ trans('home.titleBanner3') }}</div>
        </div>
    </div>
    <div class="container">

        <article class='col-xs-12  col-sm-6 col-sm-offset-0 col-md-4 col-md-offset-0'>

        </article>
        <article class='col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-4'>

            <div class="row">
                <h1 class='title1 text-white col-xs-12' id='bannerDescription'>{{ trans('home.titleBanner') }}</h1>
            </div>
            <div class="space"></div>
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <button class='button1 background-active-green-color col-xs-12' id='bt-register' @click='myData.login = true'>{{ trans('home.buttonBanner') }}</button>
                </div>

            </div>

        </article>
    </div>
</section>
