<?php
/*
 * Template Name: Home Page Template
 */

get_header();
?>

<div id="main">
    <div class="container-fluid">
        <div class="row slider-container">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active">
                        <svg class="triangle" height="100%" width="40" viewBox="0 0 40 40">
                            <polygon fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" points="4,0 4,40 25,20"></polygon>
                        </svg>
                    </li>
                    <li data-target="#carousel" data-slide-to="1">
                        <svg class="triangle" height="100%" width="40" viewBox="0 0 40 40">
                            <polygon fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" points="4,0 4,40 25,20"></polygon>
                        </svg>
                    </li>
                    <li data-target="#carousel" data-slide-to="2">
                        <svg class="triangle" height="100%" width="40" viewBox="0 0 40 40">
                            <polygon fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" points="4,0 4,40 25,20"></polygon>
                        </svg>
                    </li>
                    <li data-target="#carousel" data-slide-to="3">
                        <svg class="triangle" height="100%" width="40" viewBox="0 0 40 40">
                            <polygon fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" points="4,0 4,40 25,20"></polygon>
                        </svg>
                    </li>
                    <li data-target="#carousel" data-slide-to="4">
                        <svg class="triangle" height="100%" width="40" viewBox="0 0 40 40">
                            <polygon fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" points="4,0 4,40 25,20"></polygon>
                        </svg>
                    </li>
                </ol>

               <!--Wrapper for slides--> 
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="https://unsplash.it/1400/600?image=114">
                        <div class="slider-description">
                            <div class="slider-title">Magnum</div>
                            <div class="slider-subtitle">
                                Magnum Pyjama Party
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="https://unsplash.it/1400/600?image=62">
                        <div class="slider-description">
                            <div class="slider-title">Magnum</div>
                            <div class="slider-subtitle">
                                Magnum Pyjama Party
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="https://unsplash.it/1400/600?image=315">
                        <div class="slider-description">
                            <div class="slider-title">Magnum</div>
                            <div class="slider-subtitle">
                                Magnum Pyjama Party
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="https://unsplash.it/1400/600?image=622">
                        <div class="slider-description">
                            <div class="slider-title">Magnum</div>
                            <div class="slider-subtitle">
                                Magnum Pyjama Party
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="https://unsplash.it/1400/600?image=401">
                        <div class="slider-description">
                            <div class="slider-title">Magnum</div>
                            <div class="slider-subtitle">
                                Magnum Pyjama Party
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="our-story">
                <p>Did you ever dare to ask the question:</p>
                <p>Does my brand have an interesting story to tell?</p>
                <a href="#">See our story</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
