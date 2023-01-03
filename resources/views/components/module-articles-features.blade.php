<style>
    /* body {
      height: 100vh;
      display: grid;
      place-items: center;
    } */

    .slider {
      position: relative;
      overflow: hidden;
    }

    .slide {
      width: 100%;
      max-width: 800px;
      height: 350px;
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
      top: 45%;
      left: 2%;
    }

    .btn-next {
      top: 45%;
      right: 2%;
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

<div class="sidebar-module">
    <div class="slider mt-7 w-full h-72 bg-red-300">
        @foreach(randomArticles(3) as $article)
            <div class="slide">
                <div class="bg-no-repeat bg-cover bg-center px-12 py-5 mb-1.5 flex flex-col justify-end overflow-hidden h-72" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.50)), url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');">
                    <div class="flex flex-col justify-center items-center h-full">
                        <h3 class="pt-3 pb-3 text-center">
                            <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80 no-underline">
                                {{$article->title}}
                            </a>
                        </h3>
                        <span class="text-xs italic text-zinc-100">
                            <span class="mr-3">
                                <i class="fa-regular fa-clock mr-1"></i>
                                {{showDate($article->created_at)}}
                            </span>
                            <span class="mr-6">
                                <i class="fa-regular fa-user mr-1"></i>
                                by {{$article->user->full_name}}
                            </span>
                            <span>
                                <i class="fa-regular fa-eye mr-1"></i>
                                {{$article->views}}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        @endforeach

        

        <!-- Control buttons -->
        <button class="btn-carousel btn-next px-1.5 py-1 bg-white bg-opacity-40 hover:bg-yellow-50 hover:bg-opacity-30 text-gray-200 hover:!text-white" id="next">></button>
        <button class="btn-carousel btn-prev px-1.5 py-1 bg-white bg-opacity-40 hover:bg-yellow-50 hover:bg-opacity-30 text-gray-200 hover:!text-white" id="prev"><</button>

        {{-- Indicators --}}
        <div class="indicators">
            @foreach(randomArticles(3) as $article)
                @if($loop->first)
                    <span class="!bg-red-500"></span>
                @else
                    <span></span>
                @endif
            @endforeach
        </div>

    </div>
</div>

  <script>
    // Select all slides
    const slides = document.querySelectorAll(".slide");

    // loop through slides and set each slides translateX property to index * 100% 
    slides.forEach((slide, indx) => {
      slide.style.transform = `translateX(${indx * 100}%)`;
    });


    // select next slide button
    const nextSlide = document.getElementById('next');

    // select prev slide button
    const prevSlide = document.getElementById('prev');

    const indicators = document.querySelectorAll('.indicators > span');

    // current slide counter
    let curSlide = 0;
    // maximum number of slides
    let maxSlide = slides.length - 1;

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

        doIndicators();
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

    function doIndicators(){
        indicators.forEach((el, i) => {
            if (el.classList.contains('!bg-red-500')) {
                el.classList.remove('!bg-red-500')
            };
            if (curSlide === i){
                el.classList.add('!bg-red-500');
            }
        });
    }

    indicators.forEach((el, i) => {

        el.addEventListener('click', function(){
            // console.log(i);
            if(curSlide === maxSlide) {
                curSlide = 0;
            }
            else{
                curSlide++;
            }
            console.log(curSlide);

            indicators.forEach((el, i) => {

                doIndicators();
            });

            
            
            slides.forEach((slide, indx) => {
                slide.style.transform = `translateX(${100 * (indx-i)}%)`;
            });
            
        });
        
    });
    

</script>