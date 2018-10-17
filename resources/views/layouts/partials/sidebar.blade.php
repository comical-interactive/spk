<sidebar inline-template>
    <ul class="nav">
      <li :class="setActive('schools')">
        <a href="{{ route('schools.index') }}">
          <i class="ti-server"></i>
          <p>Data Sekolah</p>
        </a>
      </li>

      <li :class="setActive('students')">
        <a href="{{ route('school-students.index') }}">
          <i class="ti-server"></i>
          <p>Data Siswa</p>
        </a>
      </li>

      <li :class="setActive('ists')">
        <a href="{{ route('school-ists.index') }}">
          <i class="ti-book"></i>
          <p>IST</p>
        </a>
      </li>

      <li :class="setActive('rmibs')">
        <a href="{{ route('school-rmibs.index') }}">
          <i class="ti-agenda"></i>
          <p>RMIB</p>
        </a>
      </li>

      <li :class="setActive('mbtis') || setActive('eppss') || setActive('lss')">
        <a href="{{ route('school-mels.index') }}">
          <i class="ti-agenda"></i>
          <p>MBTI EPPS LS</p>
        </a>
      </li>
    <ul>
  </sidebar>