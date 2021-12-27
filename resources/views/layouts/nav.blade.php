<div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Menu</li>
        <li class="list-group-item list-group-item-action {{ (request()->routeIs('dashboard')) ? 'active' : '' }}"><a class="nav-link p-0 {{ (request()->routeIs('dashboard')) ? 'text-light' : '' }}" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="list-group-item list-group-item-action {{ (request()->routeIs('categories')) ? 'active' : '' }}"><a class="nav-link {{ (request()->routeIs('categories')) ? ' text-light' : '' }} p-0" href="{{ route('categories') }}">Categories</a></li>
        <li class="list-group-item list-group-item-action {{ (request()->routeIs('posts*')) ? 'active' : '' }}"><a class="nav-link p-0 {{ (request()->routeIs('posts*')) ? 'text-light' : '' }}" href="{{ route('posts') }}">Posts</a></li>
        <li class="list-group-item list-group-item-action {{ (request()->routeIs('posts')) ? 'active' : '' }}"><a class="nav-link p-0 {{ (request()->routeIs('posts')) ? 'text-light' : '' }}" href="{{ route('dashboard') }}">Profile</a></li>
    </ul>
</div>
