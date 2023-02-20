<div>
    <h1>Smart Office</h1>
    <!-- An unexamined life is not worth living. - Socrates -->
    <div>
        @if ($userType == 'user')
        
        @elseif ($userType == 'admin')    
            <div>

            </div>
        @else
            <div>
                <nav>
                    <a href="/admin"><button type="button" class="btn btn-primary">Admin</button></a>
                </nav>
            </div>
        @endif
    </div>
</div>