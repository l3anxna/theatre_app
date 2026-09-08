<x-guest-layout>

<div class="min-h-screen bg-[#F4F0EA] flex items-center justify-center px-6">

    <div class="w-full max-w-md">


        <!-- Logo -->

        <div class="text-center mb-8">

            <div class="text-6xl mb-4">
                🎭
            </div>

            <h1 class="text-3xl font-bold text-[#2D2926]">
                Theatre Manager
            </h1>

            <p class="text-[#746D64] mt-2">
                Welcome back, sign in to continue
            </p>

        </div>



        <!-- Login Card -->

        <div class="bg-[#FFFCF7] border border-[#D8CEC1]
                    rounded-3xl p-8 shadow-2xl">


            <x-auth-session-status
                class="mb-4 text-[#554E47]"
                :status="session('status')" />



            <form method="POST" action="{{ route('login') }}">

                @csrf



                <!-- Email -->

                <div>

                    <label class="text-[#554E47] text-sm">
                        Email Address
                    </label>


                    <input
                        id="email"
                        class="mt-2 w-full rounded-xl
                               bg-[#F4F0EA]
                               border border-[#CFC4B6]
                               text-[#2D2926]
                               focus:border-[#B7791F]
                               focus:ring-[#B7791F]
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


                    <label class="text-[#554E47] text-sm">
                        Password
                    </label>


                    <input
                        id="password"
                        class="mt-2 w-full rounded-xl
                               bg-[#F4F0EA]
                               border border-[#CFC4B6]
                               text-[#2D2926]
                               focus:border-[#B7791F]
                               focus:ring-[#B7791F]
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
                               bg-[#F4F0EA]
                               border-[#CFC4B6]
                               text-[#A34A3E]
                               focus:ring-[#B7791F]"
                    >


                    <span class="ml-2 text-sm text-[#746D64]">
                        Remember me
                    </span>


                </div>





                <!-- Actions -->

                <div class="mt-8">


                    <button
                        type="submit"
                        class="w-full py-3 rounded-xl
                               bg-[#A34A3E]
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
                    class="text-sm text-[#746D64] hover:text-[#B7791F]">

                        Forgot password?

                    </a>

                </div>

                @endif



            </form>


        </div>



        <!-- Register -->

        @if(Route::has('register'))

        <p class="text-center text-[#746D64] mt-6">

            Don't have an account?

            <a
            href="{{route('register')}}"
            class="text-[#B7791F] hover:underline">

                Register

            </a>

        </p>

        @endif



    </div>

</div>


</x-guest-layout>