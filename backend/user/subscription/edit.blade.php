<?php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>


@extends('backend.user.layouts.app')

@section('styles')
<style>
textarea#comment {
    resize: none;
    background: #1cc88a;
    color: white;
}

::-webkit-input-placeholder { /* Edge */
  color: white;
}
img {
    width: 30%;
    padding: 1%;
}
label.radio-inline {
    display: -webkit-inline-box;
}
.alert.alert-success {
    direction: rtl;
    background: bottom;
    font-size: 22px;
    text-align: center;
    font-size: x-large;
    font-weight: 900;
}
</style>
@endsection

@section('content')

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800">{{ __('backend.subscription.switch-plan') }}({{$type}})</h1>
            <p class="mb-4">{{ __('backend.subscription.switch-plan-desc-user') }}</p>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('user.subscriptions.index') }}" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-backspace"></i>
                </span>
                <span class="text">{{ __('backend.shared.back') }}</span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            @if($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ __('backend.subscription.switch-plan-help') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row justify-content-center">

                @foreach($all_plans as $key => $plan)
                    <div class="col-3 text-center">
                        <div class="row mb-3"><div class="col-12"><span class="text-gray-800">{{ $plan->plan_name }}</span></div></div>
                        <div class="row mb-3"><div class="col-12"><span class="text-gray-800 text-lg">{{ $plan->plan_price }}</span></div></div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <span class="text-gray-800">
                                    @if($plan->plan_period == \App\Plan::PLAN_LIFETIME)
                                        {{ __('backend.plan.lifetime') }}
                                    @elseif($plan->plan_period == \App\Plan::PLAN_MONTHLY)
                                        {{ __('backend.plan.monthly') }}
                                    @elseif($plan->plan_period == \App\Plan::PLAN_QUARTERLY)
                                        {{ __('backend.plan.quarterly') }}
                                    @elseif($plan->plan_period == \App\Plan::PLAN_YEARLY)
                                        {{ __('backend.plan.yearly') }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <hr/>

                        <div class="row mb-3">
                            <div class="col-12">
                                <span class="text-gray-800">
                                    {{ empty($plan->plan_max_featured_listing) ? __('backend.plan.unlimited') : $plan->plan_max_featured_listing }} {{ __('backend.plan.featured-listing') }}
                                </span>
                            </div>
                        </div>
                        <hr/>
 {{Route::current()->getName()}}
                        <div class="row mb-3"><div class="col-12"><span class="text-gray-800">{{ $plan->plan_features }}</span></div></div>
                        <div class="row mb-3">
                               <hr>
                            <div class="col-12">
                                <form method="post" action=" {{ route('user.Transforma') }}" class="p-5">
                                    @csrf
<div class="form-group" style="
    display: none;
">
  <textarea class="form-control" rows="5" id="comment" placeholder="Notes" name="Notes">Notes</textarea>
</div>
                               <label class="radio-inline">
                                                                 <img src="https://www.flaticon.com/svg/static/icons/svg/2398/2398987.svg" >

                                   <input type="radio" name="Type" value="Bank transfer" checked>Bank transfer</label>
                               <label class="radio-inline">
                                                                      <img src="https://mashbac.com/wp-content/uploads/2018/07/method-3.png" >


                                   <input type="radio" name="Type" value="Vodafone Cash">Vodafone Cash</label>
                                   <input type="hidden" id="custId" name="Code" value="{{generateRandomString()}}">
                                   <input type="hidden" id="custId" name="Package" value="{{ $plan->plan_name }}">
                                   <input type="hidden" id="custId" name="price" value="{{ $plan->plan_price }}">
                                   <input type="hidden" id="custId" name="User" value="{{Auth::user()->name}}">
                                         <input type="hidden" id="custId" name="id_u" value="{{Auth::user()->id}}">
                                   
                                   <input type="hidden" id="custId" name="st" value="0">
                                   <br>
                                   <hr>
                                    <div class="row form-group justify-content-between">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success py-2 px-4 text-white" {{ $subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID ? 'disabled' : '' }}>
                                                {{ __('backend.plan.select-plan') }}
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@endsection

@section('scripts')
@endsection
