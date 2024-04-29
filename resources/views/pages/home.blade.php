@extends('front')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<div class="tw-px-0 md:tw-px-4">
    <div class="justify-content-center">
        <section id="welcome">
            <div class="tw-mx-0 tw-px-0 tw-my-2 md:tw-m-3 text-center">
                <br>
                <div class="tw-mx-auto tw-bg-white tw-rounded tw-p-5 md:tw-p-8 md:tw-w-106 tw-w-full tw-max-w-full md:tw-max-w-xl">
                {{-- <h1>Welcome to <b class="tw-text-blue-500">How to become a teacher</b> !</h1> --}}
                {{-- <a href="{{url('login')}}" class="btn btn-success">Go to Admin</a> --}}
                {{-- <a href="http://radmin.rakibhstu.com/docs/" class="btn btn-primary">Docs</a> --}}
                {{-- <a href="https://documenter.getpostman.com/view/11223504/Szmh1vqc?version=latest" class="btn btn-danger">API Endpoint</a> --}}
                <p class="tw-text-2xl tw-text-gray-900 tw-mb-7">
                    To get started we need you <br>to enter some information for us.
                </p>
                <div>
                    <form action="/candidate/store" method="post" class="form tw-text-left tw-mx-auto">
                        @csrf
                        <label for="name" class="tw-mb-1 tw-text-lg tw-font-normal">Your preferred name and last name</label>
                        <input type="text" name="name" id="name" class="form-input tw-mt-1 tw-mb-4 tw-block tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-300 focus:tw-ring focus:tw-ring-indigo-200 focus:tw-ring-opacity-50" required autofocus>
                        <label for="email" class="tw-mb-1 tw-text-lg tw-font-normal">Email address</label>
                        <input type="email" class="form-input tw-mt-1 tw-mb-4 tw-block tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-300 focus:tw-ring focus:tw-ring-indigo-200 focus:tw-ring-opacity-50" name="email" id="email" required>
                        <label for="email_confirm" class="tw-mb-1 tw-text-lg tw-font-normal">Confirm Email address</label>
                        <input type="email" class="form-input tw-mt-1 tw-mb-4 tw-block tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-300 focus:tw-ring focus:tw-ring-indigo-200 focus:tw-ring-opacity-50" name="email_confirm" id="email_confirm" required>
                        <label for="age" class="tw-mb-1 tw-block tw-text-lg tw-font-normal">Age</label>
                        <select name="age" id="age" class="form-select tw-mt-1 tw-mb-4 tw-block md:tw-w-56 tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-300 focus:tw-ring focus:tw-ring-indigo-200 focus:tw-ring-opacity-50" required>
                            
                            <option value=""></option>
                            <option value="I am under 18">I am under 18</option>
                            <option value="I am between 18 - 20">I am between 18 - 20</option>
                            <option value="I am between 20-25">I am between 20-25</option>
                            <option value="I am between 25- 30">I am between 25- 30</option>
                            <option value="I am between 30-35">I am between 30-35</option>
                            <option value="I am between 35-40">I am between 35-40</option>
                            <option value="I am between 40-45">I am between 40-45</option>
                            <option value="I am 45+">I am 45+</option>
                            {{-- @for ($i = 16; $i < 36; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                            <option value="Other">Other</option> --}}
                        </select>
                        {{-- <input type="number" name="age" id="age" class="form-input tw-mt-1 tw-mb-4 tw-block tw-w-24 tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-300 focus:tw-ring focus:tw-ring-indigo-200 focus:tw-ring-opacity-50" required max="99" min="12"> --}}
                        <label for="university" class="tw-mb-1 tw-mt-4 tw-block tw-text-lg tw-font-normal">At which university did you complete your undergraduate qualification?</label>
                        <select type="text" name="university" id="university" class="form-select tw-mt-1 tw-mb-4 tw-block tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-300 focus:tw-ring focus:tw-ring-indigo-200 focus:tw-ring-opacity-50" required>
                            
                            <option value=""></option>
                            <option value="Cape Peninsula University of Technology">Cape Peninsula University of Technology</option>
                            <option value="Central University of Technology">Central University of Technology</option>
                            <option value="Durban University of Technology">Durban University of Technology</option>
                            <option value="Mangosuthu University of Technology">Mangosuthu University of Technology</option>
                            <option value="North-West University">North-West University</option>
                            <option value="Rhodes University">Rhodes University</option>
                            <option value="Sefako Makgatho Health Sciences University">Sefako Makgatho Health Sciences University</option>
                            <option value="Sol Plaatjie University">Sol Plaatjie University</option>
                            <option value="Tshwane University of Technology">Tshwane University of Technology</option>
                            <option value="UNISA">UNISA</option>
                            <option value="University of Cape Town">University of Cape Town</option>
                            <option value="University of Johannesburg">University of Johannesburg</option>
                            <option value="University of Pretoria">University of Pretoria</option>
                            <option value="University of Witswatersrand">University of Witswatersrand</option>
                            <option value="University of the Western Cape">University of the Western Cape</option>
                            <option value="University of Fort Hare">University of Fort Hare</option>
                            <option value="University of KwaZulu-Natal">University of KwaZulu-Natal</option>
                            <option value="University of Limpopo">University of Limpopo</option>
                            <option value="University of Mpumalanga">University of Mpumalanga</option>
                            <option value="University of Stellebosch">University of Stellebosch</option>
                            <option value="University of the Free State">University of the Free State</option>
                            <option value="University of Venda">University of Venda</option>
                            <option value="University of Zululand">University of Zululand</option>
                            <option value="Vaal University of Technology">Vaal University of Technology</option>
                            <option value="Walter Sisulu University">Walter Sisulu University</option>
                            <option value="Other">Other</option>

                        </select>
                        <label for="university_other" id="university_other_label" class="tw-mb-1 tw-text-lg tw-font-normal tw-hidden">Other university name</label>
                        <input type="text" name="university_other" id="university_other" class="form-input tw-mt-1 tw-mb-4 tw-block tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-300 focus:tw-ring focus:tw-ring-indigo-200 focus:tw-ring-opacity-50 tw-hidden">

                        <label for="gender" class="tw-mb-1 tw-text-lg tw-font-normal">Gender</label>
                        <select name="gender" id="gender" class="form-select tw-mt-1 tw-mb-4 tw-block tw-w-72 tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-300 focus:tw-ring focus:tw-ring-indigo-200 focus:tw-ring-opacity-50 tw-text-lg" required>
                            <option></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Non-binary">Non-binary</option>
							<option value="Transgender">Transgender</option>
							<option value="Intersex">Intersex</option>
							<option value="No option">I don't see my option</option>
							<option value="Prefer not to say">Prefer not to say</option>
                        </select>
                        <table class="table">
                            <tr>
                                <td class="tw-px-0 tw-border-0 tw-align-middle tw-w-5/6">
                                    <label for="opt" class="tw-text-base tw-align-middle tw-inline-block">Click here to learn more about the Jakes Gerwel Fellowship</label></td>
                                <td class="tw-px-0 tw-border-0">
                                    <input type="checkbox" name="opt" id="opt" checked class="form-checkbox tw--mt-2 tw-ml-2"></td>
                            </tr>
                        </table>
                        <div class="tw-text-center">
                            <button type="submit" class="tw-mt-4 tw-rounded-full tw-text-lg tw-text-white tw-py-3 tw-w-full tw-block tw-bg-blue-500 tw-border-2 tw-border-blue-500 hover:tw-bg-transparent hover:tw-text-blue-500">Continue</button>
                            <h6 class="tw-mx-auto tw-text-center md:tw-w-96 tw-mt-10">Your privacy and data are important to us. We will not share your information with third-party organisations.</h6>
                        </div>
                    </form>

                </div>
                </div>
                <hr>
                <div class="card-body template-demo">
                    <a href="https://www.facebook.com/jakesgerwelfellowship/" class="btn social-btn text-white btn-facebook "><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/jgfellowship" class="btn social-btn text-white btn-twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/company/jakes-gerwel-fellowship/?originalSubdomain=za" class="btn social-btn text-white btn-linkedin"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.instagram.com/jakes_gerwel_fellowship/" class="btn social-btn text-white btn-instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCmyTcVKr3JGI6zCiDeVLKmw/featured" class="btn social-btn text-white tw-bg-red-500"><i class="fab fa-youtube"></i></a>
                </div>
                <p class="tw-mb-2"><a class="tw-text-white tw-text-lg" href="https://www.jgfellowship.org">www.jgfellowship.org</a></p>
                <a class="tw-text-white tw-text-lg" href="/dashboard">Administrator</a>
            </div>
        </section>
    </div>
</div>

    <div class="tw-fixed tw-z-10 tw-inset-0 tw-overflow-y-auto" aria-labelledby="modal-title" id="welcomeModal" role="dialog" aria-modal="true">
        <div class="tw-flex tw-items-end tw-justify-center tw-min-h-screen tw-pt-4 tw-px-4 tw-pb-20 tw-text-center sm:tw-block sm:tw-p-0">

            <div class="tw-fixed tw-inset-0 tw-bg-gray-500 tw-bg-opacity-75 tw-transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="tw-hidden sm:tw-inline-block sm:tw-align-middle sm:tw-h-screen" aria-hidden="true">&#8203;</span>


            <div class="tw-inline-block tw-align-bottom tw-bg-white tw-rounded-lg tw-text-left tw-overflow-hidden tw-shadow-xl tw-transform tw-transition-all sm:tw-my-8 sm:tw-align-middle md:tw-max-w-xl sm:tw-w-full tw-max-w-xs">
                <div class="tw-bg-white tw-px-4 tw-pt-5 tw-pb-4 sm:tw-p-6 sm:tw-pb-4">
                    <div class="sm:tw-flex sm:tw-items-start">
                        <div class="tw-mt-3 tw-text-center sm:tw--0 sm:tw-ml-4 sm:tw-text-left">
                            <h3 class="md:tw-text-2xl tw-text-xl tw-leading-6 tw-font-bold tw-text-blue-900 tw-text-center" id="modal-title">
                                Welcome!
                            </h3>
                            <div class="tw-mt-5">
                                <p class="tw-text-gray-800 tw-text-base md:tw-text-lg">
                                    Well done on wanting to become a high school teacher! The Jakes Gerwel Fellowship believes in positioning teaching as an aspirational career and believes the classroom is the vehicle of change for education in South Africa.</p>
                                <p class="tw-text-gray-800 tw-text-base md:tw-text-lg">
                                    On this site, you will be able to check what your undergraduate degree allows you to teach at a high school level, as stipulated in the Department of Basic Education Minimum Requirements for Teacher Education Qualifications (MRTEQ).
                                </p>
                                <p class="tw-text-gray-800 tw-text-base md:tw-text-lg">
                                    We have only just launched this site  and it is in beta phase. If you experience any bugs or problems, please let us know via WhatsApp on 083 589 2933
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tw-bg-white tw-px-4 tw-py-3 sm:tw-px-6 sm:tw-flex sm:tw-justify-center tw-mb-3">
                    <button type="button" id="closeModalBtn" class="tw-w-full tw-inline-flex tw-text-lg tw-justify-center tw-rounded-md tw-border tw-border-transparent tw-shadow-sm tw-px-4 tw-py-2 tw-bg-red-400 tw-font-bold tw-text-white hover:tw-bg-transparent focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-red-300 sm:tw-ml-3 sm:tw-w-auto sm:tw-text-lg hover:tw-text-red-500 hover:tw-border-2 hover:tw-border-red-400">
                        Let's go!
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(function() {
        console.log( "ready!" );

    $("select[name='university']").on("change", function () {
        if ($(this).val() == "Other") {
            $("#university_other_label").removeClass("tw-hidden");
            $("#university_other").removeClass("tw-hidden");
            $("university_other").attr("required", true);
        } else {
            $("#university_other_label").addClass("tw-hidden");
            $("#university_other").addClass("tw-hidden");
            $("#university_other").val("");
            $("university_other").attr("required", false);
        }
    })

    $("input[name='email_confirm']").on("keyup", function () {
        if ($(this).val() != $("#email").val()) {
            $(this).removeClass("tw-border-gray-300");
            $(this).removeClass("focus:tw-border-indigo-300");
            $(this).removeClass("focus:tw-ring-indigo-200");

            $(this).addClass("tw-border-red-400");
            $(this).addClass("focus:tw-border-red-300");
            $(this).addClass("focus:tw-ring-red-200");

            $("button").attr("disabled", true);

        } else {
            $(this).removeClass("tw-border-red-400");
            $(this).removeClass("focus:tw-border-red-300");
            $(this).removeClass("focus:tw-ring-red-200");

            $(this).addClass("tw-border-gray-300");
            $(this).addClass("focus:tw-border-indigo-300");
            $(this).addClass("focus:tw-ring-indigo-200");

            $("button").attr("disabled", false);
        }
    })

    $("input[name='email']").on("keyup", function () {
        if ($("#email_confirm").val() != $("#email").val()) {
            $("#email_confirm").removeClass("tw-border-gray-300");
            $("#email_confirm").removeClass("focus:tw-border-indigo-300");
            $("#email_confirm").removeClass("focus:tw-ring-indigo-200");

            $("#email_confirm").addClass("tw-border-red-400");
            $("#email_confirm").addClass("focus:tw-border-red-300");
            $("#email_confirm").addClass("focus:tw-ring-red-200");

            $("button").attr("disabled", true);
        } else {
            $("#email_confirm").removeClass("tw-border-red-400");
            $("#email_confirm").removeClass("focus:tw-border-red-300");
            $("#email_confirm").removeClass("focus:tw-ring-red-200");

            $("#email_confirm").addClass("tw-border-gray-300");
            $("#email_confirm").addClass("focus:tw-border-indigo-300");
            $("#email_confirm").addClass("focus:tw-ring-indigo-200");

            $("button").attr("disabled", false);
        }
    })

    $("select[name='pre_year']").on("change", function () {
        let option_count = $("select[name='year'] option").length;
        if (option_count > 1) {
            $("#year option").remove();
            let select_option_html = `<option value="">YY</option>`;
            $("select[name='year']").append(select_option_html);
        }
        console.log(option_count);
        let val = $("select[name='pre_year']").val();
        console.log(val);
        let year_90 = ['90', '91', '92', '93', '94', '95', '96', '97', '98', '99'];
        let year_20 = ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09'];
        let html = '';
        if (val == "19") {
            year_90.forEach(element => {
                html += `<option value="${element}">${element}</option>`;
            });
        } else {
            year_20.forEach(element => {
                html += `<option value="${element}">${element}</option>`;
            });
        }
        $("select[name='year']").append(html);
    })

    $("#closeModalBtn").on("click", function (){
        $("#welcomeModal").addClass("tw-hidden");

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": 0,
            "extendedTimeOut": 0,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": false
        }

        toastr.warning("We use cookies to save the information you fill in this form. The cookie information is just for your user experience and will expire after 24 hours.")
        $("#toast-container").addClass("tw-w-106");
        $(".toast").addClass("tw-w-full");
        $(".toast").css("max-width", "500px");
        $(".toast-warning").addClass("tw-bg-red-500");
        $(".toast-message").css("font-size", 20);
        $(".toast-message").addClass("tw-text-white");
        $("#toast-container").focus();
    });
    });
</script>
@endsection
