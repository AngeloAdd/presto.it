<form action="{{ route('locale', $lang) }}" method="POST">
    @csrf
    <button type="submit" class="nav-link">
        <span class="flag-icon flag-icon-{{ $nation }}"></span>
    </button>
</form>