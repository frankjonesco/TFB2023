<x-layout-heading heading="Comments" class="heading-mt" />
<div id="commentsList">
    @foreach($article->comments as $comment)
        <div class="flex text-gray-600 text-sm mb-6">
            <img src="" alt="" class="w-14 h-14 mr-3 rounded-full border border-gray-400">
            <div>
                <div class="comment-bubble rounded w-full ml-3 mb-2.5 px-4 py-2 italic bg-slate-50 !border-stone-200">
                    {!!linkify($comment->body)!!}
                </div>
                <div class="ml-7 text-xs">
                    <div class="mt-1 text-xs italic text-gray-400"><i class="fa-solid fa-user mr-1.5"></i>{{$comment->author_name}} - {{showDateTime($comment->created_at)}}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<x-layout-heading heading="Leave a comment" class="heading-mt" />

<form id="commentForm" action="/news/articles/post-comment" x-data="submitComment()" method="POST" @submit.prevent="submitData()">
    @csrf
    <input type="hidden" name="hex" x-model="formData.hex" value="{{$article->hex}}">
    <div class="flex flex-col mb-3">
        <div class="form-block flex">
            <div class="w-1/2 mr-2">
                <label for="name" class="text-gray-600">Name</label>
                <input type="text" name="name" placeholder="Your name" x-model="formData.name" class="!bg-gray-50 !rounded !border !border-gray-300 focus:!border-sky-400 !p-2 !text-sm !text-gray-500 !outline-0 !placeholder-gray-400">
            </div>
            <div class="w-1/2">
                <label for="name" class="text-gray-600">Email</label>
                <input type="email" name="email" placeholder="Email address" x-model="formData.email" class="!bg-gray-50 !rounded !border !border-gray-300 focus:!border-sky-400 !p-2 !text-sm !text-gray-500 !outline-0 !placeholder-gray-400">
            </div>
        </div>
        <div class="form-block">
            <label for="comment">Comment</label>
            <textarea name="comment" rows="5" placeholder="Type your comment" x-model="formData.comment" class="!bg-gray-50 !rounded !border !border-gray-300 focus:!border-sky-400 !p-2 !text-sm !text-gray-500 !outline-0 !placeholder-gray-400"></textarea>
        </div>
        <div class="form-block">
            <button type="submit" class="btn btn-plain mt-3">
                <i class="fa-solid fa-comments mr-1"></i>
                Leave comment
            </button>
        </div>
    </div>
</form>
<script>
    function submitComment() {
        return {
            formData: {
                hex: '{{$article->hex}}',
                name: '{{$article->name}}',
                email: '{{$article->email}}',
                comment: '{{$article->comment}}',
            },
            // message: 'Some message',
            
            submitData() {
                this.message = ''
                fetch('/news/articles/post-comment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': "{{csrf_token()}}",
                    },
                    body: JSON.stringify(this.formData)
                })
                .then(response => response.json())
                .then(result => {
                    console.log('Success:', result.author_name);
                    // document.getElementById('commentsList').innerHTML += '<b>'+result.body+'</b>';
                    document.getElementById('commentsList').innerHTML += '<div class="flex text-gray-600 text-sm mb-6"><img src="" alt="" class="w-14 h-14 mr-3 rounded-full border border-gray-400"><div><div class="comment-bubble rounded w-full ml-3 mb-2.5 px-4 py-2 italic bg-slate-50 !border-stone-200">{!!linkify("' + result.body + '")!!}</div><div class="ml-7 text-xs"><div class="mt-1 text-xs italic text-gray-400"><i class="fa-solid fa-user mr-1.5"></i>' + result.author_name + ' - </div></div></div></div>';
                    //   this.message = 'likes: ' + result;
                    // document.getElementById('likeCount').textContent=result;
                    // document.getElementById('likeForm').classList.add('d-none');
                    // document.getElementById('unlikeForm').classList.remove('d-none');


                                      
                })
                .catch(() => {
                    console.log('Ooops! Something went wrong!');
                    this.message = 'Ooops! Something went wrong!';
                })
            }
        }
    }
</script>
