<div class="sidebar-module">
    <x-layout-heading heading="Matchbird partners" class="heading-mt" />

    <div class="grid grid-cols-1 gap-1">
        @foreach(matchbirdPartners()->take(4) as $matchbird_partner)
            <x-card-companies-list-item-sm :company="$matchbird_partner" />
        @endforeach
        <a href="{{url('companies/matchbird-partners')}}">
            <button class="mt-4 w-full btn-plain">
                <i class="fa-solid fa-handshake mr-1.5"></i>
                View all Mathcbird partners
            </button>
        </a>
    </div>
</div>