<form action="{{route('event.register', $event->id)}}" method="POST">
    @csrf
    <div class="modal fade bd-example-modal-lg" id="paidEventRegisterModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-6 pl-4">
                    <div class="modal-header flex-column py-3 mr-auto" style="border-bottom: none">
                        <h5 class="modal-title" id="freeEventRegisterModalLabel" style="font-weight: bold">Register for
                            {{ $event->name }}<br> </h5>
                        <p class="mb-0"> {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }} by
                            {{ \Carbon\Carbon::parse($event->time)->toTimeString() }} WAT</p>
                    </div>
                    <hr style="width: auto;">

                    <div class="modal-body">

                        <div class="container ticketQuantity">
                            @foreach ($event->tiers as $key => $tier)
                                <div class="row">
                                    <div class="px-0 col-6">
                                        <h6>{{ $tier->name }}</h6>

                                        <p class="text-muted">&#8358; <span id="tierPrice{{$key}}">{{ number_format($tier->price) }}</span></p>
                                    </div>
                                    <div class="px-0 col-6">
                                        <div class="form-group">
                                            <input type="number" id="quantity{{$key}}" max="{{ $tier->limit_remaining ?? 100000000000000000 }}" class="numberOfSlots custom-select form-control form-control-lg mx-3" name="{{ $tier->reference }}">
                                            <small for="" class=" text-muted float-right">{{ $tier->limit_remaining ?? 'Unlimited' }} slot(s) left</small>
    
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- This particular section is for if the user is not signed in. If he's signed in after putting in the number of tickets, it should register auto. Else, it should ask for name and email. --}}
                        <div class="container guestForm" style="display: none;">
                            <div class="form-group py-2">
                                <div class="form-row">
                                    {{-- <div class="col-md-6 col-6">
                                            <label for="">FIRST NAME</label>
                                            <input type="text" class="form-control form-control-lg" placeholder="First name" name="fnameGuest">
                                        </div> --}}
                                    <div class="col-md-6 col-6">
                                        <label for="">FULL NAME</label>
                                        <input type="text" class="form-control form-control-lg" placeholder="Full Name"
                                            value="{{ auth()->user()->name }}" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <label for="">EMAIL ADDRESS</label>
                                <input type="email" name="email" id="event-name" class="form-control form-control-lg"
                                    placeholder="Email address" value="{{ auth()->user()->email }}"
                                    aria-describedby="helpId">
                            </div>
                        </div>
                        {{-- This particular section is for if the user is not signed in. If he's signed in after putting in the number of tickets, it should register auto. Else, it should ask for name and email. --}}
                    </div>

                </div>
                <div class="col-md-6 bg-light px-0">
                    <div class="modal-header flex-column pt-0 pr-0"
                        style="background-image: url({{asset("images/event/$event->featured_image")}}); background-position: center center; height: 250px;">
                        {{-- <img src="{{asset('images/info-image.svg')}}" class="img-fluid" style=""> --}}
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <h6 class="font-weight-bold">Order Summary</h6>
                            @foreach ($event->tiers as $tier)
                                <div class="row justify-content-between text-muted my-4">
                                    <span class="ml-3">
                                        {{ $tier->name }}
                                    </span>
                                    <span class="mr-3">
                                        &#8358; <span>{{ number_format($tier->price) }}</span>
                                    </span>
                                </div>
                            @endforeach
                            <hr style="width: auto">
                            <div class="row justify-content-between text-muted  font-weight-bold my-4">
                                <span class="ml-3">
                                    Total
                                </span>
                                <span class="mr-3">
                                    &#8358; <span class="totalPrice">0</span>
                                </span>
                            </div>
                            <div class="pt-3 pb-5 float-right">
                                <button type="button" class="btn btnPrimary ctaButton">Continue</button>
                                <button type="Submit" class="btn btnPrimary submitButton" style="display: none;">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</form>

<script>
    $(document).ready(function() {
        sumTotal1 = 0;
        sumTotal2 = 0;
        sumTotal3 = 0;
        total = 0;
    // const sumTotal1 = 0;
    // const sumTotal2= 0;
    
    const price = $('#tierPrice0').html().replace(',','');
    $("#quantity0").change(function() {
        sumTotal1 = (parseInt($(this).val()) * price);
        total = sumTotal1 + sumTotal2 
        $('.totalPrice').html(+total);
                   
    });

    const price2 = $('#tierPrice1').html().replace(',','');
    $("#quantity1").change(function() {
        sumTotal2 = (parseInt($(this).val()) * price2);
        total = sumTotal1+ sumTotal2 
        $('.totalPrice').html(+total);
    });

    const price3 = $('#tierPrice2').html().replace(',','');
    $("#quantity2").change(function() {
        sumTotal3 = (parseInt($(this).val()) * price3);
        total = sumTotal1+ sumTotal2 + sumTotal3;
        $('.totalPrice').html(+total);
    });
});
    // const price = $('#tierPrice').html().replace(',','');
    // const totalPrice = parseInt($('.totalPrice').html());
    // const quantity = document.querySelectorAll('#quantity');
    // console.log(quantity.val());

    // $("#quantity").change(function() {
    //     const totalPrice = parseInt($(this).val()) * price;
    //     console.log(totalPrice);
        
    //     $('.totalPrice').html(+totalPrice);
    // });
    
    
</script>