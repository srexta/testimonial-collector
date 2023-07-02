<?php 
/**
 * Contact Form Template
 */
?>
<div class="container">
    <div class="text-center">
        Contact Form
    </div>
    <form id="tc-data-collector">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="name" class="form-control" id="fullname">
        </div>
        <div class="form-group">
            <label for="short-title">Short Title </label>
            <input type="name" class="form-control" id="short-title">
        </div>
        <div class="form-group">
            <label for="long-desc">Long Desc</label>
            <textarea class="form-control" id="long-desc"></textarea>
        </div>
        <div class="form-group form-check">
            <input type="range" min="1" max="5" value="1" class="slider" id="myRange">
            <label class="form-check-label" for="exampleCheck1">Rate me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>