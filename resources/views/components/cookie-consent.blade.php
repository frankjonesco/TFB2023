<style>
    @keyframes slideInFromRight {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(0);
        }
    }

    .slide-in {  
      /* This section calls the slideInFromLeft animation we defined above */
      animation: 0.5s ease-out 0s 1 slideInFromRight;
    }
</style>


<div id="cookieConsent" class="slide-in hidden fixed right-0 bottom-0 w-80 mr-6 mb-6 p-5 bg-slate-800 border-4 border-yellow-100 rounded-md text-zinc-300">
    <h3 class="text-white pt-0">        
        We value your privacy<i class="fa-solid fa-info-circle ml-3"></i>
    </h3>
    <p class="text-sm">We use cookies to enhance your browsing expreience, serve personalised ads or content, and analyse our traffic.</p>
    <p class="text-sm mb-5">By clicking 'Accept all', you consent to our use of cookies.</p>
    <div class="flex">
        <button class="btn-black !bg-lime-600" onclick="setCookie()">Accept all</button>
    </div>
</div>

<script>
    function getCookie (name) {
        let value = `; ${document.cookie}`;
        let parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    let cookieAccepted = getCookie('TOFAM-GDPR');

    if(!cookieAccepted){
        document.querySelector('#cookieConsent').classList.remove('hidden');
    }

    function setCookie(){
        console.log('Let\'s set a cookie!');
        document.cookie = 'TOFAM-GDPR=accepted;';
        document.querySelector('#cookieConsent').classList.add('hidden');
    }
</script>
