<footer class="page-footer font-small unique-color-dark bg-secondary pt-1 text-white">
    <div class="container text-center text-md-left mt-5">
        <div class="row mt-3">
            <div class="col-md-4 col-lg-6 col-xl-4 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Company name</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>{{ setting('site_description', 'Laravel') }}</p>
            </div>
            <div class="col-md-4 col-lg-6 col-xl-4 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a class="text-white" href="{{ route('user.profile') }}" >Your Account</a>
                </p>
                <p>
                    <a href="/about" class="text-white">About</a>
                </p>
            </div>

            <div class="col-md-4 col-lg-6 col-xl-4 mx-auto mb-md-0 mb-4">
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <i class="fas fa-home mr-3"></i> {{ setting('site_address', 'Laravel') }}
                </p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> bikerent@gmail.com
                </p>
                <p>
                    <i class="fas fa-phone mr-3"></i> + 88 01778813634
                </p>
                <p>
                    <i class="fas fa-print mr-3"></i> + 01 234 567 89
                </p>
            </div>
        </div>
    </div>

    <div class="footer-copyright text-center py-3 bg-dark">© 2021 Copyright:
        <a href="https://github.com/tanvir2354-ai"> Tanvir Anjum</a>
    </div>

  </footer>
