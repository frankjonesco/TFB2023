{{-- For C3 Charts --}}
<link href="{{asset('c3/c3.css')}}" rel="stylesheet">
<script src="{{asset('c3/c3-js.js')}}" charset="utf-8"></script>
<script src="{{asset('c3/c3.min.js')}}"></script>

<div class="company-ranking-charts mb-12 tabbed-charts">
    <div class="flex tabs ">
        <div class="w-1/2">
            <a
                href="#"
                class="switch-tab focus"
            >
                Turnover
            </a>
        </div>
        <div class="w-1/2">
            <a 
                href="#" 
                class="switch-tab"
            >
                Employees
            </a>
        </div>
    </div>
    <div class="tab-content">
        <div id="turnoverCard">
            <div class="flex items-center bg-gray-50 p-3 border-b border-gray-200">
                <div class="flex flex-col w-full">
                    {{-- Chart for turnover --}}                        
                    <div class="mb-3 pb-3 rounded-lg bg-white border border-gray-200 w-full">
                        <div id="turnoverChart"></div>
                    </div>
                    {{-- End: Chart for turnover --}}
                    <table class="text-sm">
                        <thead class="p-0 text-center">
                            <th class="px-0.5 pl-2 py-2 font-bold">Year</th>
                            <th class="p-0 py-2 px-8 font-bold">Turnover</th>
                            <th class="p-0 py-2 text-right font-bold">Growth</th>
                        </thead>
                        <tbody>
                            @foreach($company->rankings as $ranking)
                                <tr>
                                    <td class="px-0.5 pl-2 py-2 text-xs !font-normal">
                                        {{$ranking->year}}
                                        @if($ranking->confirmed_by_company)
                                            <span class="text-xs">*</span>
                                        @endif
                                    </td>
                                    <td class="py-2 px-8 text-xs">{{formatTurnover($ranking->turnover)}} €</td>
                                    <td class="px-0.5 py-2 text-right text-xs">
                                        <x-ranking-growth growth="{{$ranking->calculateGrowth('turnover')}}" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- End: Table for turnover --}}
                    <div class="mt-5 text-xs no-results flex flex-col">
                        <span class="grow">{!!$company->rankingSources()!!}</span> 
                    </div>
            
                </div>
            </div>
        </div>
        <div id="employeesCard" class="hidden">
            <div class="flex items-center bg-gray-50 p-3 border-b border-gray-200">
                <div class="flex flex-col w-full">
                    {{-- Chart for employees --}}                        
                    <div class="mb-3 pb-3 rounded-lg bg-white border border-gray-200 w-full">
                        <div id="employeesChart"></div>
                    </div>
                    {{-- End: Chart for employees --}}
                    <table class="text-sm">
                        <thead class="p-0 text-center">
                            <th class="px-0.5 pl-2 py-2 font-bold">Year</th>
                            <th class="p-0 py-2 px-8 font-bold">Employees</th>
                            <th class="p-0 py-2 text-right font-bold">Growth</th>
                        </thead>
                        <tbody>
                            @foreach($company->rankings as $ranking)
                                <tr>
                                    <td class="px-0.5 pl-2 py-2 text-xs !font-normal">
                                        {{$ranking->year}}
                                        @if($ranking->confirmed_by_company)
                                            <span class="text-xs">*</span>
                                        @endif
                                    </td>
                                    <td class="py-2 px-8 text-xs">{{formatEmployees($ranking->employees)}}</td>
                                    <td class="px-0.5 py-2 text-right text-xs">
                                        <x-ranking-growth growth="{{$ranking->calculateGrowth('employees')}}" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- End: Table for employees --}}
                    <div class="mt-5 text-xs no-results flex flex-col">
                        <span class="grow">{!!$company->rankingSources()!!}</span> 
                    </div>
            
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
    // SCRIPT FOR SWITCH TABS
        
    // Query selector of cradle element
    const cradle = '.tabbed-charts';
        
    // Tabs within cradle
    let switchTabs = document.querySelectorAll(cradle + ' a.switch-tab');
        
    // For each tab...
    for (let i = 0; i < switchTabs.length; i++) {

        // Listen for click
        switchTabs[i].addEventListener('click', function(e){
            e.preventDefault();
            console.log('sd');
            // Blur all switch tabs
            switchTabs[i].classList.add('focus');
                
            // Tab panes
            let tabPanes = document.querySelectorAll(cradle + ' .tab-content>div');
                
            // For each tab pane
            for (var x = 0; x < tabPanes.length; x++) {
                // Hide tab pane
                tabPanes[x].classList.add('hidden');
            }
            // Show the pane for this switch tab
            tabPanes[i].classList.remove('hidden');
                
            // Refocus tabs
            refocusTabs(i);
        });
    }

    function refocusTabs(tab){
        // For each switch tab...
        for (let i = 0; i < switchTabs.length; i++) {
            // Blur all switch tabs
            switchTabs[i].classList.remove('focus');
        }
        // Focus this tab
        switchTabs[tab].classList.add('focus');
    }
</script>


<script>
    function thousands_separators(num){
        var num_parts = num.toString().split(",");
        num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        return num_parts.join(",");
    }

    // TURNOVER CHART
    var turnoverChart = c3.generate({
        bindto: document.getElementById('turnoverChart'),
        data: {
            x: 'x',
            columns: [
                ['x', {{$company->turnoverYears()}}],
                ['Turnover in  Mio. €', {{$company->rankingTurnovers()}}]
            ]
        },
        axis: {
            x: {
                padding: {
                    left:0.5,
                    right:0.5,
                }
            },
            y: {
                min: {{$company->turnover_low_y_axis()}},
                max: {{$company->turnover_high_y_axis()}},
                show: true,
                tick: {
                    count: 3,
                    format: function (d) { return thousands_separators(Math.floor(d/1000000)); },                        
                },
                padding: {
                    top:0,
                    bottom:0,
                }
            },
        },
        size: {
            height: 250
        },
        padding: {
            top: 30,
            right: 25,
            bottom: 20,
            left: 60,
        },
        color: {
            pattern: [
                '#00c2e0',
            ]
        },
        transition: {
            duration: 1000
        },
        grid: {
            x: {
                show: true
            },
            y: {
                show: true
            }
        },
        tooltip: {
            format: {
                title: function (x, index) { return 'Turnover ' + x; }
            }
        }
    });

    // EMPLOYEES CHART
    var employeesChart = c3.generate({
        bindto: document.getElementById('employeesChart'),
        data: {
            x: 'x',
            columns: [
                ['x', {{$company->employeesYears()}}],
                ['Employees', {{$company->rankingEmployees()}}]
            ]
        },
        axis: {
            x: {
                padding: {
                    left:0.5,
                    right:0.5,
                }
            },
            y: {
                min: {{$company->employees_low_y_axis()}},
                max: {{$company->employees_high_y_axis()}},
                show: true,
                tick: {
                    count: 3,
                    format: function (d) { return thousands_separators(Math.floor(d)); },                        
                },
                padding: {
                    top:0,
                    bottom:0,
                }
            },
        },
        size: {
            height: 250
        },
        padding: {
            top: 30,
            right: 51,
            bottom: 20,
            left: 60,
        },
        color: {
            pattern: [
                '#FFA500',
            ]
        },
        transition: {
            duration: 1000
        },
        grid: {
            x: {
                show: true,
                    
            },
            y: {
                show: true
            }
        },
        tooltip: {
            format: {
                title: function (x, index) { return 'Employees ' + x; },
                name: function (name, ratio, id, index) { return name; }
            },
                
        }
            
    });

</script>