<x-dashboard-layout>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <div class="flex">
        <div class="w-3/4 pr-10">
            <div class="flex justify-start buttons-mr mt-4">
                <a href="/dashboard/users">   
                    <button>
                        <i class="fa-solid fa-arrow-left"></i>
                        Back to users
                    </button>
                </a>
            </div>
            <h2>Create user</h2>
            <x-alerts/>
            <form action="/dashboard/users/store" method="POST">
                @csrf

                {{-- First name --}}
                <div class="form-block">
                    <label for="first_name">First name</label>
                    <input 
                        type="text" 
                        name="first_name" 
                        placeholder="First name" 
                        value="{{old('first_name')}}" 
                    >
                    @error('first_name')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Last name --}}
                <div class="form-block">
                    <label for="last_name">Last name</label>
                    <input 
                        type="text" 
                        name="last_name" 
                        placeholder="Last name" 
                        value="{{old('last_name')}}" 
                    >
                    @error('last_name')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Gender --}}
                <div class="form-block">
                    <label for="user_type_id">Gender</label>
                    <select name="gender">
                        <option value="" class="block w-full" selected disabled>
                            Select a gender...
                        </option>
                        <option value="male" class="block w-full" {{old('gender') == 'male' ? 'selected' : null}}>
                            Male
                        </option>
                        <option value="female" class="block w-full" {{old('gender') == 'female' ? 'selected' : null}}>
                            Female
                        </option>                        
                    </select>
                    @error('gender')
                        <p class="text-error">What gender is this user?</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-block">
                    <label for="username">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="Email" 
                        value="{{old('email')}}" 
                    >
                    @error('email')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Username --}}
                <div class="form-block">
                    <label for="username">Username</label>
                    <input 
                        type="text" 
                        name="username" 
                        placeholder="Username" 
                        value="{{old('username')}}" 
                    >
                    @error('username')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-block">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Password" 
                        value="{{old('password')}}" 
                    >
                    @error('password')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Confirm password --}}
                <div class="form-block">
                    <label for="username">Confirm password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        placeholder="Confirm password" 
                        value="{{old('password_confirmation')}}" 
                    >
                    @error('password_confirmation')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="form-block">
                    <label for="description">Description</label>
                    @include('includes._ck-editor-styles')
                    <textarea 
                        id="editor" 
                        name="description" 
                        rows="10" 
                    >{{old('description')}}</textarea>
                </div>

                {{-- User type --}}
                <div class="form-block">
                    <label for="user_type_id">User type</label>
                    <select id="UserTypeId" name="user_type_id">
                        <option value="" class="block w-full" selected disabled>
                            Select a user type...
                        </option>
                        @foreach($user_types as $user_type)
                            <option value="{{$user_type->id}}" class="block w-full" {{old('user_type_id') == $user_type->id ? 'selected' : null}}>
                                {{$user_type->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('user_type_id')
                        <p class="text-error">What type of user should this be?</p>
                    @enderror
                </div>

                {{-- Phone number --}}
                <div class="form-block">
                    <label for="phone">Phone number</label>
                    <input 
                        type="text" 
                        name="phone" 
                        placeholder="Phone number" 
                        value="{{old('phone')}}" 
                    >
                    @error('phone')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Country --}}
                <div class="form-block">
                    <label for="country_iso">Country</label>
                    <select name="country_iso">
                        <option value="" class="block w-full" selected disabled>
                            Select a country...
                        </option>
                        @foreach($countries as $country)
                            <option value="{{$country->iso}}" class="block w-full" {{old('country_iso') == $country->iso ? 'selected' : null}}>
                                {{$country->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('country_iso')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Color fill ID --}}
                <div class="form-block">
                    <label for="color_fill_id">Color: {{$colors[0]->name}}</label>
                    <input type="hidden" id="colorFillIdInput" value="{{old('color_fill_id') ?? $colors[0]->fill_id}}">
                    <div id="colorSquares" class="flex">
                        @foreach($colors as $key => $color)
                            @php 
                                $border = 'border-zinc-900';
                            @endphp
                            @if($loop->first)
                                @php
                                    $border = 'border-zinc-200';
                                @endphp
                            @endif
                            <div onclick="selectColorBox(this)" color-id="{{$color->fill_id}}" class="w-8 h-8 mr-2 cursor-pointer rounded border {{$border}}" style="background-color: #{{$color->code}};"></div>
                        @endforeach
                    </div>
                    @error('color_fill_id')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>
                
                {{-- Submit --}}
                <div class="form-block">
                    <button type="submit">
                        <i class="fa-regular fa-save"></i>
                        Save changes
                    </button>
                </div>
            </form>   

        </div>

        <div class="w-1/4">
            
        </div>

    </div>

    <script>
        function selectColorBox(obj) {
            let colorSquares = document.getElementById('colorSquares');
            for(let i = 0;i < colorSquares.getElementsByTagName("div").length; i++){   
                colorSquares.getElementsByTagName("div")[i].classList.remove('border-zinc-900', 'border-zinc-200');
                colorSquares.getElementsByTagName("div")[i].classList.add('border-zinc-900');
            }
            obj.classList.add('border-zinc-200');

            var colorFillIdInput = document.getElementById('colorFillIdInput');
            colorFillIdInput.value=obj.getAttribute("color-id");
        }
    </script>

    @include('includes._ck-editor-settings')

</x-dashboard-layout>

        
