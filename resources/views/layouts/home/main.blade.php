<!DOCTYPE html>
<html lang="en">
@include('layouts.home.head')
<body>
@include('layouts.home.header')
@yield('content')

@include('layouts.home.footer')
	<!--====== Javascripts & Jquery ======-->
	<script src="/home/js/jquery-3.2.1.min.js"></script>
	<script src="/home/js/owl.carousel.min.js"></script>
	<script src="/home/js/jquery.countdown.js"></script>
	<script src="/home/js/masonry.pkgd.min.js"></script>
	<script src="/home/js/magnific-popup.min.js"></script>
    <script src="/home/js/main.js"></script>
    <script src="/home/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f31a748ed9d9d262709b143/1effr4qs2';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    @yield('myJS')
</body>
</html>
