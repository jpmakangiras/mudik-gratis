<?php $current = $this->data['Current']; ?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo ($current=='index') ? "active" : ""; ?>" href="/admin-panel/dashboard">
                    Dashboard 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current=='transportasi') ? "active" : ""; ?>" href="/admin-panel/transportasi">
                    Transportasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current=='destinasi') ? "active" : ""; ?>" href="/admin-panel/destinasi">
                    Destinasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current=='jadwal') ? "active" : ""; ?>" href="/admin-panel/jadwal">
                    Buat Jadwal
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($current=='verifikasi') ? "active" : ""; ?>" href="/admin-panel/verifikasi">
                    Verifikasi Data Peserta
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">
                    <span data-feather="layers"></span>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Logout</button>
                </a>
            </li>
        </ul>


    </div>
</nav>