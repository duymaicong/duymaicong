<div>
    <div class="container py-5 ">
        <div class="row text-center text-blue mb-5 ">
            <div class="col-lg-7 mx-auto">
                <h1 class="display-4">Product List</h1>
                <button class="btn btn-primary text-center" wire:click="handleAddProduct()">Add Product</button>
              
                    
 
            </div>
        </div>
        @if($addForm)
        <div class="row text-center text-blue mb-5">
            <div class="col-lg-7 mx-auto">
                <form wire:submit.prevent="addProduct" >
                    @if(session()->has('message'))
                    <div class='text-success py-1'>
                        {{session('message')}}
                    </div>

                    @endif
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Name" wire:model="form.name">
                            @error('form.name') <span class="text-danger ">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Color" wire:model="form.color">
                            @error('form.color') <span class="text-danger ">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Ram" wire:model="form.ram">
                            @error('form.ram') <span class="text-danger ">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Description" wire:model="form.description">
                            @error('form.description') <span class="text-danger ">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="price" wire:model="form.price">
                            @error('form.price') <span class="text-danger ">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="image" placeholder="Image" wire:model="photo">
                            
                            @error('photo') <span class="text-danger ">{{ $message }}</span> @enderror
                            @if($photo)<p class="my-2"><img src="{{$photo->temporaryUrl()}}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2"></p>
                            @endif
                        </div>



                    </div>



                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            <button type="button" class="btn btn-primary" wire:click="closeAddForm()">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
        @if($editForm)
        <div class="row text-center text-blue mb-5">
            <div class="col-lg-7 mx-auto">
                <form wire:submit.prevent="updateProduct()">
                    @if(session()->has('message'))
                    <div class='text-success py-1'>
                        {{session('message')}}
                    </div>

                    @endif
                    <div class="row mb-3">
                        <div class="col-sm-10">

                            <input type="text" class="form-control" placeholder="Name" wire:model="formUpdate.name">
                            @error('formUpdate.name') <span class="text-danger ">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Color" wire:model="formUpdate.color">
                            @error('formUpdate.color') <span class="text-danger ">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Ram" wire:model="formUpdate.ram">
                            @error('formUpdate.ram') <span class="text-danger ">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Description" wire:model="formUpdate.description">
                            @error('formUpdate.description') <span class="text-danger ">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="price" wire:model="formUpdate.price">
                            @error('formUpdate.price') <span class="text-danger ">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="imageUpdate" placeholder="Image" wire:model="photo">
                            
                            @if($photo)<p class="m-2"><img src="{{$photo->temporaryUrl()}}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2"></p>
                            @else
                            @if($formUpdate['image'])
                            <p><img src="storage/{{$formUpdate['image']}}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2"></p>

                            @endif
                            @endif
                        </div>






                    </div>



                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                            <button type="button" class="btn btn-primary" wire:click="cancelUpdate()">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> @endif



        <div class="row ">
            <div class="col-lg-8 mx-auto">
                @if(session()->has('message'))
                <div class='text-success py-1'>
                    {{session('message')}}
                </div>

                @endif
                <!-- List group-->
                <ul class="list-group shadow">
                    <!-- list group item-->
                    @foreach($products as $product)
                    <li class="list-group-item d-flex py-4 py-2 width-100">
                        <!-- Custom content-->
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h5 class="mt-0 font-weight-bold mb-2">{{$product->name}} ({{$product->color}},{{$product->ram}})</h5>
                                <p class="font-italic text-muted mb-0 small">{{$product->description}}</p>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h6 class="font-weight-bold my-2 text-primary">{{number_format($product->price);}}</h6>

                                </div>
                            </div><img src="storage/{{$product->image}}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">

                        </div> <!-- End -->
                        <div d-flex>
                            <button class="btn btn-primary" wire:click="editProduct({{$product}})">edit</button>
                            <button class="btn btn-danger my-5" wire:click="removeProduct({{$product['id']}})">delete</button>
                        </div>
                    </li> <!-- End -->
                    @endforeach

                </ul> <!-- End -->
            </div>
        </div>
        <div class="d-flex justify-content-center m-5">{{ $products->links() }}</div>
    </div>
    <script>
       window.livewire.on('searchKey',()=>{
        let cha=document.getElementById('search');

       })
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
        window.livewire.on('fileChoosenUpdate', () => {
            var file = document.getElementById('imageUpdate');
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