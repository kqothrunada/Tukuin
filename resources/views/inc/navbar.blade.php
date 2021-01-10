<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: lightseagreen">
    <a class="navbar-brand" href="{{url('/')}}">Tukuin.id</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse justify-content-end mr-1" id="navbarNavDropdown">
      <ul class="navbar-nav">
        @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == "Seller")
        <li class="nav-item">
          <a class="nav-link text-white" href="{{url('transactions')}}">View All User Transaction</a>
        </li>
        @endif
        
        @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == "Member")
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/history') }}">View Transaction History</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/cart') }}">View Cart</a>
        </li>
        @endif
        
        @if (\Illuminate\Support\Facades\Auth::check())
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              {{\Illuminate\Support\Facades\Auth::user()->username}}
            </a>
            
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
            </div>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('/register') }}">Register</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('/login') }}">Login</a>
          </li>
        @endif
        
      </ul>
    </div>
  </nav>