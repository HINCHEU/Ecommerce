<!DOCTYPE html>
<html lang="en">
@include('user/head')
<body class="animsition">

	@include('user/header')

	@yield('main_content')




	@include('user/footer')

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

@include('user/modal')

@include('user/scripts')

</body>
</html>
