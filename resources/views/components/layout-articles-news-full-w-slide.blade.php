<style>
    /* body {
      height: 100vh;
      display: grid;
      place-items: center;
    } */

    .slider {
      position: relative;
    }

    .slide {
        width:25%;
        height:500px;
        position: absolute;
        transition: all 0.5s;
    }

    .slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .btn-carousel {
      position: absolute;
      z-index: 10px;
      cursor: pointer;
    }

    .btn-carousel:active {
      transform: scale(1.1);
    }

    .btn-prev {
        position: relative;
        top: 0;
    }

    .btn-next {
        position: relative;
        top: 0;

    }

    .indicators {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: 0;
      margin-bottom: 10px;
    }

    .indicators>span {
      display: inline-block;
      border-radius: 50%;
      width: 10px;
      height: 10px;
      background: white;
      cursor: pointer;
    }


</style>

@php 
$bg_color = 'bg-slate-700';
@endphp

<div class="flex w-full {{$bg_color}} border-b border-b-gray-300 h-[33rem] overflow-hidden">
    <div class="{{$bg_color}} z-10 bg-opacity-70 h-full" style="width:12.5%;"></div>
    <div class="w-3/4 overflow-visible z-0 pt-6 pb-32">
        <div {{$attributes->merge(['class' => 'flex mb-7'])}}>
            <h3 class="pr-2 pb-3 border-b border-red-500 uppercase text-sm text-gray-100">Featured Articles</h3>
            <span class="grow border-b border-gray-300 text-right">
                <!-- Control buttons -->
                <button class="btn-carousel btn-prev px-1.5 hover:bg-yellow-50 bg-transparent border border-gray-400 text-gray-400 py-0" id="prev"><</button>
                <button class="btn-carousel btn-next px-1.5 hover:bg-yellow-50 bg-transparent border border-gray-400 text-gray-400 py-0" id="next">></button>
            </span>
        </div>
        


        <div class="slider my-7">
            @foreach($articles as $article)
                <div class="slide border-r border-gray-600 h-min">
                    <x-card-articles-list-item-md :article="$article" />
                </div>
            @endforeach

            
        </div>
    </div>
    <div class="w-1/8 {{$bg_color}} bg-opacity-70 z-0" style="width:12.5%;"></div>
</div>
<script>
    // Select all slides
    const slides = document.querySelectorAll(".slide");

    // loop through slides and set each slides translateX property to index * 100% 
    slides.forEach((slide, indx) => {
      slide.style.transform = `translateX(${-100}%)`;
    });


    // select next slide button
    const nextSlide = document.getElementById('next');

    // select prev slide button
    const prevSlide = document.getElementById('prev');


    // current slide counter
    let curSlide = 1;
    // maximum number of slides
    let maxSlide = slides.length - 4;

    // loop through slides and set each slides translateX property to index * 100% 

    

    slides.forEach((slide, indx) => {
      slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
    });

    setInterval(() => {
        if(curSlide >= 0){
            if(curSlide < maxSlide){
                curSlide++;
            }
            if(curSlide === maxSlide){
                curSlide = 1;
                
            }
        }else{
            if(curSlide === maxSlide){
                curSlide = 1;
            }
            else{
                curSlide--;
            }
            
        }

        console.log('curSlide = ' + curSlide);
        console.log('maxSlide = ' + maxSlide);

        slides.forEach((slide, indx) => {
            
            
            
            slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
        });
    }, 5000);

    // add event listener and navigation functionality
    nextSlide.addEventListener("click", function () {
        // console.log('Next');
        // check if current slide is the last and reset current slide
        if(curSlide === maxSlide) {
            curSlide = 0;
        }
        else{
            curSlide++;
        }

        // move slide by -100%
        slides.forEach((slide, indx) => {
            slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
        });

        // console.log(curSlide);

    });

    // add event listener and navigation functionality
    prevSlide.addEventListener("click", function () {
        // check if current slide is the first and reset current slide to last
        if(curSlide === 0) {
            curSlide = maxSlide;
        }
        else{
            curSlide--;
        }

        //   move slide by 100%
        slides.forEach((slide, indx) => {
            slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
        });
    });

    

    
    

</script>