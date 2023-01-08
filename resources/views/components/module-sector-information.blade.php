<div class="sidebar-module">
    <x-layout-heading heading="{{$sector->name}} sector" class="!mb-3" />
    <div class="bg-no-repeat bg-center bg-cover px-7 py-8 flex flex-col justify-end mb-2 rounded-sm" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.45)),
    url('{{$sector->getImage()}}');" >
        <a href="{{url('sectors')}}" class="no-underline">
            <span class="{{randomColor()}} text-white w-max px-2 py-1 rounded-lg text-xs font-bold">
                Sectors
            </span>
        </a>
        <h2 class="py-3">
            <a href="{{url('news/articles')}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80 no-underline" class="plain">
                {{$sector->name}}
            </a>
        </h2>
        <span class="text-sm italic text-zinc-100">
            <span class="mr-6">
                <i class="fa-regular fa-building mr-1"></i>
                Companies {{count($sector->companies)}}
            </span>
            <span class="mr-6">
                <i class="fa-solid fa-industry mr-1"></i>
                Industries {{count($sector->industries)}}
            </span>
        </span>
    </div>
    
    
    <ul class="flex flex-col text-sm">
        <li class="flex m-0 pt-3 pb-3 border-b border-gray-200 px-1.5">
            <span class="grow">No. of Companies</span>
            <span>{{count($sector->companies)}}</span>
        </li>
        <li class="flex m-0 pt-3 pb-3 border-b border-gray-200 px-1.5">
            <span class="grow">Total Turnover</span>
            <span>{{formatTurnover($sector->totalTurnoverOfSectorCompanies())}} €</span>
        </li>
        <li class="flex m-0 pt-3 pb-3 border-b border-gray-200 px-1.5">
            <span class="grow">Total Employees</span>
            <span>{{formatEmployees($sector->totalEmployeesOfSectorCompanies())}}</span>
        </li>
        <li class="flex m-0 pt-3 pb-3 border-b border-gray-200 px-1.5">
            <span class="grow">Avg. Turnover per company</span>
            <span>{{formatTurnover($sector->totalTurnoverOfSectorCompanies() / count($sector->companies))}} €</span>
        </li>
    </ul>

</div>
