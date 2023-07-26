@include('frontend.includes.head')
@include('frontend.includes.navbar')


@yield('main-content');

@include('frontend.includes.footer')

@include('frontend.includes.modal')

@include('frontend.includes.script')