<div class="mailbox-read-info">
    <h3>Subject : {{$data['subject']}}</h3>
</div>

<div class="mailbox-read-message">
    <p>{!!$data['message']!!}</p>
</div>

<div class="form-group">
    <h2>Click the button below to start shopping your favourite beverage items now.</h2>
    <button class="form-control btn btn-primary">
        <a href="{{route('home-index')}}" class="form-control">GoTo Home</a>
    </button>

</div>