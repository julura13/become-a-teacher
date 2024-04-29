@extends('front')

@section('content')
<div class="tw-px-0 md:tw-px-4">
    <div class="justify-content-center">
        <div class="tw-mx-0 tw-px-0 tw-my-2 md:tw-m-3 text-center">
            <br>
            <div class="tw-mx-auto tw-bg-white tw-rounded tw-p-5 md:tw-p-8 md:tw-w-106 tw-w-full tw-max-w-full md:tw-max-w-xl">
                @php
                $user_name = explode(" ", $user->name);
                @endphp
                <p class="tw-text-lg tw-text-left">
                    Thanks for stopping by, {{ $user_name[0] }}. Well done on your interest in becoming a high school teacher in South Africa. The <a class="tw-text-blue-500" href="www.jgfellowship.org">Jakes Gerwel Fellowship</a> believes in teaching as an aspirational career and firmly believes in the classroom as the vehicle for change in South Africa.
                </p>

                <p class="tw-text-lg tw-text-left">
                    The Jakes Gerwel Fellowship is a full university scholarship and leadership development program which supports high-impact individuals passionate about education in South Africa. We accept applications from Grade 12s to embark on their first undergraduate degree and we accept applications from graduates and 3rd year students under 30. 
                </p>

                <p class="tw-text-lg tw-text-left">
                    If you are interested to apply or nominate someone you know for the Jakes Gerwel Fellowship be sure to be kept in the loop and join our mailing list or follow us on social media. 
                </p>

                {{-- <button class="tw-my-4 tw-rounded-full tw-text-lg tw-text-white tw-py-3 tw-w-full tw-block tw-bg-blue-500 tw-border-2 tw-border-blue-500 hover:tw-bg-transparent hover:tw-text-blue-500">Click here to join our mailing list and be one of the first to know when applications are open.</button> --}}

                <p class="tw-text-lg tw-text-left">Hear more of JGF students already on our program <a class="tw-text-blue-500" href="https://www.jgfellowship.org/our-fellows/">here</a>.</p>
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

        </div>
    </div>
</div>

@endsection