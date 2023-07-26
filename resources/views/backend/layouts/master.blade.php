@include('backend.includes.head')
@include('backend.includes.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
               @include('backend.includes.navbartop')
               @yield('main-content')
            </div>
       @include('backend.includes.copyright')
        </div>
    </div>
@include('backend.includes.script')