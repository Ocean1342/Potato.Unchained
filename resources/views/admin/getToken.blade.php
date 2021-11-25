@if(isset($token))

    <div class="mt-3">
        <b>user_id:</b> {{$user_id}}
    </div>

    <div class="mt-3">
        <b>token:</b> Bearer {{$token}}
    </div>

@else
    <form action="/home" method="post" class="mt-3">
        @method('post')
        @csrf
        <input type="text" name="need-token" value="1" hidden>
        <button type="submit" class="btn btn-info">Get Api-Token</button>
    </form>
@endif
