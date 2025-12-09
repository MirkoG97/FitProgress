<!-- NAV -->
<nav class="navbar sticky-top">
    <div class="dropdown ms-auto me-2"> 
        <a href="#" class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> 
            <img src="https://github.com/mdo.png" alt="mdo" width="35" height="35" class="rounded-circle"> 
        </a> 
        <ul class="dropdown-menu dropdown-menu-end text-small shadow">
            <li class="dropdown-header">
                <div>
                    <div class="fw-bold">{{Auth::user()->name}} {{Auth::user()->surname}}</div>
                    <small class="text-muted">Utente</small>
                </div>
            </li>
            <li><hr class="dropdown-divider"></li> 
            <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/icon/gear.svg') }}"><i class="bi bi-list-task me-2"></i> Impostazioni</a></li>
            <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/icon/headset.svg') }}"><i class="bi bi-list-task me-2"></i> Supporto</a></li>
            <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/icon/person.svg') }}"><i class="bi bi-person me-2"></i> Profilo</a></li> 
            <li><hr class="dropdown-divider"></li> 
            <form method="POST" action="{{ route('logoutUser') }}" class="d-inline">
                    @csrf
                    <li><button class="dropdown-item text-danger" type='submit'><img src="{{ asset('assets/icon/box-arrow-right.svg') }}"><i class="bi bi-box-arrow-right me-2"></i> Log Out</button></li>
            </form> 
        </ul> 
    </div> 
</nav>