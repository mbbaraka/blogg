@extends('front.app')

@section('title', 'Contact Me')

@section('content')
<div id="colorlib-page">
    @include('front.nav')
    <div id="colorlib-main">
        <section class="ftco-section contact-section px-md-4">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-lg-6 col-xl-3 d-flex mb-4">
              <div class="info bg-light p-4">
                <p><span>Address:</span> Ediofe- Arua Ciy Uganda</p>
              </div>
          </div>
          <div class="col-lg-6 col-xl-3 d-flex mb-4">
              <div class="info bg-light p-4">
                <p><span>Phone:</span> <a href="tel:+256 773034311">0773034311</a></p>
              </div>
          </div>
          <div class="col-lg-6 col-xl-3 d-flex mb-4">
              <div class="info bg-light p-4">
                <p><span>Email:</span> <a href="mailto:markbrightbaraka@gmail.com">markbrightbaraka@gmail.com</a></p>
              </div>
          </div>
          <div class="col-lg-6 col-xl-3 d-flex mb-4">
              <div class="info bg-light p-4">
                <p><span>Website</span> <a href="http://www.mbbaraka.github.io">mbbaraka.github.io</a></p>
              </div>
          </div>
        </div>
        <div class="container">
            <h4 class="text-muted text-center">My Projects </h4>
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Marhaba Hospital</td>
                        <td>A website built for Marhaba Hospital Kireka(Uganda) using Wordpress</td>
                        <td><a href="http://www.marhabahospital.com">www.marhabahospital.com</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>UG Careers</td>
                        <td>A jos listing website for careers in Uganda buitl with Wordpress</td>
                        <td><a href="http://www.ugcareers.com">www.ugcareers.com</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>YS Appliances</td>
                        <td> A UK based electronics sales, repair and installation website built using Wordpress</td>
                        <td><a href="http://www.ys-appliances.com">www.ys-appliances.com</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Kim Digitary</td>
                        <td>A website for an IT firm specialising in Website design and development, branding and graphics</td>
                        <td><a href="http://www.kimdigitary.com">www.kimdigitary.com</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Cargo Tracker</td>
                        <td>A simple cargo tracking with sms notifications built in laravel</td>
                        <td><a href="http://www.github.com/mbbaraka/cargo-tracker">www.github.com/mbbaraka/cargo-tracker</a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Cancer Manager</td>
                        <td>A cancer management system built in laravel</td>
                        <td><a href="http://www.github.com/mbbaraka/cancerManager">www.github.com/mbbaraka/cancermanager</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </section>
    </div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->
@endsection
