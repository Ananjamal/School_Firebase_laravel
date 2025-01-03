  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a href="{{route('dashboard')}}" class="nav-link " >
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>



      <li class="nav-heading">School</li>
      <li class="nav-item">
        <a href="{{route('classes.index')}}" class="nav-link collapsed">
            <i class="bi bi-building"></i>
            <span>Classes</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('students.index')}}" class="nav-link collapsed">
            <i class="bi bi-people-fill"></i>
            <span>Students</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('subjects.index')}}" class="nav-link collapsed">
            <i class="bi bi-book"></i>
            <span>Subjects</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('staff.index')}}" class="nav-link collapsed">
            <i class="bi bi-person-badge-fill"></i>
            <span>Staff</span>
        </a>
    </li>



    </ul>

  </aside><!-- End Sidebar-->
