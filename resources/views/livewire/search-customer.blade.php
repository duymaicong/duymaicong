<div class="container m-3">

    <div>

        <input type="text" id='test' wire:model="search" wire:keydown.escape="reset" wire:keydown.tab="reset">

    </div>
    {{$index}}


    <form wire:submit="searchCustomer">
        {{$search}}
        <input type="text" class="form-control search-input" placeholder="search" wire:model="search">
    </form>
    <div class="list-group search-results-dropdown">
        <div class="list-group-item" wire:loading>searching...</div>
    </div>
    @if(!$customers[0])
    <div class="list-group search-results-dropdown">
        <div class="list-group-item">Không có kết quả phù hợp.</div>
    </div>
    @endif
    <div class="list-group search-results-dropdown">
        @foreach ($customers as $customer)
        @if($customers[$index]==$customer)
        <a href="" class="list-group-item bg-primary text-white"> {{$customer->name}} </a>
        @else
        <a href="" class="list-group-item"> {{$customer->name}} </a>
        @endif

        @endforeach
    </div>


    <div class="container mt-3 mb-4">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase mb-0">Manage Customer</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap user-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                                        <th scope="col" class="border-0 text-uppercase font-medium">Name</th>
                                        <th scope="col" class="border-0 text-uppercase font-medium">Address</th>
                                        <th scope="col" class="border-0 text-uppercase font-medium">Phone</th>
                                        <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>

                                    </tr>
                                </thead>
                                @foreach ($customers as $customer)
                                <tbody>
                                    <tr>
                                        <td class="pl-4">{{$customer->id}}</td>
                                        <td>
                                            <h5 class="font-medium mb-0">{{$customer->name}}</h5>

                                        </td>
                                        <td>
                                            <span class="text-muted">{{$customer->address}}</span><br>

                                        </td>
                                        <td>

                                            <span class="text-muted">{{$customer->phone}}</span>
                                        </td>


                                        <td>

                                            <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>
                                            <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-edit"></i> </button>

                                        </td>
                                    </tr>

                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        {{$highlightIndex}}
        <input type="text" id='test' wire:model="query" wire:keydown.escape="reset" wire:keydown.tab="reset" wire:keydown.Arrow-Up="decrementHighlight" wire:keydown.Arrow-Down="incrementHighlight" wire:keydown.Enter="selectContact">

    </div>
    <div x-data="{ hover: false }">
  <span x-on:mouseover="hover = true" x-on:mouseout="hover = false">Hover Here</span>
  <span x-show="hover">Shows on Hover</span>
</div>
   

    <div class="list-group search-results-dropdown">
        @foreach ($contacts as $i => $contact)

        <a href="{{ route('customer', $contact['id']) }}" class="list-group-item {{$highlightIndex==$i ?'bg-primary text-white':''}} hover"> {{$contact->name}} </a>


        @endforeach
    </div>






    <!-- <script>
    window.addEventListener("keydown",  function(event) {
    event.preventDefault();
    if (event.keyCode === 38) {
        Livewire.emit('testMethod');
    }
});
</script> -->
    <Script>
        var t = 0;
        window.livewire.on('testKey', () => {

            $("#test").keyup(function(event) {
                if (event.keyCode === 38) {
                    window.livewire.emit('test');

                } else if (event.keyCode === 40) {

                    var check = $("#test").val();
                    window.livewire.emit('test2');

                } else {
                    var check = $("#test").val();
                    window.livewire.emit('test3', check);

                }
            });
        });




        // let text = document.getElementById('test');
        // window.livewire.emit('test', text);
    </Script>