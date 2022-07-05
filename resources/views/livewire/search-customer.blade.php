<div class="container m-3">
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