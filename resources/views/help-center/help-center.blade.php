@extends('layouts.help-center')
@section('css')
    <style>
        .form-control {
            display: inline-block;
        }
        .accordion .card:not(:last-of-type){
            margin-bottom: 10px;
            border-radius: 10px;
        }
        .card-header{
            background-color: white;
            padding-bottom: 10px;
            border: none
        }
        .card-header h2 button,  .card-header h2 button:hover{
            text-decoration: none;
            color: black;
        }
        .accordion>.card:not(:last-of-type) {
            border-bottom: 1px solid rgba(0,0,0,.125);
        }


    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="jumbotron jumbotron-terms">
            <div class="container-fluid py-4 my-4 text-center">
                <h1 class="h2 mb-4">Help Center</h1>
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="col-md-6 col-sm-10 col-lg-6 mx-auto">
                            <input class="form-control form-control-lg" type="search" placeholder="Search for questions"
                                aria-label="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="heading">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is the accumulated delivery fee for? How much is the handling fee?
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Some placeholder content for the first accordion panel. This panel is n by default, thanks to
                        the <code>.</code> class.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="heading">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Can I pay using Paypal without a Paypal account?
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        Some placeholder content for the second accordion panel. This panel is hidden by default.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            You can! Just choose that option at checkout to proceed
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by
                        default.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            How do I activate my account?
                        </button>
                    </h2>
                </div>

                <div id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">
                        Some placeholder content for the first accordion panel. This panel is n by default, thanks to
                        the <code>.</code> class.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFive">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            What is the meaning of Lorem ipsum?
                        </button>
                    </h2>
                </div>

                <div id="collapseFive" class="collapse " aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body">
                        Some placeholder content for the first accordion panel. This panel is n by default, thanks to
                        the <code>.</code> class.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingSix">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            How can I track my orders & payment?
                        </button>
                    </h2>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                    <div class="card-body">
                        Some placeholder content for the second accordion panel. This panel is hidden by default.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingSeven">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            What is the most used version?
                        </button>
                    </h2>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                    <div class="card-body">
                        And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by
                        default.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingEight">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                            How many free samples can I redeem?
                        </button>
                    </h2>
                </div>

                <div id="collapseEight" class="collapse " aria-labelledby="headingEight" data-parent="#accordionExample">
                    <div class="card-body">
                        Some placeholder content for the first accordion panel. This panel is n by default, thanks to
                        the <code>.</code> class.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingNine">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                            Why must I make payment immediately at checkout?
                        </button>
                    </h2>
                </div>

                <div id="collapseNine" class="collapse " aria-labelledby="headingNine" data-parent="#accordionExample">
                    <div class="card-body">
                        Some placeholder content for the first accordion panel. This panel is n by default, thanks to
                        the <code>.</code> class.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTen">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            What is the accumulated delivery fee for? How much is the handling fee?
                        </button>
                    </h2>
                </div>
                <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                    <div class="card-body">
                        Some placeholder content for the second accordion panel. This panel is hidden by default.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingEleven">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                            How do I cancel my orders before I make a payment?
                        </button>
                    </h2>
                </div>
                <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                    <div class="card-body">
                        And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by
                        default.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwelve">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve">
                            How do you ship my orders?
                        </button>
                    </h2>
                </div>

                <div id="collapseTwelve" class="collapse " aria-labelledby="headingTwelve" data-parent="#accordionExample">
                    <div class="card-body">
                        Some placeholder content for the first accordion panel. This panel is n by default, thanks to
                        the <code>.</code> class.
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('script')
<script src="{{asset('js/main.js')}}"></script>
@endsection
