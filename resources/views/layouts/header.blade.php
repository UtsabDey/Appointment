<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">DoctorAppointment</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="{{ request()->is('/') ? 'active' : '' }}">
            <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
          <li class="{{ request()->is('/doctor') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/doctor') }}">Doctor</a>
          </li>
          <li class="{{ request()->is('/appointment') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/appointment') }}">Appointment</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>