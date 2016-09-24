<?php
/**
 * Created by PhpStorm.
 * User: Phillip
 * Date: 9/9/2016
 * Time: 4:41 PM
 */
?>
<div class="flex-viewport" style="overflow: hidden; position: relative; height: 360px;">
    <div class="slider-wrap" style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-810px, 0px, 0px);">
        <div class="slide clone" aria-hidden="true" style="width: 270px; margin-right: 0px; float: left; display: block;">
            <a href="#">
                <img src="{{ $product->thumbnail }}" alt="Dark Brown Boots" draggable="false">
            </a>
        </div>
        <div class="slide" data-thumb-alt="" style="width: 270px; margin-right: 0px; float: left; display: block;">
            <a href="#">
                <img src="{{ $product->thumbnail2 }}" alt="Dark Brown Boots" draggable="false">
            </a>
        </div>
        <div class="slide" data-thumb-alt="" style="width: 270px; margin-right: 0px; float: left; display: block;">
            <a href="#">
                <img src="{{ $product->thumbnail }}" alt="Dark Brown Boots" draggable="false">
            </a>
        </div>
        <div class="slide flex-active-slide" data-thumb-alt="" style="width: 270px; margin-right: 0px; float: left; display: block;">
            <a href="#">
                <img src="{{ $product->thumbnail2 }}" alt="Dark Brown Boots" draggable="false">
            </a>
        </div>
        <div class="slide clone" aria-hidden="true" style="width: 270px; margin-right: 0px; float: left; display: block;">
            <a href="#">
                <img src="{{ $product->thumbnail }}" alt="Dark Brown Boots" draggable="false">
            </a>
        </div>
    </div>
</div>
