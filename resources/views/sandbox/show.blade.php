<x-layout>
    
    {{-- For C3 Charts --}}
    <link href="{{asset('c3/c3.css')}}" rel="stylesheet">
    <script src="{{asset('c3/c3-js.js')}}" charset="utf-8"></script>
    <script src="{{asset('c3/c3.min.js')}}"></script>

    <x-container>
        <div class="flex">
            <div class="mt-6 pl-3 w-full mx-auto">
                <div class="flex mb-7">
                    <h3 class="pl-1.5 pr-4 pb-3 border-b border-sky-500 uppercase text-lg">Company rankings</h3>
                    <span class="grow border-b border-zinc-500"></span>
                </div>

                <div class="flex">
                    <div class="w-1/2 mr-6 border-r border-zinc-200">
                        <div class="grid grid-cols-2 gap-0 mr-6 text-sm">
                            <span class="p-2 font-bold border-b border-stone-400">Company:</span>
                            <span class="p-2 font-light border-b border-stone-400">{{$company->show_name}}</span>

                            <span class="p-2 font-bold border-b border-stone-400">Lowest turnover (Full):</span>
                            <span class="p-2 font-light border-b border-stone-400">{{$company->lowestTurnover('full')}}</span>

                            <span class="p-2 font-bold border-b border-stone-400">Highest turnover (Full):</span>
                            <span class="p-2 font-light border-b border-stone-400">{{$company->highestTurnover('full')}}</span>

                            <span class="p-2 font-bold border-b border-stone-400">Lowest turnover:</span>
                            <span class="p-2 font-light border-b border-stone-400">{{$company->lowestTurnover()}}</span>

                            <span class="p-2 font-bold border-b border-stone-400">Highest turnover:</span>
                            <span class="p-2 font-light border-b border-stone-400">{{$company->highestTurnover()}}</span>

                            <span class="p-2 font-bold border-b border-stone-400">Lowest turnover (Rounded Mio.):</span>
                            <span class="p-2 font-light border-b border-stone-400">{{formatTurnover($company->lowestTurnover())}}</span>

                            <span class="p-2 font-bold border-b border-stone-400">Highest turnover (Rounded Mio.):</span>
                            <span class="p-2 font-light border-b border-stone-400">{{formatTurnover($company->lowestTurnover())}}</span>

                            <span class="p-2 font-bold border-b border-stone-400">Range:</span>
                            <span class="p-2 font-light border-b border-stone-400">{{$company->turnoverRange()}}</span>

                            <span class="p-2 font-bold border-b border-stone-400">Range (Rounded Mio.):</span>
                            <span class="p-2 font-light border-b border-stone-400">{{formatTurnover($company->turnoverRange())}}</span>

                            <span class="p-2 font-bold border-b border-stone-400">Turnover values:</span>
                            <span class="p-2 font-light border-b border-stone-400">{{$company->chartDataForTurnover()}}</span>

                            <span class="p-2 font-bold border-b border-stone-400">Y axis ticks:</span>
                            <span class="p-2 font-light border-b border-stone-400">{{$company->turnover_y_axis_values()}}</span>

                            <span class="p-2 font-bold border-b border-stone-400">Set low Y axis:</span>
                            <span class="p-2 font-light border-b border-stone-400">{{$company->turnover_low_y_axis()}}</span>

                            <span class="p-2 font-bold border-b border-stone-400">Set high Y axis:</span>
                            <span class="p-2 font-light border-b border-stone-400">{{$company->turnover_high_y_axis()}}</span>

                            
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="bg-white">
                            <div id="turnoverChart"></div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </x-container>

    <script>

        function thousands_separators(num){
            var num_parts = num.toString().split(",");
            num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return num_parts.join(",");
        }

        var chart = c3.generate({

            bindto: document.getElementById('turnoverChart'),

            // data: {
                
            //     names: {
            //         data1: 'Turnover',
            //     },
                
            //     columns: [
            //         ['data1', {{$company->chartDataForTurnover()}}],
            //     ],
                
            // },

            data: {
                x: 'x',
                columns: [
                    ['x', {{$company->rankingYears()}}],
                    ['Turnover', {{$company->rankingTurnovers()}}]
                ]
            },

            axis: {
                x: {
                    tick: {
                        // values: [{{$company->rankingYears()}}]
                    },
                    padding: {
                        left:0.5,
                        right:0.5,
                    }
                },
                y: {
                    // min: {{floor($company->lowestTurnover('full')/1000000000)*1000000000}},
                    // max: {{ceil($company->highestTurnover('full')/1000000000)*1000000000}},
                    min: {{$company->turnover_low_y_axis()}},
                    max: {{$company->turnover_high_y_axis()}},
                    // center: 0,
                    show: true,
                    tick: {
                        count: 3,
                        format: function (d) { return thousands_separators(Math.floor(d/1000000)) + ' Mio. €'; },
                        // values:[{{$company->turnover_y_axis_values()}}]
                        
                    },
                    padding: {
                        top:0,
                        bottom:0,
                    }
                },
            },

            size: {
                // width: 640
                // height: 480
            },

            padding: {
                top: 30,
                right: 50,
                bottom: 20,
                left: 90,
            },

            color: {
                pattern: [
                    '#1f77b4',
                    '#aec7e8'
                ]
            },

            transition: {
                duration: 1000
            },

        });

    </script>

</x-layout>