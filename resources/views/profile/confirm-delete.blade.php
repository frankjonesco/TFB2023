<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-heading heading="Delete your account" />

            <p>Are you sure you would like to delete your account? Your account will be permanently deleted. This cannot be undone. </p>

            <form action="{{url('profile/delete')}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-black mt-6 !bg-red-600">
                    <i class="fa-solid fa-trash mr-1.5"></i>
                    Delete my account forever
                </button>
            </form>
            
        </x-layout-main-area>
        <x-layout-sidebar>
                <x-module-users-profile :user="$user" />
        </x-layout-sidebar>
    </x-container>
</x-layout>
    