



<div class="sidebar-module">
    <div class="p-8 px-5 bg-stone-800">
        <h5 class="text-gray-400 font-bold uppercase mb-3">Subscribe to our newsletter</h5>
        
        <div id="formLayout">
            {{-- Save subscriber form --}}
            <form action="{{url('subscribe/save')}}" method="POST" class="flex items-center" x-data="saveEmail()" @submit.prevent="submitData()">
                @csrf

                {{-- Email --}}
                <input type="email" name="email" x-model="formDataSubscribe.email" placeholder="Your email address" class="!bg-gray-50 !rounded !border focus:!border-sky-400 !p-2 !text-sm !text-gray-500 !outline-0">

                {{-- Submit --}}
                <button type="submit" class="!rounded-full !ml-3 !text-xs !bg-red-500 !h-6 !w-7 !p-0">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
            {{-- End form --}}

            <p class="text-xs mt-3.5 mb-0.5 text-gray-300">
                Learn about our scheduled events and receive the latest monthly content.
            </p>
        </div>

    </div>
</div>

<script>
    function saveEmail() {
        return {
            formDataSubscribe: {
                email: '',
                no_refresh: true
            },
            // message: 'Some message',
            
            submitData() {
                this.message = ''
                fetch('/subscribe/save', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': "{{csrf_token()}}",
                    },
                    body: JSON.stringify(this.formDataSubscribe)
                })
                .then(response => response.json())
                .then(result => {
                    console.log('Success:', result);
                    if(result == 'success'){
                        document.getElementById('formLayout').innerHTML = '<div class="alert-success w-full" role="alert">Your email was added to our mailing list!</div>';
                    }else{
                        document.getElementById('formLayout').innerHTML = '<div class="alert-success w-full" role="alert">Your email is already in our mailing list!</div>';
                    }
                    
                })
                .catch(err => {
                    console.log('Ooops! Something went wrong! '+err.message);
                    this.message = 'Ooops! Something went wrong!';
                })
            }
        }
    }
</script>