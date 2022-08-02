<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Topics</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/transformer') }}">
              <i class="bi bi-circle"></i><span>Transformers</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/seriesandparallel') }}">
              <i class="bi bi-circle"></i><span>Series and Parallel Connections</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/electricmotor') }}">
              <i class="bi bi-circle"></i><span>Electric Motor</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/conductors') }}">
              <i class="bi bi-circle"></i><span>Conductors and Insulators</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/test') }}">
          <i class="bi bi-dash-circle"></i>
          <span>Test</span>
        </a>
      </li><!-- End Error 404 Page Nav -->
      <li class="nav-item"> <!-- Start Exam Components-->
        <a class="nav-link collapsed" data-bs-target="#components-exam" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Exams</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-exam" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/setup-exam') }}">
              <i class="bi bi-circle"></i><span>Create Exams</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/available-exams') }}">
              <i class="bi bi-circle"></i><span>List Exams</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/electricmotor') }}">
              <i class="bi bi-circle"></i><span>Electric Motor</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/conductors') }}">
              <i class="bi bi-circle"></i><span>Conductors and Insulators</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Exams -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Sign Out</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
