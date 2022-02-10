<div class="m-auto">
    {{-- Filtros --}}
    <div class="flex flex-col gap-2 mb-16 border-bottom">
        <div class="flex gap-2 w-full text-white font-bold">
            <div class="w-1/4 relative">Clients</div>
            <div class="w-1/4 relative">Campaigns</div>
            <div class="w-1/5 relative">Platforms</div>
            <div class="w-1/5 relative">Period</div>
        </div>
         <div class="flex gap-2 w-full">
            <div class="w-1/4 relative"> <livewire:chartfilter :filtertype="'chrt'" :placeholder="'Clients'" :data="$clients" :selecteds="$selected_clients" /></div>
            <div class="w-1/4 relative"> <livewire:chartfilter :filtertype="'chrt'" :placeholder="'Campaigns'" :data="$campaigns" :selecteds="$selected_campaigns" /></div>
            <div class="w-1/5 relative"> <livewire:chartfilter :filtertype="'chrt'" :placeholder="'Platforms'" :data="$platforms" :selecteds="$selected_platforms" /></div>
            <div class="w-1/5 relative"> <livewire:chartfilter :filtertype="'chrt'" :placeholder="'Periods'" :data="$periods" :selecteds="$selected_periods" /></div>
        </div>
    </div>
    {{-- Chart --}}
    <div class="bg-gray-100 shadow w-full">
        {!! $chart->container() !!}
    </div>
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
</div>
