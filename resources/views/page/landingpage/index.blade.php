@extends('layout')
@section('content')
<style>
    .block-title {
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        line-height: 1;
        margin-top: 0;
        margin-bottom: 26px;
        border-bottom: 2px solid #e29c04;
    }

    .block-title a, .block-title span, .block-title label {
        line-height: 17px;
        display: inline-block;
        padding: 7px 12px 4px 12px;
        background-color: #e29c04;
        color: #fff;
    }
</style>
<!-- tour noi bat -->
@include('page/landingpage/outStandingTour')
<!-- end tour noi bat -->


<!-- tour moi va tour giam gia -->
@include('page/landingpage/recentlyAndDiscountTour')
<!-- end tour moi va tour giam gia -->

@endSection
