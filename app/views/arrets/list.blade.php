@extends('layouts.master')
@section('content')

<?php $custom = new \Custom; ?>

<div class="page-header text-align-left">
    <h1 class="title uppercase">Recueil de jurisprudence neuchâteloise</h1>
</div><!--END PAGE-HEADER-->

<div class="content">
    <div class="section" ng-app="filter">

        <div id="inner-content" isotope-container="isotope-container" ng-controller="ArretController as arret">

            @if(!empty($arrets))
                @foreach($arrets as $arret)

                    <?php $cats = ( !$arret->arrets_categories->isEmpty() ? $arret->arrets_categories->implode('title', ' ') : '' ); ?>

                    <div class="three-fourth">
                        <div class="post  {{ $cats }}">
                            <div class="post-title">
                                <?php setlocale(LC_ALL, 'fr_FR');  ?>
                                <h2 class="title"><a href="blog-single.html">{{ $arret->reference }} du {{ $arret->pub_date->formatLocalized('%d %B %Y') }}</a></h2>
                                <p>{{ $arret->abstract }}</p>
                            </div><!--END POST-TITLE-->
                            <div class="post-entry">
                                <p>{{ $arret->pub_text }}</p>
                            </div>
                        </div><!--END POST-->
                    </div>
                    <div class="one-fifth last listCat">
                        @if(!$arret->arrets_categories->isEmpty())
                            @foreach($arret->arrets_categories as $arrets_categorie)
                                <img width="110" border="0" alt="{{ $arrets_categorie->title }}" src="{{ asset('newsletter/pictos/'.$arrets_categorie->image) }}">
                                <p class="centerText">{{ $arrets_categorie->title }}</p>
                            @endforeach
                        @endif
                    </div>
                    <span class="clear"></span>

                @endforeach
            @endif

        </div><!--END INNER-CONTENT-->

        <!-- Sidebar  -->
        @include('partials.filters')
        <!-- END Sidebar  -->

    </div><!--END SECTION-->
</div><!--END CONTENT-->

@stop
