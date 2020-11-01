@extends('frontend.layouts.app')

@section('styles')
@endsection

@section('content')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('frontend/images/placeholder/header-inner.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-10 text-center">
                            <h1>{{ __('frontend.categories.title') }}</h1>
                            <p class="mb-0">{{ __('frontend.categories.description') }}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">

            <div class="overlap-category mb-5">
            @if(count($categories))

                <div class="row align-items-stretch no-gutters">
                @foreach( $categories as $key => $category )
                        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                            <a href="{{ route('page.category', $category->category_slug) }}" class="popular-category h-100">

                                @if($category->category_icon)
             
                                                             <span class="icon"><span>       
                                   <img src="{{Request::root()}}/laravel_project/public/files/{{ $category->fileToUpload }}" alt="{{ $category->category_name }}" >
                                                             </span></span>

                                @else
                                   <img src="{{Request::root()}}/laravel_project/public/files/{{ $category->fileToUpload }}" alt="{{ $category->category_name }}" >
                                @endif

                                <span class="caption mb-2 d-block">{{ $category->category_name }}</span>
                                <span class="number"> {{ DB::table('items')->where('category_id', $category->id)->count() }}</span>
                            </a>
                        </div>
                @endforeach
                </div>

            @endif
            </div>

            @if($ads_before_breadcrumb->count() > 0)
                @foreach($ads_before_breadcrumb as $ads_before_breadcrumb_key => $ad_before_breadcrumb)
                    <div class="row mb-5">
                        @if($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                            <div class="col-12 text-left">
                                <div>
                                {!! $ad_before_breadcrumb->advertisement_code !!}
                                </div>
                            </div>
                        @elseif($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                            <div class="col-12 text-center">
                                <div>
                                {!! $ad_before_breadcrumb->advertisement_code !!}
                                </div>
                            </div>
                        @elseif($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                            <div class="col-12 text-right">
                                <div>
                                {!! $ad_before_breadcrumb->advertisement_code !!}
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            @endif

            <div class="row mb-4">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('page.home') }}">{{ __('frontend.shared.home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('frontend.item.all-categories') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @if($ads_after_breadcrumb->count() > 0)
                @foreach($ads_after_breadcrumb as $ads_after_breadcrumb_key => $ad_after_breadcrumb)
                    <div class="row mb-5">
                        @if($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                            <div class="col-12 text-left">
                                <div>
                                    {!! $ad_after_breadcrumb->advertisement_code !!}
                                </div>
                            </div>
                        @elseif($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                            <div class="col-12 text-center">
                                <div>
                                    {!! $ad_after_breadcrumb->advertisement_code !!}
                                </div>
                            </div>
                        @elseif($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                            <div class="col-12 text-right">
                                <div>
                                    {!! $ad_after_breadcrumb->advertisement_code !!}
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            @endif

            <div class="row mb-5">
                <div class="col-md-12 text-left border-primary">
                    <h2 class="font-weight-light text-primary">{{ __('frontend.categories.sub-title-1') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">

                    @if($ads_before_content->count() > 0)
                        @foreach($ads_before_content as $ads_before_content_key => $ad_before_content)
                            <div class="row mb-5">
                                @if($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                    <div class="col-12 text-left">
                                        <div>
                                            {!! $ad_before_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                    <div class="col-12 text-center">
                                        <div>
                                            {!! $ad_before_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                    <div class="col-12 text-right">
                                        <div>
                                            {!! $ad_before_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    @endif

                    <div class="row">

                        @if(count($paid_items))
                            @foreach($paid_items as $key => $item)
                                <div class="col-lg-6">
                                    @include('frontend.partials.paid-item-block')
                                </div>
                            @endforeach
                        @endif

                        @if(count($free_items))
                            @foreach($free_items as $key => $item)
                                <div class="col-lg-6">
                                    @include('frontend.partials.free-item-block')
                                </div>
                            @endforeach
                        @endif

                    </div>

                    <div class="row">
                        <div class="col-12">

                            {{ $pagination->links() }}
                        </div>
                    </div>

                    @if($ads_after_content->count() > 0)
                        @foreach($ads_after_content as $ads_after_content_key => $ad_after_content)
                            <div class="row mt-5">
                                @if($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                    <div class="col-12 text-left">
                                        <div>
                                            {!! $ad_after_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                    <div class="col-12 text-center">
                                        <div>
                                            {!! $ad_after_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                    <div class="col-12 text-right">
                                        <div>
                                            {!! $ad_after_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    @endif

                </div>
                <div class="col-lg-3 ml-auto">

                    <div class="pt-3">
                        @if($ads_before_sidebar_content->count() > 0)
                            @foreach($ads_before_sidebar_content as $ads_before_sidebar_content_key => $ad_before_sidebar_content)
                                <div class="row mb-5">
                                    @if($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_before_sidebar_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_before_sidebar_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_before_sidebar_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif

                        @include('frontend.partials.search.side')

                        @if($ads_after_sidebar_content->count() > 0)
                            @foreach($ads_after_sidebar_content as $ads_after_sidebar_content_key => $ad_after_sidebar_content)
                                <div class="row mt-5">
                                    @if($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_after_sidebar_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_after_sidebar_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_after_sidebar_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>

            </div>

        </div>
    </div>

    @if(count($all_states))
        <div class="site-section bg-light">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-7 text-left border-primary">
                        <h2 class="font-weight-light text-primary">{{ __('frontend.categories.sub-title-2') }}</h2>
                    </div>
                </div>
                <div class="row mt-5">

                    @foreach($all_states as $key => $state)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                            <a href="{{ route('page.state', ['state_slug' => $state->state_slug]) }}">{{ $state->state_name }}</a>
                            ({{ $state->items_count }})
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif

@endsection

@section('scripts')

    @include('frontend.partials.search.js')
@endsection
