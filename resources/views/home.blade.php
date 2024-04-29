<!doctype html>
<html class="no-js" lang="en">
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>How to become a teacher - Jakes Gerwel Fellowship</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <script src="{{ asset('js/app.js') }}"></script>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- themekit admin template asstes -->
        <link rel="stylesheet" href="{{ asset('all.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/theme.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body class="tw-h-screen tw-bg-gradient-to-r tw-from-blue-300 tw-via-blue-500 tw-to-blue-900">
		<div class="text-center tw-bg-white tw-shadow-md">
			<a href="/">
				<img class=" tw-mx-auto py-5" src="{{ asset('images/logo.png') }}">
			</a>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<section id="welcome">
					<div class="m-3 text-center">
						<br>
						<div class="card tw-p-10">
							<h6>Hello 7777<span class="text-danger">Fellow</span>,</h6>
						<h1>Welcome to <b class="tw-text-blue-500">How to become a teacher</b> !</h1>
						{{-- <a href="{{url('login')}}" class="btn btn-success">Go to Admin</a> --}}
						{{-- <a href="http://radmin.rakibhstu.com/docs/" class="btn btn-primary">Docs</a> --}}
						{{-- <a href="https://documenter.getpostman.com/view/11223504/Szmh1vqc?version=latest" class="btn btn-danger">API Endpoint</a> --}}
						<p class="tw-text-lg">
							To get started we need you to enter some information for us.
						</p>
							<form action="/candidate/store" method="post" class="form tw-text-left w-75 tw-mx-auto">
								@csrf
								<label for="name" class="tw-mb-1">Name and surname</label>
								<input type="text" name="name" id="name" class="form-control tw-mb-4" required>
								<label for="email" class="tw-mb-1">Email address</label>
								<input type="email" class="form-control tw-mb-4" name="email" id="email" required>
								<label for="dob" class="tw-mb-1">Date of birth</label>
								<input type="date" name="date" id="date" class="form-control tw-mb-4" required>
								<label for="university" class="tw-mb-1">University</label>
								<input type="text" name="university" id="university" class="form-control tw-mb-4" required>
								<label for="gender" class="tw-mb-1">Gender</label>
								<select name="gender" id="gender" class="form-control tw-mb-4" required>
									<option></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Non-binary">Non-binary</option>
									<option value="Transgender">Transgender</option>
									<option value="Intersex">Intersex</option>
									<option value="No option">I don't see my option</option>
									<option value="Prefer not to say">Prefer not to say</option>
								</select>
								<label for="opt" class="tw-mb-1">Opt-in to receive mails</label>
								<input type="checkbox" class="form-control tw-mb-4" name="opt" id="opt">
								<button type="submit" class="btn btn-custom tw-mt-4">Continue</button>
							</form>
						</div>
						
						<hr>
						<p class="tw-text-white">Need more help?</p>
						<div class="row">
							<div class="col tw-text-white border-right tw-pl-5">
								<p class="font-weight-bold text-uppercase text-left">Johannesburg office</p>
								<div class="row mt-2">
									<div class="col-1">
										<i class="fas fa-map-marker-alt mr-4" aria-hidden="true"></i>
									</div>
									<div class="col text-left">
										<p class="">WeWork, 173 Oxford Rd, Rosebank, <br> Johannesburg, 2196</p>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-1">
										<i class="fas fa-phone mr-4" aria-hidden="true"></i>
									</div>
									<div class="col text-left">
										<p>010 900 1244</p>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-1">
										<i class="fas fa-envelope mr-4" aria-hidden="true"></i>
									</div>
									<div class="col text-left">
										<p>info@jgfellowship.org</p>
									</div>
								</div>
							</div>
							<div class="col tw-text-white tw-pl-5">
								<p class="font-weight-bold text-uppercase text-left">Cape Town Office</p>
								<div class="row mt-2">
									<div class="col-1">
										<i class="fas fa-map-marker-alt mr-4" aria-hidden="true"></i>
									</div>
									<div class="col text-left">
										<p class="">46 Hof Street Oranjezicht</p>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-1">
										<i class="fas fa-phone mr-4" aria-hidden="true"></i>
									</div>
									<div class="col text-left">
										<p>021 180 4880</p>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-1">
										<i class="fas fa-envelope mr-4" aria-hidden="true"></i>
									</div>
									<div class="col text-left">
										<p>info@jgfellowship.org</p>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body template-demo">
							<a href="https://www.facebook.com/jakesgerwelfellowship/" class="btn social-btn text-white btn-facebook "><i class="fab fa-facebook"></i></a>
							<a href="https://twitter.com/jgfellowship" class="btn social-btn text-white btn-twitter"><i class="fab fa-twitter"></i></a>
							<a href="https://www.linkedin.com/company/jakes-gerwel-fellowship/?originalSubdomain=za" class="btn social-btn text-white btn-linkedin"><i class="fab fa-linkedin"></i></a>
							<a href="https://www.instagram.com/jakes_gerwel_fellowship/" class="btn social-btn text-white btn-instagram"><i class="fab fa-instagram"></i></a>
							<a href="https://www.youtube.com/channel/UCmyTcVKr3JGI6zCiDeVLKmw/featured" class="btn social-btn text-white tw-bg-red-500"><i class="fab fa-youtube"></i></a>
						</div>   
						<a class="tw-text-white" href="/dashboard">Administrator?</a>
					</div>
				</section>
		    </div>
		</div>

	<script>
		
	</script>
	<script src="{{ asset('all.js') }}"></script>
        
    </body>
</html>

