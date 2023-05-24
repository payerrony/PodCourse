<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('course_index') ? 'active' : '' }}" href="{{route('course_index')}}">
              <span data-feather="file" class="align-text-bottom"></span>
              Course
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('section_index') ? 'active' : '' }}" href="{{ route('section_index') }}">
              <span data-feather="file" class="align-text-bottom"></span>
              Section
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link {{ Request::is('class_index') ? 'active' : '' }}" href="{{ route('class_index') }}">
              <span data-feather="file" class="align-text-bottom"></span>
              Class
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="{{ route('user') }}">
              <span data-feather="file" class="align-text-bottom"></span>
              User
            </a>
          </li>
        </ul>

      </div>
    </nav>