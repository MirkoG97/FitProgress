<!-- SIDEBAR -->
<div class="d-flex flex-column flex-shrink-0 bg-body-tertiary position-fixed h-100" style="width: 4.5rem"> 
    <a href="../../public/index.html" class="d-block p-3 link-body-emphasis text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only"> 
        <img src="{{ asset('assets/icon/fitprogress_logo.svg') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        <span class="visually-hidden">FitProgress</span>
    </a> 
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center "> 
        <li class="nav-item"> 
            <a href="{{ route('home') }}" class="nav-link py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="home" data-bs-original-title="home">  
                <img src="{{ asset('assets/icon/house.svg') }}" alt="home" width="24" height="24" class="bi pe-none">
            </a> 
        </li> 
        <li class="nav-item"> 
            <a href="{{ route('programsByUser') }}" class="nav-link py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="workout" data-bs-original-title="workout">  
                <img src="{{ asset('assets/icon/gym-dumbell.svg') }}" alt="workout" width="24" height="24" class="bi pe-none">
            </a> 
        </li> 
        <li class="nav-item"> 
            <a href="#" class="nav-link py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="nutrition" data-bs-original-title="nutrition">  
                <img src="{{ asset('assets/icon/fork-knife.svg') }}" alt="nutrition" width="24" height="24" class="bi pe-none">
            </a> 
        </li> 
        <li class="nav-item"> 
            <a href="#" class="nav-link py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="analytics" data-bs-original-title="analytics">  
                <img src="{{ asset('assets/icon/graph-up.svg') }}" alt="analytics" width="24" height="24" class="bi pe-none">
            </a> 
        </li> 
    </ul> 
</div>