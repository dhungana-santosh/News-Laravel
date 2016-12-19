@extends('layouts.master')

@section('title')
    Dashboard
@endsection


@section('content')

    <div class="container-fluid">

        <div class="col-md-4">
            <div class="info users-info">
                <h5><i class="fa fa-users"></i> Users</h5>

                <section></section>

                <footer></footer>
            </div>
        </div>


        <div class="col-md-4">
            <div class="info news-info">
                <h5><i class="fa fa-newspaper-o"></i> News</h5>

                <section></section>

                <footer></footer>
            </div>
        </div>


        <div class="col-md-4">
            <div class="info slider-info">
                <h5><i class="fa fa-image"></i> Slider</h5>

                <section></section>

                <footer></footer>

            </div>
        </div>


        <div class="">

            <section>
                <div class="col-md-4"></div>

            </section>

        </div>

    </div>


@endsection