<x-guest-layout>

<div class="min-h-screen bg-[#0b0b0f] flex items-center justify-center px-6">

    <div class="w-full max-w-md">


        <!-- Logo -->

        <div class="text-center mb-8">

            <div class="text-6xl mb-4">
                🎭
            </div>

            <h1 class="text-3xl font-bold text-white">
                Theatre Manager
            </h1>

            <p class="text-gray-400 mt-2">
                Welcome back, sign in to continue
            </p>

        </div>



        <!-- Login Card -->

        <div class="bg-[#16161d] border border-gray-800
                    rounded-3xl p-8 shadow-2xl">


            <x-auth-session-status 
                class="mb-4 text-gray-300" 
                :status="session('status')" />



            <form method="POST" action="{{ route('login') }}">

                @csrf



                <!-- Email -->

                <div>

                    <label class="text-gray-300 text-sm">
                        Email Address
                    </label>


                    <input
                        id="email"
                        class="mt-2 w-full rounded-xl
                               bg-[#0b0b0f]
                               border border-gray-700
                               text-white
                               focus:border-[#D4AF37]
                               focus:ring-[#D4AF37]
                               p-3"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    />


                    <x-input-error 
                        :messages="$errors->get('email')" 
                        class="mt-2" />

                </div>





                <!-- Password -->

                <div class="mt-5">


                    <label class="text-gray-300 text-sm">
                        Password
                    </label>


                    <input
                        id="password"
                        class="mt-2 w-full rounded-xl
                               bg-[#0b0b0f]
                               border border-gray-700
                               text-white
                               focus:border-[#D4AF37]
                               focus:ring-[#D4AF37]
                               p-3"
                        type="password"
                        name="password"
                        required
                    />


                    <x-input-error 
                        :messages="$errors->get('password')" 
                        class="mt-2" />


                </div>





                <!-- Remember -->

                <div class="mt-5 flex items-center">


                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="rounded
                               bg-[#0b0b0f]
                               border-gray-600
                               text-[#C62828]
                               focus:ring-[#D4AF37]"
                    >


                    <span class="ml-2 text-sm text-gray-400">
                        Remember me
                    </span>


                </div>





                <!-- Actions -->

                <div class="mt-8">


                    <button
                        type="submit"
                        class="w-full py-3 rounded-xl
                               bg-[#C62828]
                               hover:bg-red-700
                               transition
                               text-white
                               font-semibold
                               text-lg">

                        Login

                    </button>


                </div>



                @if(Route::has('password.request'))

                <div class="text-center mt-5">

                    <a 
                    href="{{ route('password.request') }}"
                    class="text-sm text-gray-400 hover:text-[#D4AF37]">

                        Forgot password?

                    </a>

                </div>

                @endif



            </form>


        </div>



        <!-- Register -->

        @if(Route::has('register'))

        <p class="text-center text-gray-400 mt-6">

            Don't have an account?

            <a 
            href="{{route('register')}}"
            class="text-[#D4AF37] hover:underline">

                Register

            </a>

        </p>

        @endif



    </div>

</div>


</x-guest-layout>