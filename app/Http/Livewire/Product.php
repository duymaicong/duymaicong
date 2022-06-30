<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Products;
use Dotenv\Validator;
use Intervention\Image\ImageManagerStatic;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class Product extends Component
{
    use WithFileUploads;
    public $photo;
    public $checkImage;
    // public $product;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $editForm = '';
    public $addForm = '';
    public function handleAddProduct()
    {
        $this->photo = '';
        $this->image = '';
        $this->addForm = '1';
        $this->editForm = '';
    }
    public function closeAddForm()
    {
        $this->photo = '';
        $this->addForm = '';
    }
    public function search(){
        // dd('a');
    }
    public function addProduct()
    {
        $this->validate([
            'form.name' => 'required|max:250',
            'form.color' => 'required|max:250',
            'form.ram' => 'required|max:250',
            'form.description' => 'required|max:250|regex:/(^[A-Za-z0-9]+$)+/',
            'form.price' => 'required|max:250',
            'photo' => 'image|mimes:jpeg,jpg,png,gif|max:2000'
        ]);
        // dd($this->photo->getRealPath());
        $a = $this->photo->storeAs('public', Str::random() . '.jpg');
        $image = substr($a, 7);
        // dd($image);
        // $image = $this->storeImage();
        // $this->form['image'] = $image;
        $this->form['image'] = $image;
        $createdProduct = Products::create(
            $this->form
        );
        session()->flash('message', 'added product successfully 😁');
        $this->form = [
            'name'                 => '',
            'color'              => '',
            'ram'              => '',
            'description'              => '',
            'price'              => '',
            'user_id'           => '1',
            'image'             => '',
        ];
        $this->closeAddForm();
        // dd($add);
    }
    public $form = [
        'name'                 => '',
        'color'              => '',
        'ram'              => '',
        'description'              => '',
        'price'              => '',
        'user_id'           => '1',
        'image'             => '',
    ];
    public $formUpdate = [
        'id' => '',
        'name'                 => '',
        'color'              => '',
        'ram'              => '',
        'description'              => '',
        'price'              => '',
        'user_id'           => '1',
        'image' => ''
    ];
    public $image;
    protected $listeners = ['fileUpload' => 'handleFileUpload'];
    public function handleFileUpload($imageData)
    {
        $this->form['image'] = $imageData;
        $this->image = $imageData;
        // dd($imageData);
    }
    public function removeProduct($id)
    {
        if ($id == null) {
            return;
        }
        $pro = Products::find($id);
        $pro->delete();
        // $this->comments = $this->comments->except($commentId);
        session()->flash('message', 'deleted successfully 😊');
    }
    public function editProduct($i)
    {
        $this->addForm = '';
        $this->photo = '';
        $this->image = '';
        $this->editForm = 1;
        $this->formUpdate['id'] = $i['id'];
        $this->formUpdate['name'] = $i['name'];
        $this->formUpdate['color'] = $i['color'];
        $this->formUpdate['ram'] = $i['ram'];
        $this->formUpdate['description'] = $i['description'];
        $this->formUpdate['price'] = $i['price'];
        $this->formUpdate['user_id'] = $i['user_id'];
        $this->formUpdate['image'] = $i['image'];
        // dd($i);


        // dd($check);
        // Products::updated(['name'=>'name','id'=>$i['id']]);
    }
    public function cancelUpdate()
    {
        $this->editForm = '';
    }
    public function updateProduct()
    {
        $this->validate([
            'formUpdate.name' => 'required|max:250',
            'formUpdate.color' => 'required|max:250',
            'formUpdate.ram' => 'required|max:250',
            'formUpdate.description' => 'required|max:250',
            'formUpdate.price' => 'required|max:250',
        ]);
        if (!$this->photo) {
            $check = Products::find($this->formUpdate['id']);
            $check->name = $this->formUpdate['name'];
            $check->color = $this->formUpdate['color'];
            $check->ram = $this->formUpdate['ram'];
            $check->description = $this->formUpdate['description'];
            $check->price = $this->formUpdate['price'];
            $check->save();
            $this->editForm = '';
            session()->flash('message', 'updated successfully 😊');
        } else {
            $this->validate([
                'photo' => 'image|mimes:jpeg,jpg,png,gif|max:2000'
            ]);
            $a = $this->photo->storeAs('public', Str::random() . '.jpg');
            $image = substr($a, 7);
            // dd($image);
            // $image = $this->storeImage();
            // $this->form['image'] = $image;

            // dd($this->image);

            $check = Products::find($this->formUpdate['id']);
            $check->name = $this->formUpdate['name'];
            $check->color = $this->formUpdate['color'];
            $check->ram = $this->formUpdate['ram'];
            $check->description = $this->formUpdate['description'];
            $check->price = $this->formUpdate['price'];
            $check->image = $image;
            $check->save();
            $this->editForm = '';

            session()->flash('message', 'updated successfully 😊');
        }
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


    // protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.product', ['products' => Products::latest()->paginate(3)]);
    }
}
