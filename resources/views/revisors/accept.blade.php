<x-layout>
    @if ($announcement)
    <div class="container">
        <div class="row">
            <div class="col-12">
                ciao
            </div>
        </div>
    </div>
    @else
        <h3>Nessun articolo da revisionare</h3>
    @endif
    <a href="">
        <button class="btn btn-danger">Cestino</button>
    </a>
</x-layout>
