
<div class="container mt-5 d-flex justify-content-center">
<form class=" w-25 "  wire:submit.prevent="submit">
<div class="form-outline mb-4">
    <input type="text" id="form2Example1" class="form-control" placeholder="Name" wire:model="form.name" />
   
    @error('name') <span class="text-danger ">{{ $message }}</span> @enderror
</div>
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control" placeholder="Your Email" wire:model="form.email" />
    @error('form.email') <span class="text-danger ">{{ $message }}</span> @enderror
</div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" placeholder="Your Password" wire:model="form.password" />
    @error('form.password') <span class="text-danger ">{{ $message }}</span> @enderror
    
  </div>
  <!-- Password confirm input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" placeholder="Confirm Password" wire:model="form.password_confirmation"/>
  </div>

  

  <!-- Submit button -->
  <div>
            @if(session()->has('message'))
            <div class='text-success py-1'>
                {{session('message')}}
            </div>

            @endif
        </div>
  <button type="Submit" class="btn btn-primary btn-block mb-4">Register</button>
  <button type="button" class="btn btn-primary btn-block mb-4" wire:click="resetForm">Reset</button>


  <!-- Register buttons -->
  <div class="text-center">
   
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
<form class=" w-25 "  wire:submit.prevent="submit">
<div class="form-outline mb-4">
    <input type="text" id="form2Example1" class="form-control" placeholder="Name" wire:model="formSecond.name" />
   
    @error('name') <span class="text-danger ">{{ $message }}</span> @enderror
</div>
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control" placeholder="Your Email" wire:model="formSecond.email" />
    @error('form.email') <span class="text-danger ">{{ $message }}</span> @enderror
</div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" placeholder="Your Password" wire:model="formSecond.password" />
    @error('form.password') <span class="text-danger ">{{ $message }}</span> @enderror
    
  </div>
  <!-- Password confirm input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" placeholder="Confirm Password" wire:model="formSecond.password_confirmation"/>
  </div>

  

  <!-- Submit button -->
  <div>
            @if(session()->has('message'))
            <div class='text-success py-1'>
                {{session('message')}}
            </div>

            @endif
        </div>
  <button type="Submit" class="btn btn-primary btn-block mb-4">Register</button>
  <button type="button" class="btn btn-primary btn-block mb-4" wire:click="resetForm">Reset</button>


  <!-- Register buttons -->
  <div class="text-center">
   
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
</div>

