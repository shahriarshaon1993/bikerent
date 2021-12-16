<footer class="page-footer font-small unique-color-dark">
    <div class="container text-center text-md-left mt-5">
        <div class="row mt-3">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Company name</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>{{ setting('site_description', 'Laravel') }}</p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Products</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="#!">About</a>
                </p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="{{ route('user.profile') }}">Your Account</a>
                </p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <i class="fas fa-home mr-3"></i> {{ setting('site_address', 'Laravel') }}
                </p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> info@bikerent.com
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
