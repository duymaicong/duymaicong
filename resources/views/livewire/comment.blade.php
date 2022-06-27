<div>


    <div class="container">
        <h1 class="text-3xl">Comments</h1>
        <section>
            @if($image)
            <img src="{{$image}}" style="width:200">
            @endif
            <input type="file" id="image" wire:change="$emit('fileChoosen')">
        </section>
        @error('newComment')<span class="text-danger">{{$message}}</span>
        @enderror
        <div>
            @if(session()->has('message'))
            <div class='text-success py-1'>
                {{session('message')}}
            </div>

            @endif
        </div>
        {{$newComment}}
        <form class="my-4 flex" wire:submit.prevent="addComment">
            <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind." wire:model.debounce.500ms="newComment">
            <div class="py-2">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
        @foreach($comments as $comment)
        <div class="rounded border shadow p-3" style="min-width: 50em;">
            <div class="d-flex justify-content-between">
                <div class="flex justify-align-content-start my-2">
                    <span class="mx-3 py-1 text-primary">{{$comment['user_id']}}</span>
                    <span class="mx-3 py-1 text-primary">{{$comment->created_at->diffForHumans()}}</span>

                </div>
                <button disabled="disabled"><i class="btn btn-dark fas fa-times text-danger hover-overlay" wire:click="remove({{$comment['id']}})"></i></button>
            </div>
            @if($comment['image'])<img src="storage/{{$comment->image}}" >
            @endif
            <p class="text-black-50">{{$comment['body']}}</p>

        </div>
        @endforeach
        <div>{{ $comments->links('pagition-links') }}</div>




    </div>
    <script>
        window.livewire.on('fileChoosen', () => {
            let file = document.getElementById('image');
            file = file.files[0];

            if (file) {
                let reader = new FileReader();
                reader.onloadend = () => {
                    window.livewire.emit('fileUpload', reader.result);
                }
                reader.readAsDataURL(file);
            }

        })
    </script>







</div>