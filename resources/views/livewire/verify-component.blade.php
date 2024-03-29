@section('title', 'Purchase code verification')
<div>
    <div class="h-screen bg-green-400">
        <section class="py-20 2xl:py-40 overflow-hidden bg-green-400">
            <div class="container px-4 mx-auto">
                <div class="max-w-3xl mx-auto">
                    <div class="">
                        <div class="w-full lg:w-1/2 px-10">
                            <div class="px-6 lg:px-20 py-8 lg:py-20 bg-white shadow-2xl rounded-lg">
                                {{-- Start main actions --}}
                                @if (!$verified)
                                    <form wire:submit.prevent="verifyPurchase">
                                        <div class="space-y-0 text-center mb-2">
                                            <p class="text-2xl font-bold font-heading">
                                                Verify Purchase Code
                                            </p>
                                            {{-- incase backend is verified and customer somehow revisit the page --}}
                                            <p class="text-sm text-red-500">
                                                Don't ever share your purchase code with anyone
                                            </p>
                                        </div>

                                        <div class="mt-4">
                                            {{-- purchase_code --}}
                                            <div
                                                class="flex items-center pl-6 border border-gray-300 bg-white rounded-sm">
                                                <span class="inline-block pr-3 border-r border-gray-50">
                                                    <svg class="w-5 h-5" width="17" height="21"
                                                        viewbox="0 0 17 21" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.184 8.48899H15.2011V6.25596C15.2011 2.6897 12.3193 0 8.49924 0C4.67919 0 1.7974 2.6897 1.7974 6.25596V8.48899H1.81568C0.958023 9.76774 0.457031 11.3049 0.457031 12.9569C0.457031 17.3921 4.06482 21 8.49924 21C12.9341 21 16.5424 17.3922 16.5428 12.9569C16.5428 11.3049 16.0417 9.76774 15.184 8.48899ZM2.69098 6.25596C2.69098 3.14895 5.13312 0.893578 8.49924 0.893578C11.8654 0.893578 14.3075 3.14895 14.3075 6.25596V7.39905C12.8423 5.86897 10.7804 4.91468 8.49966 4.91468C6.21837 4.91468 4.15607 5.86946 2.69098 7.40017V6.25596ZM8.49966 20.1064C4.55762 20.1064 1.35061 16.8989 1.35061 12.9569C1.35061 9.01534 4.5572 5.80826 8.49924 5.80826C12.4422 5.80826 15.6488 9.01534 15.6492 12.9569C15.6492 16.8989 12.4426 20.1064 8.49966 20.1064Z"
                                                            fill="black"></path>
                                                        <path
                                                            d="M8.49957 8.93567C7.26775 8.93567 6.26562 9.93779 6.26562 11.1696C6.26562 11.8679 6.60247 12.5283 7.1592 12.9474V14.7439C7.1592 15.4829 7.76062 16.0843 8.49957 16.0843C9.2381 16.0843 9.83994 15.4829 9.83994 14.7439V12.9474C10.3966 12.5278 10.7335 11.8679 10.7335 11.1696C10.7335 9.93779 9.7309 8.93567 8.49957 8.93567ZM9.16793 12.3228C9.03032 12.4023 8.94636 12.5502 8.94636 12.7088V14.7439C8.94636 14.9906 8.74572 15.1907 8.49957 15.1907C8.25342 15.1907 8.05278 14.9906 8.05278 14.7439V12.7088C8.05278 12.5502 7.96833 12.4032 7.83072 12.3228C7.41026 12.078 7.1592 11.6468 7.1592 11.1696C7.1592 10.4307 7.76062 9.82925 8.49957 9.82925C9.2381 9.82925 9.83994 10.4307 9.83994 11.1696C9.83994 11.6468 9.58881 12.078 9.16793 12.3228Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </span>
                                                <input
                                                    class="w-full pr-6 pl-4 py-4 font-bold placeholder-gray-400 border-0"
                                                    type="text" placeholder="Purchase Code"
                                                    wire:model.defer='purchase_code'>
                                            </div>
                                            @error('purchase_code')
                                                <div class="mt-1 text-xs text-red-700">{{ $message }}</div>
                                            @enderror

                                            {{-- buy_username --}}
                                            <div
                                                class="mt-3 flex items-center pl-6 border border-gray-300 bg-white rounded-sm">
                                                <span class="inline-block pr-3 border-r border-gray-50">
                                                    <svg class="w-5 h-5" width="20" height="21"
                                                        viewbox="0 0 20 21" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.6243 13.5625C15.3939 13.5625 15.2077 13.7581 15.2077 14V16.4517C15.2077 18.2573 14.0443 20.125 12.0973 20.125H5.42975C3.56848 20.125 1.87435 18.3741 1.87435 16.4517V10.5H15.6243C15.8547 10.5 16.041 10.3044 16.041 10.0625C16.041 9.82058 15.8547 9.625 15.6243 9.625H15.2077V5.95175C15.2077 2.39183 12.8635 0 9.37435 0H7.70768C4.21855 0 1.87435 2.39183 1.87435 5.95175V9.625H1.45768C1.22728 9.625 1.04102 9.82058 1.04102 10.0625V16.4517C1.04102 18.8322 3.13268 21 5.42975 21H12.0972C14.3089 21 16.0409 19.0023 16.0409 16.4517V14C16.041 13.7581 15.8547 13.5625 15.6243 13.5625ZM2.70768 5.95175C2.70768 2.86783 4.67022 0.875 7.70768 0.875H9.37435C12.4119 0.875 14.3743 2.86783 14.3743 5.95175V9.625H2.70768V5.95175Z"
                                                            fill="black"></path>
                                                        <path
                                                            d="M18.8815 9.3711C18.7482 9.17377 18.4878 9.12827 18.3003 9.26701L8.58655 16.4919L6.75235 14.5655C6.58942 14.3944 6.32608 14.3944 6.16322 14.5655C6.00028 14.7366 6.00028 15.0131 6.16322 15.1842L8.24655 17.3717C8.32695 17.4561 8.43362 17.4999 8.54115 17.4999C8.62488 17.4999 8.70868 17.4732 8.78282 17.4194L18.7828 9.98185C18.9703 9.84143 19.0141 9.56843 18.8815 9.3711Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </span>
                                                <input
                                                    class="w-full pr-6 pl-4 py-4 font-bold placeholder-gray-400 border-0"
                                                    type="text" placeholder="Buyers Username"
                                                    wire:model.defer='buy_username'>
                                            </div>
                                            @error('buy_username')
                                                <div class="mt-1 text-xs text-red-700">{{ $message }}</div>
                                            @enderror

                                            {{-- email for reminder --}}
                                            <div
                                                class="mt-3 flex items-center pl-6 border border-gray-300 bg-white rounded-sm">
                                                <span class="inline-block pr-3 border-r border-gray-50">
                                                    <svg class="w-5 h-5" width="20" height="21"
                                                        viewbox="0 0 20 21" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.6243 13.5625C15.3939 13.5625 15.2077 13.7581 15.2077 14V16.4517C15.2077 18.2573 14.0443 20.125 12.0973 20.125H5.42975C3.56848 20.125 1.87435 18.3741 1.87435 16.4517V10.5H15.6243C15.8547 10.5 16.041 10.3044 16.041 10.0625C16.041 9.82058 15.8547 9.625 15.6243 9.625H15.2077V5.95175C15.2077 2.39183 12.8635 0 9.37435 0H7.70768C4.21855 0 1.87435 2.39183 1.87435 5.95175V9.625H1.45768C1.22728 9.625 1.04102 9.82058 1.04102 10.0625V16.4517C1.04102 18.8322 3.13268 21 5.42975 21H12.0972C14.3089 21 16.0409 19.0023 16.0409 16.4517V14C16.041 13.7581 15.8547 13.5625 15.6243 13.5625ZM2.70768 5.95175C2.70768 2.86783 4.67022 0.875 7.70768 0.875H9.37435C12.4119 0.875 14.3743 2.86783 14.3743 5.95175V9.625H2.70768V5.95175Z"
                                                            fill="black"></path>
                                                        <path
                                                            d="M18.8815 9.3711C18.7482 9.17377 18.4878 9.12827 18.3003 9.26701L8.58655 16.4919L6.75235 14.5655C6.58942 14.3944 6.32608 14.3944 6.16322 14.5655C6.00028 14.7366 6.00028 15.0131 6.16322 15.1842L8.24655 17.3717C8.32695 17.4561 8.43362 17.4999 8.54115 17.4999C8.62488 17.4999 8.70868 17.4732 8.78282 17.4194L18.7828 9.98185C18.9703 9.84143 19.0141 9.56843 18.8815 9.3711Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </span>
                                                <input
                                                    class="w-full pr-6 pl-4 py-4 font-bold placeholder-gray-400 border-0"
                                                    type="text" placeholder="Alert Email"
                                                    wire:model.defer='alert_email' />
                                            </div>
                                            @error('alert_email')
                                                <div class="mt-1 text-xs text-red-700">{{ $message }}</div>
                                            @enderror

                                        </div>


                                        <button
                                            class="mt-6 py-4 w-full bg-green-500 hover:bg-green-600 text-white font-bold rounded-sm border-0 transition duration-200 shadow-xs">Get
                                            started</button>

                                        @error('form')
                                            <div class="mt-4 text-xs text-red-700">{{ $message }}</div>
                                        @enderror
                                    </form>
                                @else
                                    @include('envato-purchase-code-verifier::components.verified')
                                @endif

                                {{-- end main actions --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <x-loading />
</div>
