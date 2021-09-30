@extends('envato-purchase-code-verifier::layouts.app')
@section('title', 'Purchase code verification')
<div class="h-screen bg-green-400">
    <section class="py-20 2xl:py-40 overflow-hidden bg-green-400">
        <div class="container px-4 mx-auto">
          <div class="max-w-5xl mx-auto">
            <div class="flex flex-wrap items-center -mx-10">
              <div class="w-full lg:w-1/2 px-10">
                <div class="px-6 lg:px-20 py-12 lg:py-24 bg-white shadow-2xl rounded-lg">
                    @livewire('verify-component')
                </div>
              </div>
              <div class="w-full lg:w-1/2 px-10 mb-16 lg:mb-0 order-first lg:order-last">
                <div class="max-w-md">
                  <span class="text-lg text-white font-bold">Verify Purchase Code</span>
                  <h2 class="mt-8 mb-12 text-5xl font-bold font-heading">Start using project by verifying your purchase</h2>
                  <p class="text-sm text-red-500 bg-white p-2 rounded-lg text-center">
                    Don't ever share your purchase code with anyone
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>
