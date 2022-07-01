<div class="container">
    <div class="row text-center text-blue mb-5">
        <div class="col-lg-7 mx-auto">
            <form wire:submit.prevent="addProduct">
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" placeholder="Image" wire:model="photo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                        <button type="button" class="btn btn-primary" wire:click="closeAddForm()">Cancel</button>
                    </div>
                </div>
            </form>
            <?php
                 
                ?>
        </div>
    </div>
</div>