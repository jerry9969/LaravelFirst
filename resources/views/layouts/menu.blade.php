<li class="nav-item">
    <a href="{{ route('clients.index') }}"
       class="nav-link {{ Request::is('clients*') ? 'active' : '' }}">
        <p>Clients</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('domains.index') }}"
       class="nav-link {{ Request::is('domains*') ? 'active' : '' }}">
        <p>Domains</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('tlds.index') }}"
       class="nav-link {{ Request::is('tlds*') ? 'active' : '' }}">
        <p>Tlds</p>
    </a>
</li>


