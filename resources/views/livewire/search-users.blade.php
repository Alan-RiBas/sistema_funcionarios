<div>
    <div class="content-fluid">
        <div class="row mb-3">
            <div class="col-11">
                <input wire:model.live="search" type="text" class="form-control"/>
                <i class="bi bi-search"></i>
            </div>
        </div>

        @if($search == '')
            @else
            @foreach($users as $user)
                <div class="bg-info p-3 rounded mb-2">
                    <div class="bg-light rounded p-3">
                        <h6>Nome: {{ $user->name }}</h6>
                        <p>E-mail:{{ $user->email }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
