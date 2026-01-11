
@extends('layouts.frontend-master')
@section('contents')
<!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            @if (count($categories) > 0)
                 @foreach ($categories as $category)


                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <a class="text-decoration-none" href="">
                            <div class="cat-item d-flex align-items-center mb-4">
                                <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                    <img class="img-fluid" src="{{ asset('images') }}/{{ $category->photo }}" alt="">
                                </div>
                                <div class="flex-fill pl-3">
                                    <h6>{{ $category->name }}</h6>
                                    <small class="text-body">Chama.com</small>
                                </div>
                            </div>
                        </a>
                    </div>


            @endforeach
            @else
                    <h3>No Category available now</h3>
            @endif


    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Latest Clothes</span></h2>
        <div class="row px-xl-5">

            @if(count($items) > 0)
                @foreach ($items as $item)
                            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" style="height:300px;" src="{{ asset('images') }}/{{ $item->photo }}" alt="">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href="{{ route('cart.add',$item->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="">{{ $item->name }}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>{{ $item->price }}</h5>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-secondary mr-1"></small>
                                        <small>(99)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach


            @else
                    <h3>No Items Available</h3>
            @endif

    <!-- Products End -->


    <!-- Offer Start -->



@endsection
