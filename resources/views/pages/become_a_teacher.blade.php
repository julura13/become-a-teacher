@extends('front')

@section('content')

@if (Request::path() == 'candidate/store')
<script>
    window.location.href = "/";
</script>

@endif
<!-- push external head elements to head -->

<div id="controlButtons" class="container tw-mt-5">
    <a href="/" id="backBtn" class="tw-text-3xl tw-bg-transparent tw-border tw-border-gray-200 hover:tw-bg-yellow-500 tw-rounded tw-px-2 tw-pt-1 tw-text-gray-200 hover:tw-border-white hover:tw-text-white tw-hidden"><i class="ik ik-arrow-left-circle tw-p-0 tw-m-0"></i></a>
</div>

<div class="container md:tw-my-20 tw-my-10" id="content-wrapper">
    <div class="user tw-text-center">
        @php
            $user_name = explode(" ", $user->name);
        @endphp
        <h3 class="tw-text-white md:tw-text-3xl tw-text-lg tw-font-bold">
            Looking great there {{ $user_name[0] }}! What would you like to find out?
        </h3>
    </div>
    <div id="card" class="tw-rounded">
    <section id="choice">@include('pages.sections.choice')</section>

    <section id="search">@include('pages.sections.search')</section>

    <section id="filter">@include('pages.sections.filter')</section>

    <section id="method">@include('pages.sections.method')</section>

    {{-- <div class="row tw-w-full">
        <div class="tw-mx-auto">
        <button id="back" class="btn btn-custom tw-bg-red-600 tw-w-40 hover:tw-bg-white hover:tw-text-red-600 hover:tw-border-red-600">BACK</button>
        <button id="confirm" class="btn btn-custom tw-bg-green-600 tw-w-40 hover:tw-bg-white hover:tw-text-green-600 hover:tw-border-green-600">CONFIRM</button>
        </div>
    </div> --}}
</div>
</div>


<script>
$("#choice").show();
$("#search").hide();
$("#filter").hide();
$("#method").hide();
$("#back").hide();
$("#confirm").hide();

$("#card").addClass("tw-bg-transparent");
$("#card").addClass("tw-shadow-none");

$("#goto_search").click(function(){
    $("#searchPage").removeClass("tw-hidden");
    $("#choice").hide();
    $("#search").show();
    $("#back").show();
    $("#confirm").show();
    $("#backBtn").removeClass("tw-hidden");
    $("#card").removeClass("tw-shadow-none");
    $("#content-wrapper").addClass("tw-my-6");
    $("#content-wrapper").removeClass("tw-my-20");
})

$("#backBtn").on("click", function () {
    $(this).addClass("tw-hidden");
    $("#content-wrapper").removeClass("tw-my-10");
    $("#content-wrapper").addClass("tw-my-20");

})

$("#backSearch").on("click", function () {
    $("#method").hide();
    $("#search").removeClass("tw-hidden");
    $("#search").show();
    $("#searchbox").val("");
    $("#searchbox").focus();
    searchFilter("#searchbox");
    
})

$("#more_info").on("click", function () {
    $("#more_info").addClass("tw-hidden");
    $("#pathway_info").removeClass("tw-hidden");
    $("#less_info").removeClass("tw-hidden");
})

$("#less_info").on("click", function () {
    $("#more_info").removeClass("tw-hidden");
    $("#pathway_info").addClass("tw-hidden");
    $("#less_info").addClass("tw-hidden");
})

$("#goto_filter").click(function(){
    $("#choice").hide();
    $("#filter").show();
    $("#back").show();
    $("#backBtn").removeClass("tw-hidden");
    $("#card").removeClass("tw-bg-transparent");
    $("#card").removeClass("tw-shadow-none");
    $("#content-wrapper").addClass("tw-my-6");
    $("#content-wrapper").removeClass("tw-my-20");
})

$("#back").click(function(){
    $("#choice").show();
    $("#search").hide();
    $("#filter").hide();
    $("#back").hide();
    $("#confirm").hide();
    $("#card").addClass("tw-bg-transparent");
    $("#card").addClass("tw-shadow-none");
})

$("#confirm").click(function(){

})

function searchFilter(selector) {
    var filter = $(selector).val(),
        count = 0;
    $('#results div').each(function () {
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();
        } else {
            $(this).show();
            count++;
        }
    });
  }
</script>



@endsection
