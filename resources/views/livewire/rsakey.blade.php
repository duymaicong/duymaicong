<div>
    <style>
        .text {
            /* white-space: nowrap;
            width: 200px;
            overflow: hidden;
            text-overflow: clip; */
            width: 350px;
            /* border: 1px solid #000000; */
            word-break: break-all;
        }

        .text:hover {
            overflow: visible;
        }
    </style>
    <form class="form-inline container ">

        <div class="form-group my-5" style="margin: auto;">
            <label class="d-flex text">{{$text}}</label>
            <label class="d-flex text">{{$retext}}</label>
            <input class="d-flex mt-1" style="max-width: 50rem" type="text" class="form-control" id="inputPassword2" placeholder="Text" wire:model.debounce.500ms="text">
        </div>
        <button type="button" class="btn btn-primary mb-2" wire:click="encryptText">Encrypt</button>
        <button type="button" class="btn btn-primary mb-2" wire:click="decryptText">Decrypt</button>
    </form>
</div>