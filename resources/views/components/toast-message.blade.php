@if(session()->has('message'))
    <div class="fixed left-1/2 top-1/4 translate-y-12 transform -translate-x-1/2 transition-all duration-200 ease-in" data-replace="{ 'opacity-0': 'opacity-100', 'translate-y-12': 'translate-y-0' }">
        <div 
            id="toast-success" 
            class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg border border-white shadow" role="alert" 
        >
            <div
                class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200"
            >
                <span class="sr-only">Check icon</span>
                <i class="fa-solid fa-check self-center mr-0"></i>
            </div>
            <div 
                class="mx-3 text-sm font-normal"
            >
                {{session('message')}}
            </div>
        </div>
    </div>
@endif

<script>
    // document.addEventListener("DOMContentLoaded", function(){
    //     var replacers = document.querySelectorAll('[data-replace]');
    //     for(var i=0; i<replacers.length; i++){
    //         let replaceClasses = JSON.parse(replacers[i].dataset.replace.replace(/'/g, '"'));
    //         Object.keys(replaceClasses).forEach(function(key) {
    //             replacers[i].classList.remove(key);
    //             replacers[i].classList.add(replaceClasses[key]);
    //         });
    //     }
    // });
    document.addEventListener("DOMContentLoaded", function(){
        setTimeout(function(){
            var replacers = document.querySelectorAll('[data-replace]');
            for(var i=0; i<replacers.length; i++){
                let replaceClasses = JSON.parse(replacers[i].dataset.replace.replace(/'/g, '"'));
                Object.keys(replaceClasses).forEach(function(key) {
                    replacers[i].classList.remove(key);
                    replacers[i].classList.add(replaceClasses[key]);
                });
            }
        }, 0 /* 0.001 seconds */ );

        setTimeout(function(){
            var replacers = document.querySelectorAll('[data-replace]');
            for(var i=0; i<replacers.length; i++){
                let replaceClasses = JSON.parse(replacers[i].dataset.replace.replace(/'/g, '"'));
                Object.keys(replaceClasses).forEach(function(key) {
                    replacers[i].classList.add(key);
                    replacers[i].classList.remove(replaceClasses[key]);
                });
            }
        }, 2000 /* 3.000 seconds */ );
    });
</script>