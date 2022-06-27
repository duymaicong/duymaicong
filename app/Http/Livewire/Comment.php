<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Comment as Comments;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Livewire\WithPagination;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Str;





class Comment extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public $check;
    public function addComment()
    {
        $this->validate(['newComment' => 'required|max:250', 'image' => 'image|mimes:jpg,png']);
        if ($this->newComment == '') {
            return;
        }
    
        
        // $image = $this->storeImage();

        // $createdComment = Comments::create([
        //     'body' => $this->newComment, 'user_id' => 1,
        //     'image' => $image

        // ]);
        // $this->check=$createdComment['id'];
        //  array_unshift($this->comments,['body' => $this->newComment,'create_at' => Carbon::now()->diffForHumans(),'creator' => 'sark']);
        // $this->comments->push($createdComment);
        // $this->comments->prepend($createdComment);
        $this->image = '';
        $this->newComment = '';
        session()->flash('message', 'Comment added successfully 😁');
    }
    public function remove($commentId)
    {
        if ($commentId == null) {
            return;
        }
        $comment = Comments::find($commentId);
        $comment->delete();
        // $this->comments = $this->comments->except($commentId);
        session()->flash('message', 'Comment deleted successfully 😊');
        // dd($comment);

    }
    public function updateComment($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|max:25']);
    }
    public $newComment;
    public $image;
    protected $listeners = ['fileUpload' => 'handleFileUpload'];
    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
        // dd($imageData);
    }
    public function storeImage()
    {

        if (!$this->image) {
            return null;
        }
        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function mount()
    {
        //$intinialComments
        // $this->comments=Comments::latest()->get();
        // $this->comments = $intinialComments;
    }

    // public $comments;

    public function render()
    {
        return view('livewire.comment', ['comments' => Comments::latest()->paginate(2)]);
    }
}
