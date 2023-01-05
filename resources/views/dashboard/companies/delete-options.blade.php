<x-dashboard-layout>
    <div class="flex w-full">
        <div class="w-3/4 pr-10">
            <x-edit-company-buttons :company="$company" />
            <h2 class="grow">
                Delete company
            </h2>
            <x-alerts/>
            <form action="{{url('dashboard/companies/'.$company->hex.'/delete')}}" method="POST">
                @csrf
                @method('DELETE')
                <p class="mb-4">Are you sure you want to delete this company?</p>
                <div class="mb-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa-regular fa-trash-alt"></i>
                        Yes, delete this company
                    </button>
                </div>
            </form>
        </div>
        <div class="w-1/4">
            <x-company-modules :company="$company" />
        </div>
    </div>
</x-dashboard-layout>
