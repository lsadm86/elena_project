<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link @if(Route::currentRouteName()=='home') active @endif" href="{{ route('home') }}">All Contacts</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::currentRouteName()=='favourite_contacts.index') active @endif" href="{{ route('favourite_contacts.index') }}">Favourite Contacts</a>
    </li>
</ul>
