{{-- Contenedor gral --}}
<div class="flex flex-col gap-6">
    {{-- Contenedor de dashboard --}}
    <div class="flex w-full bg-gray-800 bg-gray-800 p-4 rounded">
        {{-- contenedor de botonera y filtros grales --}}
        <nav class="flex gap-6 w-full">
            {{-- botonera --}}
            <div class="flex flex-col gap-2 ">
                <div class="text-white font-bold" >
                    Add new chart:
                </div>
                <div class="flex gap-4" >
                    <livewire:btndrag :type="'pie'" />
                    <livewire:btndrag :type="'bar'" />
                    <livewire:btndrag :type="'hbar'" />
                    <livewire:btndrag :type="'line'" />
                </div>
            </div>
            {{-- filtros --}}
            <div class="flex flex-col w-full gap-2 ">
                <div class="flex gap-4 w-full text-white font-bold">
                    <div class="w-1/4 relative">Clients</div>
                    <div class="w-1/4 relative">Campaigns</div>
                    <div class="w-1/5 relative">Platforms</div>
                    <div class="w-1/5 relative">Period</div>
                </div>
                <div class="flex gap-4 w-full">
                    <div class="w-1/4 relative"> <livewire:chartfilter  :filtertype="'gral'" :placeholder="'Clients'" :data="$clients" :selecteds="$selected_clients" /></div>
                    <div class="w-1/4 relative"> <livewire:chartfilter  :filtertype="'gral'" :placeholder="'Campaigns'" :data="$campaigns" :selecteds="$selected_campaigns" /></div>
                    <div class="w-1/5 relative"> <livewire:chartfilter  :filtertype="'gral'" :placeholder="'Platforms'" :data="$platforms" :selecteds="$selected_platforms" /></div>
                    <div class="w-1/5 relative"> <livewire:chartfilter  :filtertype="'gral'" :placeholder="'Periods'" :data="$periods" :selecteds="$selected_periods" /></div>
                </div>
            </div>
        </nav>
    </div>
    {{-- Contenedor de charts --}}
    <div class="flex flex-row flex-wrap-reverse justify-content-end  w-full  gap-auto bg-gray-800 bg-gray-800 p-4 rounded overflow-y-auto">
        @forelse ($reportes as $report)
            @if (!$loop->first)
                <div class="p-4 bg-gray-600 rounded shadow w-1/2 ring">
                <livewire:chart
                :wire:key="$offset"
                :clients="$clients"
                :campaigns="$campaigns"
                :platforms="$platforms"
                :periods="$periods"
                :selected_clients="$selected_clients"
                :selected_campaigns="$selected_campaigns"
                :selected_platforms="$selected_platforms"
                :selected_periods="$selected_periods"
                :type="$report['type']"/>
                </div>
            @else
                <span class="hidden" style="width: 0; height:0, position: absolute display:hidden">
                    <livewire:chart
                    :wire:key="$loop->index"
                    :clients="$clients"
                    :campaigns="$campaigns"
                    :platforms="$platforms"
                    :periods="$periods"
                    :selected_clients="$selected_clients"
                    :selected_campaigns="$selected_campaigns"
                    :selected_platforms="$selected_platforms"
                    :selected_periods="$selected_periods"
                    :type="$report['type']"/>
                </span>
             @endif
        @empty
        @endforelse
    </div>
    </div>
