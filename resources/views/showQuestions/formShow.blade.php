@extends('layouts.layouts')

<div class="wrapper">
    <div class="wrap" id="q1">
        <div class="text-center pb-4">
            <div class="h5 font-weight-bold"><span id="number"> </span>1 of 3</div>
        </div>
        <div class="h4 font-weight-bold" ></div>
        <div class="pt-4">
            <form>
                <label class="options">Rahul Gandhi <input type="radio" name="radio"> <span class="checkmark"></span>
                </label> <label class="options">Indira Gandhi <input type="radio" name="radio"> <span
                        class="checkmark"></span> </label> <label class="options">Narendra Modi <input type="radio"
                                                                                                       name="radio"
                                                                                                       id="rd" checked>
                    <span class="checkmark"></span> </label> <label class="options">Ram Nath Kovind <input type="radio"
                                                                                                           name="radio">
                    <span class="checkmark"></span> </label>
            </form>
        </div>
        <div class="d-flex justify-content-end pt-2">
            <button class="btn btn-primary" id="next1">Next <span class="fas fa-arrow-right"></span></button>
        </div>
    </div>
            <button class="btn btn-primary" id="next">Submit</button>
        </div>
    </div>
</div>
<div class="d-flex flex-column align-items-center">
    <div class="h3 font-weight-bold text-white">Go Dark</div>
    <label class="switch"> <input type="checkbox"> <span class="slider round"></span> </label>
</div>


<script>

    function uncheck() {
        var rad = document.getElementById('rd')
        rad.removeAttribute('checked')
    }

    document.addEventListener('DOMContentLoaded', function () {
        const main = document.querySelector('body')
        const toggleSwitch = document.querySelector('.slider')

        toggleSwitch.addEventListener('click', () => {
            main.classList.toggle('dark-theme')
        })
    })
</script>
